<?php

namespace Car;

abstract class Car
{
    protected $properties = [];
    public function __construct(array $properties)
    {
        $this->properties['brand'] = $properties['brand'];
        $this->properties['yearProduction'] = $properties['yearProduction'];
        $this->properties['color'] = $properties['color'];
        $this->properties['producingCountry'] = $properties['producingCountry'];
        $this->properties['currentBreakdown'] = $properties['currentBreakdown'];
        $this->properties['brokenSteeringWheel'] = $properties['brokenSteeringWheel'];
    }
    public function getBrand()
    {
        return $this->properties['brand'];
    }

    public function getYearProduction()
    {
        return $this->properties['yearProduction'];
    }

    public function getProducingCountry()
    {
        return $this->properties['producingCountry'];
    }

    public function getCurrentBreakdown()
    {
        return $this->properties['currentBreakdown'];
    }
    public function getBrokenSteeringWheel()
    {
        return $this->properties['brokenSteeringWheel'];
    }
    public function setCurrentBreakdown($currentBreakdown)
    {
        $this->properties['currentBreakdown'] = $currentBreakdown;
    }
}
