<?php

use App\Controllers\AdsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AdsController();
echo $controller->deleteAd();
?>

<p>Supression d'une annonce</p>
<form method="post" action="ads_delete.php" name ="adDeleteForm">
    <label for="idAd">Id :</label>
    <input type="text" name="idCar">
    <br />
    <input type="submit" value="Supprimer une annonce">
</form>