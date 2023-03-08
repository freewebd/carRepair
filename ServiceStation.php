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
            if ($employee->canRepairCar($this->car) && $employee->getIsFree()) {
                $this->currentEmployee = $employee;
                $this->currentEmployee->setIsFree = false;
                break;

            }
        }
    }

    /* Працівник бере замовлення. У властивості $currentEmployee змінюємо 
    isFree на false */
    public function tookOrderWorker()
    {
    }
    /** Вивести повідомлення, якщо не знайдено вільних робіткників, 
     * або не має робітників, що відповідають спеціалізації 
     */
    public function failureRepair()
    {
    }
    /* Проводиться діагностика авто, на якій визначається
    чи є поломка руля в обєкта Car.
    При true відмова ремонту і проведення розрахунку
    діагностики, при false 
    працівник приступає до ремонту*/
    public function diagnose()
    {
    }
    /* Проводиться розрахунок вартості діагностики. 
     */
    public function getDiagnosticCost()
    {
    }
    /* Проходить ремонт авто при якому в обєкті Car властивість 
    $currentBreakdown змінюється false*/
    public function repair()
    {
    }
    /* Виводиться вартість ремонту автомобіля в залежності 
 від тарифу Employee */
    public function getTotalCost()
    {
    }
}
