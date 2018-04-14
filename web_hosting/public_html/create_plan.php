<?php session_start();?>
<div class="other_pages">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
    <?php
    require_once("head.php");
    ?>
    <div id="worksheet"><img id="worksheet_img" src="images/white.png" alt="worksheet"></div>
    <div id="buttons">
        <ul>
        <li><button type="button" class="button_1" value="button_1">
            <img class="button_img" src="/images/erase.png" alt="erase" />
        </button></li>
        <li><button type="button" class="button_2" value="button_2">
            <img class="button_img" src="/images/camera.png" alt="camera" />
        </button></li>
        <li><button type="button" class="button_3" value="button_3">
            <img class="button_img" src="/images/wall.png" alt="wall" />
        </button></li>
        <li><button type="button" class="button_4" value="button_4">
            <img class="button_img" src="/images/stelaj.png" alt="stelaj" />
        </button></li>
        <li><button type="button" class="button_5" value="button_5">
            <img class="button_img" src="/images/cassa.png" alt="cassa" />
        </button></li>
        </ul>
    </div>
    <div id="states"></div>
    <?php
    require_once("foot.php");
    ?>
</div>