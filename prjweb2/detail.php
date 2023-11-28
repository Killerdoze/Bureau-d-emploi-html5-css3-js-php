
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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


 

  // récupère la valeur de code dans l'URL
  $ID = $_GET['code']; //code_offre_emploi
  $req = "SELECT * FROM offre_emploi WHERE Code_offre_emploi =:ID";
  $stmt = $conn->prepare($req);
  $stmt->bindValue(':ID', $ID);
  $stmt->execute();
  $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $req2 = "SELECT * FROM offre_competence WHERE Code_offre_emploi = :ID";
  $stmt2 = $conn->prepare($req2);
  $stmt2->bindValue(':ID', $ID);
  $stmt2->execute();
  $resultats2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
  $codes_competence = '';
  
  foreach ($resultats2 as $resultat) {
    $codes_competence .= $resultat['code_competence'] . '/';
  }
  
  // Retirer le dernier caractère "/" de la chaîne résultante
  $codes_competence = rtrim($codes_competence, '/');
  $req23 = "SELECT * FROM offre_diplome WHERE Code_offre_emploi = :ID";
  $stmt23 = $conn->prepare($req23);
  $stmt23->bindValue(':ID', $ID);
  $stmt23->execute();
  $resultats23 = $stmt23->fetchAll(PDO::FETCH_ASSOC);
  $codes_diplome = '';
  
  foreach ($resultats23 as $resultat3) {
    $codes_diplome .= $resultat3['code_diplome'] . '/';
  }
  
  // Retirer le dernier caractère "/" de la chaîne résultante
  $codes_diplome = rtrim($codes_diplome, '/');
  
  $req4 = "SELECT * FROM employeur_offre WHERE Code_offre_emploi =:ID";
  $stmt4 = $conn->prepare($req4);
  $stmt4->bindValue(':ID', $ID);
  $stmt4->execute();
  $resultats4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
  if (!empty($resultats4)) {
    $ID_employeur = $resultats4[0]['ID_offreur'];
}
  $req45 = "SELECT * FROM employeur WHERE ID =:ID_employeur";
  $stmt45 = $conn->prepare($req45);
  $stmt45->bindValue(':ID_employeur', $ID_employeur);
  $stmt45->execute();
  $resultats45= $stmt45->fetchAll(PDO::FETCH_ASSOC);

$req = $conn->prepare("SELECT * FROM demandeur_cv WHERE Pseudo = :pseudo");
$req->setFetchMode(PDO::FETCH_ASSOC);
$req->bindValue(':pseudo', $pseudo);
$req->execute();
$resultat = $req->fetchAll();
$img =  $resultat[0]["Photo"];
if (isset($_FILES['Photo'])) {
$pic=file_get_contents( $_FILES['Photo']['tmp_name']);}
if(isset($_POST["Enregistrer"])) {
  $date=date('Y-m-d H:i:s');
  $Avis = $_POST["Avis"];
  $req = $conn->prepare("INSERT INTO avis (Pseudo, Avis, date)
        VALUES (?,?,?)");
  $req->execute(array($pseudo, $Avis,$date));
}



?>
  </head>
  <body> 

	<header>
		<nav>
		  <a href="acceuilcondidat.php" id="logo">khadamny</a>
		  <i class="fas fa-bars" id="ham-menu"></i>
		  <ul id="nav-bar">
			<li>
			  <a href="acceuilcondidat.php">Acceuil</a>
			</li>
			<li>
			  <a href="#about">A propos</a>
			</li>
				<li>
			  <a href="condidature.php">Mes condidatures</a>
			</li>
		
      <li>
     <?php echo '<img src="data:image/png;base64,' . base64_encode($resultat[0]["Photo"]) . '" style="width:50px; height:50px;   border-radius: 40%;" />' 
    ?></li>
    <li>
      <p class="log"><?php  echo  $pseudo ; ?></p>
          </li>
		  </ul>
		</nav>
	  </header>
	 
<section class="ello">





<div id="home" class="first_page">
    <div class="wrapper">
    <div class="header header_home">Le post</div>
    <div  class="content content_home"  style="display:inline">
    
    <?php if (!empty($resultats)) {echo 'Description: ' . $resultats[0]['Description'];} ?>
    <br>Competences requises: <?php  echo  $codes_competence; ?>
   <br> Sociéte: <?php if (!empty($resultats45)) {echo $resultats45[0]['Nom_entreprise'];} ?>
   <br> Diplômes requises:<?php  echo  $codes_diplome; ?>
   <br> Salaire: <?php if (!empty($resultats)) {echo $resultats[0]['Salaire_propose'];} 
    $etatt=0;
    ?>
        
    
        <div class="contentbtn">
        <a href="condidature.php">
    <button id="myButton" class="button-cover" role="button">
        <span class="text">Postuler</span>
        <span>maintenant</span>
    </button>
</a>
        
<!-- function ici -->
             

        
    
      </div>
      
</div>
    
    <div class="image"><img src="img/1.jpg"></div>
  
  </div>
  
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
    <h3>Abonnez vous</h3>
    
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
  <script>
  
  $(document).ready(function() {
    $('#myButton').click(function() {
      alert('La candidature a été enregistrée.');
      '<?php echo $pseudo; ?>';
      var pseudo = '<?php echo $pseudo; ?>';
      var ID = '<?php echo $ID; ?>';
      var etat = '<?php echo $etat; ?>';
      $.ajax({
        type: 'POST',
        url: 'detail.php',
        data: {
          'pseudo': pseudo,
          'ID': ID,
          'etat': etat
        },
        success: function(data) {
          
          
          <?php  $req = $conn->prepare("INSERT INTO candidature (Pseudo, code_offre_emploi, Etat_condidature, Date_condidature) 
          VALUES (?, ?, ?, ?)");
          $req->execute(array($pseudo, $ID, $etatt, $ID));?>
          

        },
        error: function(xhr, status, error) {
          alert('Une erreur est survenue : ' + error);
        }
      });
    });
  });
</script>
</body> 
  </html>