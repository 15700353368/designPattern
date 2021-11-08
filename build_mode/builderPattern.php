<?php

/**
 * 构建者模式
 *
 * 复杂的操作封装在一起
 * 建造者模式是将一个复杂的构建与其表示相分离，使得同样的构建过程可以创建不同的表示
 */


//具体产品
class tofu{
    protected $step1;
    protected $step2;
    public function step1($str){
        $this->step1 = $str;
    }

    public function step2($str){
        $this->step2 = $str;
    }

    public function show(){
        echo "步骤";
        echo $this->step1.$this->step2;
    }
}

//抽象产品实现步骤
abstract class Builder{
    abstract public function buildStep1();
    abstract public function buildStep2();
    abstract public function returnBuilder();
}

//具体产品1实现步骤
class mapoTofuBuilder extends Builder{
    public $instance;
    public function __construct(){
        $this->instance = new tofu();
    }

    public function buildStep1(){
        $this->instance->step1("麻婆豆腐第一步");
    }

    public function buildStep2(){
        $this->instance->step2("麻婆豆腐第二步");
    }

    public function returnBuilder(){
        return $this->instance;
    }
}

//具体产品2实现步骤
class sichuanTofuBuilder extends Builder{
    public $instance;
    public function __construct(){
        $this->instance = new tofu();
    }

    public function buildStep1(){
        $this->instance->step1("四川豆腐第一步");
    }

    public function buildStep2(){
        $this->instance->step2("四川豆腐第二步");
    }

    public function returnBuilder(){
        return $this->instance;
    }
}

//指挥者 构造一个使用Builder接口的对象
class director{
    public $instance;

    public function setBuilder(Builder $builder){
        $this->instance =   $builder;
    }

    public function setStep(){
        $this->instance->buildStep1();
        $this->instance->buildStep2();
        return  $this->instance->returnBuilder();
    }
}

$director = new director();


$mapoTofuBuilder = new mapoTofuBuilder();
$director->setBuilder($mapoTofuBuilder);
$mapoTofu = $director->setStep();
$mapoTofu->show();