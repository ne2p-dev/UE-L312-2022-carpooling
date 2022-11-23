<?php

namespace App\Controllers;

use App\Services\CarsService;

class CarsController
{
    /**
     * Return the html for the create action.
     */
    public function createCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['brand']) &&
            isset($_POST['model']) &&
            isset($_POST['color']) &&
            isset($_POST['seats']) &&
            isset($_POST['idOwner'])) {
            // Create the car :
            $carsService = new CarsService();
            $isOk = $carsService->setCar(
                null,
                $_POST['brand'],
                $_POST['model'],
                $_POST['color'],
                $_POST['seats'],
                $_POST['idOwner']
            );
            if ($isOk) {
                $html = 'Voiture rentrée avec succès.';
            } else {
                $html = 'Erreur lors de l\'inscription de la voiture.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getCars(): string
    {
        $html = '';

        // Get all users :
        $carsService = new CarsService();
        $cars = $carsService->getCars();

        // Get html :
        foreach ($cars as $car) {
            $html .=
                '#' . $car->getIdCar() . ' ' .
                $car->getBrand() . ' ' .
                $car->getModel() . ' ' .
                $car->getColor() . ' ' .
                $car->getSeats() . ' ' .
                $car->getIdOwner() . '<br />';
        }

        return $html;
    }

    /**
     * Update the user.
     */
    public function updateCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['idCar']) &&
            isset($_POST['brand']) &&
            isset($_POST['model']) &&
            isset($_POST['color']) &&
            isset($_POST['seats']) &&
            isset($_POST['idOwner'])) {
            // Update the user :
            $carsService = new CarsService();
            $isOk = $carsService->setCar(
                $_POST['idCar'],
                $_POST['brand'],
                $_POST['model'],
                $_POST['color'],
                $_POST['seats'],
                $_POST['idOwner']
            );
            if ($isOk) {
                $html = 'Voiture mise à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de la voiture.';
            }
        }

        return $html;
    }

    /**
     * Delete a Car.
     */
    public function deleteCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['idCar'])) {
            // Delete the user :
            $carsService = new CarsService();
            $isOk = $carsService->deleteCar($_POST['idCar']);
            if ($isOk) {
                $html = 'Voiture supprimée avec succès.';
            } else {
                $html = 'Erreur lors de la supression de la voiture.';
            }
        }

        return $html;
    }
}