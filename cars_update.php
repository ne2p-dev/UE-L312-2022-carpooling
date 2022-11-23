<?php

use App\Controllers\UsersController;

require __DIR__ . '/vendor/autoload.php';

$controller = new UsersController();
echo $controller->updateUser();
?>

<p>Mise à jour d'une voiture</p>
<form method="post" action="cars_update.php" name ="carUpdateForm">
    <label for="idCar">Id :</label>
    <input type="text" name="idCar">
    <br />
    <label for="brand">Marque :</label>
    <input type="text" name="brand">
    <br />
    <label for="model">Model :</label>
    <input type="text" name="model">
    <br />
    <label for="color">Couleur</label>
    <input type="text" name="color">
    <br />
    <label for="seats">Nombre de place :</label>
    <input type="text" name="seats">
    <br />
    <label for="idOwner">Propriétaire :</label>
    <input type="text" name="idOwner">
    <br />
    <input type="submit" value="Modifier la voiture">
</form>