<?php

namespace App\Http\Middleware;

use App\Facades\CustomerRepository;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Route;

class MerchantCheckLogin
{

    protected $wechat;
    protected $actionExceptList;
    protected $controllerExceptList;

    public function __construct() {
        $this->controllerExceptList = ['PublicController'];
        $this->actionExceptList = ['eventDetail'];
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

        $route = getCurrentAction();

        if(!in_array($route['controller'],$this->controllerExceptList)
            && !in_array($route['method'],$this->actionExceptList)) {

            if(!$request->session()->has("customerId")) {
                return redirect()->route("merchant.public.login");
            }

            $customer = $request->session()->get("customer");

            if(isNullOrEmpty($customer)) {
                $customer = CustomerRepository::find($request->session()->get("customerId"));
                $request->session()->set("customer", $customer);
            }

            if($customer["available"] != config("enumerations.CUSTOMER_AVAILABLE.MERCHANT")) {
                return redirect()->route("merchant.public.error");
            }

        }
        return $next($request);
    }
}
