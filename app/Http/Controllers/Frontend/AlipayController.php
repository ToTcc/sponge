<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Omnipay;

class AlipayController extends Controller {

    protected $wechat;

    public function page() {
        return view('frontend.alipayPage');
    }

    public function pay(){

        $gateway = Omnipay::gateway();

        $options = [
            'out_trade_no' => date('YmdHis') . mt_rand(1000,9999),
            'subject' => '测试支付宝',
            'total_fee' => '0.01',
        ];

        $response = $gateway->purchase($options)->send();
        $response->redirect();
    }

    public function result() {

        $gateway = Omnipay::gateway();

        $options = [
            'request_params'=> $_REQUEST,
        ];

        $response = $gateway->completePurchase($options)->send();

        if ($response->isSuccessful() && $response->isTradeStatusOk()) {
            //支付成功后操作
            exit('支付成功');
        } else {
            //支付失败通知.
            exit('支付失败');
        }

    }

}