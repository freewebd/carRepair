<?php abstract class Car
{
    protected $brand;
    protected $yearProduction;
    protected $color;
    protected $producingCountry;
    /* Поточна поломка з якою водій їде в СТО*/
    protected $currentBreakdown;
    /* Проблема руля, тип boolean*/
    protected $brokenSteeringWheel;
    public function __construct($brand, $yearProduction, $color, $producingCountry, $currentBreakdown, $brokenSteeringWheel){
        $this->brand = $brand;
        $this->yearProduction = $yearProduction;
        $this->color = $color;
        $this->producingCountry = $producingCountry;
        $this->currentBreakdown = $currentBreakdown;
        $this->brokenSteeringWheel = $brokenSteeringWheel;
    }
    public function getBrand() {
        return $this->brand;
      }

      public function getYearProduction() {
        return $this->yearProduction;
      }

      public function getProducingCountry() {
        return $this->producingCountry;
      }

      public function getCurrentBreakdown() {
        return $this->currentBreakdown;
      }
      public function getBrokenSteeringWheel() {
        return $this->brokenSteeringWheel;
      }
      public function setCurrentBreakdown($currentBreakdown) {
        $this->currentBreakdown = $currentBreakdown;
      }
      public function setBrokenSteeringWheel($brokenSteeringWheel) {
        $this->brokenSteeringWheel = $brokenSteeringWheel;
      }
}