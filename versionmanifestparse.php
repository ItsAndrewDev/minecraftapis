<?php
    if ($_GET['version'] == "" || $_GET['action'] == "") { echo "Please pass 'version' and 'action' variables."; exit(); }
    $curlSession = curl_init();
    curl_setopt($curlSession, CURLOPT_URL, 'https://launchermeta.mojang.com/mc/game/version_manifest.json');
    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

    $jsonData = json_decode(curl_exec($curlSession));
    curl_close($curlSession);

    foreach ( $jsonData['versions'] as $item ) {
        if ($item['id'] == $_GET['version']) {
            echo "Version JSON: ".$item['url']."<br>";

            $curlSessionB = curl_init();
            curl_setopt($curlSessionB, CURLOPT_URL, $item['url']);
            curl_setopt($curlSessionB, CURLOPT_BINARYTRANSFER, true);
            curl_setopt($curlSessionB, CURLOPT_RETURNTRANSFER, true);

            $jsonDataB = json_decode(curl_exec($curlSessionB));
            curl_close($curlSessionB);

            $itemB = $jsonDataB['downloads'];
            if($_GET['action' == "getserverjar") { echo $itemB['server']['url']; }
            
            break;
        }
    }
?>
