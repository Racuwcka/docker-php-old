<?php
trait Singleton {
    private static $instance = null;

    private function __construct() { /* ... @return Singleton */ }
    private function __clone() { /* ... @return Singleton */ }
    public function __wakeup() { /* ... @return Singleton */ }

    public static function getInstance() {
        return
            self::$instance===null
                ? self::$instance = new static()
                : self::$instance;
    }
}

/**
 * Class Foo
 * @method static Foo getInstance()
 */
class Foo {
    use Singleton;

    private $bar = 0;

    public function incBar() {
        $this->bar++;
    }

    public function getBar() {
        return $this->bar;
    }
}

/*
Применение
*/

$foo = Foo::getInstance();
$foo->incBar();

var_dump($foo->getBar());

$foo = Foo::getInstance();
$foo->incBar();

var_dump($foo->getBar());