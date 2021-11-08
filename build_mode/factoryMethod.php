<?php

/**
 * 工厂方法模式
 *
 * 子类工厂去实现工厂，不再需要用switch/if去判断，子类直接返回一个实例化的对象
 */

interface Language{
    public function speak();
    public function write();
}

class China implements Language{

    public function speak(){
        echo "中文";
    }

    public function write(){
        echo "中文";
    }
}

class America implements Language{
    public function speak(){
        echo "英语";
    }

    public function write(){
        echo "中文";
    }
}




interface Factory{
    public function create();
}

class ChinaFactory implements Factory{
    public function create(){
        return new China();
    }
}

class AmericaFactory implements Factory{
    public function create(){
        return new America();
    }
}


$chinaFactory   =   new ChinaFactory();
$china          =   $chinaFactory->create();
$china->speak();