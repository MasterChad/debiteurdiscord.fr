<?php

if(isset($_POST['submit'])) {



    $url = "https://canary.discordapp.com/api/v9/users/".$_POST['id'];

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
       "Authorization: TOKEN-D'unCompteRandom",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  
   $resp = curl_exec($curl);
   curl_close($curl);
  
   $obj = json_decode($resp);
   print $obj->{'id'};
  
    

    $avatarrr = "https://cdn.discordapp.com/avatars/".$obj->{'id'}."/".$obj->{'avatar'}.".webp";



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
    $id = $_POST['id'];

    $pseudo = $obj->{'username'};
    $tag = $obj->{'discriminator'};
    $avatar = $avatarrr;

    $genance = $_POST['genance'];
    $debile = $_POST['debile'];
    $avis = $_POST['avis'];
    
    $sql = "INSERT INTO debiteur (membreid, pseudo, tag, avatar, avisgenant, avisdebile, avis) 
    VALUES ('$id', '$pseudo', '$tag', '$avatar', '$genance', '$debile', '$avis')";

 // Oui je sais que y'a une faille SQL, mais je m'en bats les couilles y'avais que moi (Kzx) et SK200 qui avait cette page







    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
      
      $webhookurl = "Toujours pas";
          

      $timestamp = date("c", strtotime("now"));
          
      $json_data = json_encode([

          "username" => "suu",

          "tts" => false,
      

          "embeds" => [
              [
                  "title" => "__AJOUT__",
              
                  // Embed Type
                  "type" => "rich",
              
                  // Embed Description
                  "description" => "Membre ajouté: **$pseudo#$tag**\nAvis: **$avis**",
              
              
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
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}
?>



<h1>Add</h1>
<form method="POST" action="add.php">
<input type="text" name="id" placeholder="ID du mec">
<input type="number" name="genance" placeholder="Combien d'etoile en gênance (MAX 5)">
<input type="number" name="debile" placeholder="Combien d'etoile en débilité (MAX 5)">
<input type="text" name="avis" placeholder="Avis global">
<input type="submit" name="submit">

</form>