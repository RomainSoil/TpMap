<!-- Impossible de gerer les moyens de transport
    -->


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Fichiers CSS -->

    <!-- Bibliotheque OpenStreetMap

     Leaflet pour integration carte
     nominatim pour recherche par adresse
     Leaflet Routing machine pour l'itineraire
     et Geocoder qui fait le lien entre nominatim et Leaflet Routing Machine


     -->

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>

    <!-- Ces deux balises link sont à insérer entre les deux balises existantes -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

    <link rel="stylesheet" href="styles.css">

</head>
<body>
<h1>GPS OpenStreetMap TP</h1>
<div id="carte"></div>

<!-- Fichiers JS -->
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>

<!-- Ces deux balises script sont à insérer entre les deux balises existantes -->
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

<script src="../Controller/scripts.js"></script>

</body>
</html>