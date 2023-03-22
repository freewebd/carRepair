<?php

namespace Employee;

use Car\Car;

abstract class Employee
{
    protected $properties = [];
    public function __construct(array $properties)
    {
        $this->properties['hourlyPrice'] = $properties['hourlyPrice'];
        $this->properties['isFree'] = $properties['isFree'];
        $this->properties['specialization'] = $properties['specialization'];
        $this->properties['diagnosticPrice'] = $properties['diagnosticPrice'];
    }

    /* Функція повинна перевіряти можливість ремонту авто.
    Приймає обєкт автомобіля. Буде використовувати властивості авто: рік,
    модель, та вид поломки. Повертає значенння типу boolean.
    */
    public function canRepairCar(Car $car)
    {
        foreach ($this->properties['specialization'] as $specialization) {
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
    /*Метод діагностики авто. Приймає клас автомобіля. 
    Перевіряє чи є присутня поломка руля $car->brokenSteeringWheel.
    Повертає значенння типу boolean 
    */
    public function diagnoseCar(Car $car)
    {
        return $car->getBrokenSteeringWheel() ?  true :  false;
    }
    /*Метод ремонту авто. Приймає клас автомобіля. 
    Змінює значення поломки $car->currentBreakdown на false.
    */
    public function repairCar(Car $car)
    {
        $car->setCurrentBreakdown(false);
    }
    public function getHourlyPrice()
    {
        return $this->properties['hourlyPrice'];
    }
    public function getIsFree()
    {
        return $this->properties['isFree'];
    }
    public function getSpecialization()
    {
        return $this->properties['specialization'];
    }
    public function getDiagnosticPrice()
    {
        return $this->properties['diagnosticPrice'];
    }
    public function setIsFree($isFree)
    {
        $this->properties['isFree'] = $isFree;
    }
}
