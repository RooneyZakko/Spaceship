<?php
namespace space;

class Spaceship
{
    private bool $isAlive;
    private int $fuel;
    private int $hitPoints;
    private int $ammo;
    private int $damage;

    public function __construct(int $ammo = 100, int $fuel = 100, int $hitPoints = 100, int $damage = 2)
    {
        $this->ammo = $ammo;
        $this->fuel = $fuel;
        $this->hitPoints = $hitPoints;
        $this->damage = $damage;
        $this->isAlive = true;
    }

    public function shoot(int $shots = 5): int
    {
        if ($this->ammo - $shots >= 0) {
            $this->ammo -= $shots;
            return $shots * $this->damage;
        } else {
            return 0;
        }
    }

    public function hit(int $damage): void
    {
        if ($this->hitPoints - $damage > 0) {
            $this->hitPoints -= $damage;
        } else {
            $this->isAlive = false;
        }
    }

    public function move(int $fuelUsage = 2): void
    {
        if ($this->fuel - $fuelUsage > 0) {
            $this->fuel -= $fuelUsage;
        } else {
            $this->fuel = 0;
        }
    }

    public function getAmmo(): int
    {
        return $this->ammo;
    }

    public function getFuel(): int
    {
        return $this->fuel;
    }

    public function getHitPoints(): int
    {
        return $this->hitPoints;
    }

    public function isAlive(): bool
    {
        return $this->isAlive;
    }

    public function upgradeWeapon(int $damageIncrease) {

        $this->damage += $damageIncrease;
    }
}
