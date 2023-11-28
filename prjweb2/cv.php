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
			<form name="Formemployee" action="Connecter.php" method="post" enctype="multipart/form-data" ><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				<p class="parag">Curriculum vitae</p>
				<label for="profileImage"class="par">Ajouter une photo de profil :</label>
				<input type="file" id="profileImage" name="profileImage" ><br>
				<input type="number" placeholder="Cin" id="Cin"name="Cin" type="number" required onblur="checkInputLength1()">
				<p class="par">Date de naissance</p>
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control" name="dateNaissance" type="date" required>
					</div>
				</div>
				<div class="form-group">
					<select class="form-control" name="etatCivil" required>
						<option value="" selected hidden>Etat civil</option>
						<option value="Célibataire">Célibataire</option>
						<option value="Marié">Marié</option>
						<option value="Divorcé">Divorcé</option>
					</select>
				</div>
				<div class="form-group">
					<select name="competences[]" multiple>
						<option value="Anglais">Anglais</option>
						<option value="Français">Français</option>
						<option value="Espagnol">Espagnol</option>
						<option value="Italien">Italien</option>
						<option value="Arabe">Arabe</option>
					</select>
				</div>
				<div class="form-group">
					<select name="diplomes[]" multiple>
						<option value="Licence BIS">Licence BIS</option>
						<option value="Licence BI">Licence BI</option>
						<option value="Licence Marketing">Licence Marketing</option>
						<option value="Mastére securité">Mastére securité</option>
						<option value="Mastere bigdata ">Mastere bigdata </option>
					</select>
				</div>
				<input type="text" placeholder="Adresse" id="adresse" name="adresse" required><br>
				<input placeholder="Numéro de téléphone" id="numTel" name="numTel"  type="number" required onblur="checkInputLength()" ><br>
				<input placeholder="Nombre d'années d'expérience" id="nbAnneesExp" name="nbAnneesExp" type="number" required><br>
				<input placeholder="Code université" id="codeUniv" name="codeUniv" type="number" required><br>
				<label id="erreur"></label>
				<input type="submit" value="Inscription" name="Inscription2"><br>

			</form><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>
	</section>
	
	  
		<div class="drop drop-1"></div>
		<div class="drop drop-2"></div>
		<div class="drop drop-3"></div>
		<div class="drop drop-4"></div>

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