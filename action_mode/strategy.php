<?php

/**
 * 策略模式
 *
 * 指对象有某个行为，但是在不同的场景中，该行为有不同的实现算法。比如每个人都要“交个人所得税”，但是“在美国交个人所得税”和“在中国交个人所得税”就有不同的算税方法。
 * 和简单工厂模式概念很像
 */


// 策略接口
interface IStrategy{
    public function algorithMethod();
}

class ChinaStrategy implements IStrategy {
    public function algorithMethod(){
        echo "china 算法";
    }
}

class AmericaStrategy implements IStrategy {
    public function algorithMethod(){
        echo "america 算法";
    }
}


//环境类
class Strategy{
    private $instance;
    public function __construct(IStrategy $iStrategy){
        $this->instance = $iStrategy;
    }

    public function show(){
        $this->instance->algorithMethod();
    }
}
$americaStrategy = new AmericaStrategy();

$strategy = new Strategy($americaStrategy);
$strategy->show();