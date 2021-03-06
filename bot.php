<!DOCTYPE html>
<html lang="es-ES">
<!-- 
https://localhost/phpmyadmin 
y encender el phpmyadmin en xampp
-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MauChat | MauBot</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="title">MauChat | MauBot</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Hola, ¿En que pueda ayudarte?</p>
                </div>
            </div>
            <div style="margin-left: 40px; margin-top: 10px;" class="bot-inbox inbox">
                <div class="msg-header">
                    <p>Puedes escribir <strong>help o ayuda</strong></p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Escribe algo...">
                <button id="send-btn">Enviar</button>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // ajax
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // cuando el chat baja, la barra de desplazamiento llega automáticamente al final
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
    
</body>
</html>