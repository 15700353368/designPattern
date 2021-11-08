<?php

/**
 * 模板方法模式
 *
 * 当子类中有重复的动作时，将他们提取出来，放在父类中进行统一的处理，这就是模板方法模式的最简单通俗的解释。
 * 就像我们平时做项目，每次的项目流程实都差不多，都有调研、开发、测试、部署上线等流程。而具体到每个项目中，
 * 这些流程的实现又不会完全相同。这个流程，就像是模板方法，让我们每次都按照这个流程进行开发。
 */

abstract class Process{

    public function __construct(){
        $this->show();
    }

    //当子类中有重复的动作时，将他们提取出来，放在父类中进行统一的处理
    public function show(){
        $this->find();
        $this->does();
        $this->test();
        $this->online();

    }

    //调研
    abstract public function find();
    //开发
    abstract public function does();
    //测试
    abstract public function test();
    //上线
    abstract public function online();
}

class ProjectA extends Process{
    public function find()
    {
        echo "ProjectA find";
    }

    public function does()
    {
        echo "ProjectA does";
    }

    public function test()
    {
        echo "ProjectA test";
    }

    public function online()
    {
        echo "ProjectA online";
    }
}

class ProjectB extends Process{
    public function find()
    {
        echo "ProjectB find";
    }

    public function does()
    {
        echo "ProjectB does";
    }

    public function test()
    {
        echo "ProjectB test";
    }

    public function online()
    {
        echo "ProjectB online";
    }
}

$projectA = new ProjectA();
