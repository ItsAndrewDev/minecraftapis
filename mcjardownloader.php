<?php
    if ($_GET['version'] == "" || $_GET['action'] == "") { echo "Please pass 'version' and 'action' variables."; exit(); }
    $jsonData = json_decode(file_get_contents('https://launchermeta.mojang.com/mc/game/version_manifest.json'), true);

    foreach ( $jsonData['versions'] as $item ) {
        if ($item['id'] == $_GET['version']) {
            $jsonDataB = json_decode(file_get_contents($item['url']), true);
            $itemB = $jsonDataB['downloads'];
            if($_GET['action'] == "getserverjar") { echo $itemB['server']['url']; }
            if($_GET['action'] == "getclientjar") { echo $itemB['client']['url']; }
            
            break;
        }
    }
?>
