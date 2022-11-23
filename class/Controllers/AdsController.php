<?php

namespace App\Controllers;

use App\Services\AdsService;

class AdsController
{
    /**
     * Return the html for the create action.
     */
    public function createAd(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['adTitle']) &&
            isset($_POST['idCar']) &&
            isset($_POST['dateTime']) &&
            isset($_POST['startPlace']) &&
            isset($_POST['endPlace'])) {
            // Create the user :
            $adsService = new AdsService();
            $isOk = $adsService->setAd(
                null,
                $_POST['adTitle'],
                $_POST['idCar'],
                $_POST['dateTime'],
                $_POST['startPlace'],
                $_POST['endPlace']
            );
            if ($isOk) {
                $html = 'Annonce créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de l\'annonce.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getAds(): string
    {
        $html = '';

        // Get all users :
        $adsService = new AdsService();
        $ads = $adsService->getAds();

        // Get html :
        foreach ($ads as $ad) {
            $html .=
                '#' . $ad->getIdAd() . ' ' .
                $ad->getAdTitle() . ' ' .
                $ad->getDateTime()->format('d/m/Y H:i') . ' ' .
                $ad->getStartPlace() . ' ' .
                $ad->getEndPlace() . '<br />';
        }

        return $html;
    }

    /**
     * Update the ad.
     */
    public function updateAd(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['idAd']) &&
            isset($_POST['adTitle']) &&
            isset($_POST['idCar']) &&
            isset($_POST['dateTime']) &&
            isset($_POST['startPlace']) &&
            isset($_POST['endPlace'])) {
            // Update the advertiser :
            $adsService = new AdsService();
            $isOk = $adsService->setAd(
                $_POST['idAd'],
                $_POST['adTitle'],
                $_POST['idCar'],
                $_POST['dateTime'],
                $_POST['startPlace'],
                $_POST['endPlace']
            );
            if ($isOk) {
                $html = 'Annonce mis à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de l\'annonce.';
            }
        }

        return $html;
    }

    /**
     * Delete an ad.
     */
    public function deleteAd(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['idAd'])) {
            // Delete the advertiser :
            $adsService = new AdsService();
            $isOk = $adsService->deleteAd($_POST['idAd']);
            if ($isOk) {
                $html = 'Annonce supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de l\'annonce.';
            }
        }

        return $html;
    }
}