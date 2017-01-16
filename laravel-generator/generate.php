<?php
//引入工具包
require_once('./utils.php');
//引入配置文件
$config = include('./config.php');

//基本配置信息
$server = $config['server'];
$user = $config['username'];
$pass = $config['password'];
$dbname = $config['database'];
$prefix = $config['prefix'];

//排除列表
$exceptList = array($prefix.'action_permission',$prefix.'actions',$prefix.'menu_permission',$prefix.'menus',$prefix.'password_resets',$prefix.'permission_role',$prefix.'permissions',$prefix.'role_user',$prefix.'roles',$prefix.'users');

//固定列表
$staticList = array($prefix.'menu',$prefix.'user',$prefix.'role',$prefix.'action',$prefix.'permission');

//连接数据库
$connection = mysqlConnect($server,$user,$pass,$dbname);

//删除文件夹
if(is_dir('./generated/')) {
    delDirAndFile('./generated/');
}

//创建所需文件夹
generateDir();

//获取所有数据表
$result = mysqli_query($connection, "SHOW TABLES") or die('Query failed: ' .mysqli_error($connection). "\n");
while($row = mysqli_fetch_array($result)) {
    //获取所有表名
    $tableName = $row[0];

    //获取所有主键
    if(!in_array($tableName,$exceptList)) {
        $primaryKeyName = getPrimaryKey($tableName,$connection);
        //完整数据表信息
        $tableList[$tableName] = array('tableName' => $tableName, 'primaryKeyName' => $primaryKeyName);
    }

}

//释放结果
mysqli_free_result($result);

//判断生成类型
if($argv[1] == "all") {
    //批量创建文件
    foreach ($tableList as &$table) {
        $tableName = str_replace($prefix,'',$table['tableName']);
        $modelName = convertUnderline(str_replace($prefix,'',$table['tableName']));
        $primaryKeyName = $table['primaryKeyName'];

        //写入Model文件
        generateModelFile($tableName,$modelName,$primaryKeyName);

        //写入Facade文件
        generateFacadeFile($modelName);

        //写入Repository文件
        generateRepositoryFile($modelName);

        //写入Composer文件
        generateComposerFile($modelName);

    }
} else if($argv[1] == "single"){
    for($i=2;$i<$argc;$i++) {
        $tableName = str_replace($prefix,'',$argv[$i]);
        $modelName = convertUnderline(str_replace($prefix,'',$tableName));
        $primaryKeyName = $tableList[$argv[$i]]['primaryKeyName'];

        if(isNullOrEmpty($primaryKeyName)) {
            //写入Config文件
            generateConfigFile($tableList,$staticList,$prefix);

            //写入RepositoryServiceProvider文件
            generateRepositoryServiceProviderFile($tableList,$staticList,$prefix);

            //写入ComposerServiceProvider文件
            generateComposerServiceProviderFile($tableList,$staticList,$prefix);

            die("未找到该数据表：".$argv[$i]."\n");
        }
        
        //写入Model文件
        generateModelFile($tableName,$modelName,$primaryKeyName);

        //写入Facade文件
        generateFacadeFile($modelName);

        //写入Repository文件
        generateRepositoryFile($modelName);

        //写入Composer文件
        generateComposerFile($modelName);
    }
} else {
    die("参数错误，请输入all或single\n");
}

//写入Config文件
generateConfigFile($tableList,$staticList,$prefix);

//写入RepositoryServiceProvider文件
generateRepositoryServiceProviderFile($tableList,$staticList,$prefix);

//写入ComposerServiceProvider文件
generateComposerServiceProviderFile($tableList,$staticList,$prefix);