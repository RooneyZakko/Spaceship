<?php
namespace space;

require_once 'Spaceship.php';

class Fighter extends Spaceship
{
    public int $ammo;

    public function __construct(int $fuel = 100, int $hitPoints = 100, int $ammo = 100)
    {
        parent::__construct($fuel, $hitPoints);
        $this->ammo = $ammo;
    }

    public function shoot(int $shots = 5, int $damage = 2): int
    {
        if ($this->ammo - $shots >= 0) {
            $this->ammo -= $shots;
            return $shots * $damage;
        } else {
            return 0;
        }
    }
}
?>
