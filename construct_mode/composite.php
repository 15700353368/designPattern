<?php

/**
 * 组合模式
 *
 * 组合模式依据树形结构来组合对象，用来表示部分以及整体层次，如 公司组织架构，省份所辖城市
 * 组合模式是将对象组合成树形结构以表示"部分-整体"的层次结构，组合模式使得用户对单个对象和组合对象的使用具有一致性。
 */

abstract class Component{

    public function __construct($name){
        $this->name = $name;
    }
    abstract public function add($c);
    abstract public function show();
}

class Composite extends Component{
    private $instance = [];

    public function add($c)
    {
        $this->instance[] = $c;
    }

    public function show()
    {
        echo $this->name;
        foreach ($this->instance as $item){
            echo $item->show();
        }
    }
}

class Leaf extends Component{

    // 叶子节点没有子节点，禁止叶子节点添加子节点
    public function add($c)
    {
        echo "";
    }

    public function show()
    {
        echo $this->name;
    }
}

$a = new Composite("四川省");
$b = new Composite("眉山市");
$c = new Leaf("仁寿县");
$a->add($b);
$b->add($c);
$a->show();