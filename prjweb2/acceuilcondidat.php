
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
  
  // pour tester l'erreur on se connecte à une base inexistancte "bureau_emploi"
  $conn = new PDO("mysql:host=$servername;dbname=bureau_emploi", $username, $password);
  
  //On définit le mode d'erreur de PDO sur Exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();}
                                    
    $pseudo = strtoupper($_SESSION['nom']);    
    $req45 = "select * from demandeur_cv where Pseudo =:pseudo";
    $stmt45 = $conn->prepare($req45);
    $stmt45->bindValue(':pseudo', $pseudo);
    $stmt45->execute();
    $resultats45= $stmt45->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($resultats45)) {
      foreach ($resultats45 as $resultat) {
        $photo_data = $resultat['Photo'];
        // afficher l'image
           }
  }

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




echo"

<header>
<nav>
  <a href='acceuilcondidat.php' id='logo'>khadamny</a>
  <i class='fas fa-bars' id='ham-menu'></i>
  <ul id='nav-bar'>
    <li>
      <a href='acceuilcondidat.php'>Acceuil</a>
    </li>
    <li>
      <a href='acc2.php'>Touver un emploi</a>
    </li>
  
    <li>
      <a href='condidature.php'>Mes condidatures</a>
    </li>
   
    <li>
      <a href='apropos.html'>A propos</a>
    </li>
    <li>
    ";
    echo '<img class="im" src="data:image/png;base64,' . base64_encode($resultat[0]["Photo"]) . '" style="width:50px; height:50px;   border-radius: 40%;" />' 
    ?>     </li>
    <il>    <br> <p class="log"><?php  echo  $pseudo ; ?></p>
          </li>
        </ul>
      </nav>
    </header>
    <section class="ello">
    <div class="splitview skewed">
      <div class="panel bottom">
          <div class="content">
              <div class="description">
                  <h1>Trouver un emploi facilement.</h1>
                  <p>Trouvez votre prochain emploi avec nous - la voie vers votre avenir professionnel !</p>
              </div>

              <img src="img/Methode_de_travail-nouveau.jpg" alt="Original">
          </div>
      </div>

      <div class="panel top">
          <div class="content">
              <div class="description">
                  <h1>Trouver votre travail de reve</h1>
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
        <img src="img/1.jpg" alt="" />
      </figure>
      <div class="article-body">
        <h2>trouver un emploi</h2>
        <p class="para">
          Trouver votre travail de rêve peut sembler difficile, mais cela peut être l'une des choses les plus gratifiantes que vous fassiez dans votre vie. Il est important de réfléchir à vos passions, à vos compétences et à vos valeurs pour déterminer quel type de travail vous convient le mieux.
        </p>
        <a href="acc2.php" class="read-more">
         Trouver un emploi <span class="sr-only">trouver un emploi</span>
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
        <h2>Avoir une idee sur le marcher de travail</h2>
        <p class="para">
          Il est important pour un étudiant d'avoir une idée du marché du travail avant de se lancer dans une carrière. Cela peut inclure la recherche des industries en croissance, des postes disponibles et des compétences requises pour ces emplois afin de mieux préparer ses choix de formation et ses recherches d'emploi.        </p>
        <a href="acc2.php" class="read-more">
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
          <form name="Aviss" action="acceuilcondidat.php" method="POST">
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
