<?php
namespace space;

// De klasse Spaceship bevat attributen zoals ammo, fuel, hitPoints, damage, en isAlive.
//  Deze attributen beschrijven de eigenschappen van een spaceship.

class Spaceship
{
    private bool $isAlive;
    private int $fuel;
    private int $hitPoints;
    private int $ammo;
    private int $damage;

    // De constructor voor Spaceship met optionele parameters
    public function __construct(
        int $ammo = 100,
        int $fuel = 100,
        int $hitPoints = 100, 
        int $damage = 2)
    {
        $this->ammo = $ammo;
        $this->fuel = $fuel;
        $this->hitPoints = $hitPoints;
        $this->damage = $damage;
        $this->isAlive = true; // Een nieuw spaceship is altijd in leven wanneer het wordt gemaakt
    }

    // Methode om te schieten met het spaceship
    public function shoot(int $shots = 5): int
    {
        if ($this->ammo - $shots >= 0) {
            $this->ammo -= $shots;
            return $shots * $this->damage; // Bereken de totale schade van het schot
        } else {
            return 0;
        }
    }

    // Methode om schade aan het spaceship toe te brengen
    public function hit(int $damage): void
    {
        if ($this->hitPoints - $damage > 0) {
            $this->hitPoints -= $damage;
        } else {
            $this->isAlive = false; // Als de schade de HP naar 0 of minder brengt, is het spaceship vernietigd
        }
    }

    // Methode om het spaceship te verplaatsen (brandstofverbruik)
    public function move(int $fuelUsage = 2): void
    {
        if ($this->fuel - $fuelUsage > 0) {
            $this->fuel -= $fuelUsage;
        } else {
            $this->fuel = 0; // Als er niet genoeg brandstof is om te bewegen, wordt de brandstof op 0 gezet
        }
    }

    // Getter-methoden om de attribuutwaarden op te halen
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

    // Methode om het wapen van het spaceship te upgraden
    public function upgradeWeapon(int $damageIncrease): void
    {
        $this->damage += $damageIncrease;
    }

    // Serialize en sla het object op in de sessie
    public function save(string $name): void
    {
        $_SESSION[$name] = serialize($this);
    }

    // Laad het object opnieuw uit de sessie
    public static function load(string $name): ?self
    {
        if (isset($_SESSION[$name]) && is_string($_SESSION[$name])) {
            return unserialize($_SESSION[$name]);
        }
        return null; // Retourneer null als het laden mislukt
    }
}
