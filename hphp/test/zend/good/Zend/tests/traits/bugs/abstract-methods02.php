<?php

trait THello {
  public abstract function hello();
}

trait THelloImpl {
  public function hello() {
    echo 'Hello';
  }
}

class TraitsTest {
    use THello;
    use THelloImpl;
}

<<__EntryPoint>> function main() {
error_reporting(E_ALL);
$test = new TraitsTest();
$test->hello();
}
