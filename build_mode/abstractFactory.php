<?php

/**
 * 抽象工厂模式
 *
 * 工厂方法和抽象工厂的区别就是  一个是创建一个产品 另一个是创建多个产品
 * 抽象工厂模式是提供一个创建一系列相关或相互依赖对象的接口，而无需指定它们具体的类
 */

interface Language{
    public function speak();
    public function write();
}


class ChinaLanguage implements Language{


    public function speak(){
        echo "中文";
    }

    public function write(){
        echo "中文";
    }
}

class AmericaLanguage implements Language{
    public function speak(){
        echo "英语";
    }

    public function write(){
        echo "中文";
    }
}


interface Meal{
    public function eat();
}


class ChinaMeal implements Meal{
    public function eat(){
        echo "米饭";
    }

}

class AmericaMeal implements Meal{
    public function eat(){
        echo "牛肉";
    }
}



abstract class Factory{
    abstract public function createLanguage();
    abstract public function createMeal();
}

class ChinaFactory extends Factory{

    public function createLanguage(){
        return new AmericaLanguage();
    }

    public function createMeal(){
        return new AmericaMeal();
    }
}


class AmericaFactory extends Factory{
    public function createLanguage(){
        return new AmericaLanguage();
    }

    public function createMeal(){
        return new AmericaMeal();
    }
}


$factor     =   new ChinaFactory();
$language   =   $factor->createLanguage();
$meal       =   $factor->createMeal();

$language->speak();
$meal->eat();
