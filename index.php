<?php

use Car\BMW;
use Employee\Anton,
    Employee\Artem,
    Employee\Ihor,
    Employee\Nazar,
    Employee\Oleh,
    Employee\Taras,
    Employee\Victor;

ini_set('display_errors', 1);
error_reporting(E_ALL);

function debug($str)
{
    echo '<pre>';
    var_dump($str);
    echo '</pre><hr>';
}
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$bmw = new BMW('BMW', 2005, 'red', 'Germany', 'transmision', false);
$serviceStantion = new ServiceStation();
$serviceStantion->carEnters($bmw);
$serviceStantion->addEmployee(
    new Anton(1000, true, ['universal'], 100),
    new Artem(1000, false, ['universal'], 100),
    new Ihor(800, false, ['new_2005'], 50),
    new Nazar(800, false, ['Germany'], 60),
    new Oleh(600, false, ['old_1998'], 30),
    new Taras(800, false, ['Japan','motor'], 60),
    new Victor(800, true, ['Audi','universal'], 60),
);
$serviceStantion->findFreeWorker();
