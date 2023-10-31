<?php
namespace space;

class Cargoship extends Spaceship
{
    private int $cargoSpace;

    public function __construct(int $fuel = 100, int $hitPoints = 100, int $cargoSpace = 100)
    {
        parent::__construct($fuel, $hitPoints);
        $this->cargoSpace = $cargoSpace;
    }

    public function loadCargo(int $cargo): void
    {
        if ($this->cargoSpace - $cargo >= 0) {
            $this->cargoSpace -= $cargo;
        } else {
            $this->cargoSpace = 0;
        }
    }

    public function unloadCargo(int $cargo): void
    {
        if ($this->cargoSpace + $cargo <= 100) {
            $this->cargoSpace += $cargo;
        } else {
            $this->cargoSpace = 100;
        }
    }
}