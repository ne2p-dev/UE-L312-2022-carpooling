<?php

namespace App\Entities;

// declaration of car class
class Car
{
    private $idCar;
    private $brand;
    private $model;
    private $color;
    private $seats;
    private $idOwner;

    // getter Id Car
    public function getIdCar(): string
    {
        return $this->idCar;
    }
    // setter Id Car
    public function setIdCar(string $idCar): void
    {
        $this->idCar = $idCar;
    }

     // getter brand
     public function getBrand(): string
     {
         return $this->brand;
     }
     // setter brand
     public function setBrand(string $brand): void
     {
         $this->brand = $brand;
     }

    // getter model
    public function getModel(): string
    {
        return $this->model;
    }
    // setter model
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    // getter color
    public function getColor(): string
    {
        return $this->color;
    }
    // setter color
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    // getter seats
    public function getSeats(): string
    {
        return $this->seats;
    }
    // setter seats
    public function setSeats(string $seats): void
    {
        $this->seats = $seats;
    }

    // getter id owner
    public function getIdOwner(): string
    {
        return $this->idOwner;
    }
    // setter id owner
    public function setIdOwner(string $idOwner): void
    {
        $this->idOwner = $idOwner;
    }

}