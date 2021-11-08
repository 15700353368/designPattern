<?php

/**
 * 享元模式
 *
 * “享元”这两个字在中文里其实并没有什么特殊的意思，所以我们要把它拆分来看。“享”就是共享，“元”就是元素，这样一来似乎就很容易理解了，共享某些元素嘛。
 * 有点类似多例模式 如果之前初始化过的类 直接读取出来
 */

interface Icomponent{
    public function show();
}

class FlyWeighter implements Icomponent{
    public $name;
    public function __construct($name){
        echo "$name 初始化 \n";
        $this->name = $name;
    }

    public function show(){
        echo $this->name."\n";
    }
}

class FlyWeighterFactory{

    public $instance = [];

    public function createFlyWeight($name){
        if (isset($this->instance[$name])){
            return $this->instance[$name];
        }
        $this->instance[$name] = new FlyWeighter($name);
        return $this->instance[$name];
    }

}

$flyWeighterFactory = new FlyWeighterFactory();
$one = $flyWeighterFactory->createFlyWeight("第一个");
$one->show();

$two = $flyWeighterFactory->createFlyWeight("第二个");
$two->show();

//当前不会重新new 对象 而是从之前的里面取出来
$one = $flyWeighterFactory->createFlyWeight("第一个");
$one->show();