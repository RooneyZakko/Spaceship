<?php
namespace space;

class Fleet
{
    private array $ships;

    public function __construct()
    {
        $this->ships = [];
    }

    // Voeg een spaceship toe aan de vloot
    public function addShip(Spaceship $ship): void
    {
        $this->ships[] = $ship;
    }

    // Haal alle spaceships in de vloot op
    public function getShips(): array
    {
        return $this->ships;
    }

    // Bereken de totale schade van alle gevechtsschepen in de vloot
    public function calculateTotalDamage(): int
    {
        $totalDamage = 0;
        foreach ($this->ships as $ship) {
            if ($ship instanceof Fighter) {
                $totalDamage += $ship->shoot(); // Roep de shoot-methode van gevechtsschepen aan om schade te berekenen
            }
        }
        return $totalDamage;
    }

    // Voer een gevecht uit tegen een vijandige vloot
    public function battle(Fleet $enemyFleet): string
    {
        $myDamage = $this->calculateTotalDamage();
        $enemyDamage = $enemyFleet->calculateTotalDamage();

        if ($myDamage > $enemyDamage) {
            return "Victory";
        } elseif ($myDamage < $enemyDamage) {
            return "Defeat";
        } else {
            return "Draw";
        }
    }
}
