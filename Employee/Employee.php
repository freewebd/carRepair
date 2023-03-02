<?php
abstract class Employee
{
    protected $hourlyPrice;
    protected $isFree;
    protected $specialization;
    protected $diagnosticPrice;
    public function __construct($hourlyPrice, $isFree, $specialization, $diagnosticPrice){
        $this->hourlyPrice = $hourlyPrice;
        $this->isFree = $isFree;
        $this->specialization = $specialization;
        $this->diagnosticPrice = $diagnosticPrice;
    }

    /* Функція повинна перевіряти можливість ремонту авто.
    Приймає обєкт автомобіля. Буде використовувати властивості авто: рік,
    модель, та вид поломки. Повертає значенння типу boolean.
    */
    public function canRepairCar($car)
    {
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
    public function setIsFree($isFree)
    {
        $this->isFree = $isFree;
    }
}
