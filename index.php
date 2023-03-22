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

$car = new BMW([
    'brand' => 'BMW',
    'yearProduction' => '2007',
    'color' => 'red',
    'producingCountry' => 'Germany',
    'currentBreakdown' => 'transmision',
    'brokenSteeringWheel' => false,
]);
echo "Пареметри авто до ремонту:";
debug($car);
$serviceStantion = new ServiceStation();
$serviceStantion->carEnters($car);
$serviceStantion->addEmployee(
    new Anton(
        [
            'hourlyPrice' => 1000,
            'isFree' => false,
            'specialization' => ['universal'],
            'diagnosticPrice' => 100,
        ]
    ),
    new Artem(
        [
            'hourlyPrice' => 1000,
            'isFree' => false,
            'specialization' => ['universal'],
            'diagnosticPrice' => 150,
        ]
    ),
    new Ihor(
        [
            'hourlyPrice' => 800,
            'isFree' => true,
            'specialization' => ['new_2005'],
            'diagnosticPrice' => 50,
        ]
    ),
    new Nazar(
        [
            'hourlyPrice' => 800,
            'isFree' => false,
            'specialization' => ['Germany'],
            'diagnosticPrice' => 60,
        ]
    ),
    new Oleh(
        [
            'hourlyPrice' => 600,
            'isFree' => false,
            'specialization' => ['old_1998'],
            'diagnosticPrice' => 30,
        ]
    ),
    new Taras(
        [
            'hourlyPrice' => 800,
            'isFree' => true,
            'specialization' => ['Japan', 'motor'],
            'diagnosticPrice' => 60,
        ]
    ),
    new Victor(
        [
            'hourlyPrice' => 800,
            'isFree' => true,
            'specialization' => ['Audi', 'universal'],
            'diagnosticPrice' => 60,
        ]
    ),
);
$serviceStantion->findFreeWorker();
$serviceStantion->tookOrderWorker();
$serviceStantion->order();
echo "<hr>Пареметри авто після ремонту:";
debug($car);
