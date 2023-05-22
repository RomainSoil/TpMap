<?php
session_start()

/* test avec OpenStreetMap pour recuperer les coordonnes de latitude et longitude en rentrant un nom de ville*/
?>

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
    <label for="ville">Depart :</label>
    <input type="text" name="depart" id="depart" required>
    <label for="ville">Arrive :</label>
    <input type="text" name="arrive" id="arrive" required>
    <input type="submit" name="recherche" value="Rechercher">
</form>

<?php
if (isset($_GET['recherche'])) {
    // Récupérer le nom de la ville
    $ville = $_GET['depart'];
    $ville2 = $_GET['arrive'];


    // Rechercher les coordonnées géographiques de la ville avec l'API Nominatim d'OpenStreetMap
    $url = "https://nominatim.openstreetmap.org/search?q=".urlencode($ville)."&format=json";
    $data = file_get_contents($url);
    $json = json_decode($data, true);


    $url2 = "https://nominatim.openstreetmap.org/search?q=".urlencode($ville2)."&format=json";
    $data2 = file_get_contents($url);
    $json2 = json_decode($data, true);

    if (!empty($json)&&(!empty($json2))) {
        $lat = $json[0]['lat'];
        $lon = $json[0]['lon'];
        $lat2 = $json2[0]['lat'];
        $lon2 = $json2[0]['lon'];
        $_SESSION["lat1"] = $lat;
        $_SESSION["lon1"] = $lon;
        $_SESSION["lat2"] = $lat2;
        $_SESSION["lon2"] = $lon2;

    } else {
        echo '<p>Aucun résultat trouvé pour "'.$ville.'" et "'.$ville2.'".</p>';
    }
}
?>
</body>
</html>
