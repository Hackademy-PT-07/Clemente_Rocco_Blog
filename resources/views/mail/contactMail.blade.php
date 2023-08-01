<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        Hai ricevuto una richiesta di contatto:
        <br>
        Nome: {{ $name }} <br>
        Email: {{ $email }} <br>
        Messaggio: <br>
        {{ $messageContent }}
    </div>
</body>
</html>