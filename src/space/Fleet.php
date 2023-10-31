<?php
namespace space;

class Fleet
{
    private array $ships;

    public function __construct()
    {
        $this->ships = [];
    }

    public function addShip(Spaceship $ship): void
    {
        $this->ships[] = $ship;
    }

    public function getShips(): array
    {
        return $this->ships;
    }

    public function calculateTotalDamage(): int
    {
        $totalDamage = 0;
        foreach ($this->ships as $ship) {
            if ($ship instanceof Fighter) {
                $totalDamage += $ship->shoot();
            }
        }
        return $totalDamage;
    }

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
