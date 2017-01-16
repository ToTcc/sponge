<?php

/**
 * 生成字符验证码
 * @param $num  "验证码位数"
 * @param $w    "图片宽度"
 * @param @h    "图片高度"
 */
function getCode($num,$w,$h) {

    //创建图片，定义颜色值
    Header("Content-type: image/PNG");
    $im = imagecreate($w, $h);
    $black = imagecolorallocate($im, mt_rand(0, 200), mt_rand(0, 120), mt_rand(0, 120));
    $gray = imagecolorallocate($im, 204, 204, 204);
    $bgcolor = imagecolorallocate($im, 255, 255, 255);

    //画背景
    imagefilledrectangle($im, 0, 0, $w, $h, $bgcolor);
    //画边框
    imagerectangle($im, 0, 0, $w-1, $h-1, $gray);
    //imagefill($im, 0, 0, $bgcolor);

    $font = "/assets/backend/ttf/t1.ttf";

    //在画布上随机生成大量点，起干扰作用;
    for ($i = 0; $i < 80; $i++) {
        imagesetpixel($im, rand(0, $w), rand(0, $h), $black);
    }
    //将字符随机显示在画布上,字符的水平间距和位置都按一定波动范围随机生成
    $codeStr = getRandChar(4);
    //将生成的验证码写入session，备验证页面使用
    session()->put('laravel_code', strtolower($codeStr));
//            $_SESSION["laravel_code"] = $codeStr;
    $strx = rand($w / 8, $w / 4);
    for ($i = 0; $i < $num; $i++) {
        $stry = rand($h * 0.6, $h * 0.9);
        $tmp =substr($codeStr,$i,1);
        $array = array(-1,1);
        $p = array_rand($array);
        $an = $array[$p]*mt_rand(1,10);//角度
        $size = 28;
        $text_c = ImageColorAllocate($im, mt_rand(0,100),mt_rand(0,100),mt_rand(0,100));
        imagettftext($im, $size, $an, $strx, $stry, $text_c, $font, $tmp);
        $strx += $w / 8;
    }

    //在画布上随机生成线条
    for ($i = 0; $i < 4; $i++) {
        $lineColor = imagecolorallocate($im,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
        imageline($im,mt_rand(0,$w),mt_rand(0,$h),mt_rand(0,$w),mt_rand(0,$h),$lineColor);
    }
    imagepng($im);
    imagedestroy($im);
}

/*
 * 生成随机字幕
 */
function getRandChar($length="32"){//验证码文字生成函数
    $str="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $result="";
    for($i=0;$i<$length;$i++){
        $num[$i]=rand(0,25);
        $result.=$str[$num[$i]];
    }
    return $result;
}


/*
 * 校验验证码
 */
function checkCode($code){//验证码文字生成函数
    if(strtolower($code) == session('laravel_code')){
        return true;
    } else {
        return false;
    }
}

/**
 * 生成字符验证码
 * @param $num  "验证码位数"
 * @param $w    "图片宽度"
 * @param @h    "图片高度"
 */
function getZhCode($num,$w,$h) {
    header("Content-type: image/PNG");
    $fontface="msyhbd.ttf"; //字体文件
    $str = "们以我到他会作时要动国产的一是工就年阶义发成部民可出能方进在了不和有大这主中人上为来分生对于学下级地个用同行面说种过命度革而多子后自社加小机也经力线本电高量长党得实家定深法表着水理化争现所二起政三好十战无农使性前等反体合斗路图把结第里正新开论之物从当两些还天资事队批点育重其思与间内去因件日利相由压员气业代全组数果期导平各基或月毛然如应形想制心样干都向变关问比展那它最及外没看治提五解系林者米群头意只明四道马认次文通但条较克又公孔领军流入接席位情运器并飞原油放立题质指建区验活众很教决特此常石强极土少已根共直团统式转别造切九你取西持总料连任志观调七么山程百报更见必真保热委手改管处己将修支识病象几先老光专什六型具示复安带每东增则完风回南广劳轮科北打积车计给节做务被整联步类集号列温装即毫知轴研单色坚据速防史拉世设达尔场织历花受求传口断况采精金界品判参层止边清至万确究书术状厂须离再目海交权且儿青才证低越际八试规斯近注办布门铁需走议县兵固除般引齿千胜细影济白格效置推空配刀叶率述今选养德话查差半敌始片施响收华觉备名红续均药标记难存测士身紧液派准斤角降维板许破述技消底床田势端感往神便贺村构照容非搞亚磨族火段算适讲按值美态黄易彪服早班麦削信排台声该击素张密害侯草何树肥继右属市严径螺检左页抗苏显苦英快称坏移约巴材省黑武培著河帝仅针怎植京助升王眼她抓含苗副杂普谈围食射源例致酸旧却充足短划剂宣环落首尺波承粉践府鱼随考刻靠够满夫失包住促枝局菌杆周护岩师举曲春元超负砂封换太模贫减阳扬江析亩木言球朝医校古呢稻宋听唯输滑站另卫字鼓刚写刘微略范供阿块某功套友限项余倒卷创律雨让骨远帮初皮播优占死毒圈伟季训控激找叫云互跟裂粮粒母练塞钢顶策双留误础吸阻故寸盾晚丝女散焊功株亲院冷彻弹错散商视艺灭版烈零室轻血倍缺厘泵察绝富城冲喷壤简否柱李望盘磁雄似困巩益洲脱投送奴侧润盖挥距星松送获兴独官混纪依未突架宽冬章湿偏纹吃执阀矿寨责熟稳夺硬价努翻奇甲预职评读背协损棉侵灰虽矛厚罗泥辟告卵箱掌氧恩爱停曾溶营终纲孟钱待尽俄缩沙退陈讨奋械载胞幼哪剥迫旋征槽倒握担仍呀鲜吧卡粗介钻逐弱脚怕盐末阴丰雾冠丙街莱贝辐肠付吉渗瑞惊顿挤秒悬姆烂森糖圣凹陶词迟蚕亿矩康遵牧遭幅园腔订香肉弟屋敏恢忘编印蜂急拿扩伤飞露核缘游振操央伍域甚迅辉异序免纸夜乡久隶缸夹念兰映沟乙吗儒杀汽磷艰晶插埃燃欢铁补咱芽永瓦倾阵碳演威附牙芽永瓦斜灌欧献顺猪洋腐请透司危括脉宜笑若尾束壮暴企菜穗楚汉愈绿拖牛份染既秋遍锻玉夏疗尖殖井费州访吹荣铜沿替滚客召旱悟刺脑措贯藏敢令隙炉壳硫煤迎铸粘探临薄旬善福纵择礼愿伏残雷延烟句纯渐耕跑泽慢栽鲁赤繁境潮横掉锥希池败船假亮谓托伙哲怀割摆贡呈劲财仪沉炼麻罪祖息车穿货销齐鼠抽画饲龙库守筑房歌寒喜哥洗蚀废纳腹乎录镜妇恶脂庄擦险赞钟摇典柄辩竹谷卖乱虚桥奥伯赶垂途额壁网截野遗静谋弄挂课镇妄盛耐援扎虑键归符庆聚绕摩忙舞遇索顾胶羊湖钉仁音迹碎伸灯避泛亡答勇频皇柳哈揭甘诺概宪浓岛袭谁洪谢炮浇斑讯懂灵蛋闭孩释乳巨徒私银伊景坦累匀霉杜乐勒隔弯绩招绍胡呼痛峰零柴簧午跳居尚丁秦稍追梁折耗碱殊岗挖氏刃剧堆赫荷胸衡勤膜篇登驻案刊秧缓凸役剪川雪链渔啦脸户洛孢勃盟买杨宗焦赛旗滤硅炭股坐蒸凝竟陷枪黎救冒暗洞犯筒您宋弧爆谬涂味津臂障褐陆啊健尊豆拔莫抵桑坡缝警挑污冰柬嘴啥饭塑寄赵喊垫丹渡耳刨虎笔稀昆浪萨茶滴浅拥穴覆伦娘吨浸袖珠雌妈紫戏塔锤震岁貌洁剖牢锋疑霸闪埔猛诉刷狠忽灾闹乔唐漏闻沈熔氯荒茎男凡抢像浆旁玻亦忠唱蒙予纷捕锁尤乘乌智淡允叛畜俘摸锈扫毕璃宝芯爷鉴秘净蒋钙肩腾枯抛轨堂拌爸循诱祝励肯酒绳穷塘燥泡袋朗喂铝软渠颗惯贸粪综墙趋彼届墨碍启逆卸航衣孙龄岭骗休借";
    $str = iconv('utf-8','gbk',$str);
    $code="";
    for($i=0;$i<4;$i++){
        $Xi=mt_rand(0,strlen($str)/2);
        if($Xi%2) $Xi+=1;
        $code.=substr($str,$Xi,2);
    }
    $_SESSION['helloweba_zh']=$code;
    $im=imagecreatetruecolor($w,$h);
    $bkcolor=imagecolorallocate($im,250,250,250);
    imagefill($im,0,0,$bkcolor);
    /***添加干扰***/
    for($i=0;$i<15;$i++){
        $fontcolor=imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
        imagearc($im,mt_rand(-10,$w),mt_rand(-10,$h),mt_rand(30,300),mt_rand(20,200),55,44,$fontcolor);
    }
    for($i=0;$i<255;$i++){
        $fontcolor=imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
        imagesetpixel($im,mt_rand(0,$w),mt_rand(0,$h),$fontcolor);
    }
    /***********内容*********/
    for($i=0;$i<$num;$i++){
        $fontcolor=imagecolorallocate($im,mt_rand(0,120),mt_rand(0,120),mt_rand(0,120)); //这样保证随机出来的颜色较深。
        $codex=iconv("GB2312","UTF-8",substr($code,$i*2,2));
        imagettftext($im,mt_rand(14,18),mt_rand(-60,60),30*$i+20,mt_rand(30,35),$fontcolor,$fontface,$codex);
    }
    imagepng($im);
    imagedestroy($im);

}

/**
 * 判断是否为空
 */
function isNullOrEmpty($obj) {
    if(!$obj instanceof Illuminate\Database\Eloquent\Collection) {
        return (!isset($obj) || empty($obj) || $obj == null);
    } else {
        return $obj->isEmpty();
    }
}

/**
 * 获取当前日期
 */
function getCurrentDate() {
    return date('Y-m-d');
}

/**
 * 获取当前时间
 */
function getCurrentTime() {
    return date('Y-m-d H:i:s');
}

/**
 * 计算本月同比增长
 * @param $lastMouthNum
 * @param $currentMouthNum
 * @return mixed
 */
function figureRate($lastMouthNum, $currentMouthNum) {
    if($lastMouthNum != 0) {
        if( $currentMouthNum >= $lastMouthNum) {
            $result['flag'] = 'increased';
            $result['rate'] = round( ($currentMouthNum - $lastMouthNum) / $lastMouthNum, 2) * 100 ."%";
        } else {
            $result['flag'] = 'decreased';
            $result['rate'] = round( ($lastMouthNum - $currentMouthNum) / $lastMouthNum, 2) * 100 ."%";
        }
    } else {
        $result['flag'] = 'increased';
        $result['rate'] = 100 ."%";
    }
    return $result;
}
/**
 * 利用枚举生成select
 * @param $enum
 * @param $name
 * @param int $val
 * @param int $hasAll
 * @return string
 */
function getEnumSelectWidget($enum, $name, $val = 0, $hasAll = 0) {

    $count = count($enum) / 2;
    $index = 0;

    $all = $hasAll == 1 ? '<option value="0">全部</option>' : '';

    $html = '<select class="form-control" name=\'' . $name . '\'>' . $all;

    foreach ($enum as $key => $value) {

        if ($count == $index)
            break;

        $selected = '';

        if ($value == $val)
            $selected = 'selected="selected"';

        $html .= '<option value="' . $value . '" ' . $selected . '>' . $enum[$key . '_STRING'] . '</option>';

        $index++;
    }

    $html .= '</select>';

    return $html;
}

function getEnumArray4Composer($enum, $defaultValue) {
    $count = count($enum) / 2;
    $index = 0;
    $array[] = $defaultValue;
    foreach ($enum as $key => $value) {
        if ($count == $index)
            break;
        $array[] = $enum[$key . '_STRING'];
        $index ++;
    }

    return $array;
}

function getEnumString($enum, $value) {

    $key = array_search($value, $enum);

    $strKey = $key . '_STRING';

    return $enum[$strKey];
}

function createUuid($prefix = "") {    //可以指定前缀
    $str = md5(uniqid(mt_rand(), true));
    $uuid = substr($str, 0, 8) . '-';
    $uuid .= substr($str, 8, 4) . '-';
    $uuid .= substr($str, 12, 4) . '-';
    $uuid .= substr($str, 16, 4) . '-';
    $uuid .= substr($str, 20, 12);
    return $prefix . $uuid;
}

function object2array(&$object) {
    $object =  json_decode( json_encode( $object),true);
    return  $object;
}

function getCurrentAction() {
    $action = Route::current()->getActionName();
    list($class, $method) = explode('@', $action);
    $class = substr(strrchr($class,'\\'),1);

    return ['controller' => $class, 'method' => $method];
}
//发送手机验证码
function mms($tel,$content){

    $key = "7328024d250ffe779f6c8b9a3a9232b9";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://sms-api.luosimao.com/v1/send.json");

    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    curl_setopt($ch, CURLOPT_HTTPAUTH , CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD  , 'api:key-'.$key);

    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, array('mobile' => $tel,'message' => $content.'【你的兴趣订单】'));

    $res = curl_exec( $ch );
    curl_close( $ch );
    return $res;
}