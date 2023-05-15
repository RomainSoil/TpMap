<DOCTYPE html>
    <html lang= "en">
 <head>
     <meta charset "UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"›
</head>
 <body class="bg-gray-200">
    <div class="flex items-center flex-col space-y-20 justify-center h-screen bg-gray-200 sm:px-6">
        <div class="w-full max-w-sm p-4 bg-white rounded-m shadow-md sm:p-6">
            <div class="flex items-center justify-center">
                <span class="text-xl font-medium text-gray-900">Coordonnées GPS</span>
            </div>
            <Form class="mt-4" method="POST" action="">
                <label for= "address" class= "block">
                    <span class="text-base font-bold text-gray-700">Depart :</span>
                    <input type="text" id="address" name= "address" autocomplete="address"
                           class="block w-full px-3 py-2 mt-1 text-gray-700 border rounded-m form-input focus :border-indigo-600"
                           required />
                    <span class="text-base font-bold text-gray-700">Arrivée :</span>

                    <input type="text" id="arrive" name= "arrive" autocomplete="arrive"
                           class="block w-full px-3 py-2 mt-1 text-gray-700 border rounded-m form-input focus :border-indigo-600"
                           required />
                    <label for="mode_transport" class="block text-base font-bold text-gray-700">Mode de transport :</label>
                    <select id="mode_transport" name="mode_transport" class="block w-full px-3 py-2 mt-1 text-gray-700 border rounded-md form-select focus:border-indigo-600" required>
                        <option value="" disabled selected>Choisir un mode de transport</option>
                        <option value="d">Voiture</option>
                        <option value="b">Vélo</option>
                        <option value="w">A pied</option>
                        <option value="r">Transport en commun</option>
                    </select>
                    </label>
                <div class="mt-6">
                    <button type="submit" name="submit"
                            class="w-full px-4 py-2 text-sm text-center text-white bg-indigo-600 rounded-md hover:bg-indigo-500">Générer </div>
</form>
</div>
        <?php
        if (isset($_POST["submit"])){
            $address = $_POST["address"];
            $arrivee = $_POST["arrive"];
            $addressGPS = str_replace(" ","+",$address);
            $addressArrive = str_replace(" ","+",$arrivee);
            $mode = $_POST['mode_transport'];


            ?>
            <iframe src="https://maps.google.com/maps?&saddr=<?php echo $addressGPS; ?>&daddr=<?php echo $addressArrive;?>&t=k&dirflg=<?php echo $mode;?>&output=embed"
                width="100%" height="500"></iframe>
        <?php }?>
</body> </html>