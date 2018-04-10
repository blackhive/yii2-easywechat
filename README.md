# yii2-easywechat

easywechat 4 for yii2

based on [overtrue/wechat](https://github.com/overtrue/wechat)

## 安装

```shell
composer require --prefer-dist blackhive/yii2-easywechat -vvv
```

## 配置

Add the SDK as a yii2 application `component` in the `config/main.php`:

```php
'components' => [
	// ...
	'wechat' => [
		'class' => 'blackhive\easywechat\Wechat',
	],
	// ...
]
```
