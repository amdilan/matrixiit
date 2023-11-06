<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <!--<script src="./jquery/jquery-3.7.1.js"></script>-->
        <script type="text/javascript">
            $(document).ready(function() {
                $("#type1").hide();
                $("#type2").hide();
                $("#type3").hide();
                $("#type4").hide();
                $("#btn1").click(function(){
                    $("#act_area").load("fileupload.php");
                    $("#type1").show();
                    $("#main_menu").hide();
                });
                $("#btn2").click(function(){
                    $("#act_area").load("citysearch.php");
                    $("#type2").show();
                    $("#main_menu").hide();
                });
                $("#btn3").click(function(){
                    $("#act_area").load("chatroom.php");
                    $("#type3").show();
                    $("#main_menu").hide();
                });
                $("#btn4").click(function(){
                    $("#act_area").load("tablelog.php");
                    $("#type4").show();
                    $("#main_menu").hide();
                });
                $("#btn11").click(function(){
                    $("#main_menu").show();
                    $("#type1").hide();
                    $("#act_area").empty();
                });
                $("#btn21").click(function(){
                    $("#main_menu").show();
                    $("#type2").hide();
                    $("#act_area").empty();
                });
                $("#btn31").click(function(){
                    $("#main_menu").show();
                    $("#type3").hide();
                    $("#act_area").empty();               
                });
                $("#btn41").click(function(){
                    $("#main_menu").show();
                    $("#type4").hide();
                    $("#act_area").empty();
                });
            });
        </script>
    </head>
    <body>
        <div id="content">
            <div id="menu">
                <div id="main_menu">
                    <button id="btn1" type="button" style="width: 150px">Type 1: File upload</button><br/>
                    <button id="btn2" type="button" style="width: 150px">Type 2: Search City</button><br/>
                    <button id="btn3" type="button" style="width: 150px">Type 3: Chatroom</button><br/>
                    <button id="btn4" type="button" style="width: 150px">Type 4: Table Log</button><br/>
                </div>
                <div id="type1">
                    <button id="btn11" type="button" style="width: 150px">Back To Main Menu</button><br/>
                </div>
                <div id="type2">
                    <button id="btn21" type="button" style="width: 150px">Back To Main Menu</button><br/>
                </div>
                <div id="type3">
                    <button id="btn31" type="button" style="width: 150px">Back To Main Menu</button><br/>
                </div>
                <div id="type4">
                    <button id="btn41" type="button" style="width: 150px">Back To Main Menu</button><br/>
                </div>
            </div>
            <br/>
            <br/>
            <div id="act_area"></div>
        </div>

    </body>
</html>
