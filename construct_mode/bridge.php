<?php

/**
 * 桥接模式
 *
 * 用组合/聚合的方式来共享一些能用的方法
 * 桥接模式和装饰者模式的本质区别 装饰者可以叠加属性  而桥接模式是组合属性独立的维度
 * 装饰者模式继承同一个接口类 桥接模式独立而开
 * 桥接模式是将抽象部分与实现部分分离，使它们都可以独立的变化。
 */

interface ICar{
    public function show();
}

class BaomaCar implements ICar{

    public function __construct($color){
        $this->color = $color;
    }

    public function show(){
        $this->color->showColor();
        echo "宝马车";
    }
}

class AudiCar implements ICar{

    public function __construct($color){
        $this->color = $color;
    }

    public function show(){
        $this->color->showColor();
        echo "奥迪车";
    }
}

//颜色
interface IColor{
    public function showColor();
}

class RedColor implements IColor{
    public function showColor()
    {
        echo "红色的";
    }
}


class BlackColor implements IColor{
    public function showColor()
    {
        echo "黑色的";
    }
}

$redColor = new RedColor();
$baomaCar = new BaomaCar($redColor);
$baomaCar->show();

echo "\n";

$blackColor = new BlackColor();
$audiCar = new AudiCar($blackColor);
$audiCar->show();