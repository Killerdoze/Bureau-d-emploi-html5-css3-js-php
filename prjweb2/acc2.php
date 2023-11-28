




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
    <link rel="stylesheet" href="acc.css" />
	<script src="conecter.js"></script>
	 <!-----////////////////////////////////////////////////code php pure//////////////////////////////////////////////////////////////////////////////////////// -->
       
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

$req2 = "SELECT * FROM offre_emploi";
$stmt = $conn->prepare($req2);
$stmt->execute();
$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
$image_html = '<img src="https://upload.wikimedia.org/wikipedia/en/thumb/f/ff/Morning_Glory_Flower_square.jpg/1024px-Morning_Glory_Flower_square.jpg">';
$codes_competence = "";
$codes_diplome = "";
$sal = 0;
$id_employeurr = null;
$req = $conn->prepare("SELECT * FROM demandeur_cv WHERE Pseudo = :pseudo");
$req->setFetchMode(PDO::FETCH_ASSOC);
$req->bindValue(':pseudo', $pseudo);
$req->execute();
$resultat = $req->fetchAll();
if (!empty($resultat)) {
    $id_employeurr = $resultat[0]['ID'];
}

if (isset($_FILES['Photo'])) {
$pic=file_get_contents( $_FILES['Photo']['tmp_name']);
}
$codes_competence_employeur = "";
	$reqt = $conn->prepare("SELECT * FROM competence_demandeur WHERE ID_demandeur = :id_employeurr");
	$reqt->setFetchMode(PDO::FETCH_ASSOC);
	$reqt->bindValue(':id_employeurr', $id_employeurr);
	$reqt->execute();
	$resultatst = $reqt->fetchAll();
	if (count($resultatst) > 0) {
		foreach ($resultatst as $resultatt) {
			$codes_competence_employeur .= $resultatt['code_competence']. '/';
			
		}
		
		$codes_competence_employeur = rtrim($codes_competence_employeur, '/');

	}  
	$codes_diplome_employeur = "";
	$reqtt = $conn->prepare("SELECT * FROM diplome_demandeur WHERE ID_demandeur = :id_employeurr");
	$reqtt->setFetchMode(PDO::FETCH_ASSOC);
	$reqtt->bindValue(':id_employeurr', $id_employeurr);
	$reqtt->execute();
	$resultatstt = $reqtt->fetchAll();
	if (count($resultatstt) > 0) {
		foreach ($resultatstt as $resultattt) {
			$codes_diplome_employeur .= $resultattt['code_diplome']. '/';
			
		}
		$codes_diplome_employeur = rtrim($codes_diplome_employeur, '/');
	}
	$demandeurCompetences = explode("/", $codes_competence_employeur);
	$demandeurdiplomes = explode("/", $codes_diplome_employeur);

// affichage du score de l'offre







?>
  <!-----////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/> -->
  </head>
  <body> 
  <header>
      <nav>
        <a href="acceuilcondidat.html" id="logo">khadamny</a>
        <i class="fas fa-bars" id="ham-menu"></i>
        <ul id="nav-bar">
          <li>
            <a href="acceuilcondidat.php">Acceuil</a>
          </li>
          
        
          <li>
            <a href="condidature.php">Mes condidatures</a>
          </li>
         
          <li>
            <a href="apropos.html">A propos</a>
          </li>
          <li>
          <?php echo '<img src="data:image/png;base64,' . base64_encode($resultat[0]["Photo"]) . '" style="width:50px; height:50px;   border-radius: 40%;" />'
    ?></li><li><br>
      <p class="log"><?php  echo  $pseudo ; ?></p>
          </li>
        </ul>
      </nav>
    </header>
	 
<section class="bodi" >




        <div class="container">
            <p></p>
			<p></p>
			<p></p>
			<p></p><br><br>
			<br>
			<br><br>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

       

            

		
 
<head>
  <link rel="stylesheet" href="acc.css">
</head>

<div class="row">
  <?php foreach ($resultats as $resultat) { 
	$code = $resultat['Code_offre_emploi'];
	$req2 = "SELECT * FROM offre_emploi WHERE Code_offre_emploi = :code";
	$stmt2 = $conn->prepare($req2);
	$stmt2->bindValue(':code', $code);	
	$stmt2->execute();
	$resultats2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

	$codes_competence_offrerur = "";
	$reqtt = $conn->prepare("SELECT * FROM offre_competence WHERE Code_offre_emploi = :code");
	$reqtt->setFetchMode(PDO::FETCH_ASSOC);
	$reqtt->bindValue(':code', $code);
	$reqtt->execute();
	$resultatstt = $reqtt->fetchAll();
	if (count($resultatstt) > 0) {
		foreach ($resultatstt as $resultattt) {
			$codes_competence_offrerur .= $resultattt['code_competence']. '/';
			
		}
		
		$codes_competence_offrerur = rtrim($codes_competence_offrerur, '/');}
		$offreurcompetences = explode("/", $codes_competence_offrerur);

		$codes_diplome_offrerur = "";
		$reqttt = $conn->prepare("SELECT * FROM offre_diplome WHERE Code_offre_emploi = :code");
		$reqttt->setFetchMode(PDO::FETCH_ASSOC);
		$reqttt->bindValue(':code', $code);
		$reqttt->execute();
		$resultatsttt = $reqttt->fetchAll();
		if (count($resultatsttt) > 0) {
			foreach ($resultatsttt as $resultatttt) {
				$codes_diplome_offrerur .= $resultatttt['code_diplome']. '/';
				
			}
			
			$codes_diplome_offrerur = rtrim($codes_diplome_offrerur, '/');}
			$offreurdiplomes = explode("/", $codes_diplome_offrerur);
	
	foreach ($resultats2 as $resultat2) {
		if (isset($resultat2['Salaire_propose'])) {
			$sal = $resultat2['Salaire_propose'];
			break; // Sortir de la boucle dès que la première occurrence avec un Salaire_propose est trouvée
		}
	}
	// score initial à 0
$scoreOffre = 0;

// ajout de 5 points pour chaque compétence commune avec l'offre
foreach ($offreurcompetences as $competence) {
	if (in_array($competence, $demandeurCompetences)) {
	  $scoreOffre += 5;
	}
  }
  $scoreOffre += (int) ($sal/100);
  $test =0;

foreach ($offreurdiplomes as $diplome) {
    if (in_array($diplome, $demandeurdiplomes)) {
         $test=1; // si au moins un diplôme offert correspond à un diplôme demandé, le scoreOffre est égal à 1
        break; // sortir de la boucle car le score a été trouvé
    }
}

if ($test == 1) {
    // aucun diplôme offert ne correspond à un diplôme demandé, le score est donc égal à 0
	$scoreOffre;
} else {
    // au moins un diplôme offert correspond à un diplôme demandé, le score est donc égal à 1
	$scoreOffre =$scoreOffre *0 ;
}


	
	?>
    <div class="col-md-offset-1 col-md-5 col-xs-12">
      <div class="card horizontal">
        <div class="card-image">
        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/f/ff/Morning_Glory_Flower_square.jpg/1024px-Morning_Glory_Flower_square.jpg">

        </div>
        <div class="card-stacked">
          <div class="card-content">
            <h3 class="walid"><?php echo $resultat['Titre']; ?></h3>
            <p><?php echo $resultat['Description']; ?> Salaire s'eleve à : <?php echo $resultat['Salaire_propose']; ?></p>
            <h4 class="walid"><?php echo "Score : " ;echo $scoreOffre ; ?></h4>
			<h5 class="walid"><?php echo " Le score signifie votre chance  chez l'mployeur de l'acceptation de l'offre"  ; ?></h5><br>

			
			
            <a href="detail.php?code=<?php echo $resultat['Code_offre_emploi']; ?>" class="btn btn-styled" target="_blank">Cliquez ici pour voir les details</a><br>
			
            


            
          </div>
        </div>
      </div>
    </div>
   <?php } ?>
</div>

	
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
			<div class="column subscribe">
				
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