<?php

namespace Employee;

use Car\Car;

abstract class Employee
{
    protected $hourlyPrice;
    protected $isFree;
    protected $specialization = [];
    protected $diagnosticPrice;
    public function __construct($hourlyPrice, $isFree, $specialization, $diagnosticPrice)
    {
        $this->hourlyPrice = $hourlyPrice;
        $this->isFree = $isFree;
        $this->specialization = $specialization;
        $this->diagnosticPrice = $diagnosticPrice;
    }

    /* Функція повинна перевіряти можливість ремонту авто.
    Приймає обєкт автомобіля. Буде використовувати властивості авто: рік,
    модель, та вид поломки. Повертає значенння типу boolean.
    */
    public function canRepairCar(Car $car)
    {
        foreach ($this->specialization as $specialization) {
            switch ($specialization) {
                case "universal":
                    return true;
                case "new_2005":
                    if ($car->getYearProduction() > 2005)
                        return true;
                case "Germany":
                    if ($car->getProducingCountry() === "Germany")
                        return true;
                case "old_1998":
                    if ($car->getYearProduction() < 1988)
                        return true;
                case "Japan":
                    if ($car->getProducingCountry() === "Japan")
                        return true;
                case "motor":
                    if ($car->getCurrentBreakdown() === "motor")
                        return true;
                case "Audi":
                    if ($car->getBrand() === "Audi")
                        return true;
            }
        }
        return false;
    }
    public function getHourlyPrice()
    {
        return $this->hourlyPrice;
    }
    public function getIsFree()
    {
        return $this->isFree;
    }
    public function getSpecialization()
    {
        return $this->specialization;
    }
    public function getDiagnosticPrice()
    {
        return $this->diagnosticPrice;
    }
    public function setIsFree($isFree)
    {
        $this->isFree = $isFree;
    }
}
