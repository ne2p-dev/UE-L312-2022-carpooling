<?php

namespace App\Services;

use App\Entities\Car;

class CarsService
{
    /**
     * Create or update a car.
     */
    public function setCar(?string $idCar, string $brand, string $model, string $color, string $seats, string $idOwner): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createCar($brand, $model, $color, $seats, $idOwner);
        } else {
            $isOk = $dataBaseService->updateCar($idCar, $brand, $model, $color, $seats, $idOwner);
        }

        return $isOk;
    }

    /**
     * Return all cars.
     */
    public function getCars(): array
    {
        $cars = [];

        $dataBaseService = new DataBaseService();
        $carsDTO = $dataBaseService->getCars();
        if (!empty($carsDTO)) {
            foreach ($carsDTO as $carDTO) {
                $car = new Car();
                $car->setIdCar($carDTO['idCar']);
                $car->setBrand($carDTO['brand']);
                $car->setModel($carDTO['model']);
                $car->setColor($carDTO['color']);
                $car->setSeats($carDTO['seats']);
                $car->setIdOwner($carDTO['idOwner']);
                $cars[] = $car;
            }
        }

        return $cars;
    }

    /**
     * Delete a car.
     */
    public function deleteCar(string $idCar): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteAd($idCar);

        return $isOk;
    }
}