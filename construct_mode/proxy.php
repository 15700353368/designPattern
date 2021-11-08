<?php

/**
 * 代理模式
 *
 * 代理模式为其他对象提供一种代理以控制对这个对象的访问。在某些情况下，一个对象不适合或者不能直接引用另一个对象，而代理对象可以在客户端和目标对象之间起到中介的作用。
 */

interface IBuy{
    public function buy();
}

class originBuy implements IBuy {
    public function buy(){
        echo  "买东西";
    }
}

class proxyBuy implements IBuy {
    private $instance;
    public function __construct(){
       $this->instance = new originBuy();
    }

    public function buy(){
        $this->instance->buy();
    }
}

$proxy = new proxyBuy();
$proxy->buy();