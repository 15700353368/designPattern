<?php

/**
 * 观察者模式
 *
 * 定义对象间的一种一对多的依赖关系，当一个对象的状态发生改变时，所有依赖于它的对象都得到通知并被自动更新
 * 当下单后 需要发送短信通知 和 库存修改
 */


interface Observer{
    public function autoUpdate();
}

class Message implements Observer{
    public function autoUpdate()
    {
        echo "发送短信";
    }
}

class Goods implements Observer{
    public function autoUpdate()
    {
        echo "修改库存";
    }
}

class Order{
    public $instance = [];

    public function attach(Observer $observer){
        $this->instance[] = $observer;
    }

    public function sale(){
        echo "有人下单了";
        foreach ($this->instance as $item){
            $item->autoUpdate();
        }
    }
}

$order = new Order();
$message = new Message();
$goods = new Goods();

//关联
$order->attach($message);
$order->attach($goods);

$order->sale();