<?php

/**
 * 适配器模式
 *
 * 适配器模式，即根据客户端需要，将某个类的接口转换成特定样式的接口，以解决类之间的兼容问题。
 */



/**
 * 适配器接口，所有的支付适配器都需实现这个接口。
 * 不管第三方支付实现方式如何，对于客户端来说，都
 * 用pay()方法完成支付
 */
interface PayAdapter{
    public function pay();
}


/**
 * 支付宝支付类
 */
class Alipay
{
    public function sendPayment()
    {
        echo '使用支付宝支付。';
    }
}

/**
 * 支付宝适配器
 */
class AliPayAdapter implements PayAdapter{
    public function pay()
    {
        $aliPay = new Alipay();
        $aliPay->sendPayment();
    }
}


/**
 * 微信支付类
 */
class WeChatpay
{
    public function scan()
    {
        echo '扫描二维码';
    }

    public function doPay()
    {
        echo '使用微信支付。';
    }
}

/**
 * 微信适配器
 */
class WeChatAdapter implements PayAdapter{
    public function pay()
    {
        $weChatPay = new WeChatpay();
        $weChatPay->scan();
        $weChatPay->doPay();
    }
}

//$weChat = new WeChatAdapter();
//$weChat->pay();

$ali = new AliPayAdapter();
$ali->pay();