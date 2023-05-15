<html>
<body>
<form method="post">
    <input placeholder="Depart" name="origin" >
    <input placeholder="Arrivée" name="destination">
    <label>
        <input type="radio" name="mode" value="driving" checked>
        En voiture
    </label>
    <label>
        <input type="radio" name="mode" value="walking">
        À pied
    </label>
    <label>
        <input type="radio" name="mode" value="bicycling">
        À vélo
    </label>
    <label>
        <input type="radio" name="mode" value="transit">
        En transports en commun
    </label>
    <input type="submit" value="Valider">

</form>
</body>
</html>


<?php

// récupérer les valeurs soumises par le formulaire
@$origin = $_POST['origin'];
@$destination = $_POST['destination'];
@$mode = $_POST['mode'];

// construire l'URL de l'API Google Maps
$url = "https://maps.googleapis.com/maps/api/directions/json?origin=$origin&destination=$destination&mode=$mode&key=YOUR_API_KEY";

// envoyer une requête HTTP pour récupérer les données de l'itinéraire
$response = file_get_contents($url);

// décoder les données JSON de la réponse
$data = json_decode($response);

// vérifier si l'itinéraire a été trouvé avec succès
if ($data->status == "OK") {

    // récupérer les instructions d'itinéraire
    $steps = $data->routes[0]->legs[0]->steps;

    // afficher les instructions d'itinéraire dans une liste
    echo "<ol>";
    foreach ($steps as $step) {
        echo "<li>" . $step->html_instructions . "</li>";
    }
    echo "</ol>";

} else {

    // afficher un message d'erreur si l'itinéraire n'a pas été trouvé
    echo "Impossible de trouver l'itinéraire.";

}

?>
