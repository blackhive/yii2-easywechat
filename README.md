# yii2-easywechat

[![Latest Stable Version](https://poser.pugx.org/blackhive/yii2-easywechat/v/stable)](https://packagist.org/packages/blackhive/yii2-easywechat)
[![Total Downloads](https://poser.pugx.org/blackhive/yii2-easywechat/downloads)](https://packagist.org/packages/blackhive/yii2-easywechat)
[![Latest Unstable Version](https://poser.pugx.org/blackhive/yii2-easywechat/v/unstable)](https://packagist.org/packages/blackhive/yii2-easywechat)
[![License](https://poser.pugx.org/blackhive/yii2-easywechat/license)](https://packagist.org/packages/blackhive/yii2-easywechat)

easywechat 4 for yii2

基于 [overtrue/wechat](https://github.com/overtrue/wechat)

友情提示，微信支付的沙箱不要用，它和支付宝的沙箱不是一个东西。。。

## 安装

```shell
composer require --prefer-dist blackhive/yii2-easywechat -vvv
```

## 配置

在 `config/main.php` 添加应用组件:

```php
'components' => [
	// ...
	'wechat' => [
		'class' => 'blackhive\easywechat\Wechat',
		//'openidName' => 'wx.openid',
	],
]
```

在 `config/params_local.php` 中添加配置参数：

```php
[
    'wechat' => [
        // 微信商户平台
        'pay' => [
            'app_id' => '',
            'mch_id' => '',
            'key' => '',
            'cert_path' => dirname(__FILE__) . '/path/to/apiclient_cert.pem', // 绝对路径！！！！
            'key_path' => dirname(__FILE__) . '/path/to/apiclient_key.pem',  // 绝对路径！！！！
            'notify_url' => '',
        ],
        // 微信公众平台
        'mp' => [
            'app_id' => '',
            'secret' => '',
            'oauth' => [
                'scopes'   => ['snsapi_base'],
                'callback' => '/wechat/oauth-callback',
            ],
        ],
        // 微信开放平台
        'open' => [
            'app_id'   => '',
            'secret'   => '',
            'token'    => '',
            'aes_key'  => ''
        ]
]
```

## 使用

```php
// 微信支付客户端
$payment = Yii::$app->wechat->payment;

// 微信公众号客户端
$officialAccount = Yii::$app->wechat->officialAccount;

// 微信公众平台客户端
$openPlatform = Yii::$app->wechat->openPlatform;

// 是否在微信客户端内
if (Yii::$app->wechat->isWechat()){
    // 微信内的操作
}

// 向 session 中保存 openid
Yii::$app->wechat->openid = 'jfdjdjfjdaj';

// 从 session 中获取 openid
Yii::$app->wechat->openid;

// 微信网页授权:
if (Yii::$app->wechat->inWechat && !Yii::$app->wechat->openid) {
    Yii::$app->wechat->returnUrl = ['user/order', 'id' => 1];
    return Yii::$app->wechat->officialAccount->oauth->redirect()->send();
}

// 网页授权回调控制器 /wechat/oauth-callback
$oauth  = Yii::$app->wechat->officialAccount->oauth;
Yii::$app->wechat->openid = $oauth->user()->getId();
return $this->redirect(Yii::$app->wechat->returnUrl);

```

具体使用请参考 [EasyWeChat文档](https://www.easywechat.com/docs/master)
