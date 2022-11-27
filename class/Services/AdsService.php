<?php

namespace App\Services;

use App\Entities\Ad;
use DateTime;

class AdsService
{
    /**
     * Create or update an ad.
     */
    public function setAd(?string $idAd, string $adTitle, string $idCar, string $dateTime, string $startPlace, string $endPlace): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $adDateTime = new DateTime($dateTime);
        if (empty($id)) {
            $isOk = $dataBaseService->createAd($adTitle, $idCar, $adDateTime, $startPlace, $endPlace);
        } else {
            $isOk = $dataBaseService->updateAd($idAd, $adTitle, $idCar, $adDateTime, $startPlace, $endPlace);
        }

        return $isOk;
    }

    /**
     * Return all ad.
     */
    public function getAds(): array
    {
        $ads = [];

        $dataBaseService = new DataBaseService();
        $adsDTO = $dataBaseService->getAds();
        if (!empty($adsDTO)) {
            foreach ($adsDTO as $adDTO) {
                $ad = new Ad();
                $ad->setIdAd($adDTO['idAd']);
                $ad->setAdTitle($adDTO['adTitle']);
                $ad->setIdCar($adDTO['idCar']);
                $date = new DateTime($adDTO['adDateTime']);
                if ($date !== false) {
                    $ad->setDateTime($date);
                }
                $ad->setStartPlace($adDTO['startPlace']);
                $ad->setEndPlace($adDTO['endPlace']);
                $ads[] = $ad;
            }
        }

        return $ads;
    }

    /**
     * Delete an user.
     */
    public function deleteAd(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteAd($id);

        return $isOk;
    }
}