<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Navigation Bar</title>
 
    <!-- Stylesheet -->
	<link
	rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
  />
  <!-- Google Fonts -->
  <link
	href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap"
	rel="stylesheet"
  />
  <!-- Stylesheet -->
    <link rel="stylesheet" href="connecter.css" />
	<script src="conecter.js"></script>
  </head>
  <body> 
  <?php
$servername ="localhost";
$username="root";
$password = "";

// pour tester l'erreur on se connecte à une base inexistancte "bureau_emploi"
$conn = new PDO("mysql:host=$servername;dbname=bureau_emploi", $username, $password);
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();}
    $pseudo = strtoupper($_SESSION['nom']);  
//On définit le mode d'erreur de PDO sur Exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$image_html = '<img src="https://upload.wikimedia.org/wikipedia/en/thumb/f/ff/Morning_Glory_Flower_square.jpg/1024px-Morning_Glory_Flower_square.jpg">';



 
	




?>
	<header>
	<nav>
        <a href="acceuilemployeur.php" id="logo">khadamny</a>
        <i class="fas fa-bars" id="ham-menu"></i>
        <ul id="nav-bar">
          <li>
            <a href="acceuilemployeur.php">Acceuil</a>
          </li>
          <li>
            <a href="#">A propos</a>
          </li>

          <li>
            <a href="offre2.php">Proposer une offre</a>
          </li>
          <li>
            <a href="acc3.php">Voir Marché</a>
            </li>          
            <p class="log"><?php  echo $pseudo ;?></p>
          </li>
        </ul>
      </nav>
	  </header>



	  
	<section class="tabtoub">
		
   
	  <main class="st_viewport">

	  <?php
   $co=""; 
   $co1=""; 
   $co3="";
   $co4=""; 
   $co6="";
    $co7=""; 
	$co8="";
	 $co9=""; 
	 $co10="";
	   $cod="";
	   $co11="";
	   $cod1="";
	   $cod4="";
	   $cod5="";
	   $cod2="";
	   $cod3="";
	   $cod11="";
	   $cod9="";
 
   // afficher les résultats dans un tableau HTML
   echo '<h1 class="titre">Ma liste des condidats</h1>';
   echo '<div class="st_wrap_table" data-table_id="0">';
   echo '<header class="st_table_header" style="padding-left: 0px;">';

   echo '<div class="st_row">';
  echo' <div class="st_column _rank">Score </div>';
  echo'<div class="st_column _year">Photo</div>';
  echo'<div class="st_column _year">Nom </div>';
  echo'<div class="st_column _year">Adresse</div>';
  echo' <div class="st_column _year">Tel</div>';
  echo'<div class="st_column _year">  Competences</div>';
  echo'<div class="st_column _year">Diplômes</div>';
  echo'<div class="st_column _year">Date de naissance</div>';
  echo'<div class="st_column _year">Etat civil</div>';
  echo'<div class="st_column _year">Université</div>';
  echo'<div class="st_column _year">Experience</div>';
  echo'<div class="st_column _year">Reponse</div>';		  
  echo'</div>';
  echo'</header>';
  echo' <div class="st_table">';
  echo'<div class="st_row">';

  $req1 = $conn->prepare("SELECT Code_registre_commerce FROM employeur where Pseudo = :pseudo ");
  $req1->bindValue(':pseudo', $pseudo);
  $req1->execute();
  
  $resultats1 = $req1->fetch(PDO::FETCH_ASSOC);
  $co = $pseudo;
  $co1 = $resultats1['Code_registre_commerce'] ?? null;
  
  $req2 = $conn->prepare("SELECT code_offre_emploi FROM employeur_offre WHERE Code_registre_commerce = :co1");
  $req2->bindValue(':co1', $co1);
  $req2->execute();
  $resultats2 = $req2->fetchAll(PDO::FETCH_ASSOC);
  
  if(count($resultats2) > 0) {
	$co3 = $resultats2[0]['code_offre_emploi'];
  } else {
	// aucun résultat trouvé
	$co3 = null;
  }
  
	
  $req3 = $conn->prepare("SELECT Pseudo FROM candidature WHERE code_offre_emploi = :co3");
  $req3->bindParam(':co3', $co3);
  $req3->execute();
  $resultats3 = $req3->fetchAll(PDO::FETCH_ASSOC);
  foreach ($resultats3 as $resultat3) {
	$co4 = $resultat3['Pseudo'];
  } 
  

	$req4 = $conn->prepare("SELECT ID,CIN,Nom_prenom,Photo,Date_naissance,Etat_civil,Adresse,Num,Code_universite,Nb_annee_exp FROM demandeur_cv where Pseudo= :co4 ");
$req4->bindValue(':co4', $co4); // Lié le paramètre :co4 à la variable $pseudo
$req4->execute();
$resultats4 = $req4->fetchAll(PDO::FETCH_ASSOC);

if ($resultats4) {
    $co6 = $resultats4[0]['CIN'];
    $co7 = $resultats4[0]['ID'];
    $co8 = $resultats4[0]['Code_universite'];
    $cod = $resultats4[0]['Nom_prenom'];
    $cod1 = $resultats4[0]['Photo'];
    $cod2 = $resultats4[0]['Date_naissance'];
    $cod3 = $resultats4[0]['Etat_civil'];
    $cod4 = $resultats4[0]['Adresse'];
    $cod5 = $resultats4[0]['Num'];
    $cod9 = $resultats4[0]['Nb_annee_exp'];
} else {
    // Traitement si aucune ligne n'est retournée
}



$req5 = $conn->prepare("SELECT code_competence FROM competence_demandeur WHERE Cin = :co6");
$req5->bindValue(':co6', $co6);
$req5->execute();
$co9 = "";
while ($code_competence = $req5->fetchColumn()) {
    $co9 .= $code_competence . ", "; 
}


$req6 = $conn->prepare("SELECT code_diplome FROM diplome_demandeur where ID_demandeur= :co7 ");
$req6->bindValue(':co7', $co7, PDO::PARAM_INT);
$req6->execute();
$resultats6 = $req6->fetchAll(PDO::FETCH_ASSOC);
foreach($resultats6 as $resultat6) {
  $co10 = $resultat6['code_diplome'];
}

$req7 = $conn->prepare("SELECT Libelle_universite FROM universite where Code_universite= :co8 ");
$req7->bindParam(':co8', $co8);
$req7->execute();
$resultats7 = $req7->fetchAll(PDO::FETCH_ASSOC);
foreach($resultats7 as $resultat7) {
    $co11 = $resultat7['Libelle_universite'];
}




		  echo'<div class="st_row">';
		  echo'  <div class="st_column _rank"> </div>';
	  $image_encodee = base64_encode($cod1);
		  echo '<div class="st_column _year"><img class="im" src="data:image/jpeg;base64,'.$image_encodee.'" ></div>';				
	  echo' <div class="st_column _year"> '.$cod.'</div>';
		  echo'<div class="st_column _year">'.$cod4.'</div>';
		  echo'<div class="st_column _year">'.$cod5.'</div>';
		  echo'<div class="st_column _year">'.$co9.'</div>';
		  echo'<div class="st_column _year">'.$co10.'</div>';
		  echo'<div class="st_column _year">'.$cod2.'</div>';
		  echo' <div class="st_column _year">'.$cod3.'</div>';
	  echo' <div class="st_column _year">'.$co11.'</div>';
	  echo'<div class="st_column _year">'.$cod9.'</div>';
		  echo'<div class="st_column _year"><input type="radio" id="accepter" name="choix" value="accepter">
		  <label for="accepter">Accepter</label>
		  
		  <input type="radio" id="refuser" name="choix" value="refuser">
		  <label for="refuser">Refuser</label>
		  </div>';
		
?>


		</div>    




	

	
			
         
		  
	
		
	
	  </main>


    </section>
	  
<footer>
	<div class="row primary">
	  <div class="column about">
		<h3>Khadamny</h3>
		<p>
		  Ce site web est une plateforme qui facilite la recherche d'emploi en mettant en relation les demandeurs d'emploi et les entreprises proposant des offres d'emploi. Les utilisateurs peuvent consulter les offres d'emploi disponibles et postuler directement en ligne, ou proposer leurs propres offres d'emploi.
		</p>
	  </div>	
	  <div class="column links">
		<h3>Quick Links</h3>
		<ul class="wal">
		  <li class="wi">
			<a href="#faq">F.A.Q</a>
		  </li>
		  <li class="wi">
			<a href="#cookies-policy">Cookies Policy</a>
		  </li>
		  <li class="wi">
			<a href="#terms-of-services">Terms Of Service</a>
		  </li>
		  <li class="wi">
			<a href="#support">Support</a>
		  </li>
		  <li class="wi">
			<a href="#careers">Careers</a>
		  </li>
		</ul>
	  </div>
	  <div class="column subscribe">
		<h3>Subscribe</h3>
		<div>
		  <input type="email" placeholder="Your email id here" />
		  <button class="btn">Subscribe</button>
		</div>
		<div class="social">
		  <i class="fa-brands fa-facebook-square"></i>
		  <i class="fa-brands fa-instagram-square"></i>
		  <i class="fa-brands fa-twitter-square"></i>
		</div>
	  </div>
	</div>
	<div class="row secondary">
	  <div>
		<p>
		  <i class="fas fa-phone-alt"></i>
		</p>
		<p>+216 00 000 000</p>
	  </div>
	  <div>
		<p><i class="fas fa-envelope"></i></p>
		<p>walidchrif@gmail.com</p>
	  </div>
	  <div>
		<p><i class="fas fa-map-marker-alt"></i></p>
		<p>isg tunis</p>
	  </div>
	</div>
	<div class="row copyright">
	  <p>Copyright &copy; 2021 walid bechri and med Crif mastouri | All Rights Reserved</p>
	</div>
  </footer>
</body> 
</html>