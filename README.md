# yii2-easywechat

[![Latest Stable Version](https://poser.pugx.org/blackhive/yii2-easywechat/v/stable)](https://packagist.org/packages/blackhive/yii2-easywechat)
[![Total Downloads](https://poser.pugx.org/blackhive/yii2-easywechat/downloads)](https://packagist.org/packages/blackhive/yii2-easywechat)
[![Latest Unstable Version](https://poser.pugx.org/blackhive/yii2-easywechat/v/unstable)](https://packagist.org/packages/blackhive/yii2-easywechat)
[![License](https://poser.pugx.org/blackhive/yii2-easywechat/license)](https://packagist.org/packages/blackhive/yii2-easywechat)

easywechat 4 for yii2

基于 [overtrue/wechat](https://github.com/overtrue/wechat)

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
    'mp' => [],
    // 微信开放平台
    'open' => []
]
```
