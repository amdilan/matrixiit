<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script type="text/javascript">
            var msgsys = "";
            var timer = new Interval(function(){updateChat();}, 1000);
            function Interval(fn, time) {
                    var timer = false;
                    this.start = function () {
                        if (!this.isRunning())
                            timer = setInterval(fn, time);
                    };
                    this.stop = function () {
                        clearInterval(timer);
                        timer = false;
                    };
                    this.isRunning = function () {
                        return timer !== false;
                    };
            }
            function autoUpdate(loopmsg){
                var uploop;
                switch (loopmsg) {
                    case "join":
                        uploop = "true";
                        break;
                    case "leave":
                        uploop = "false";
                        break;
                    default:
                        uploop = "idle";
                        break;
                };
                switch(uploop){
                    case "true":
                        updateChat();
                        timer.start();
                        break;
                    case "false":
                        timer.stop();
                        break;
                    case "idle":
                        break;
                }

            }
            function sendMessage() {
                var message = $('#msg').val();
                if (message.trim() === '') {
                    return;
                }
            
                $.ajax({
                    type: 'POST',
                    url: 'chatroom-backend.php',
                    data: {
                        username: username,
                        message: message
                    },
                    success: function () {
                        $('#msg').val('');
                    }
                });
                updateChat();
            }
            function updateChat() {
                $.ajax({
                    type: 'GET',
                    url: 'chatroom-backend.php',
                    success: function (data) {
                        $('#chatbox').html(data);
                        autoScroll();
                    }
                });
            }
            function autoScroll(){
                var objDiv = document.getElementById("chatbox");
                objDiv.scrollTop = objDiv.scrollHeight;
            }
            function chatLeave(){
            const response = confirm("Are you sure you want to leave the chat?");
                if (response){
                    msgsys = "leave";
                    $.ajax({
                        type: 'POST',
                        url: 'chatroom-backend.php',
                        data: {
                            username: username,
                            msgsys: msgsys
                        },
                        success: function () {
                            $('#msg').val('');
                        }
                        });
                    $("#chatroom").hide();
                    $("#join").show();
                    autoUpdate(msgsys);
                }
            }
            $(document).ready(function(){
                //setInterval(function() {updateChat();}, 1000);
                $("#chatroom").hide();
                $("#btn_joinchat").click(function(){
                    $("#chatroom").show();
                    $("#join").hide();
                    username = prompt("Enter your username:");
                    msgsys = "join";
                    $.ajax({
                        type: 'POST',
                        url: 'chatroom-backend.php',
                        data: {
                            username: username,
                            msgsys: msgsys
                        },
                        success: function () {
                            $('#msg').val('');
                            autoUpdate(msgsys);
                        }
                    });
                });
                $("#btn_leavechat").click(function(){
                    chatLeave();
                });
                $("#send_msg").click(function(){
                    sendMessage();
                });
                $('#msg').keypress(function (e) {
                    if (e.which === 13) {
                        sendMessage();
                    }
                });
                $("#btn31").click(function(){                                       
                    if(msgsys == "join"){
                        chatLeave();
                    }                    
                })
            });
        </script>
    </head>
    <body>
        <div id="join">
            <button id="btn_joinchat" style="width: 150px">Join Chat</button>
        </div>
        <div id="chatroom">
        <div id="chatbox" style="width: 600px; height: 600px; border: 1px solid #ccc; overflow-y: scroll;"></div>
        <div id="user_msg" style="width: 600px;">
            <input type="text" id="msg" placeholder="Enter your message..." style="width: 525px ">
            <button id="send_msg" style="width: 10%">send</button>
        </div><br/>
        <div id="leave">
        <button id="btn_leavechat" style="width: 150px">Leave Chat</button>
        </div>
        </div>
    </body>
</html>