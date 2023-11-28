<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Navigation Bar</title>
    <!-- Font Awesome Icons -->
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
    <link rel="stylesheet" href="style.css" />
   
  </head>
  <body>
  <?php
$servername ="localhost";
$username="root";
$password = "";
$pseudo = "z";
// pour tester l'erreur on se connecte à une base inexistancte "bureau_emploi"
$conn = new PDO("mysql:host=$servername;dbname=bureau_emploi", $username, $password);
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();}
    $pseudo = strtoupper($_SESSION['nom']);  
//On définit le mode d'erreur de PDO sur Exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST["Enregistrer"])) {
  $date=date('Y-m-d H:i:s');
  $Avis = $_POST["Avis"];
  $req = $conn->prepare("INSERT INTO avis (Pseudo, Avis, date)
        VALUES (?,?,?)");
  $req->execute(array($pseudo, $Avis,$date));
}



if (isset($_GET['code'])) {
  $req = $conn->prepare("DELETE FROM offre_emploi WHERE Code_offre_emploi = :code");
  $req->bindValue(':code', $_GET['code']);
  $req->execute();
  $req2 = $conn->prepare("DELETE FROM employeur_offre WHERE Code_offre_emploi = :code");
  $req2->bindValue(':code', $_GET['code']);
  $req2->execute();
  $req6 = $conn->prepare("DELETE FROM candidature WHERE code_offre_emploi = :code");
  $req6->bindValue(':code', $_GET['code']);
  $req6->execute();
  $req7 = $conn->prepare("DELETE FROM offre_competence WHERE code_offre_emploi = :code");
  $req7->bindValue(':code', $_GET['code']);
  $req7->execute();
  $req8 = $conn->prepare("DELETE FROM offre_diplome WHERE code_offre_emploi = :code");
  $req8->bindValue(':code', $_GET['code']);
  $req8->execute();
}
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
            <a href="apropos.html">A propos</a>
          </li>
          <li><a href="condidat_offre.php" id="gerer-offres">Mes condidats</a>
</li>
          </li>
          <li><a href="mes_offres.php" id="gerer-offres">Mes offres</a>          
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
    <section class="ello">
        <div class="splitview skewed">
          <div class="panel bottom">
              <div class="content">
                  <div class="description">
                      <h1>Trouver une équipe performante .</h1>
                      <p>Trouvez vos prochain employers avec nous - la voie vers votre avenir professionnel !</p>
                  </div>
    
                  <img src="img/Methode_de_travail-nouveau.jpg" alt="Original">
              </div>
          </div>
    
          <div class="panel top">
              <div class="content">
                  <div class="description">
                      <h1>Donner une offre d'emploi</h1>
                      <p>Laissez-nous vous aider à atteindre vos objectifs professionnels !</p>
                  </div>
    
                  <img src="img/Methode_de_travail-nouveau.png" alt="Duotone">
              </div>
          </div>
    
          <div class="handle"></div>
      </div>
    </section>

<section class="bg">
  
<section class="articles">
  
  <article>
    <div class="article-wrapper">
      <figure>
        <img src="img/2.jpg" alt="" />
      </figure>
      <div class="article-body">
        <h2>Trouver des employeurs </h2>
        <p class="para">
          Pour un boss, trouver une bonne équipe de travail est essentiel pour la réussite de l'entreprise. Travailler avec une équipe dynamique, compétente et bienveillante peut augmenter la productivité, encourager l'innovation et renforcer la cohésion de l'entreprise.  </p>
        <a href="offre.html" class="read-more">
          Proposer une offre d'emploi <span class="sr-only">Trouver des employers</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
  </article>
  
<article>
    <div class="article-wrapper">
      <figure>
        <img src="img/3.jpg" alt="" />
      </figure>
      <div class="article-body">
        <h2>Avoir une idee sur le marcher de travail et de concurence </h2>
        <p class="para">
          Il est important pour un employeur d'avoir une idée du marché du travail avant de se lancer dans une carrière. Cela peut inclure la recherche des industries en croissance, des postes disponibles et des compétences requises pour ces emplois afin de mieux préparer ses choix de formation et ses recherches d'emploi.        </p>
        <a href="acc.html" class="read-more">
          voir plus <span class="sr-only">Avoir une idee sur le marcher de travail</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
  </article>
</section>
<h1 class="hh">les statistiques</h1>
</section>




<section class="stats">

  <div class="container">
    <div class="card">
        <div class="face face1">
            <div class="content">
                <img src="https://github.com/Jhonierpc/WebDevelopment/blob/master/CSS%20Card%20Hover%20Effects/img/design_128.png?raw=true">
                <h3>les postes de designer</h3>
            </div>
        </div>
        <div class="face face2">
            <div class="content">
                <p class="pp">+10 000 Post en 2023</p>
                  
            </div>
        </div>
    </div>
    <div class="card">
        <div class="face face1">
            <div class="content">
                <img src="https://github.com/Jhonierpc/WebDevelopment/blob/master/CSS%20Card%20Hover%20Effects/img/code_128.png?raw=true">
                <h3 class="pp">les postes de devloppeur</h3>
            </div>
        </div>
        <div class="face face2">
            <div class="content">
                <p class="pp">+17 000 poste en 2023</p>
               
            </div>
        </div>
    </div>
    <div class="card">
        <div class="face face1">
            <div class="content">
                <img src="https://github.com/Jhonierpc/WebDevelopment/blob/master/CSS%20Card%20Hover%20Effects/img/launch_128.png?raw=true">
                <h3>Les entreprises</h3>
            </div>
        </div>
        <div class="face face2">
            <div class="content">
                <p class="pp">+105 000 employer en 2023</p>
                
            </div>
        </div>
    </div>
</div>

</section>


<section class="bg1">

<section class="avis">
  <div class="container">
  <?php
      // Établir une connexion avec la base de données
       $image_html = '<img src="https://upload.wikimedia.org/wikipedia/en/thumb/f/ff/Morning_Glory_Flower_square.jpg/1024px-Morning_Glory_Flower_square.jpg">';

      // Récupérer les avis de la base de données
      $resultats = $conn->query("SELECT * FROM avis ORDER BY DATE DESC LIMIT 5  ");

      // Afficher chaque avis dans une boîte
      foreach ($resultats as $resultat) {
        echo "<div class='box'>";
        echo "$image_html";
        echo "<h3>".$resultat["Pseudo"]."</h3>";
        echo "<p>".$resultat["Avis"]."</p>";
        echo "</div>";
      }

      // Fermer la connexion avec la base de données
      $conn = null;
    ?>
      
    </div>
    

  
</section>
</section>
    <!-- Script -->
    <script src="script.js"></script>
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
        <h3>Donner votre avis</h3>
          <div>
          <form name="Aviss" action="acceuilemployeur.php" method="POST">
    <input type="text" placeholder="votre avis" name="Avis" required/>
    <input type="submit" value="Envoyer" name="Enregistrer"><br>
</form>
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