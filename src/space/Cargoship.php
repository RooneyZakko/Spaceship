<?php
namespace space;
//  cargoSpace om de hoeveelheid beschikbare vrachtruimte bij te houden.
class Cargoship extends Spaceship
{
    private int $cargoSpace;

    public function __construct(int $fuel = 100, int $hitPoints = 100, int $cargoSpace = 100)
    {
        parent::__construct($fuel, $hitPoints);
        $this->cargoSpace = $cargoSpace;
    }

    // Laad vracht aan boord
    public function loadCargo(int $cargo): void
    {
        if ($this->cargoSpace - $cargo >= 0) {
            $this->cargoSpace -= $cargo;
        } else {
            $this->cargoSpace = 0; // Voorkom negatieve lading
        }
    }

    // Los vracht
    public function unloadCargo(int $cargo): void
    {
        if ($this->cargoSpace + $cargo <= 100) {
            $this->cargoSpace += $cargo;
        } else {
            $this->cargoSpace = 100;
        }
    }
}
    