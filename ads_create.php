<?php

use App\Controllers\AdsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AdsController();
echo $controller->createAd();
?>

<p>Création d'une annonce de covoiturage</p>
<form method="post" action="ads_create.php" name ="adCreateForm">
    <label for="adTitle">Titre :</label>
    <input type="text" name="adTitle">
    <br />
    <label for="idCar">Voiture :</label>
    <input type="text" name="idCar">
    <br />
    <label for="dateTime">Date et heure de départ au format "dd-mm-yyyy à H:M" :</label>
    <input type="date" name="dateTime">
    <br />
    <label for="startPlace">Ville de départ :</label>
    <input type="text" name="startPlace">
    <br />
    <label for="endPlace">Ville d'arrivé</label>
    <input type="text" name="endPlace">
    <br />
    <input type="submit" value="Créer une annonce">
</form>