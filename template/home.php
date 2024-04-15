<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion de projet en PHP</title>
  <script src="https://kit.fontawesome.com/1f8e94d034.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>


  <div class="container2">
    <div>
      <?php
      include("../template/partiel/menu.html.php");
      ?>
    </div>
    <div class="content">
      <?php
      $file = array(
        "1" => "promotion_controll",
        "2" => "promo_controll",
        "3" => "ref_controll",
        "4" => "referent_controll",
        "5" => "utilisateur_controll",
        "6" => "presence_controll",
      );

      if (isset($_GET["m"]) && in_array($_GET["m"], array_keys($file))) {
        $m = $file[$_GET["m"]];

      
        include("../template/partiel/header.html.php");
        require_once '../controlleur/' . $m . '.php';
        
        include "../template/partiel/footer.html.php";
      } else {
        include "../template/connexion.html.php";
      }
      ?>

    </div>
  </div>
</body>

</html>

