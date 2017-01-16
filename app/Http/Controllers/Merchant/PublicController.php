<?php

namespace App\Http\Controllers\Merchant;

use App\Facades\ActivityJoinRepository;
use App\Facades\ActivityLeaveRepository;
use App\Facades\ActivityRepository;
use App\Facades\CustomerRepository;
use App\Facades\MovieLikeRepository;
use App\Facades\MovieRepository;
use App\Facades\PayRepository;
use App\Facades\SuggestionsRepository;
use App\Models\Movie;
use App\Models\MovieLike;
use App\Facades\ActivityPriceRuleRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class PublicController extends Controller
{

    protected $currentCustomerId;

    public function __construct() {

    }

    public function wxlogin() {
        $AppID = env("WECHAT_APPID");
        $AppSecret = env("WECHAT_SECRET");
        $callback  =  'http://www.baidu.com/'; //回调地址
        //微信登录
        session_start();
        //-------生成唯一随机串防CSRF攻击
        $state  = md5(uniqid(rand(), TRUE));
        $_SESSION["wx_state"] = $state; //存到SESSION
        $callback = urlencode($callback);
        $wxurl = "https://open.weixin.qq.com/connect/qrconnect?appid=".$AppID."&redirect_uri={$callback}&response_type=code&scope=snsapi_login&state={$state}#wechat_redirect";
        header("Location: $wxurl");
    }

    public function login(Request $request) {
        return view('merchant.login');
    }

    public function doLogin(Request $request) {

        if ( ! checkCode($request->get('checkCode')) ) {
            return $this->errorBackTo(['error' => '验证码错误']);
        }
        $mobile = $request->input("mobile");
        $password = $request->input("password");

        if(isNullOrEmpty($mobile)
            || isNullOrEmpty($password)) {
            return $this->errorBackTo(['error' => '用户名密码不能为空']);
        }

        $map[] = ['mobile','=',$mobile];
        $customer = CustomerRepository::getByWhere($map)->first();

        if($customer["password"] != md5($password)) {
            return $this->errorBackTo(['error' => '用户名密码不正确']);
        }

        if($customer["available"]
            != config("enumerations.CUSTOMER_AVAILABLE.MERCHANT")) {
            return $this->errorBackTo(['error' => '还未申请发起人或者被管理员停用']);
        }

        $request->session()->set("customerId", $customer["customer_id"]);
        $request->session()->set("customer", $customer);

        return redirect()->route("merchant.index.index");

    }

    public function logout(Request $request) {
        $request->session()->set("customerId", null);
        $request->session()->set("customer", null);
        return redirect()->route("merchant.public.login");
    }

}
