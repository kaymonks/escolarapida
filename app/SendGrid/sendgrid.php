<?php

require '../vendor/autoload.php';

$from = new SendGrid\Email(null, 'kaymon.storino@gmail.com');
$subject = $escola_nome;
$to = new SendGrid\Email(null, $email);
$content = new SendGrid\Content("text/html",
    "<h1>Olá</h1><p>Você recebeu uma nova mensagem da escola ".$escola_nome.", favor acessar o sistema.</p>"
    );
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = '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';
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
$enviado = false;
if ($response->statusCode() == 202) {
    echo "Enviado com sucesso";
    $enviado = true;
}else {
    echo "Ocorreu um erro ao enviar o email";
}