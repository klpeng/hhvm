<?php

class Test1 {
    static function ok() {
        echo "bug";
    }
    static function test() {
        call_user_func(static::class."::ok");
    }
}

class Test2 extends Test1 {
    static function ok() {
        echo "ok";
    }
}
<<__EntryPoint>> function main() {
Test2::test();
}
