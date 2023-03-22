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
        $this->currentEmployee->setIsFree(false);
    }
    /** Вивести повідомлення, якщо не знайдено вільних робіткників, 
     * або не має робітників, що відповідають спеціалізації 
     */
    public function failureRepair()
    {
        exit("Відсутні вільні працівники, що відповідають потрібній спеціалізації ремонту");
    }
    /*order(Car $car), що обєднує процес діагностики і ремонту авто. Спочатку визиває метод $this->currentEmployee->diagnoseCar(Car $car), який виконує перевірку чи можливо провести ремонт.
Якщо руль не поломаний - продовжує ремонт при якому викликається метод $this->currentEmployee->repairCar(Car $car).
Якщо руль зломаний - повертає false 
і припиняє ремонт*/
    public function order()
    {
        if ($this->currentEmployee->diagnoseCar($this->car)) {
            echo "Вартість діагностики авто: " . $this->getDiagnosticCost() . '.<br>';
            exit("Прямуйте до іншого СТО, ми не можемо полагодити вашу машину");
        }

        $this->currentEmployee->repairCar($this->car);
        echo 'Загальна вартість ремонту ' . $this->car->getBrand() . ': ' . $this->getTotalCost() .'<br>';
    }

    /* Проводиться розрахунок вартості діагностики. 
     */
    public function getDiagnosticCost()
    {
        return $this->currentEmployee->getDiagnosticPrice();
    }

    /* Виводиться вартість ремонту автомобіля в залежності 
 від тарифу Employee */
    public function getTotalCost()
    {
        return $this->currentEmployee->getHourlyPrice() + $this->getDiagnosticCost();
    }
}
