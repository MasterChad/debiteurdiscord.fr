
<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM debiteur ORDER BY id DESC LIMIT 3";
$result = $conn->query($sql);

?>






<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DébiteurDiscord.fr</title>
    
    <meta name="description" content="Le site où les singes sont réunis !">
    <meta name="keywords" content="debiteur discord, debiteur, discord, débiteur, discord, kzx, sk200">
    <meta name="author" content="Kzx">
    <meta property="og:title" content="DébiteurDiscord.fr"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="https://debiteurdiscord.fr/"/>
    <meta property="og:image" content="https://cdn.discordapp.com/attachments/723873507427221567/995043005293666315/debiteurdiscord.png"/>
    <meta property="og:description" content="Le site où les singes sont réunis !"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="debiteurdiscord.ico">

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

            <img src="debiteurdiscord.png" alt="">
            <h1>
                <span style="color: red;"> Débiteur</span>Discord.fr 🐒
            </h1>





        </div>

        <input type="button" onclick="location.href='https://debiteurdiscord.fr/singes';" value="Liste des singes" />
        <input type="button" onclick="location.href='https://debiteurdiscord.fr/discord';"
            value="Rejoindre notre serveur" />

        <br><br>
        <!-- <input type="button" style="width: 400px;" onclick="location.href='https://debiteurdiscord.fr/login';"
            value="Se connecter / S'inscrire" />
             -->

        <br><br><br>
        <h1 style="color: white; font-family: 'Ubuntu', sans-serif;">Les <span style="color: red;"> trois</span>
            derniers...</h1>

        <br>

        <div class="singes">

        <?php


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<div class='singe'><img src='" . $row["avatar"]. "' alt='' class='avatar'><h1>" . $row["pseudo"] .  "#".$row["tag"]."</h1></div>";
      
    }
  } else {
    echo "0 results";
  }
  $conn->close();
?>



        </div>



    </center>












    <script src="script.js" async defer></script>
</body>

</html>