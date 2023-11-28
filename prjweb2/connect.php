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

	<header>
		
		<nav>
		  <a href="nav.php" id="logo">khadamny</a>
		  <i class="fas fa-bars" id="ham-menu"></i>
		  <ul id="nav-bar">
			
		  </ul>
		</nav>
	  </header>
<section class="bodi">
	<div class="container">
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form name = "Forminsc"method="post" action="Connecter.php"onSubmit="return verif_formulaireinsc()">
		  <p class="parag">Créer un compte</p>
		  <input type="text" placeholder="nom prenom" id="nom" name="Nom">
		  <input type="email" placeholder="Email" id="mail" name = "Email"><br> 
		  <input type="text" placeholder="pseudo" id="pseudo" name="Util">
		  <input type="password" placeholder="Mot de passe" id="mdp" name="Mdp">
		  <input type="password" placeholder="verfier Mot de passe" id="mdp" name="Cmdp"><br>
		  <input type="checkbox" name="checkboxGroup" value="option1" onclick="uncheckOther(this)"id="ch1">
		  <label>Employeur</label>
 		  <input type="checkbox" name="checkboxGroup" value="option2" onclick="uncheckOther(this)" id="ch2">
		  <label>Demandeur</label><br>
		  <label id="erreur"></label>
		  <input type="submit" value="Enregistrer" name="Enregistrer"><br>
		  
		  
		  <br>
		  <br>
 		</form>	  <br><br><br><br><br><br><br><br><br><br><br>
	  
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