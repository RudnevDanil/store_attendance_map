<?php session_start();?>
<head>
  <meta charset="UTF-8">
  <script src="https://cdn.polyfill.io/v1/polyfill.js?features=Element.prototype.closest"></script>
  <script src="DragManager.js"></script>
  <link rel="stylesheet" href="dragDemo.css">
  <script>
    DragManager.onDragCancel = function(dragObject) {
      dragObject.avatar.rollback();
    };

    DragManager.onDragEnd = function(dragObject, dropElem) {
      dragObject.elem.style.display = 'none';
      dropElem.classList.add('computer-smile');
      setTimeout(function() {
        dropElem.classList.remove('computer-smile');
      }, 200);
    };
  </script>
</head>
<body>
<div class="other_pages">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
    <?php
    require_once("head.php");
    ?>
    <div id="worksheet"><img id="worksheet_img" src="images/white.png" alt="worksheet"></div>
    <div id="buttons">
        <ul>
        <li><button type="button" class="button_1" value="button_1">
            <img class="button_img draggable" src="/images/erase.png" alt="erase" />
        </button></li>
        <li><button type="button" class="button_2" value="button_2">
            <img class="button_img draggable" src="/images/camera.png" alt="camera" />
        </button></li>
        <li><button type="button" class="button_3" value="button_3">
            <img class="button_img draggable" src="/images/wall.png" alt="wall" />
        </button></li>
        <li><button type="button" class="button_4" value="button_4">
            <img class="button_img draggable" src="/images/stelaj.png" alt="stelaj" />
        </button></li>
        <li><button type="button" class="button_5" value="button_5">
            <img class="button_img draggable" src="/images/cassa.png" alt="cassa" />
        </button></li>
        </ul>
    </div>
    <div class="computer droppable"></div>
    
    <?php
    require_once("foot.php");
    ?>
</div>
</body>