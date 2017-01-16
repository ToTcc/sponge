<?php

return [

	// The default gateway to use
	'default' => 'alipay',

	// Add in each gateway here
	'gateways' => [
		'paypal' => [
			'driver'  => 'PayPal_Express',
			'options' => [
				'solutionType'   => '',
				'landingPage'    => '',
				'headerImageUrl' => ''
			]
		],

        'alipay' => [
            'driver' => 'Alipay_Express',
            'options' => [
                'partner' => '2088511548369121',
                'key' => '5sjbixqwv0t6tym1gfo5tczzfkc42uqz',
                'sellerEmail' => 'service@ofo.so',
                'returnUrl' => 'your returnUrl here',
                'notifyUrl' => 'your notifyUrl here'
            ]
        ]
	]

];