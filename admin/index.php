
<?php

$user_ip = (isset($_SERVER["HTTP_CF_CONNECTING_IP"])?$_SERVER["HTTP_CF_CONNECTING_IP"]:$_SERVER['REMOTE_ADDR']);


$webhookurl = "Nan vous aurez pas ça zebi";


$timestamp = date("c", strtotime("now"));

$json_data = json_encode([
    // Message
    
    // Username
    "username" => "suu",

    // Avatar URL.
    // Uncoment to replace image set in webhook
    //"avatar_url" => "https://ru.gravatar.com/userimage/28503754/1168e2bddca84fec2a63addb348c571d.jpg?size=512",

    // Text-to-speech
    "tts" => false,

    // File upload
    // "file" => "",

    // Embeds Array
    "embeds" => [
        [
            // Embed Title
            "title" => "__FAUSSE PAGE ADMIN__",

            // Embed Type
            "type" => "rich",

            // Embed Description
            "description" => "L'IP **$user_ip** est aller sur la fausse page admin.",


            // Timestamp of embed must be formatted as ISO8601
            "timestamp" => $timestamp,

            // Embed left border color in HEX
            "color" => hexdec( "3366ff" )

        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
// If you need to debug, or find out why you can't send message uncomment line below, and execute script.
// echo $response;
curl_close( $ch );



?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DébiteurDiscord.fr</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="../debiteurdiscord.ico">

    <script async src="https://unpkg.com/typer-dot-js@0.1.0/typer.js"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <center>
        <div class="kzx1">

            <img src="../debiteurdiscord.png" alt="">

        </div>


        <br><br>


        <br><br><br><br><br><br><br><br><br><br><br>

        <div class="mdp">
            <form method="POST" action="index.php">
            <h1>Entrez le mot de passe admin !</h1>
            <input type="password" placeholder="SUUUU"><br><br>
            <input type="submit">
            <form>
        </div>

<?php // c'était une fausse page Admin ?>

    </center>












</body>

</html>