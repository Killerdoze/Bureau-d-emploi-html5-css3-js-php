<script src="conecter.js"></script>
<?php
$servername ="localhost";
$username="root";
$password = "";

  /////////////////////////////////// 1ére étape de l'inscription ///////////////////////////////////////////////////////////////
  try{
    // pour tester l'erreur on se connecte à une base inexistancte "bureau_emploi"
    $conn = new PDO("mysql:host=$servername;dbname=bureau_emploi", $username, $password);
    //On définit le mode d'erreur de PDO sur Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST['Enregistrer'])){
      $nomprenom = $_POST["Nom"];
      $pseudo = $_POST["Util"];
      $mdp = $_POST["Mdp"];
      $Email = $_POST["Email"]; 
      //////////////////////////////////////////Vérification de l'existance de pseudo////////////////////////////////////////////
      $stmtzz = $conn->prepare("SELECT COUNT(*) FROM demandeur_cv WHERE Pseudo = :pseudo");
      $stmtzz->bindParam(":pseudo", $pseudo);
      $stmtzz->execute();
      $countzz = $stmtzz->fetchColumn();
      $stmtz = $conn->prepare("SELECT COUNT(*) FROM employeur WHERE Pseudo = :pseudo");
      $stmtz->bindParam(":pseudo", $pseudo);
      $stmtz->execute();
      $countz = $stmtz->fetchColumn();
      //////////////////////////////////////////////
      if (isset($_POST['checkboxGroup']) && $_POST['checkboxGroup'] == 'option1'){
      $sql2="DELETE from employeur2";
      $stmt = $conn->prepare($sql2);
      $stmt->execute();      
      if ($countz > 0 || $countzz >0) {
        // Le pseudo existe déjà, ne pas insérer dans la base de données
     
        echo "Nom d'utilisateur déja existe retourner et changer le nom.";


      } else {
        // Le pseudo n'existe pas, insérer dans la base de données
        $sql="INSERT INTO employeur2 (Pseudo,Email, Pass) VALUES ('$pseudo','$Email','$mdp')";
        $conn->exec($sql);
        header("Location: employeur.php");

      }
      }      
      else if (isset($_POST['checkboxGroup']) && $_POST['checkboxGroup'] == 'option2'){
        $sql2="DELETE from demandeur_cv2";
        $stmt = $conn->prepare($sql2);
        $stmt->execute();
           
      if ($countz > 0 || $countzz >0) {
          // Le pseudo existe déjà, ne pas insérer dans la base de données
          echo "Nom d'utilisateur déja existe retourner et changer le nom.";
        } else {
        // Le pseudo n'existe pas, insérer dans la base de données
        $sql="INSERT INTO demandeur_cv2 (Nom_prenom,Email,Pseudo,Mdp) VALUES ('$nomprenom', '$Email','$pseudo','$mdp')";
        $conn->exec($sql);  
        header("Location: cv.php");
       
    } 
      }}}
      catch(PDOException $e){
      echo "Erreur : " . $e->getMessage();}
    
        
      ///////////////////////////////////////2éme etape inscription employeur///////////////////////////////////////////////////////
      try{    
        if(isset($_POST['Inscription'])){
          $nombreAleatoire = rand(1, 900000);
          $nomprenom = $_POST["nomg"];
          $code = $_POST["code"];
          $nomes = $_POST["nomes"];
          $req = "SELECT Pseudo FROM employeur2";
          $stmt = $conn->query($req);
          $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
          $pseudo = $resultat['Pseudo'];

          $req2 = "SELECT Pass FROM employeur2";
          $stmt2 = $conn->query($req2);
          $resultat2 = $stmt2->fetch(PDO::FETCH_ASSOC);
          $mdp = $resultat2['Pass'];
          
          $req3 = "SELECT Email FROM employeur2";
          $stmt3 = $conn->query($req3);
          $resultat3 = $stmt3->fetch(PDO::FETCH_ASSOC);
          $Email = $resultat3['Email'];
          
          $sql="INSERT INTO employeur (ID, Code_registre_commerce, Nom_entreprise, Nomprenom_gerant, Pseudo, Email, Password) VALUES ('$nombreAleatoire', '$code', '$nomes', '$nomprenom', '$pseudo', '$Email', '$mdp')";
          $conn->exec($sql);
          include("acceuilemployeur.php");

         
        }}
     
        /*On capture les exceptions si une exception est lancée et on affiche les informations relatives à celle-ci*/
        catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    
        
      }
      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

      /////////////////////////////////// 2éme etape inscription pour demandeur ///////////////////////////////////////////////////////////////
     
     
      if(isset($_POST['Inscription2'])){
        $req = "SELECT Pseudo FROM demandeur_cv2";
        $stmt = $conn->query($req);
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $pseudo = $resultat['Pseudo'];
        $stmtzz = $conn->prepare("SELECT COUNT(*) FROM demandeur_cv WHERE Pseudo = :pseudo");
        $stmtzz->bindParam(":pseudo", $pseudo);
        $stmtzz->execute();
        $countzz = $stmtzz->fetchColumn();
        $stmtz = $conn->prepare("SELECT COUNT(*) FROM employeur WHERE Pseudo = :pseudo");
        $stmtz->bindParam(":pseudo", $pseudo);
        $stmtz->execute();
        $countz = $stmtz->fetchColumn();
        if ($countz > 0 || $countzz >0) {
          // Le pseudo existe déjà, ne pas insérer dans la base de données
       
          echo "Nom d'utilisateur déja existe retourner et changer le nom.";
  
  
        } else {
          
  
        
        $nombreAleatoire = rand(1, 900000);    
        // Récupération des compétences sélectionnées
        if(isset($_POST["competences"])) {
          $competences = $_POST["competences"];
        } else {
          $competences = array();
        }
        
        // Récupération des diplômes sélectionnés
        if(isset($_POST["diplomes"])) {
          $diplomes = $_POST["diplomes"];
        } else {
          $diplomes = array();
        }
        
        // Autres données récupérées
      
     
       
      $profileImage=file_get_contents( $_FILES['profileImage']['tmp_name']);
        
        $cin = $_POST["Cin"];
        $dateNaissance = $_POST["dateNaissance"];
        $etatCivil = $_POST["etatCivil"];
        $adresse = $_POST["adresse"];
        $telephone = isset($_POST["numTel"]) ? $_POST["numTel"] : '';
        $anneeExperience = isset($_POST["nbAnneesExp"]) ? $_POST["nbAnneesExp"] : '';
        $codeUniversite = isset($_POST["codeUniv"]) ? $_POST["codeUniv"] : '';
       

        $req2 = "SELECT Mdp FROM demandeur_cv2";
        $stmt2 = $conn->query($req2);
        $resultat2 = $stmt2->fetch(PDO::FETCH_ASSOC);
        $mdp = $resultat2['Mdp'];
        
        $req3 = "SELECT Email FROM demandeur_cv2";
        $stmt3 = $conn->query($req3);
        $resultat3 = $stmt3->fetch(PDO::FETCH_ASSOC);
        $email = $resultat3['Email'];

        $req33 = "SELECT Nom_prenom FROM demandeur_cv2";
        $stmt33 = $conn->query($req33);
        $resultat33 = $stmt33->fetch(PDO::FETCH_ASSOC);
        $nomPrenom = $resultat33['Nom_prenom'];
        
        
        $req = $conn->prepare("INSERT INTO demandeur_cv (ID, CIN, Nom_prenom, Email, Pseudo, Password, Photo, Date_naissance, Etat_civil, Adresse, Num, Nb_annee_exp, Code_universite) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $req->execute(array($nombreAleatoire, $cin, $nomPrenom, $email, $pseudo, $mdp, $profileImage, $dateNaissance, $etatCivil, $adresse, $telephone, $anneeExperience, $codeUniversite));

      
        
        

        

        //*************************************************insertion dans universite******************************* */
        $universities = array("Université de Paris", "Université de Montréal", "Université de Genève", "Université de Tokyo", "Université de Sydney","Institut superieur de gestion de tunis","IHEC","ISCAE","Esprit");
        $random_index = array_rand($universities);
        $random_university = $universities[$random_index];
        // Vérifier si le code université existe déjà dans la base de données
        $stmt = $conn->prepare("SELECT COUNT(*) FROM universite WHERE Code_universite = :codeUniversite");
        $stmt->bindParam(":codeUniversite", $codeUniversite);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count > 0) {}     
             else {
          // Le code université n'existe pas, insérer dans la base de données
          $sql2 = "INSERT INTO universite (Code_universite, Libelle_universite) VALUES ('$codeUniversite', '$random_university')";
          $conn->exec($sql2);}
 
          //*************************************************insertion dans diplome******************************* */
                $code_diplome = rand(1, 900000);  
                foreach ($diplomes as $diplome) {
                  $stmtz = $conn->prepare("SELECT COUNT(*) FROM diplome WHERE libelle_diplome = :diplome");
                  $stmtz->bindParam(":diplome", $diplome);
                  $stmtz->execute();
                  $countz = $stmtz->fetchColumn();
                  
                  if ($countz > 0) {
                    } else if ($countz == 0){
                    // Le code université n'existe pas, insérer dans la base de données
                    $sql2z = "INSERT INTO diplome (Code_diplome, Libelle_diplome) VALUES ('$code_diplome', '$diplome')";
                    $conn->exec($sql2z);
                    
                }}
                  
                  foreach($diplomes as $diplome) {
                  $sql8e = "INSERT INTO diplome_demandeur (ID_demandeur, Cin, code_diplome) VALUES ('$nombreAleatoire', '$cin', '$diplome')";
                  $conn->exec($sql8e);
                }
          //*************************************************insertion dans competences******************************* */

          $code_competence = rand(1, 900000); 
   
                foreach ($competences as $competence) {
                  $stmt = $conn->prepare("SELECT COUNT(*) FROM competence WHERE libelle_competence = :competence");
                  $stmt->bindParam(":competence", $competence);
                  $stmt->execute();
                  $count = $stmt->fetchColumn();
                  
                  if ($count > 0) {
                    // Le code université existe déjà, ne pas insérer dans la base de données
                  } else {
                    // Le code competence n'existe pas, insérer dans la base de données
                    $sql2 = "INSERT INTO competence (Code_competence, Libelle_competence) VALUES ('$code_competence', '$competence')";
                    $conn->exec($sql2);
                    
                  }}
                  foreach($competences as $comp) {
                    
                    $sql8 = "INSERT INTO competence_demandeur (Cin, code_competence, ID_demandeur) VALUES ('$cin', '$comp', '$nombreAleatoire')";
                    $conn->query($sql8);
                  }
                  
                include("acceuilcondidat.php"); 
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
              }}
           
     
        //////////////////////////////////////////////////////////////////////verification de la connexion //////////////////////////////////////
        if(isset($_POST['Connexion'])) {
          // Récupérer les valeurs soumises
          $utilisateur = $_POST['Util'];
          $motDePasse = $_POST['Mdp'];
          
          // Utiliser des placeholders dans la requête SQL
          $stmt = $conn->prepare("SELECT COUNT(*) FROM employeur WHERE Pseudo=:utilisateur AND Password=:motDePasse");
          
          // Binder les valeurs aux paramètres
          $stmt->bindParam(":utilisateur", $utilisateur);
          $stmt->bindParam(":motDePasse", $motDePasse);
          
          // Exécuter la requête
          $stmt->execute();
          
          // Récupérer le résultat
          $count = $stmt->fetchColumn();          
      
          if ($count > 0) {
              // L'utilisateur existe déjà
              session_start();
              $_SESSION['nom'] = $utilisateur;
                      
              include("acceuilemployeur.php"); 
          } else {
              // L'utilisateur n'existe pas
              $stmta = $conn->prepare("SELECT COUNT(*) FROM demandeur_cv WHERE Pseudo=:utilisateur AND Password=:motDePasse");
          
              // Binder les valeurs aux paramètres
              $stmta->bindParam(":utilisateur", $utilisateur);
              $stmta->bindParam(":motDePasse", $motDePasse);
              
              // Exécuter la requête
              $stmta->execute();
              
              // Récupérer le résultat
              $counta = $stmta->fetchColumn();  
              if ($counta > 0) {
                // L'utilisateur existe déjà
                session_start();
                $_SESSION['nom'] = $utilisateur;
                

                include("acceuilcondidat.php"); 
            } else {
              echo "Utilisateur inexistant ou mot de passe incorrect.";
            }

          }
          
      }
      
                

   
    
      
      // Vérifier si la variable POST "Mdp_oublie" est définie
      if (isset($_POST['Mdp_oublie'])) {
          // Récupérer l'utilisateur et exécuter votre code pour récupérer son adresse e-mail
          $utilisateur = "test";
          $stmta = $conn->prepare("SELECT COUNT(*) FROM demandeur_cv WHERE Pseudo=:utilisateur ");
          $stmta->bindParam(":utilisateur", $utilisateur);
          $stmta->execute();
          $count = $stmta->fetchColumn();
      
          if ($count > 0) {
              // L'utilisateur existe, récupérer son email
              $stmtb = $conn->prepare("SELECT Email FROM demandeur_cv WHERE Pseudo=:utilisateur");
              $stmtb->bindParam(":utilisateur", $utilisateur);
              $stmtb->execute();
              $email = $stmtb->fetchColumn();          
              // Envoyer l'email avec la fonction sendEmail()
              sendEmail("medchrifmastouri@gmail.com", "Mot de passe oublié", "Voici votre nouveau mot de passe : ...");
          } else {
              // L'utilisateur n'existe pas
              echo "Utilisateur introuvable";
          }
      }
      
      
        









    ?>