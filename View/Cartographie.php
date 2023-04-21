<!DOCTYPE html>
<html>
<head>
    <title>Recherche de ville avec OpenStreetMap</title>
    <meta charset="utf-8">
    <style type="text/css">
        #map {
            width: 800px;
            height: 600px;
        }
    </style>
</head>
<body>
<h1>Recherche de ville avec OpenStreetMap</h1>
<form action="" method="get">
    <label for="ville">Ville :</label>
    <input type="text" name="ville" id="ville" required>
    <input type="submit" value="Rechercher">
</form>

<?php
if (isset($_GET['ville'])) {
    // Récupérer le nom de la ville
    $ville = $_GET['ville'];

    // Rechercher les coordonnées géographiques de la ville avec l'API Nominatim d'OpenStreetMap
    $url = "https://nominatim.openstreetmap.org/search?q=".urlencode($ville)."&format=json";
    $data = file_get_contents($url);
    $json = json_decode($data, true);

    if (!empty($json)) {
        $lat = $json[0]['lat'];
        $lon = $json[0]['lon'];

    } else {
        echo '<p>Aucun résultat trouvé pour "'.$ville.'".</p>';
    }
}
?>
</body>
</html>
