<?php
include 'space/Spaceship.php';
include 'space/fighter.php';

$ship1 = new space\Fighter(50, 50, 50);
echo "Ship 1 ammo: " . $ship1->getAmmo() . "<br>";

$ship2 = new space\Spaceship(100, 50, 50);
echo "Ship 2 ammo: " . $ship2->getAmmo() . "<br>";

$dmg = $ship1->shoot();
$ship2->hit($dmg);

// $damageToMakeDead = $ship2->getHitPoints() + 1;
// $ship2->hit($damageToMakeDead);

echo "Ship 1 ammo: " . $ship1->getAmmo() . "<br>";
echo "Ship 2 ammo: " . $ship2->getAmmo() . "<br>";
echo "Ship 1 HP: " . $ship1->getHitPoints() . "<br>";
echo "Ship 2 HP: " . $ship2->getHitPoints() . "<br>";

echo "Is Ship 1 still alive: " . ($ship1->isAlive() ? "Yes" : "No") . "<br>";
echo "Is Ship 2 still alive: " . ($ship2->isAlive() ? "Yes" : "No") . "<br>";
echo "The end of the code has been reached.<br>";


?>


