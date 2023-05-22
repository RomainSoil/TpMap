<?php
include ("../View/GPS.php");

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