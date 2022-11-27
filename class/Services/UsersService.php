<?php

namespace App\Services;

use App\Entities\User;
use App\Entities\Car;
use App\Entities\Ad;
use DateTime;

class UsersService
{
    /**
     * Create or update an user.
     */
    public function setUser(?string $id, string $firstname, string $lastname, string $email, string $birthday): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $birthdayDateTime = new DateTime($birthday);
        if (empty($id)) {
            $isOk = $dataBaseService->createUser($firstname, $lastname, $email, $birthdayDateTime);
        } else {
            $isOk = $dataBaseService->updateUser($id, $firstname, $lastname, $email, $birthdayDateTime);
        }

        return $isOk;
    }

    /**
     * Return all users.
     */
    public function getUsers(): array
    {
        $users = [];

        $dataBaseService = new DataBaseService();
        $usersDTO = $dataBaseService->getUsers();
        if (!empty($usersDTO)) {
            foreach ($usersDTO as $userDTO) {
                $user = new User();
                $user->setId($userDTO['id']);
                $user->setFirstname($userDTO['firstname']);
                $user->setLastname($userDTO['lastname']);
                $user->setEmail($userDTO['email']);
                $date = new DateTime($userDTO['birthday']);
                if ($date !== false) {
                    $user->setbirthday($date);
                }
                $users[] = $user;
            }
        }

        return $users;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteUser($id);

        return $isOk;
    }

    /**
     * Create relation bewteen an user and his car.
     */
    public function setUserCars(string $userId, string $carId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setUserCars($userId, $carId);

        return $isOk;
    }

    /**
     * Get cars of given user id.
     */
    public function getUserCars(string $userId): array
    {
        $userCars = [];

        $dataBaseService = new DataBaseService();

        // Get relation users and cars :
        $usersCarsDTO = $dataBaseService->getUserCars($userId);
        if (!empty($usersCarsDTO)) {
            foreach ($usersCarsDTO as $userCarDTO) {
                $car = new Car();
                $car->setIdCar($userCarDTO['idCar']);
                $car->setBrand($userCarDTO['brand']);
                $car->setModel($userCarDTO['model']);
                $car->setColor($userCarDTO['color']);
                $car->setSeats($userCarDTO['seats']);
                $userCars[] = $car;
            }
        }

        return $userCars;
    }

    /**
     * Create relation bewteen an user and his ad.
     */
    public function setUserAds(int $idUser, int $idAd): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setUserAds($idUser, $idAd);

        return $isOk;
    }

    /**
     * Get ads of given user id.
     */
    public function getUserAds(int $idUser): array
    {
        $userAds = [];

        $dataBaseService = new DataBaseService();

        // Get relation users and ads :
        $usersAdsDTO = $dataBaseService->getUserAds($idUser);
        if (!empty($usersAdsDTO)) {
            foreach ($usersAdsDTO as $userAdDTO) {
                $ad = new Ad();
                $ad->setIdAd($userAdDTO['idAd']);
                $ad->setAdTitle($userAdDTO['title']);
                $ad->setIdCar($userAdDTO['idCar']);
                $ad->setDateTime($userAdDTO['dateTime']);
                $ad->setStartPlace($userAdDTO['startPlace']);
                $ad->setEndPlace($userAdDTO['endPlace']);
                $userAds[] = $ad;
            }
        }

        return $userAds;
    }
}
