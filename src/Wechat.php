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
     * ]
     * @var
     */
    private $_config;

    private $_payment;

    private $_officialAccount;

    private $_openPlatform;

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

    /**
     * 获取微信公众号客户端
     * @return \EasyWeChat\OfficialAccount\Application
     */
    public function getOfficialAccount()
    {
        if(is_null($this->_officialAccount)){
            $this->_officialAccount = Factory::officialAccount($this->_config['mp']);
        }
        return $this->_officialAccount;
    }

    /**
     * 获取微信开放平台客户端
     * @return \EasyWeChat\OpenPlatform\Application
     */
    public function getOpenPlatform()
    {
        if(is_null($this->_openPlatform)){
            $this->_openPlatform = Factory::openPlatform($this->_config['open']);
        }
        return $this->_openPlatform;
    }

    /**
     * 判断是否在微信客户端内
     * @return bool
     */
    public function isWechat()
    {
        return strpos($_SERVER["HTTP_USER_AGENT"], "MicroMessenger") !== false;
    }
}