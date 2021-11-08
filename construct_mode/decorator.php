<?php

/**
 * 装饰器模式
 *
 * 给一个类 不断增加样式（可叠加）
 * 桥接模式和装饰者模式的本质区别 装饰者可以叠加属性  而桥接模式是组合属性
 * 装饰者模式继承同一个接口类 桥接模式独立而开
 *  装饰器模式是动态地给一个对象添加一些额外的职责，给一个对象增加一些新的功能，要求装饰对象和被装饰对象实现同一个接口
 */

interface Icomponent{
    public function display();
}

class Person implements Icomponent{

    public $name;
    public function __construct($name){
        $this->name = $name;
    }
    public function display()
    {
        echo "名字".$this->name;
    }
}

class Equipment implements Icomponent {
    public $instanse;
    public function __construct(Icomponent $Icomponent){
        $this->instanse = $Icomponent;
    }
    public function display(){
        $this->instanse->display();
    }
}



class Weapon extends Equipment{
    public function display()
    {
        parent::display();
        echo "枪";
    }
}

class Shoe extends Equipment{
    public function display()
    {
        parent::display();
        echo "鞋子";
    }
}



$person = new Person("xt");
$weapon = new Weapon($person);
$shoe1 = new Shoe($weapon);
$shoe = new Shoe($shoe1);
$shoe->display();

//打印