<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Music Viewer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="viewer.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div id="header">

    <h1>190M Music Playlist Viewer</h1>
    <h2>Search Through Your Playlists and Music</h2>
</div>


<div id="listarea">
    <ul id="musiclist">
        <?php
           $music = glob('songs/*.mp3');
           foreach($music as $eachFile) {
                 ?>
               <li class="mp3item">
                   <a href=" <?=$eachFile?>"><?=basename($eachFile)?></a>
                    <?php
                    $size="";
                    if(filesize(realpath($eachFile))<1023){
                        $size="( "+strval(round((filesize(realpath($eachFile))/8),2))+" B )";
                    }
                    elseif (filesize(realpath($eachFile))>1023&&filesize(realpath($eachFile))<1048575){
                        $size="( "+strval(round((filesize(realpath($eachFile))/1024),2))+" KB )";
                    }
                    else{
                        $size="( "+strval(round((filesize(realpath($eachFile))/1048576),2))+" MB )";
                    }
                    ?>
                   <?=$size?>
               </li>
        <?php
           }
        $music_text = glob('songs/*.txt');
        function displayPlay($apath){
        ?>
        <li class="playlistitem">
            <a href="<?=$apath?>" onclick="displayPlay(<?=pathinfo($apath)?>)"><?=basename($apath)?></a>
        </li>
        <?php   }
        foreach($music_text as $eachText) {
        ?>
        <li class="playlistitem">
            <a href="<?=$eachText?>" onclick="displayPlay(<?=pathinfo($eachText)?>)"><?=basename($eachText)?></a>
        </li>
        <?php   }

        ?>



    </ul>
</div>
</body>
</html>
