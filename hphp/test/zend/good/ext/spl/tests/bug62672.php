<?php

class ObjA
{
    private $_varA;

    public function __construct(Iterator $source)
    {
        $this->_varA = $source;
    }
}

class ObjB extends ObjA
{
    private $_varB;

    public function __construct(ArrayObject $keys)
    {
        $this->_varB = $keys;
        parent::__construct($keys->getIterator());
    }
}
<<__EntryPoint>> function main() {
$obj = new ObjB(new ArrayObject());

var_dump($obj == unserialize(serialize($obj)));
}
