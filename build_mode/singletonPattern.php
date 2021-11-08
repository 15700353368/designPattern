<?php

/**
 * 单列模式
 *
 * 只会实例化一次
 */

class single{

    //创建静态私有的变量保存该类对象 静态变量内存只会有一份
    private static $instance;

    //防止被new
    private function __consruct(){}

    //防止被clone
    private function __clone(){}

    public static function create(){
        if (!self::$instance instanceof self){
            echo "初始化自己";
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function test(){
        echo "单例模式";
    }
}

$one = single::create();
$one->test();

$two = single::create();
$two->test();