<?php

namespace App\Services;

use DateTime;
use Exception;
use PDO;

class DataBaseService
{
    const HOST = '127.0.0.1';
    const PORT = '3306';
    const DATABASE_NAME = 'carpooling';
    const MYSQL_USER = 'admin';
    const MYSQL_PASSWORD = 'dUm32ridIBJA';

    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                'mysql:host=' . self::HOST . ';port=' . self::PORT . ';dbname=' . self::DATABASE_NAME,
                self::MYSQL_USER,
                self::MYSQL_PASSWORD
            );
            $this->connection->exec("SET CHARACTER SET utf8");
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    /**
     * Create an user.
     */
    public function createUser(string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        $sql = 'INSERT INTO users (firstname, lastname, email, birthday) VALUES (:firstname, :lastname, :email, :birthday)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all users.
     */
    public function getUsers(): array
    {
        $users = [];

        $sql = 'SELECT * FROM users';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $users = $results;
        }

        return $users;
    }

    /**
     * Update an user.
     */
    public function updateUser(string $id, string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        $sql = 'UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, birthday = :birthday WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM users WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Create an ad.
     */
    public function createAd(string $adTitle, string $idCar, DateTime $adDateTime, string $startPlace, string $endPlace): bool
    {
        $isOk = false;

        $data = [
            'adTitle' => $adTitle,
            'idCar' => $idCar,
            'adDateTime' => $adDateTime->format(DateTime::RFC3339),
            'startPlace' => $startPlace,
            'endPlace' => $endPlace,
        ];
        $sql = 'INSERT INTO ads (adTitle, idCar, adDateTime, startPlace, endPlace) VALUES (:adTitle, :idCar, :adDateTime, :startPlace, :endPlace)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all ads.
     */
    public function getAds(): array
    {
        $ads = [];

        $sql = 'SELECT * FROM ads';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $ads = $results;
        }

        return $ads;
    }

    /**
     * Update an ad.
     */
    public function updateAd(string $idAd, string $adTitle, string $idCar, DateTime $adDateTime, string $startPlace, string $endPlace): bool
    {
        $isOk = false;

        $data = [
            'idAd' => $idAd,
            'adTitle' => $adTitle,
            'idCar' => $idCar,
            'adDateTime' => $adDateTime->format(DateTime::RFC3339),
            'adDateTime' => $startPlace,
            'endPlace' => $endPlace,
        ];
        $sql = 'UPDATE ads SET adTitle = :adTitle, idCar = :idCar, adDateTime = :adDateTime, adDateTime = :adDateTime, endPlace = :endPlace WHERE idAd = :idAd;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an ad.
     */
    public function deleteAd(string $idAd): bool
    {
        $isOk = false;

        $data = [
            'idAd' => $idAd,
        ];
        $sql = 'DELETE FROM ads WHERE idAd = :idAd;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Create a car.
     */
    public function createCar(string $brand, string $model, string $color, string $seats, string $idOwner): bool
    {
        $isOk = false;

        $data = [
            'brand' => $brand,
            'model' => $model,
            'color' => $color,
            'seats' => $seats,
            'idOwner' => $idOwner,
        ];
        $sql = 'INSERT INTO cars (brand, model, color, seats, idOwner) VALUES (:brand, :model, :color, :seats, :idOwner)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all car.
     */
    public function getCars(): array
    {
        $cars = [];

        $sql = 'SELECT * FROM cars';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $ads = $results;
        }

        return $cars;
    }

    /**
     * Update a car.
     */
    public function updateCar(string $idCar, string $brand, string $model, string $color, string $seats, string $idOwner): bool
    {
        $isOk = false;

        $data = [
            'idCar' => $idCar,
            'brand' => $brand,
            'model' => $model,
            'color' => $color,
            'seats' => $seats,
            'idOwner' => $idOwner,
        ];
        $sql = 'UPDATE cars SET brand = :brand, model =:model, color = :color, seats = :seats, idOwner = :idOwner WHERE idCar = :idCar;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete a car.
     */
    public function deleteCar(string $idCar): bool
    {
        $isOk = false;

        $data = [
            'idCar' => $idCar,
        ];
        $sql = 'DELETE FROM cars WHERE idCar = :idCar;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
}

