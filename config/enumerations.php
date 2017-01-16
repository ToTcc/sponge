<?php
return [

    //默认是否枚举
    'DEFAULT_YN' => ['NO' => 1, 'YES' => 2,
        'NO_STRING' => '否', 'YES_STRING' => '是'],

    //电影状态
    'MOVIE_STATUS' => array('INIT'=>1, 'WAITING_JOIN'=>2, 'WAITING_PLAY' => 3, 'UNABLE' => 4,
        'INIT_STRING' => '可占座', 'WAITING_JOIN_STRING' => '售票中', 'WAITING_PLAY_STRING' => '售罄', 'UNABLE_STRING' => '无法放映'),

    //活动状态
    'ACTIVITY_STATUS' => array('WAITING_JOIN'=>1, 'WAITING_PLAY'=>2, 'END' => 3, 'CANCEL' => 4,
        'WAITING_JOIN_STRING' => '售票中', 'WAITING_PLAY_STRING' => '售罄', 'END_STRING' => '结束放映', 'CANCEL_STRING' => '取消放映'),

    //发起活动状态
    'EVENT_STATUS' => array('WAITING_VERIFY'=>1, 'WAITING_JOIN'=>2, 'FULL' => 3, 'END' => 4, 'CANCEL' => 5,
        'WAITING_VERIFY_STRING' => '等待审核', 'WAITING_JOIN_STRING' => '报名中', 'FULL_STRING' => '已报满', 'END_STRING' => '已结束', 'CANCEL_STRING' => '已取消'),

    //活动类型
    'ACTIVITY_TYPE'  => array('CASH' => 1, 'FREE' => 2,
        'CASH_STRING' => '收费活动', 'FREE_STRING' => '免费活动'),

    //商家活动类型
    'EVENT_TYPE'  => array('CASH' => 1, 'FREE' => 2,
        'CASH_STRING' => '收费活动', 'FREE_STRING' => '免费活动'),

    //商家活动报名状态
    'EVENT_JOIN_STATUS' => array('WAITING_CHECK' => 0, 'WAITING_PAY'=>1, 'END_PAY'=>2, 'REFUND' => 3, 'REJECT' => 4, 'END_SIGN' => 5, 'END_COMMENT' => 6,'ABSENT' => 7,'CANCEL' => 8, 'EVENT_CANCEL' => 9,
        'WAITING_CHECK_STRING' => '等待审核', 'WAITING_PAY_STRING' => '等待支付', 'END_PAY_STRING' => '已支付', 'REFUND_STRING' => '申请退款', 'REJECT_STRING' => '已拒绝', 'END_SIGN_STRING' => '已签到', 'END_COMMENT_STRING' => '已评论','ABSENT_STRING'=>'未到场','CANCEL_STRING'=>'取消报名', 'EVENT_CANCEL_STRING' => '活动取消'),

    //活动报名状态
    'ACTIVITY_JOIN_STATUS' => array('WAITING_PAY'=>1, 'END_PAY'=>2, 'REFUND' => 3, 'END_SIGN' => 4, 'END_COMMENT' => 5, 'ABSENT' => 6, 'ACTIVITY_CANCEL' => 7,
        'WAITING_PAY_STRING' => '等待支付', 'END_PAY_STRING' => '已支付', 'REFUND_STRING' => '已请假', 'END_SIGN_STRING' => '已签到', 'END_COMMENT_STRING' => '已评论', 'ABSENT_STRING'=>'未到场', 'ACTIVITY_CANCEL_STRING' => '活动取消'),

    //支付状态
    'PAY_STATUS' => array('WAITING_PAY'=>1, 'END_PAY'=>2, 'REFUND' => 3,
        'WAITING_PAY_STRING' => '等待支付', 'END_PAY_STRING' => '已支付', 'REFUND_STRING' => '申请退款'),

    //付款类型
    'PAY_TYPE' => ['WECHAT' => 1, 'ALIPAY' => 2,
        'WECHAT_STRING' => '微信', 'ALIPAY_STRING' => '支付宝'],

    //活动价格状态
    'ACTIVITY_PRICE_RULE_STATUS' => array('WAITING'=>0, 'ONGOING'=>1, 'END'=>2,
        'WAITING_STRING' => '待开始', 'ONGOING_STRING' => '进行中', 'END_STRING' => '已结束'),

    //用户类型
    'CUSTOMER_AVAILABLE' => array('NORMAL' => 0, 'MERCHANT' => 1, 'BLACK' => 2,
        'NORMAL_STRING' => '正常用户', 'MERCHANT_STRING' => '商家', 'BLACK_STRING' => '黑名单',),

    //批准状态
    'APPLY_STATUS' => array('WAITING' => 0, 'APPROVED' => 1, 'REJECTED' => 2,
        'WAITING_STRING' => '待审核', 'APPROVED_STRING' => '已批准', 'REJECTED_STRING' => '已拒绝'),

    //评价类型
    'COMMENT_TYPE' => array('GOOD' => 1, 'NORMAL' => 2, 'BAD' => 3,
        'GOOD_STRING' => '好评', 'NORMAL_STRING' => '中评', 'BAD_STRING' => '差评'),

    //扣分类型
    'SCORE_RECORD_TYPE' => array('ACTIVITY' => 1, 'EVENT' => 2,
        'ACTIVITY_STRING' => '电影订单', 'EVENT_STRING' => '活动订单',),

    //电影订单管理员
    'ACTIVITY_CUSTOMER_ARRAY' => array(2,3),

    //2次未评价不可报名
    'LIMIT_COMMENT_NUMBER' => 2,

];
