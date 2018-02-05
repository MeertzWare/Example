<?php

    $API_KEY = ''; //Your API-key
    $ChannelID = ''; //Channel ID of the Youtube Channel

    $channelInfo = 'https://www.googleapis.com/youtube/v3/search?part=snippet&channelId='.$ChannelID.'&type=video&eventType=live&key='.$API_KEY;

    $extractInfo = file_get_contents($channelInfo);
    $extractInfo = str_replace('},]',"}]",$extractInfo);
    $showInfo = json_decode($extractInfo, true);

    if($showInfo['pageInfo']['totalResults'] === 0){

        echo 'Livestream is Offline <br><br>';

    }else{

        echo 'Livestream is LIVE! <br><br> https://www.youtube.com/embed/live_stream?channel=[CHANNEL ID]&autoplay=1" width="920" height="630"></iframe>';

    }

?>