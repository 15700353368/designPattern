<?php

/**
 * 简单工厂模式
 * 传入不同的标识 通过一个工厂类 返回指定类
 *
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

class Factory
{
    public function create($type){
        if ($type == "china") return new China();
        if ($type == "america") return new America();
    }
}

$factor =   new Factory();
$china  =   $factor->create("china");
$china->speak();