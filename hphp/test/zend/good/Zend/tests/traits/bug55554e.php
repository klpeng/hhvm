<?php

// Ensuring that the collision still occurs as expected.

trait TC1 {
    public function ReportCollision() {
        echo "TC1 executed\n";
    }
}

trait TC2 {
    public function ReportCollision() {
        echo "TC1 executed\n";
    }
}

class ReportCollision {
    use TC1, TC2;
}

<<__EntryPoint>> function main() {
echo "ReportCollision: ";
$o = new ReportCollision;
}
