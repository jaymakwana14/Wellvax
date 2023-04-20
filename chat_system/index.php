<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>chat app</title>
    <link rel="stylesheet" href="resources/style.css">
    <script type="text/javascript" src="resources/jquery.js"></script>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>

<body>
    <?php
session_start();
$_SESSION['username'] = "Guest";
//echo var_dump($_SESSION);
?>
        <div id="wrapper" class="mt-5">
            <h1 class="text-center">Welcome
                <?php
                //session_start();
                echo $_SESSION['username'];
                ?>
                    to Wellvax Community</h1>
            <div class="chat_wrapper">
                <div id="chat"></div>
                <form class="" id="msgform" action="index.php" method="post">
                    <textarea name="message" rows="8" cols="80" class="textarea"></textarea>
                </form>
            </div>
        </div>

        <script type="text/javascript">
            LoadChat();
            setInterval(function() {
                LoadChat();
            }, 1000);

            function LoadChat() {
                $.post('handlers/messages.php?action=getMessages', function(response) {

                    var scrollpos = $('#chat').scrollTop();
                    var scrollpos = parseInt(scrollpos) + 420;
                    var scrollHeight = $('#chat').prop('scrollHeight');

                    $('#chat').html(response);
                    if (scrollpos < scrollHeight) {

                    } else {
                        $('#chat').scrollTop($('#chat').prop('scrollHeight'));
                    }

                })
            }
            $('.textarea').keyup(function(e) {
                //alert(e.which);
                if (e.which == 13) {
                    //alert('enter is pressed')
                    $('form').submit();
                }
            });
            $('form').submit(function() {
                //alert('form is submit jquery');
                var message = $('.textarea').val();
                $.post('handlers/messages.php?action=sendMessage&message=' + message, function(response) {
                    //alert(response);
                    if (response == 1) {
                        LoadChat();
                        document.getElementById('msgform').reset();
                    }
                });
                return false;
            })
        </script>

<?php
require('footer.html');
?>