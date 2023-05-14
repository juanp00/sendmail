<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;400;500;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Send Mail</title>
</head>
<body>
    <div class="container-body">
        <header class="p-4">
            <div>
                <h1 class="text-center">Send <span style="background-color: #02b9da; padding: 5px 8px; border-radius: 10px;">Mail</span></h1>
            </div>
        </header>
        <main class="wrapper-main container p-4">
            <div class="wrapper-contact-info">
                <h2 class="pb-4">Informações de Contato</h2>
                <div>
                    <h5>E-mail</h5>
                    <p>sendmail@teste.com.br</p>
                </div>
                <div>
                    <h5>Telefone</h5>
                    <p>(13)99999-9999</p>
                </div>
                <div class="wrapper-social-icon">
                    <a href="#"><img src="public/img/instagram.png" alt="Icone do instagram"></a>
                    <a href="#"><img src="public/img/facebook.png" alt="Icone do Facebook"></a>
                    <a href="#"><img src="public/img/wpp-icon.png" alt="Icone do Whatsapp"></a>
                </div>
                
            </div>
            <div class="wrapper-contact-form">
                <form id="contact-form" method="POST">
                    <div>
                        <input type="text" id="name" name="name" required>
                        <label for="name">Nome</label>
                    </div>

                    <div>
                        <input type="email" id="email" name="email" required>
                        <label for="email">E-mail</label>
                    </div>
                    
                    <div>
                        <input type="text" id="assunto" name="assunto" required>
                        <label for="assunto">Assunto</label>
                    </div>

                    <div>
                        <textarea id="message" name="message" required></textarea>
                        <label for="message">Mensagem</label>
                    </div>
                    <div>
                        <input type="submit" value="Enviar">
                    </div>
                </form>

                <div id="loading">
                    <img src="public/img/loading.gif" width="50px" alt="Carregando...">
                </div>
                <div id="response">
                    <p onclick="fecharPopup()">Fechar</p>
                    <h5 id="msgResponse"></h5>
                </div>
            </div>
            
        </main>
    </div>

    <!-- Script ajax para enviar os dados do formulário para o arquivo de sendmail.php, que irá enviar o e-mail -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function fecharPopup() {
            const divResponse = document.getElementById("response");
            divResponse.style.visibility= "hidden";
        }
        $(document).ready(function() {
            $('#contact-form').submit(function(event) {
                event.preventDefault();
                var name = $('#name').val();
                var email = $('#email').val();
                var assunto = $('#assunto').val();
                var message = $('#message').val();


                const divGif = document.getElementById("loading");
                divGif.style.visibility= "visible";

                $.ajax({
                    type: 'POST',
                    url: 'sendmail.php',
                    data: {
                        name: name,
                        email: email,
                        assunto: assunto,
                        message: message
                    },
                    success: function(response) {
                        //Em caso de envio com sucesso oculta o gif de loading
                        const divGif = document.getElementById("loading");
                        divGif.style.visibility= "hidden";

                        //Limpa formulário se enviar com sucesso
                        const formReset = document.getElementById("contact-form")
                        formReset.reset()
                        
                        //Em caso de sucesso deixa a div de feedback visível
                        const divResponse = document.getElementById("response");
                        divResponse.style.visibility= "visible";
                        $('#msgResponse').html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>