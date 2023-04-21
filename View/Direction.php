<?php
// Coordonnées des points de départ et d'arrivée
$depart = "3.1724406,50.1217857"; // Paris
$arrivee = "3.2346145,50.1757546"; // Lille

// URL de l'API OSRM
$url = "http://router.project-osrm.org/route/v1/driving/".$depart.";".$arrivee."?steps=true";

// Appel de l'API OSRM
$reponse = file_get_contents($url);

// Conversion de la réponse JSON en tableau associatif PHP
$itineraire = json_decode($reponse, true);

// Affichage de l'itinéraire
echo "Distance : ".$itineraire["routes"][0]["distance"]." m<br>";
echo "Durée : ".$itineraire["routes"][0]["duration"]." s<br>";
echo "Itineraire : <ul>";
foreach($itineraire["routes"][0]["legs"][0]["steps"] as $etape) {
    echo "<li>".$etape["name"]."</li>";
}
echo "</ul>";