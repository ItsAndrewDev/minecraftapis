<?php
    $curlSession = curl_init();
    curl_setopt($curlSession, CURLOPT_URL, 'https://launchermeta.mojang.com/mc/game/version_manifest.json');
    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

    $jsonData = json_decode(curl_exec($curlSession));
    curl_close($curlSession);

    echo "Parsing version manifest for Minecraft ".$_GET['version'].".";
    if( $_GET['action'] == "getserverjar"){ 
      echo "Getting server.jar download link." 
    }

    foreach ( $jsonData['versions'] as $item ) {
        if ($item['id'] == $_GET['version']) {
            echo "Version JSON: ".$item['url'];

            $curlSessionB = curl_init();
            curl_setopt($curlSessionB, CURLOPT_URL, $item['url']);
            curl_setopt($curlSessionB, CURLOPT_BINARYTRANSFER, true);
            curl_setopt($curlSessionB, CURLOPT_RETURNTRANSFER, true);

            $jsonDataB = json_decode(curl_exec($curlSessionB));
            curl_close($curlSessionB);

            $itemB = $jsonDataB['downloads'];
            if($_GET['action' == "getserverjar") { echo "Server JAR URL is: ".$itemB['server']['url'] }
            
            break;
        }
    }
?>
