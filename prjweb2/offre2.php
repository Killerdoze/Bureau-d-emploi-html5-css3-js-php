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
         
          <li><a href="condidat_offre.php" id="gerer-offres">Mes condidats</a>
          </li>
        
          <li><a href="mes_offres.php" id="gerer-offres">Mes offres</a>         
</li>
          <li>
            <a href="acc3.php">Voir Marché</a>
            </li>
			<li>
            <p class="log"><?php  echo $pseudo ;?></p>
          </li>
        </ul>
      </nav>
	  </header>
	 
<section class="bodi">
	<div class="container"><br><br><br><br><br><br><br><br>
		<form action="offre.php" method="post">
		  <p class="parag">Créer une offre d'emploi</p>
		  <input type="text" placeholder="Poste" id="poste" name="poste" required>	
		  <div class="form-group">
            <select name="Competences[]" multiple required>
                <option value="Anglais">Anglais</option>
                <option value="Français">Français</option>
                <option value="Espagnol">Espagnol</option>
                <option value="Italien">Italien</option>
                <option value="Arabe">Arabe</option>
            </select>
        </div>
		<br>
	
		<div class="form-group">
            <select name="Diplômes[]" multiple required>
                <option value="Licence BIS">Licence BIS </option>
                <option value="Licence BI">Licence BI</option>
                <option value="Licence Marketing">Licence Marketing</option>
                <option value="Mastére securité">Mastére securité</option>
                <option value="Mastere bigdata ">Mastere bigdata </option>
            </select>
        </div>
		  <input type="textarea" placeholder="Description" id="disc" name="disc" required><br>
		  <input type="number" placeholder="Nombre d'année d'experience" id="exp" name="exp"required><br>
		  <input type="number" placeholder="Salaire" id="sal"name="sal"required>
		  <input type="submit" value="Ajouter" name="Ajouter"><br>
		
          <br>
          <br>
  
		</form>
	  
		<div class="drop drop-1"></div>
		<div class="drop drop-2"></div>
		<div class="drop drop-3"></div>
		<div class="drop drop-4"></div>
		<div class="drop drop-5"></div>
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
          <br>
          <br>
          <br>
          <br>

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