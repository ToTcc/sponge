<?php

//判空
function isNullOrEmpty($obj) {
    return (!isset($obj) || empty($obj) || $obj == null);
}

//下划线转换驼峰
function convertUnderline ($str , $ucfirst = true) {
    $str = explode('_' , $str);
    foreach($str as $key=>$val)
        $str[$key] = ucfirst($val);
 
    if(!$ucfirst)
        $str[0] = strtolower($str[0]);
 
    return implode('' , $str);
}

//循环删除目录和文件函数
function delDirAndFile($dirName) {
    if ($handle = opendir("$dirName")) {
        while (false !== ($item = readdir($handle))) {
            if ($item != "." && $item != "..") {
                if (is_dir("$dirName/$item")) {
                    delDirAndFile("$dirName/$item");
                } else {
                    unlink("$dirName/$item");
                }
            }
        }
        closedir($handle);
        rmdir($dirName);
    }
}

function mysqlConnect($server,$user,$pass,$dbname) {
    $conn = mysqli_connect($server,$user,$pass);
    if(!$conn) die("连接错误：".mysqli_connect_error()."\n");
    mysqli_select_db($conn,$dbname) or die("数据库连接失败！\n");
    return $conn;
}

function getPrimaryKey($tableName,$connection) {
    $result = mysqli_query($connection,"SELECT * FROM ".$tableName) or die('Query failed: ' . mysqli_error($connection)."\n");
    $i = 0;
    while($i < mysqli_num_fields($result)) {
        $meta = mysqli_fetch_field($result);
        if($meta->flags & MYSQLI_PRI_KEY_FLAG) {
            $primaryKeyName = $meta->name;
            break;
        }
        $i++;
    }
    mysqli_free_result($result);
    return $primaryKeyName;
}

//创建所需文件夹
function generateDir() {
    if(!is_dir("./generated/")) {
        mkdir("./generated/",0777);
    }

	if(!is_dir("./generated/app/")) {
	    mkdir("./generated/app/",0777);
	}

	if(!is_dir("./generated/app/Models/")) {
	    mkdir("./generated/app/Models/",0777);
	}

	if(!is_dir("./generated/app/Facades/")) {
	    mkdir("./generated/app/Facades/",0777);
	}

	if(!is_dir("./generated/app/Repositories/")) {
	    mkdir("./generated/app/Repositories/",0777);
	}

	if(!is_dir("./generated/app/Providers/")) {
	    mkdir("./generated/app/Providers/",0777);
	}

	if(!is_dir("./generated/app/Http/")) {
	    mkdir("./generated/app/Http/",0777);
	}

	if(!is_dir("./generated/app/Http/ViewComposers/")) {
	    mkdir("./generated/app/Http/ViewComposers/",0777);
	}

	if(!is_dir("./generated/config/")) {
	    mkdir("./generated/config/",0777);
	}
}

//生成Model文件
function generateModelFile($tableName, $modelName, $primaryKeyName) {

    $modelFileName = $modelName.'.php';
    $modelFile = fopen("./generated/app/Models/".$modelFileName,"w");//打开文件准备写入
    $modelFileContent = "";
    $modelFileContent .= "<?php\n\n"
        . "namespace App\\Models;\n\n"
        . "use Illuminate\\Database\\Eloquent\\Model;\n\n"
        . "class ".$modelName." extends Model {\n"
        . "    /**\n"
        . "     * [\$guarded description]\n"
        . "     *\n"
        . "     * @var array\n"
        . "     */\n"
        . "    protected \$guarded = [];\n\n"
        . "    /**\n"
        . "     * [\$guarded description]\n"
        . "     *\n"
        . "     * @var string\n"
        . "     */\n"
        . "    protected \$table = \"".$tableName."\";\n\n"
        . "    protected \$primaryKey = \"".$primaryKeyName."\";\n"
        . "}\n";

    fwrite($modelFile,$modelFileContent);//写入
    fclose($modelFile);//关闭
}

//生成Facade文件
function generateFacadeFile($modelName) {

    $facadeFileName = $modelName.'Repository.php';
    $facadeFile = fopen("./generated/app/Facades/".$facadeFileName,"w");//打开文件准备写入
    $facadeFileContent = "";
    $facadeFileContent .= "<?php\n\n"
        . "namespace App\\Facades;\n\n"
        . "use Illuminate\\Support\\Facades\\Facade;\n\n"
        . "/**\n"
        . " * This is the ".$modelName." repository facade class\n"
        . " */\n"
        . "class ".$modelName."Repository extends Facade {\n"
        . "    protected static function getFacadeAccessor() {\n"
        . "        return '".$modelName."Repository';\n"
        . "    }\n"
        . "}\n";

    fwrite($facadeFile,$facadeFileContent);//写入
    fclose($facadeFile);//关闭
}

//生成Repository文件
function generateRepositoryFile($modelName) {
    $repositoryFileName = $modelName.'Repository.php';
    $repositoryFile = fopen("./generated/app/Repositories/".$repositoryFileName,"w");//打开文件准备写入
    $repositoryFileContent = "";
    $repositoryFileContent .= "<?php\n\n"
        . "namespace App\\Repositories;\n\n"
        . "/**\n"
        . " * ".$modelName." Model Repository\n"
        . " */\n"
        . "class ".$modelName."Repository extends CommonRepository {\n\n"
        . "}\n";

    fwrite($repositoryFile,$repositoryFileContent);//写入
    fclose($repositoryFile);//关闭
}

//生成Composer文件
function generateComposerFile($modelName) {
    $composerFileName = $modelName.'Composer.php';
    $composerFile = fopen("./generated/app/Http/ViewComposers/".$composerFileName,"w");//打开文件准备写入
    $composerFileContent = "";
    $composerFileContent .= "<?php\n\n"
        . "namespace App\\Http\\ViewComposers;\n\n"
        . "use Illuminate\\Contracts\\View\\View;\n\n"
        . "class ".$modelName."Composer {\n"
        . "    /**\n"
        . "     * 将数据绑定到视图\n"
        . "     *\n"
        . "     * @param  View \$view\n"
        . "     *\n"
        . "     * @return mixed\n"
        . "     */\n"
        . "    public function compose(View \$view) {\n"
        . "        \$search = self::getSearchInputs();\n"
        . "        \$view->with(compact('search'));\n"
        . "    }\n\n"
        . "    private static function getSearchInputs() {\n"
        . "        return [\n"
        . "            'route'  => route(''),\n"
        . "            'method' => 'get',\n"
        . "            'class'  => 'form-inline',\n"
        . "            'inputs' => [\n\n"
        . "                [\n"
        . "                    'type'       => '',\n"
        . "                    'name'       => '',\n"
        . "                    'value'      => old(''),\n"
        . "                    'attributes' => [\n"
        . "                        'placeholder' => '',\n"
        . "                        'class'       => 'form-control',\n"
        . "                    ],\n"
        . "                ],\n\n\n\n"
        . "                [\n"
        . "                    'type'       => 'button',\n"
        . "                    'value'      => '<i class=\"fa fa-filter\"></i> 筛选',\n"
        . "                    'attributes' => [\n"
        . "                        'class' => 'btn btn-success btn-sm',\n"
        . "                        'type'  => 'submit',\n"
        . "                        'style' => 'margin-bottom:0',\n"
        . "                    ],\n"
        . "                ],\n\n"
        . "                [\n"
        . "                    'type'       => 'button',\n"
        . "                    'value'      => '<i class=\"fa fa-filter\"></i> 重置',\n"
        . "                    'attributes' => [\n"
        . "                        'class' => 'btn btn-primary btn-sm',\n"
        . "                        'type'  => 'button',\n"
        . "                        'style' => 'margin-bottom:0',\n"
        . "                        'onclick'  => 'location=\"' .route('backend.customer.index') .'\"',\n"
        . "                    ],\n"
        . "                ],\n"
        . "            ],\n\n"
        . "        ];\n"
        . "    }\n\n"
        . "}\n";

    fwrite($composerFile,$composerFileContent);//写入
    fclose($composerFile);//关闭
}

//生成config文件
function generateConfigFile($tableList,$staticList,$prefix) {
	$configFileName = 'repository.php';
	$configFile = fopen("./generated/config/".$configFileName,"w");//打开文件准备写入
	$configFileContent = "";
	$configFileContent .= "<?php\n"
	    . "return [\n"
	    . "    'models'     => [\n";
	foreach ($staticList as $static) {
	    $modelName = convertUnderline(str_replace($prefix,'',$static));
	    $configFileContent .= "        '".lcfirst($modelName)."'       => 'App\\Models\\".$modelName."',\n";
	}
	foreach ($tableList as $table) {
	    $modelName = convertUnderline(str_replace($prefix,'',$table['tableName']));
	    $configFileContent .= "        '".lcfirst($modelName)."'       => 'App\\Models\\".$modelName."',\n";
	}
	$configFileContent .= "    ],\n"
	                    . "];\n";

	fwrite($configFile,$configFileContent);//写入
	fclose($configFile);//关闭
}

//生成RepositoryServiceProvider文件
function generateRepositoryServiceProviderFile($tableList,$staticList,$prefix) {
	$repositoryServiceProviderFileName = 'RepositoryServiceProvider.php';
	$repositoryServiceProviderFile = fopen("./generated/app/Providers/".$repositoryServiceProviderFileName,"w");//打开文件准备写入
	$repositoryServiceProviderContent = "";
	$repositoryServiceProviderContent .= "<?php\n\n"
	    . "namespace App\\Providers;\n\n"
        . "use Illuminate\\Support\\ServiceProvider;\n";

	foreach ($staticList as $static) {
	    $modelName = convertUnderline(str_replace($prefix,'',$static));
	    $repositoryServiceProviderContent .= "use App\\Repositories\\".$modelName."Repository;\n";
	}

	foreach ($tableList as $table) {
	    $modelName = convertUnderline(str_replace($prefix,'',$table['tableName']));
	    $repositoryServiceProviderContent .= "use App\\Repositories\\".$modelName."Repository;\n";
	}

	$repositoryServiceProviderContent .= "\nclass RepositoryServiceProvider extends ServiceProvider {\n"
	    . "    /**\n"
	    . "     * Bootstrap the application services.\n"
	    . "     *\n"
	    . "     * @return void\n"
	    . "     */\n"
	    . "    public function boot() {\n"
	    . "        // 合并自定义配置文件\n"
	    . "        \$configuration = realpath(__DIR__ . '/../../config/repository.php');\n"
	    . "        \$this->mergeConfigFrom(\$configuration, 'repository');\n"
	    . "    }\n"
	    . "\n\n"
	    . "    /**\n"
	    . "     * Register the application services.\n"
	    . "     *\n"
	    . "     * @return void\n"
	    . "     */\n"
	    . "    public function register() {\n";

	foreach ($staticList as $static) {
	    $modelName = convertUnderline(str_replace($prefix,'',$static));
	    $repositoryServiceProviderContent .= "        \$this->register".$modelName."Repository();\n";
	}

	foreach ($tableList as $table) {
	    $modelName = convertUnderline(str_replace($prefix,'',$table['tableName']));
	    $repositoryServiceProviderContent .= "        \$this->register".$modelName."Repository();\n";
	}

	$repositoryServiceProviderContent .= "    }\n\n";

	foreach ($staticList as $static) {
	    $modelName = convertUnderline(str_replace($prefix,'',$static));
	    $repositoryServiceProviderContent .= "\n    /**\n"
	        . "     * Register the ".$modelName." Repository\n"
	        . "     *\n"
	        . "     * @return mixed\n"
	        . "     */\n"
	        . "    public function register".$modelName."Repository() {\n"
	        . "        \$this->app->singleton('".$modelName."Repository', function (\$app) {\n"
	        . "            \$model = config('repository.models.".lcfirst($modelName)."');\n"
	        . "            $".lcfirst($modelName)." = new \$model();\n"
	        . "            \$validator = \$app['validator'];\n\n"
	        . "            return new ".$modelName."Repository($".lcfirst($modelName).", \$validator);\n"
	        . "        });\n\n"
	        . "        \$this->app->alias('".$modelName."Repository', RoleRepository::class);\n"
	        . "    }\n";
	}

	foreach ($tableList as $table) {
	    $modelName = convertUnderline(str_replace($prefix,'',$table['tableName']));
	    $repositoryServiceProviderContent .= "\n    /**\n"
	        . "     * Register the ".$modelName." Repository\n"
	        . "     *\n"
	        . "     * @return mixed\n"
	        . "     */\n"
	        . "    public function register".$modelName."Repository() {\n"
	        . "        \$this->app->singleton('".$modelName."Repository', function (\$app) {\n"
	        . "            \$model = config('repository.models.".lcfirst($modelName)."');\n"
	        . "            $".lcfirst($modelName)." = new \$model();\n"
	        . "            \$validator = \$app['validator'];\n\n"
	        . "            return new ".$modelName."Repository($".lcfirst($modelName).", \$validator);\n"
	        . "        });\n\n"
	        . "        \$this->app->alias('".$modelName."Repository', ".$modelName."Repository::class);\n"
	        . "    }\n";
	}

	$repositoryServiceProviderContent .= "}\n";

	fwrite($repositoryServiceProviderFile,$repositoryServiceProviderContent);//写入
	fclose($repositoryServiceProviderFile);//关闭
}

//生成ComposerServiceProvider文件
function generateComposerServiceProviderFile($tableList,$staticList,$prefix) {
	//写入ComposerServiceProvider文件
	$composerServiceProviderFileName = 'ComposerServiceProvider.php';
	$composerServiceProviderFile = fopen("./generated/app/Providers/".$composerServiceProviderFileName,"w");//打开文件准备写入
	$composerServiceProviderContent = "";
	$composerServiceProviderContent .= "<?php\n\n"
	    . "namespace App\\Providers;\n\n"
	    . "use Illuminate\\Support\\ServiceProvider;\n\n"
	    . "class ComposerServiceProvider extends ServiceProvider {\n"
	    . "    private \$main, ";

	foreach ($staticList as $static) {
	    $modelName = convertUnderline(str_replace($prefix,'',$static));
	    $composerServiceProviderContent .= "\$".lcfirst($modelName).", ";
	}

	$composerServiceProviderContent .= "\n        ";

	foreach ($tableList as $key => $table) {
	    $modelName = convertUnderline(str_replace($prefix,'',$table['tableName']));
	    $composerServiceProviderContent .= "\$".lcfirst($modelName).", ";
	    if($key != 0 && $key%6 == 0) {
	        $composerServiceProviderContent .= "\n        ";
	    }
	}

	$composerServiceProviderContent = rtrim($composerServiceProviderContent,", ");

	$composerServiceProviderContent .= ";\n\n"
	    . "    public function __construct() {\n"
	    . "        \$this->main = [\n"
	    . "            'backend.layout.sidebar',\n"
	    . "            'backend.layout.breadcrumbs',\n"
	    . "        ];\n";

	foreach ($staticList as $static) {
	    $modelName = convertUnderline(str_replace($prefix,'',$static));
	    $composerServiceProviderContent .= "\n"
	        . "        \$this->".lcfirst($modelName)." = [\n"
	        . "            'backend.".lcfirst($modelName).".index',\n"
	        . "            'backend.".lcfirst($modelName).".search',\n"
	        . "        ];\n";
	}

	foreach ($tableList as $table) {
	    $modelName = convertUnderline(str_replace($prefix,'',$table['tableName']));
	    $composerServiceProviderContent .= "\n"
	        . "        \$this->".lcfirst($modelName)." = [\n"
	        . "            'backend.".lcfirst($modelName).".index',\n"
	        . "        ];\n";
	}

	$composerServiceProviderContent .= "    }\n\n"
	    . "    /**\n"
	    . "     * Bootstrap the application services."
	    . "     *\n"
	    . "     * @return void\n"
	    . "     */\n"
	    . "    public function boot() {\n"
        . "        view()->composer(\$this->main, 'App\\Http\\ViewComposers\\MainComposer');\n";

	foreach ($staticList as $static) {
	    $modelName = convertUnderline(str_replace($prefix,'',$static));
	    $composerServiceProviderContent .= "        view()->composer(\$this->".lcfirst($modelName).", 'App\\Http\\ViewComposers\\".$modelName."Composer');\n";
	}

	foreach ($tableList as $table) {
	    $modelName = convertUnderline(str_replace($prefix,'',$table['tableName']));
	    $composerServiceProviderContent .= "        view()->composer(\$this->".lcfirst($modelName).", 'App\\Http\\ViewComposers\\".$modelName."Composer');\n";
	}

	$composerServiceProviderContent .= "    }\n\n"
	    . "    /**\n"
	    . "     * Register the application services.\n"
	    . "     *\n"
	    . "     * @return void\n"
	    . "     */\n"
	    . "    public function register() {\n\n"
	    . "    }\n"
	    . "}\n";

	fwrite($composerServiceProviderFile,$composerServiceProviderContent);//写入
	fclose($composerServiceProviderFile);//关闭
}