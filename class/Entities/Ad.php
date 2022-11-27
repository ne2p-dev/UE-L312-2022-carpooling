<?php

namespace App\Entities;

// using the DateTime function of PHP
use DateTime;

// declaration of advertise class
class Ad
{
    private $idAd; // id of the advertise
    private $adTitle; // name of the ad
    private $idCar; // model of the vehicle
    private $dateTime; // date and time of the travel
    private $startPlace; // place of the travel begin
    private $endPlace; // place of the travel end

    // getter Id Ad
    public function getIdAd(): int
    {
        return $this->idAd;
    }
    // setter Id Ad
    public function setIdAd(int $idAd): void
    {
        $this->id = $idAd;
    }

    // getter Ad Title
    public function getAdTitle(): string
    {
        return $this->adTitle;
    }
    // setter Ad Title
    public function setAdTitle(string $adTitle): void
    {
        $this->adTitle = $adTitle;
    }

    // getter id car
    public function getIdCar(): int
    {
        return $this->idCar;
    }
    // setter id car
    public function setIdCar(int $idCar): void
    {
        $this->idCar = $idCar;
    }

    // getter dateTime
    public function getDateTime(): DateTime
    {
        return $this->dateTime;
    }
    // setter datedate
    public function setDateTime(DateTime $dateTime): void
    {
        $this->dateTime = $dateTime;
    }

    // getter start place
    public function getStartPlace(): string
    {
        return $this->startPlace;
    }
    // setter start place
    public function setStartPlace(string $startPlace): void
    {
        $this->startPlace = $startPlace;
    }

    // getter end place
    public function getEndPlace(): string
    {
        return $this->endPlace;
    }
    // setter end place
    public function setEndPlace(string $endPlace): void
    {
        $this->endPlace = $endPlace;
    }

}

