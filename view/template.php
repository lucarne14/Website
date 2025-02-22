<?php require_once __DIR__.'/../links.php';
header('Cache-Control: private',true);
?>
<!DOCTYPE html>
<html>
<head>
  <title>BenevoLink</title>
  <meta charset="utf-8">
  <link rel ="stylesheet" href="<?= BF::abs_path("CSS/main.css")?>">
  <link rel="icon" type="image/x-icon" sizes="16x16" href="<?= BF::abs_path("media/img/Logo_3.png") ?>"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

  <script src="<?= BF::abs_path("JS/jquery.js")?>"></script>
  <?php include __DIR__."/../JS/abs_path.php";?>
  <script src="<?= BF::abs_path("JS/main.js")?>"></script>
  <?php require_once BF::abs_path("JS/abs_path.php",true); ?>
  
</head>
<header>
  
</header>
<style>

  /* Contenu du fichier barre_menu.css */
.search_barre {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  display: inline;
  
 
}

.search_btn {
  padding: 8px 12px;
  background-color: #4CAF50;
  border: none;
  color: white;
  font-size: 16px;
  cursor: pointer;
  display:inline;
 
}


#recherche2{
  background-color: #ffffff;
  font-family: Corps;
  src: url(fonts/Nexa.woff2) format("woff2");
  font-size: 17px;
  
}

#boutonlogo3 {
    max-width: 13%; /* Vous pouvez ajuster le pourcentage selon la taille souhaitée */
    height: auto; /* Cela maintiendra les proportions de l'image */
}

#barre_2{
  src: url(fonts/Nexa.woff2) format("woff2");
  font-size:16px;
}

  .logo-img {
      display: block; /* Assurez-vous que l'image est affichée en tant que bloc */
      margin: 0 auto;  /* Centre l'image horizontalement */
      max-width: 30%; /* Garantit que l'image ne dépasse pas la largeur de son parent */
      height: auto;    /* Ajuste la hauteur en conséquence pour maintenir le ratio d'aspect */
  }



</style>
<?php
if(!(isset($iframe) ? 1 : 0)){
      ?>
<ul id="barre_titre">
<!--Barre principale du menu contenant les sous catégories-->
    <img href="<?= BF::abs_path("index.php") ?>" src="<?= BF::abs_path("media/img/benevolink2.jpg") ?>" alt="Logo de l'image" id="benevolink" onclick="window.location.href = '<?= BF::abs_path('index.php') ?>'">
    <!-- <li><a href="index.php">Accueil</a></li> -->
    <li><a href="<?= BF::abs_path("controller/missions.php")?>">Missions</a></li>
  <?php
  
  
  if(BF::is_connected()){
    ?><li><a href="<?= BF::abs_path("controller/planning.php") ?>">Planning</a></li><?php
  }
    
  ?>
    <li><a href="<?= BF::abs_path("controller/asso/associations_user.php")?>">Associations</a></li>
    <?php 
      if(!BF::is_connected()){
        ?>
        <li style="cursor: pointer;"><a onclick="authentification();">Se connecter</a></li>
        <?php
      }else{
        $pseudo = BF::request("SELECT prenom FROM users WHERE id = ?",[$_SESSION["user_id"]],true)[0][0];
        ?>
        <li><a href="<?= BF::abs_path("controller/gestion_compte/mon_compte.php")?>"> <img id="logo_barre" style="width: 30px;height: 30px;border: 3px solid black;border-radius: 30px;position: absolute; transform: translate(-40px,0px);" src="<?= BF::abs_path("/media/img/user_anonyme.jpg")?>"/><?= $pseudo; ?></a></li>
        <?php
      }
    ?>
    

 
  
  </ul>

  <div class="container">
      <div class="row">
          <div class="col-xs-6">
              <a href="<?= BF::abs_path('index.php') ?>"><img id="boutonlogo2" src="<?= BF::abs_path("media/img/benevolink2.jpg") ?>" class="logo-img" alt="Logo"></a>
          </div>
      </div>
  </div>
  
<div class="navbar navbar-default navbar-shadow" id="bs-example-navbar-collapse-1">
   <a class="navbar-brand" href="#"> <img id="boutonlogo3" src="<?= BF::abs_path("media/img/benevolink3.png") ?>" onclick="window.location.href = '<?= BF::abs_path('index.php') ?>'"></a>
  <ul class="nav navbar-nav" id="recherche2">
    <li class="active"><a href="<?= BF::abs_path("controller/asso/associations_user.php")?>"> <span class="text-success">Associations</span></a></li>
    <li><a href="<?= BF::abs_path("controller/missions.php")?>"> <span class="text-success"> Missions </span> </a></li>
  </ul>
  <form class="navbar-form navbar-left" action="<?= BF::abs_path("controller/search.php")?>" method="get">
    <div class="form-group">
      <input type="text"  class="form-control input-large" placeholder="Rechercher une mission ou association">
    </div>
    <button type="submit" class="btn btn-default input-large">Rechercher</button>
  </form>

  
  
  <ul class="nav navbar-nav navbar-right" id="barre_2">
    <li class="dropdown">
      <!-- mettre Se connecter si pas co, sinon afficher le nom de l'utilisateur -->
      <?php 
      if(!BF::is_connected()){
        ?>
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" onclick="authentification();">Se connecter <span class="caret"></span></a>
        <?php
      }else{
        $pseudo = BF::request("SELECT prenom FROM users WHERE id = ?",[$_SESSION["user_id"]],true)[0][0]; 
        ?> 
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <img id="logo_barre" style="width: 30px;height: 30px;border: 3px solid black;border-radius: 30px;position: absolute; transform: translate(-40px,0px);" src="<?= BF::abs_path("/media/img/user_anonyme.jpg")?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $pseudo; ?><span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#">Mon profil</a></li>
          <li><a href="#">Mes associations</a></li>
          <li><a href="#">Mes missions</a></li>
          <li><a href="<?= BF::abs_path("controller/planning.php")?>"> Mon planning </a> </li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Se déconnecter</a></li>
        </ul>
        <?php } ?>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>

   <script>

     
    //Affiche l'avatar de l'utilisateur.
     let xhttp_barre = new XMLHttpRequest();
    xhttp_barre.open("GET", "<?= BF::abs_path("/functions/ajax/user_logo.php")?>");
    xhttp_barre.onload = function(){
       const xmlDoc = xhttp_barre.responseXML;
       if(xmlDoc != null){ //On vérifie que la réponse n'est pas nulle
         const x = xmlDoc.getElementsByTagName("response");
         if(x.length == 1){
           $("#logo_barre").attr({
             src: x[0].innerHTML
           });
         }
       }
    }
     xhttp_barre.send();
   </script>
   <?php }?>
<body <?php if(isset($iframe) ? 1 : 0){ echo 'style="min-height: 0;"';} ?>>
  <!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <!-- Le contenu  -->
    <?= $content ?>
    <!-- Fin contenu  -->
</body>

<?php if(!(isset($iframe) ? 1 : 0)){
        ?>

  <footer>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
  <p class="navbar-text"></p>

  <p class="navbar-form navbar-right"> Nous contacter : <a href="#" class="navbar-link">projetg1g2@gmail.com</a><br>
  <a href="#" class="navbar-link">Politique de confidentialité</a>
    <br>
  <a href="#" class="navbar-link">Mention légale</a>  
  </p>
  </footer>


<!-- <footer id="footer" class="p-0">
    <div class="container pt-6 pb-5">
    
     <h1>Quelques informations</h1>
    
      <ul>
       <li>Nous contacter : projetg1g2@gmail.com</li>
       <li><a href="<?= BF::abs_path("controller/static/equipe.php") ?>">Qui nous sommes</a></li> -->
      <!-- </ul>
    </div>
    
  </footer> -->
<?php } ?>
