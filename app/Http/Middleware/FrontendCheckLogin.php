<?php

namespace App\Http\Middleware;

use App\Facades\CustomerRepository;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Route;

class FrontendCheckLogin
{

    protected $wechat;
    protected $actionExceptList;
    protected $controllerExceptList;

    public function __construct() {
        $this->controllerExceptList = ['WechatController','AlipayController'];
        $this->actionExceptList = ['myInfo','updateInfo'];
        $this->wechat = app('wechat');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $oauth = $this->wechat->oauth;

        $route = getCurrentAction();

        if(!in_array($route['controller'],$this->controllerExceptList)) {

            $request->session()->put('_target_uri','search');

            if(!$request->session()->has("customerId")) {
                return $oauth->redirect();
            }

            if(!in_array($route['method'],$this->actionExceptList)) {

                $customer = CustomerRepository::find($request->session()->get("customerId"));

                if ($customer["valid"] != 1) {
                    return redirect()->route("frontend.userCenter.myInfo");
                }

            }

        }
        return $next($request);
    }
}
