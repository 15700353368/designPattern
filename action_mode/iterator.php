<?php

/**
 * 迭代器模式
 *
 * 提供一种方法顺序访问一个聚合对象中各个元素，而又不需暴露该对象的内部表示
 */

interface IIterator{
    public function FirstIndex();
    public function NextIndex();
    public function IsDone();
    public function CurrentItem();
}

class ConcreteIterator implements IIterator{
    public $index;
    public $items = [];

    public function __construct($items){
        $this->items = $items;

        $this->FirstIndex();
    }

    public function FirstIndex(){
        $this->index = 0;
    }

    public function NextIndex(){
        $this->index++;
    }

    public function IsDone(){
        return count($this->items) >= $this->index + 1;
    }

    public function CurrentItem(){
        return $this->items[$this->index];
    }
}

interface CreateIterator{
    public function createIterator($msg);
}

class messageCreateIterator implements CreateIterator{
    public function createIterator($msg){
        return new ConcreteIterator($msg);
    }
}

$messageList = ["1","2","3","4","5","6"];

$messageCreateIterator = new messageCreateIterator();
$c = $messageCreateIterator->createIterator($messageList);


while ($c->IsDone()){
    echo $c->CurrentItem();
    $c->NextIndex();
}