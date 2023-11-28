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
  
  //On définit le mode d'erreur de PDO sur Exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();}
                                    
    $pseudo = strtoupper($_SESSION['nom']);    
	$req = $conn->prepare("SELECT * FROM demandeur_cv WHERE Pseudo = :pseudo");
	$req->setFetchMode(PDO::FETCH_ASSOC);
	$req->bindValue(':pseudo', $pseudo);
	$req->execute();
	$resultat = $req->fetchAll();
	$img =  $resultat[0]["Photo"];
	if (isset($_FILES['Photo'])) {
	$pic=file_get_contents( $_FILES['Photo']['tmp_name']);}

	

   
	
  ?>
  <header>
      <nav>
        <a href="acceuilcondidat.html" id="logo">khadamny</a>
        <i class="fas fa-bars" id="ham-menu"></i>
        <ul id="nav-bar">
          <li>
            <a href="acceuilcondidat.php">Acceuil</a>
          </li>
          
        
          <li>
            <a href="acc2.php">Touver un emploi</a>
          </li>
         
          <li>
            <a href="apropos.html">A propos</a>
          </li>
          <li>
     <?php echo '<img src="data:image/png;base64,' . base64_encode($resultat[0]["Photo"]) . '" style="width:50px; height:50px;   border-radius: 40%;" />' 
    ?></li><li><br>
      <p style="color: white; font-size: 16px;"><?php  echo  $pseudo ; ?></p>
          </li>
        </ul>
      </nav>
    </header>



	  
	<section class="tabtoub">
	
	  <main class="st_viewport">
	  <?php
   
    $code="";
	
   
   
		
   
   
  
    // afficher les résultats dans un tableau HTML
    echo '<h1 class="titre">Ma liste des candidatures</h1>';
    echo '<div class="st_wrap_table" data-table_id="0">';
    echo '<header class="st_table_header" style="padding-left: 0px;">';
    echo '<h2>Les candidatures en cours</h2>';
    echo '<div class="st_row">';
    echo '<div class="st_column _rank">Titre</div>';
    echo '<div class="st_column _name">Nom société</div>';
    echo '<div class="st_column _surname">Salaire proposé</div>';
    echo '<div class="st_column _year">Etat</div>';
    echo '<div class="st_column _section">Date candidature</div>';
    echo '</div>';
    echo '</header>';
    echo '<div class="st_table">';
	$req1 = $conn->prepare("SELECT * FROM candidature WHERE Pseudo = :pseudo ");
	$req1->bindValue(':pseudo', $pseudo);
	$req1->execute();
	$resultats1 = $req1->fetchAll(PDO::FETCH_ASSOC);
	
foreach ($resultats1 as $resultat1) {
	if ($resultat1['Etat_condidature'] == 0) {
	$code = $resultat1['code_offre_emploi'];
	$etat="En cours";
	
	$req2 = "SELECT * FROM offre_emploi WHERE Code_offre_emploi = :code";
	$stmt2 = $conn->prepare($req2);
	$stmt2->bindValue(':code', $code);	
	$stmt2->execute();
	$resultats2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
	
	
	if (isset($resultats2[0]['Salaire_propose'])) {
		$sal = $resultats2[0]['Salaire_propose'];
	}
	if (isset($resultats2[0]['Titre'])) {
		$Titre = $resultats2[0]['Titre'];
	}
	$req22 = "SELECT * FROM employeur_offre WHERE Code_offre_emploi = :code";
	$stmt22 = $conn->prepare($req22);
	$stmt22->bindValue(':code', $code);	
	$stmt22->execute();
	$resultats22 = $stmt22->fetchAll(PDO::FETCH_ASSOC);
	
	if (isset($resultats22[0]['ID_offreur'])) {
		$IDD = $resultats22[0]['ID_offreur'];
	}
	$req222 = "SELECT * FROM employeur WHERE ID = :IDD";
	$stmt222 = $conn->prepare($req222);
	$stmt222->bindValue(':IDD', $IDD);	
	$stmt222->execute();
	$resultats222 = $stmt222->fetchAll(PDO::FETCH_ASSOC);
	
	if (isset($resultats222[0]['Nom_entreprise'])) {
		$nomes = $resultats222[0]['Nom_entreprise'];
	}

	
	echo '<div class="st_row">';
	echo '<div class="st_column _rank">' . $Titre . '</div>';
	echo '<div class="st_column _name">' . 	$nomes . '</div>';
	echo '<div class="st_column _surname">' . $sal . '</div>';
	echo '<div class="st_column _year">' . $etat . '</div>';
	echo '<div class="st_column _section">' . "En attent de reponse" . '</div>';
	echo '</div>';
}}

    echo '</div>';
    echo '</div>';
?>
		
		<?php
   
   $code="";
   
  
  
	   
  
  
 
   // afficher les résultats dans un tableau HTML
   echo '<div class="st_wrap_table" data-table_id="0">';
   echo '<header class="st_table_header" style="padding-left: 0px;">';
   echo '<h2>Les candidatures Acceptés</h2>';
   echo '<div class="st_row">';
   echo '<div class="st_column _rank">Titre</div>';
   echo '<div class="st_column _name">Nom société</div>';
   echo '<div class="st_column _surname">Salaire proposé</div>';
   echo '<div class="st_column _year">Etat</div>';
   echo '<div class="st_column _section">Date candidature</div>';
   echo '</div>';
   echo '</header>';
   echo '<div class="st_table">';
   $req1 = $conn->prepare("SELECT * FROM candidature WHERE Pseudo = :pseudo ");
   $req1->bindValue(':pseudo', $pseudo);
   $req1->execute();
   $resultats1 = $req1->fetchAll(PDO::FETCH_ASSOC);
   
foreach ($resultats1 as $resultat1) {
   if ($resultat1['Etat_condidature'] == 1) {
   $code = $resultat1['code_offre_emploi'];
   $etat="Accepté";
   
   $req2 = "SELECT * FROM offre_emploi WHERE Code_offre_emploi = :code";
   $stmt2 = $conn->prepare($req2);
   $stmt2->bindValue(':code', $code);	
   $stmt2->execute();
   $resultats2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
   
   
   if (isset($resultats2[0]['Salaire_propose'])) {
	   $sal = $resultats2[0]['Salaire_propose'];
   }
   if (isset($resultats2[0]['Titre'])) {
	   $Titre = $resultats2[0]['Titre'];
   }
   $req22 = "SELECT * FROM employeur_offre WHERE Code_offre_emploi = :code";
   $stmt22 = $conn->prepare($req22);
   $stmt22->bindValue(':code', $code);	
   $stmt22->execute();
   $resultats22 = $stmt22->fetchAll(PDO::FETCH_ASSOC);
   
   if (isset($resultats22[0]['ID_offreur'])) {
	   $IDD = $resultats22[0]['ID_offreur'];
   }
   $req222 = "SELECT * FROM employeur WHERE ID = :IDD";
   $stmt222 = $conn->prepare($req222);
   $stmt222->bindValue(':IDD', $IDD);	
   $stmt222->execute();
   $resultats222 = $stmt222->fetchAll(PDO::FETCH_ASSOC);
   
   if (isset($resultats222[0]['Nom_entreprise'])) {
	   $nomes = $resultats222[0]['Nom_entreprise'];
   }

   
   echo '<div class="st_row">';
   echo '<div class="st_column _rank">' . $Titre . '</div>';
   echo '<div class="st_column _name">' . 	$nomes . '</div>';
   echo '<div class="st_column _surname">' . $sal . '</div>';
   echo '<div class="st_column _year">' . $etat . '</div>';
   echo '<div class="st_column _section">' . $resultats1['Date_condidature'] . '</div>';
   echo '</div>';
}}

   echo '</div>';
   echo '</div>';
?>
	
	<?php
   
   $code="";
   
  
  
	   
  
  
 
   // afficher les résultats dans un tableau HTML
   echo '<div class="st_wrap_table" data-table_id="0">';
   echo '<header class="st_table_header" style="padding-left: 0px;">';
   echo '<h2>Les candidatures Refusées</h2>';
   echo '<div class="st_row">';
   echo '<div class="st_column _rank">Titre</div>';
   echo '<div class="st_column _name">Nom société</div>';
   echo '<div class="st_column _surname">Salaire proposé</div>';
   echo '<div class="st_column _year">Etat</div>';
   echo '<div class="st_column _section">Date candidature</div>';
   echo '</div>';
   echo '</header>';
   echo '<div class="st_table">';
   $req1 = $conn->prepare("SELECT * FROM candidature WHERE Pseudo = :pseudo ");
   $req1->bindValue(':pseudo', $pseudo);
   $req1->execute();
   $resultats1 = $req1->fetchAll(PDO::FETCH_ASSOC);
   
foreach ($resultats1 as $resultat1) {
   if ($resultat1['Etat_condidature'] == 2) {
   $code = $resultat1['code_offre_emploi'];
   $etat="Refusé";
   
   $req2 = "SELECT * FROM offre_emploi WHERE Code_offre_emploi = :code";
   $stmt2 = $conn->prepare($req2);
   $stmt2->bindValue(':code', $code);	
   $stmt2->execute();
   $resultats2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
   
   
   if (isset($resultats2[0]['Salaire_propose'])) {
	   $sal = $resultats2[0]['Salaire_propose'];
   }
   if (isset($resultats2[0]['Titre'])) {
	   $Titre = $resultats2[0]['Titre'];
   }
   $req22 = "SELECT * FROM employeur_offre WHERE Code_offre_emploi = :code";
   $stmt22 = $conn->prepare($req22);
   $stmt22->bindValue(':code', $code);	
   $stmt22->execute();
   $resultats22 = $stmt22->fetchAll(PDO::FETCH_ASSOC);
   
   if (isset($resultats22[0]['ID_offreur'])) {
	   $IDD = $resultats22[0]['ID_offreur'];
   }
   $req222 = "SELECT * FROM employeur WHERE ID = :IDD";
   $stmt222 = $conn->prepare($req222);
   $stmt222->bindValue(':IDD', $IDD);	
   $stmt222->execute();
   $resultats222 = $stmt222->fetchAll(PDO::FETCH_ASSOC);
   
   if (isset($resultats222[0]['Nom_entreprise'])) {
	   $nomes = $resultats222[0]['Nom_entreprise'];
   }

   
   echo '<div class="st_row">';
   echo '<div class="st_column _rank">' . $Titre . '</div>';
   echo '<div class="st_column _name">' . 	$nomes . '</div>';
   echo '<div class="st_column _surname">' . $sal . '</div>';
   echo '<div class="st_column _year">' . $etat . '</div>';
   echo '<div class="st_column _section">' . $resultats1['Date_condidature'] . '</div>';
   echo '</div>';
}}

   echo '</div>';
   echo '</div>';
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
		<h3>Abonnez-vous</h3>
		
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
	  <p>Copyright &copy; 2021 Walid Bechri and Med Chrif mastouri | All Rights Reserved</p>
	</div>
  </footer>
</body> 
</html>