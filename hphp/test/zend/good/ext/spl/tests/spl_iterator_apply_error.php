<?php

class MyArrayIterator extends ArrayIterator {
    public function rewind() {
        throw new Exception('Make the iterator break');
    }
}

function test() {}
<<__EntryPoint>> function main() {
$it = new MyArrayIterator(array(1, 21, 22));

try {
    $res = iterator_apply($it, 'test');
} catch (Exception $e) {
    echo $e->getMessage();
}
}
