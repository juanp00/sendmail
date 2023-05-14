<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Entre em contato conosco</h1>
    <form id="contact-form" method="POST">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="message">Mensagem:</label>
        <textarea id="message" name="message" required></textarea><br><br>
        
        <input type="submit" value="Enviar">
    </form>

    <div id="response"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#contact-form').submit(function(event) {
            event.preventDefault();
            var name = $('#name').val();
            var email = $('#email').val();
            var message = $('#message').val();

            $.ajax({
            type: 'POST',
            url: 'sendmail.php',
            data: {
                name: name,
                email: email,
                message: message
            },
            success: function(response) {
                $('#response').html(response);
            }
            });
        });
        });
    </script>
</body>
</html>