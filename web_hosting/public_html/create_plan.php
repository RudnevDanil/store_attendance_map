<?php session_start();?>
<head>
  <meta charset="UTF-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.polyfill.io/v1/polyfill.js?features=Element.prototype.closest"></script>
  <script>var on_the_desk = [];on_the_desk[0]=0;var xPos = 0; var yPos = 0;</script>
  <script src="DragManager.js"></script>
  <script>var next_num_element = 5; var first_1 = true;var first_2 = true;var first_3 = true;var first_4 = true;</script>
  <link rel="stylesheet" href="dragDemo.css">
    <script>
    DragManager.onDragCancel = function(dragObject)
    {
        //alert("onDragCancel");
        alert('Out of the work area is not allowed!');
        //dragObject.avatar.rollback();
    };

    DragManager.onDragEnd = function(dragObject, dropElem) 
    {
        //alert("onDragEnd");
        var classes = String (dragObject.elem.classList);
        var num_but = classes.charAt(classes.length - 1);
        
        var is_on_worksheet = String(classes.substring(classes.length - 10, classes.length - 6));
        var num_element = (Number(is_on_worksheet.charAt(1)))*100 + (Number(is_on_worksheet.charAt(2)))*10 + Number(is_on_worksheet.charAt(3));
        var  does_we_need_add = (num_element >= next_num_element -1);
        if(((num_element == 1)&&(first_1 == true))||((num_element == 2)&&(first_2 == true))||((num_element == 3)&&(first_3 == true))||((num_element == 4)&&(first_4)))
            does_we_need_add = true;
        //alert(num_element);
        on_the_desk[num_element]={width:40,height:40,rot:0,x_pos:xPos,y_pos:yPos,type:num_but};
        on_the_desk[0] = num_but;
        
        $('#width_line').val(on_the_desk[on_the_desk[0]-1].width);
        $('#height_line').val(on_the_desk[on_the_desk[0]-1].height);
        $('#rotation_line').val(on_the_desk[on_the_desk[0]-1].rot);
        
        if(does_we_need_add == true)
        {
            var next_num_element_str = "";
                next_num_element_str = (next_num_element < 100)?"0":"";
                next_num_element_str = (next_num_element < 10)?"00":next_num_element_str;
                next_num_element_str = next_num_element_str + next_num_element;
            ++next_num_element;
            if(num_but == '2')
            {
                $(".camera_but").append('<img class="droppable button_img draggable n' + next_num_element_str +' but_2" src="/images/camera.png" alt="camera" />');
                if(first_1 == true)
                    first_1 = false;
            }
            else if(num_but == '3')
            {
                $(".wall_but").append('<img class="droppable button_img draggable n' + next_num_element_str +' but_3" src="/images/wall.png" alt="wall" />');
                if(first_2 == true)
                    first_2 = false;
            }
            else if(num_but == '4')
            {
                $(".stelaj_but").append('<img class="droppable button_img draggable n' + next_num_element_str +' but_4" src="/images/stelaj.png" alt="stelaj" />');
                if(first_3 == true)
                    first_3 = false;
            }
            else if(num_but == '5')
            {
                $(".cassa_but").append('<img class="droppable button_img draggable n' + next_num_element_str +' but_5" src="/images/cassa.png" alt="cassa" />');
                if(first_4 == true)
                    first_4 = false;
            }
            else
            {
                alert('UNKNOWN');
                alert(dragObject.elem.classList);
            }
        }
            
        $( document ).ready(function() 
        {
            $(".update").click(
        	    function()
        		{
        		    on_the_desk[on_the_desk[0]-1].width = $('#width_line').val();
        		    dragObject.elem.style.width = $('#width_line').val() + 'px';
        		    
        		    on_the_desk[on_the_desk[0]-1].height = $('#height_line').val();
        		    dragObject.elem.style.height = $('#height_line').val() + 'px';
        		    
        		    on_the_desk[on_the_desk[0]-1].rot = $('#rotation_line').val();
        		    dragObject.elem.style.transform = 'rotate('+($('#rotation_line').val()) + 'deg)';
        		    return false; 
        	    }
            );
        });
    };
  </script>
</head>
<body>
<div class="other_pages">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
    <?php
    require_once("head.php");
    ?>
    <div class="droppable worksheet"><img id="worksheet_img" src="images/white.png" alt="worksheet"></div>
    <div id="buttons">
        <ul>
        <li><button type="button" class="button_2" value="button_2"><div class="camera_but">
            <img class="droppable button_img draggable n001 but_2" src="/images/camera.png" alt="camera" />
        </div></button></li>
        <li><button type="button" class="button_3" value="button_3"><div class="wall_but">
            <img class="droppable button_img draggable n002 but_3" src="/images/wall.png" alt="wall" />
        </div></button></li>
        <li><button type="button" class="button_4" value="button_4"><div class="stelaj_but">
            <img class="droppable button_img draggable n003 but_4" src="/images/stelaj.png" alt="stelaj" />
        </div></button></li>
        <li><button type="button" class="button_5" value="button_5"><div class="cassa_but">
            <img class="droppable button_img draggable n004 but_5" src="/images/cassa.png" alt="cassa" />
        </div></button></li>
        </ul>
    </div>
    <form action="/change_element.php" method="POST">
        <div class="change_element">
            <table>
                <tr>
                    <th><div  class="some_text">Width:</div></th>
                    <th><input id="width_line"  type="number" name="width" placeholder="Width"></th>
                </tr>
                <tr>
                    <th><div class="some_text">Height:</div></th>
                    <th><input id="height_line" type="number" name="height" placeholder="Height"></th>
                </tr>
                <tr>
                    <th><div class="some_text">Rotation:</div></th>
                    <th><input id="rotation_line" type="number" name="rotation" placeholder="Rotation"></th>
                </tr>
            </table>
            
    		<button class="control_block form_button update" type="button" name="do_change">Save changes!</button>
        </div>
    </form>
    <?php
    require_once("foot.php");
    ?>
</div>
</body>