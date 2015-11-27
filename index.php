<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="">  
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name=viewport content="width=device-width, initial-scale=1">

	<title></title>


  	<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    error_reporting(0);
    session_start();
    if(!isset($_SESSION['login']))
    {
    ?>
        <form action="php/login.php" method="post" name="logForm" id="logForm">
            <p> 
                <input type="text" placeholder="Введите Ваше имя" name="login" required>
            </p>
            <p>
                <input type="password" placeholder="Введите пароль" name="password" required>
            </p>
                <input type="submit" value="Вход"><input type="button" onclick="formNone();" value="Зарегистироваться">

        </form> 
        <form action="php/reg.php" method="post" name="regForm" id="regForm">
            <p> 
                <input type="text" placeholder="Введите Ваше имя" name="login" required>
            </p>
            <p>
                <input type="password" placeholder="Введите пароль" name="password" required></p>
                <input type="submit" value="Зарегистироваться">
        </form>   

    <?php
    }
    else {
            echo "<center>";
            echo "<a href='php/exit.php'>Exit</a>";
            echo "</center>";
    ?>  
        <form action="javascript:send();" method="post"  name="form" id="form">
            <textarea type="text" name="mes"  required ></textarea>
            <input type="submit" value="Отправить">
        </form>
    <?php
    }
    ?>
    <div id="messages"></div>

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
    function send() {
        var msg = $('#form').serialize();
            $.ajax({
                type: 'POST',
                url: 'php/send.php',
                resetForm: 'true',
                data: msg,
                success: function() {
                            $(':input','#form')
                            .not(':button, :submit, :reset, :hidden')
                            .val('')
                            .removeAttr('checked')
                            .removeAttr('selected');
                            load_messes();
                        },  
                error:  function(xhr, str){
                            alert('Возникла ошибка: ' + xhr.responseCode);
                        }
                });
            }

    function load_messes(){
        $.ajax({
                type: "POST",
                url:  "php/load.php",
                data: "channel_id=",
                success: function(html)
                {
                    $("#messages").empty();
                    $("#messages").append(html);
                    $("#messages").scrollTop(90000);
                }
        });
    }

    function formNone() {
        document.getElementById('logForm').style.display = "none";
        document.getElementById('regForm').style.display = "block";
    }
    load_messes();
    </script>

</body>
</html>