<?php


if(isset($_GET['i'])) {
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


    $sql = "SELECT * FROM debiteur WHERE id = ?";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("i", $_GET['i']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result > 0) {
        while ($row = $result->fetch_assoc()) {
            $pseudo = $row['pseudo'];
            $tag = $row['tag'];


            $etoilegenant = "";
            if($row["avisgenant"] == "1") {
              $etoilegenant = "⭐";
            } else if($row["avisgenant"] == "2") {
              $etoilegenant = "⭐⭐";
            } else if($row["avisgenant"] == "3") {
              $etoilegenant = "⭐⭐⭐";
            } else if($row["avisgenant"] == "4") {
              $etoilegenant = "⭐⭐⭐⭐";
            } else if($row["avisgenant"] == "5") {
              $etoilegenant = "⭐⭐⭐⭐⭐";
            }
      
            $etoiledebile = "";
            if($row["avisdebile"] == "1") {
              $etoiledebile = "⭐";
            } else if($row["avisdebile"] == "2") {
              $etoiledebile = "⭐⭐";
            } else if($row["avisdebile"] == "3") {
              $etoiledebile = "⭐⭐⭐";
            } else if($row["avisdebile"] == "4") {
              $etoiledebile = "⭐⭐⭐⭐";
            } else if($row["avisdebile"] == "5") {
              $etoiledebile = "⭐⭐⭐⭐⭐";
            }

            $avatar = $row['avatar'];
            $avis = $row['avis'];
            
        }
    } else {
        echo "0 results";
    }
  $conn->close();

} else {
    die("Et bah non garçon, retourne débiter comme un débile sur des serveurs de débile.");
}






?>


<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DébiteurDiscord.fr</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylesinge.css">
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

        </div>

        <input type="button" onclick="location.href='https://debiteurdiscord.fr/singes';" value="Liste des singes" />
        <input type="button" onclick="location.href='https://debiteurdiscord.fr/discord';"
            value="Rejoindre notre serveur" />

        <br><br>
        <!-- <input type="button" style="width: 400px;" onclick="location.href='https://debiteurdiscord.fr/login';"
            value="Se connecter / S'inscrire" />
             -->


        <br>

        <div class="singe">
            <img src="<?php echo $avatar ?>" alt="" class="avatar">
            <h1><?php echo $pseudo;?>#<?php echo $tag;?></h1>
            <p><span style="color: red;">Gênant:</span> <?php echo $etoilegenant ?>/5</p>
            <p><span style="color: red;">Débilité:</span> <?php echo $etoiledebile ?>/5</p>
            <p><span style="color: red;">Avis:</span> <?php echo $avis ?></p>
        </div>

        <!-- <h1>Commentaires: </h1>

        <br><br>
        <div class="commentaires">

            <div class="commentaire">
                <h1><span style="color: red;">Pseudo</span> - Commentaire</h1>
            </div>
            <div class="commentaire">
                <h1><span style="color: red;">Pseudo</span> - Commentaire</h1>
            </div>
            <div class="commentaire">
                <h1><span style="color: red;">Pseudo</span> - Commentaire</h1>
            </div>
            <div class="commentaire">
                <h1><span style="color: red;">Pseudo</span> - Commentaire</h1>
            </div>
            <div class="commentaire">
                <h1><span style="color: red;">Pseudo</span> - Commentaire</h1>
            </div>
            <div class="commentaire">
                <h1><span style="color: red;">Pseudo</span> - Commentaire</h1>
            </div>
            <div class="commentaire">
                <h1><span style="color: red;">Pseudo</span> - Commentaire</h1>
            </div>
            <div class="commentaire">
                <h1><span style="color: red;">Pseudo</span> - Commentaire</h1>
            </div>
            <div class="commentaire">
                <h1><span style="color: red;">Pseudo</span> - Commentaire</h1>
            </div>
            <div class="commentaire">
                <h1><span style="color: red;">Pseudo</span> - Commentaire</h1>
            </div>

        </div>

-->


        </div>



    </center>












</body>

</html>