<?php


/**
 * 责任链模式
 *
 * 使多个对象都有机会处理请求，从而避免请求的发送者和接收者之间的耦合关系。将这些对象连成一条链，并沿着这条链传递该请求，直到有一个对象处理它为止。
 */

abstract class FilterChain{
    public $text;
    public function setNext($item){
        $this->text = $item;
    }

    abstract public function add($meg);
}


class FilterA extends FilterChain{


    public function add($meg){
        if ($this->text)
            return str_replace("tm","**",$this->text->add($meg));
        else
            return str_replace("tm","**",$meg);
    }

}

class FilterB extends FilterChain{
    public function add($meg){
        if ($this->text)
            return str_replace("坑货","**",$this->text->add($meg));
        else
            return str_replace("坑货","**",$meg);
    }
}

class FilterC extends FilterChain{
    public function add($meg){
        if ($this->text)
            return str_replace("二货","**",$this->text->add($meg));
        else
            return str_replace("二货","**",$meg);
    }

}

$msg = "你tm的个坑货,二货";
$a = new FilterA();
$b = new FilterB();
$c = new FilterC();

$a->setNext($b);
$b->setNext($c);
echo $a->add($msg);
