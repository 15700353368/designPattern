<?php


/**
 * 命令模式
 *
 * 命令发送者只管调用具体命令类中的 execute() 方法；
 * 然后在具体命令类中设定命令接收者；
 * 可以消除命令发送者和命令接受者之间的耦合；
 * 并且可以方便的扩展新命令；
 *  命令模式是将一个请求封装成一个对象，从而使发出者可以用不同的请求对客户进行参数化。
 *
 * CommandInterface：命令抽象类；一般会暴露一个 execute 方法；
 * Command：具体的命令类；设定接收者；
 * Invoker：命令发送者；用于调用命令；
 * Receiver： 命令接收者；负责执行操作；
 */

//命令抽象类
abstract class commend{
    abstract public function execute();
}

//具体的命令类；设定接收者
class SimpleExecute extends commend{
    public function execute(){
        echo "SimpleExecute";
    }
}

//具体的命令类；设定接收者
class ComplexExecute extends commend{
    public $instance;
    public function __construct($item){
        $this->instance = $item;
    }

    public function execute(){
        $this->instance->a();
    }
}

//命令接收者；负责执行操作
class Receiver{
    public function a(){
        echo "a";
    }
}

//命令发送者；用于调用命令
class invoker{
    public $instance;
    public function __construct($item){
        $this->instance = $item;
    }

    public function do(){
        $this->instance->execute();
    }
}

$invoker = new invoker(new SimpleExecute());
$invoker->do();


$invoker = new invoker(new ComplexExecute(new Receiver()));
$invoker->do();