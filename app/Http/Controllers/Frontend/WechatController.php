<?php

namespace App\Http\Controllers\Frontend;

use App\Facades\ActivityPriceRuleRepository;
use App\Facades\CustomerRepository;
use App\Facades\EventJoinRepository;
use App\Facades\EventRepository;
use App\Facades\MovieRepository;
use App\Facades\PayRepository;
use App\Facades\ActivityJoinRepository;
use App\Facades\ActivityRepository;
use App\Http\Controllers\Controller;
use App\Models\Movie;
use EasyWeChat\Payment\Order;
use Illuminate\Http\Request;

class WechatController extends Controller {

    protected $wechat;

    function __construct() {
        $this->wechat = app('wechat');
    }

    public function serve() {

        $this->wechat->server->setMessageHandler(function($message){
            return "欢迎关注你的兴趣订单！";
        });

        return $this->wechat->server->serve();
    }

    //授权回调
    public function oauthCallback(Request $request) {

        $oauth = $this->wechat->oauth;

        $user = $oauth->user();

        $map[] = ['openid','=',$user->getId()];
        $customer = CustomerRepository::getByWhere($map)->first();

        if(isNullOrEmpty($customer)) {
            $customerData['openid'] = $user->getId();
            $customerData['nickname'] = $user->getNickname();
            $customerData['headimgurl'] = $user->getAvatar();
            $customerData['unionid'] = $user->getOriginal()["unionid"];

            $customer = CustomerRepository::create($customerData);
        }

        $request->session()->put('customerId',$customer['customer_id']);

        $targetUri = $request->session()->has('_target_uri') ? $request->session()->pull('_target_uri') : '/';

        return response()->redirectTo($targetUri);

    }

    //活动订单下单
    public function eventPay($id, Request $request) {
        //查找event
        $eventId = $id;
        $event = EventRepository::find($eventId);

        //判断活动是否存在
        if(isNullOrEmpty($event)) {
            return redirect()->route('frontend.event.eventList');
        }

        //判断活动是是否开始
        if($event['status'] != config('enumerations.EVENT_STATUS.WAITING_JOIN')) {
            return redirect()->route('frontend.event.eventList');
        }

        //查找用户
        $customer = CustomerRepository::find($request->session()->get('customerId'));

        //获取活动报名记录
        $map[] = ['customer_id', '=', $request->session()->get('customerId')];
        $map[] = ['event_id', '=', $eventId];

        //寻找活动报名记录
        $eventJoin = EventJoinRepository::getByWhere($map)->first();

        //判断是否已经报名活动
        if($eventJoin['status'] != config('enumerations.EVENT_JOIN_STATUS.WAITING_PAY')) {
            return redirect()->route('frontend.event.eventList');
        }

        //获取支付记录
        $pay = PayRepository::find($eventJoin["pay_id"]);

        //判断支付记录是否为空
        if(isNullOrEmpty($pay)) {
            $payData['pay_type'] = config('enumerations.PAY_TYPE.WECHAT');
            $payData['money'] = $event['price'];
            $payData['status'] = config('enumerations.PAY_STATUS.WAITING_PAY');
            $payData['out_trade_no'] = time().rand(0, 999);

            $pay = PayRepository::create($payData);

            $eventJoinMap[] = ['join_id','=',$eventJoin['join_id']];
            $eventJoinData['pay_id'] = $pay['pay_id'];

            EventJoinRepository::setByWhere($eventJoinMap,$eventJoinData);
        }

        //商品属性
        $attributes = [
            'trade_type'       => 'JSAPI', // JSAPI，NATIVE，APP...
            'body'             => 'SAME 活动支付',
            'detail'           => 'SAME 活动支付',
            'out_trade_no'     => $pay['out_trade_no'],
            'total_fee'        => $event['price']*100,
            'notify_url'       => route('frontend.wechat.eventHandlePay'), // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'openid'           => $customer['openid'],
        ];

        //创建订单
        $order = new Order($attributes);

        //统一下单
        $result = $this->wechat->payment->prepare($order);

        if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS'){
            $prepayId = $result->prepay_id;
            $config = $this->wechat->payment->configForJSSDKPayment($prepayId); // 返回数组
        } else {
            return redirect()->route('frontend.event.eventList');
        }

        $config["event_id"] = $id;

        return view('frontend.eventChoosePay', compact('config'));
    }

    //下单
    public function pay($id, Request $request) {

        //查找活动
        $activityId = $id;
        $activity = ActivityRepository::find($activityId);

        //判断活动是否存在
        if(isNullOrEmpty($activity)) {
            return redirect()->route('frontend.index.search');
        }

        //判断活动是是否开始
        if($activity['status'] != config('enumerations.ACTIVITY_STATUS.WAITING_JOIN')) {
            return redirect()->route('frontend.index.search');
        }

        //查找用户
        $customer = CustomerRepository::find($request->session()->get('customerId'));

        //获取活动报名记录
        $map[] = ['customer_id', '=', $request->session()->get('customerId')];
        $map[] = ['activity_id', '=', $activityId];

        //寻找活动报名记录
        $activityJoin = ActivityJoinRepository::getByWhere($map)->first();

        //判断是否已经报名活动
        if($activityJoin['status'] == config('enumerations.ACTIVITY_JOIN_STATUS.END_PAY')) {
            return redirect()->route('frontend.index.search');
        }

        $pay = PayRepository::find($activityJoin["pay_id"]);

        $ruleMap[] = ['activity_id', '=', $id];
        $ruleMap[] = ['status', '=', config('enumerations.ACTIVITY_PRICE_RULE_STATUS.ONGOING')];

        $activityRule = ActivityPriceRuleRepository::getByWhere($ruleMap)->first();

        //判断支付记录是否为空
        if(isNullOrEmpty($pay)) {
            $payData['pay_type'] = config('enumerations.PAY_TYPE.WECHAT');
            $payData['money'] = $activityRule['price'];
            $payData['status'] = config('enumerations.PAY_STATUS.WAITING_PAY');
            $payData['out_trade_no'] = time().rand(0, 999);

            $pay = PayRepository::create($payData);

            $activityJoinMap[] = ['join_id','=',$activityJoin['join_id']];
            $activityJoinData['pay_id'] = $pay['pay_id'];

            ActivityJoinRepository::setByWhere($activityJoinMap,$activityJoinData);
        }

        //商品属性
        $attributes = [
            'trade_type'       => 'JSAPI', // JSAPI，NATIVE，APP...
            'body'             => 'SAME 活动支付',
            'detail'           => 'SAME 活动支付',
            'out_trade_no'     => $pay['out_trade_no'],
            'total_fee'        => $activityRule['price']*100,
            'notify_url'       => route('frontend.wechat.handlePay'), // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'openid'           => $customer['openid'],
        ];

        //创建订单
        $order = new Order($attributes);

        //统一下单
        $result = $this->wechat->payment->prepare($order);

        if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS'){
            $prepayId = $result->prepay_id;
            $config = $this->wechat->payment->configForJSSDKPayment($prepayId); // 返回数组
        } else {
            return redirect()->route('frontend.index.search');
        }

        $config["activity_id"] = $id;

        return view('frontend.choosePay', compact('config'));
    }

    //处理订单-event
    public function eventHandlePay() {
        $response = $this->wechat->payment->handleNotify(function($notify, $successful){

            $payMap[] = ['out_trade_no','=',$notify->out_trade_no];
            $pay = PayRepository::getByWhere($payMap)->first();

            //判断订单是否存在
            if(isNullOrEmpty($pay)) {
                return 'Order not exist.';
            }

            //判断订单是否已经支付过了
            if($pay['status'] == config('enumerations.PAY_STATUS.END_PAY')) {
                return true;
            }

            if($successful) {
                //修改支付记录状态
                $payData['status'] = config('enumerations.PAY_STATUS.END_PAY');
                $payData['pay_trade_no'] = $notify->transaction_id;

                PayRepository::setByWhere($payMap,$payData);

                //修改活动报名记录状态
                $eventJoinMap[] = ['pay_id','=',$pay->pay_id];
                $eventJoinData['status'] = config('enumerations.EVENT_JOIN_STATUS.END_PAY');

                EventJoinRepository::setByWhere($eventJoinMap,$eventJoinData);

                //获取报名记录
                $eventJoin = EventJoinRepository::getByWhere($eventJoinMap)->first();

                //查找活动
                $event = EventRepository::find($eventJoin['event_id']);

                //获取报名总人数
                $totalJoinMap[] = ['event_id', '=', $eventJoin['event_id']];
                $totalJoinMap[] = ['status', '=', config('enumerations.EVENT_JOIN_STATUS.END_PAY')];

                $totalJoinCount = EventJoinRepository::getByWhere($totalJoinMap)->count();


                //更新报名人数
                $eventData["join_number"] = $event["join_number"] + 1;
                EventRepository::saveById($event['event_id'],$eventData);

                //判断并修改活动状态
                if($totalJoinCount == $event['upper_limit']) {
                    $eventData['status'] = config('enumerations.EVENT_STATUS.FULL');
                    EventRepository::saveById($event['event_id'],$eventData);
                }
            }

            return true; // 或者错误消息

        });

        return $response; // Laravel 里请使用：return $response;
    }

    //处理订单
    public function handlePay() {
        $response = $this->wechat->payment->handleNotify(function($notify, $successful){

            $payMap[] = ['out_trade_no','=',$notify->out_trade_no];
            $pay = PayRepository::getByWhere($payMap)->first();

            //判断订单是否存在
            if(isNullOrEmpty($pay)) {
                return 'Order not exist.';
            }

            //判断订单是否已经支付过了
            if($pay['status'] == config('enumerations.PAY_STATUS.END_PAY')) {
                return true;
            }

            if($successful) {
                //修改支付记录状态
                $payData['status'] = config('enumerations.PAY_STATUS.END_PAY');
                $payData['pay_trade_no'] = $notify->transaction_id;

                PayRepository::setByWhere($payMap,$payData);

                //修改活动报名记录状态
                $activityJoinMap[] = ['pay_id','=',$pay->pay_id];
                $activityJoinData['status'] = config('enumerations.ACTIVITY_JOIN_STATUS.END_PAY');

                ActivityJoinRepository::setByWhere($activityJoinMap,$activityJoinData);

                //获取报名记录
                $activityJoin = ActivityJoinRepository::getByWhere($activityJoinMap)->first();

                //查找活动
                $activity = ActivityRepository::find($activityJoin['activity_id']);

                //获取报名总人数
                $totalJoinMap[] = ['activity_id', '=', $activityJoin['activity_id']];
                $totalJoinMap[] = ['status', '=', config('enumerations.ACTIVITY_JOIN_STATUS.END_PAY')];

                $totalJoinCount = ActivityJoinRepository::getByWhere($totalJoinMap)->count();

                //更新报名人数
                $activityData["join_number"] = $activity["join_number"] + 1;
                ActivityRepository::saveById($activity['activity_id'],$activityData);

                //判断并修改活动状态
                if($totalJoinCount == $activity['upper_limit']) {

                    $activityData['status'] = config('enumerations.ACTIVITY_STATUS.WAITING_PLAY');
                    ActivityRepository::saveById($activity['activity_id'],$activityData);

                    $movie = MovieRepository::findMovieById($activity["movie_id"]);

                    $movieData["status"] = config('enumerations.MOVIE_STATUS.WAITING_PLAY');
                    MovieRepository::saveById($movie["movie_id"], $movieData);

                }
            }

            return true; // 或者错误消息

        });

        return $response; // Laravel 里请使用：return $response;
    }

    public function paySuccess() {
        return view("frontend.paySuccess");
    }

}