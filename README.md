# Sistema de envio de emails com PHPMailer

Este sistema foi desenvolvido em PHP e utiliza a biblioteca PHPMailer para enviar emails através de um servidor SMTP configurado.

## Como usar

1. Baixe ou clone o repositório em sua máquina
2. Abra o arquivo `sendmail.php` e edite as seguintes variáveis para corresponder às informações do servidor SMTP de sua preferência:

```php
$smtpHost = 'smtp.example.com'; // endereço do servidor SMTP
$smtpUsername = 'seu-email@example.com'; // endereço de email usado para autenticação no servidor SMTP
$smtpPassword = 'sua-senha-de-email'; // senha usada para autenticação no servidor SMTP
$smtpPort = 587; // porta usada para conexão com o servidor SMTP 587 para tls ou 465 para ssl
$smtpEncryption = 'tls'; // tipo de criptografia usada na conexão com o servidor SMTP (ssl ou tls)
```

3. Na mesma página, edite as variáveis `$fromEmail` e `$fromName` para corresponder ao email e nome que devem aparecer como remetente no email enviado.
4. Configure o HTML do email a ser enviado na variável `$htmlContent`.
5. Rode o arquivo `sendmail.php` em seu servidor web e teste o envio de email.

## Dependências

Este sistema utiliza a biblioteca PHPMailer para enviar emails. Para utilizá-lo, é necessário instalar a biblioteca. Você pode instalá-la manualmente ou através de gerenciadores de pacote como o Composer.

## Observações

- Este sistema foi testado e funciona com servidores SMTP que requerem autenticação e utilizam criptografia SSL ou TLS para conexão.
- Caso o servidor SMTP de sua preferência não utilize criptografia, deixe a variável `$smtpEncryption` vazia (`''`).
- Este sistema não foi testado com servidores SMTP que utilizam outros tipos de criptografia para conexão.


![Imagem do sistema](https://github.com/juanp00/sendmail/assets/57877908/3a6f1b91-75d7-4297-aee7-7b4b6d1502e8)
