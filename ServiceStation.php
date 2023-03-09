<?php

use Car\Car;
use Employee\Employee;

class ServiceStation
{
    public $employees = [];
    public $currentEmployee;
    public $car;

    /* Авто заїжджає на Сто, функція приймає обєкт Сar 
    і зберігає в зміну $car*/
    public function carEnters(Car $car)
    {
        $this->car = $car;
    }
    /* Функція додає робітників, що працють на зміні 
    в $employees  */
    public function addEmployee(Employee ...$employee)
    {
        $this->employees = $employee;
    }
    /* Пошук вільного робітника серед масиву $employees.
    Записуємо в властивість currentEmployee обєкт що проходить перевірку 
    спеціалізації і вільний для ремонту*/
    public function findFreeWorker()
    {
        foreach ($this->employees as $employee) {
            if ($employee->getIsFree() && $employee->canRepairCar($this->car)) {
                $this->currentEmployee = $employee;
                break;
            }
        }
    }

    /* Працівник бере замовлення. У властивості $currentEmployee змінюємо 
    isFree на false */
    public function tookOrderWorker()
    {
        if (!$this->currentEmployee) {
            return $this->failureRepair();
        }
        $this->currentEmployee->setIsFree = false;
    }
    /** Вивести повідомлення, якщо не знайдено вільних робіткників, 
     * або не має робітників, що відповідають спеціалізації 
     */
    public function failureRepair()
    {
        exit("Відсутні вільні працівники, що відповідають потрібній спеціалізації ремонту");
    }
    /* Проводиться діагностика авто, на якій визначається
    чи є поломка руля в обєкта Car.
    При false відмова ремонту і проведення розрахунку
    діагностики, при true 
    працівник приступає до ремонту*/
    public function diagnose()
    {
        if (!$this->car->getBrokenSteeringWheel()) {
            return $this->repair();
        }
        exit("Прямуйте до іншого СТО, ми не можемо полагодити вашу машину");
    }
    /* Проводиться розрахунок вартості діагностики. 
     */
    public function getDiagnosticCost()
    {
        return $this->currentEmployee->getDiagnosticPrice();
    }
    /* Проходить ремонт авто при якому в обєкті Car властивість 
    $currentBreakdown змінюється false*/
    public function repair()
    {
        $this->car->setCurrentBreakdown(false);
    }
    /* Виводиться вартість ремонту автомобіля в залежності 
 від тарифу Employee */
    public function getTotalCost()
    {
        return $this->currentEmployee->getHourlyPrice() + $this->getDiagnosticCost();
    }
}
