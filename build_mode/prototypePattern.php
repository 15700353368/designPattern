<?php

/**
 * 原型模式
 *
 * 克隆原有对象 形成新对象
 */

class Test{
    public $a = 1;
}

class hero{
    public $weapon;
    public $obj;
    public function __construct($str){
        $this->obj = new Test();
        $this->weapon = $str;
    }

    public function create(){
        echo $this->weapon;
    }

    public function cloned(){
        return clone $this;
    }

    public function showTest(){
        echo $this->obj->a;
    }

    public function setTest($a){
        $this->obj->a = $a;
    }

    //改成魔术方法__clone 实现真正的深拷贝 如果不加引用的对象还是指向同一地址
    public function __clone(){
        $this->obj = clone $this->obj;
    }
}

$oneHero = new hero('枪');


$twoHero = $oneHero->cloned();

$twoHero->setTest(2);
echo $oneHero->showTest();
