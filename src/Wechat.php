<?php

namespace blackhive\easywechat;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use EasyWeChat\Factory;

class Wechat extends Component
{
    /**
     * 配置
     * [
     *      'wechat' => [
     *          // 微信商户平台
     *          'pay' => [],
     *          // 微信公众平台
     *          'mp' => [],
     *          // 微信开放平台
     *          'open' => []
     * @var
     */
    private $_config;

    private $_payment;

    public function init()
    {
        parent::init();

        if (!isset(Yii::$app->params['wechat'])){
            throw new InvalidConfigException('参数缺失');
        }

        $this->_config = Yii::$app->params['wechat'];
    }

    /**
     * 获取支付客户端
     * @return \EasyWeChat\Payment\Application
     */
    public function getPayment()
    {
        if(is_null($this->_payment)){
            $this->_payment = Factory::payment($this->_config['pay']);
        }
        return $this->_payment;
    }
}