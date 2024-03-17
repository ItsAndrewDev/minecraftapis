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
        }
    }
?>
