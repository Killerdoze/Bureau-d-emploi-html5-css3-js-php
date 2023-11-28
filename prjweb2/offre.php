
<?php
$servername ="localhost";
$username="root";
$password = "";

  /////////////////////////////////// insertion dans table offre_emploi/////////////////////////////////////////////////////////////
  
    // pour tester l'erreur on se connecte à une base inexistancte "bureau_emploi"
    $conn = new PDO("mysql:host=$servername;dbname=bureau_emploi", $username, $password);
    //On définit le mode d'erreur de PDO sur Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST['Ajouter'])){
// Récupération des compétences sélectionnées
        if(isset($_POST["Competences"])) {
          $competences = $_POST["Competences"];
        } else {
          $competences = array();
        }
        
        // Récupération des diplômes sélectionnés
        if(isset($_POST["Diplômes"])) {
          $diplomes = $_POST["Diplômes"];
        } else {
          $diplomes = array();
        }
        $nombreAleatoire = rand(1, 900000);        
        $discription = $_POST['disc'];
        $experience = $_POST['exp'];
        $salaire = $_POST['sal'];
        $titre = $_POST['poste'];

        $sql = "INSERT INTO offre_emploi(Code_offre_emploi,Titre,Description,Nb_annee_exp,Salaire_propose) 
        VALUES ($nombreAleatoire, '$titre', '$discription', $experience, $salaire)";
        $conn->query($sql) ;                 



      //////////////////////////////////////////insertion table offre competence////////////////////////////////////////////

      foreach($competences as $comp) {
        $sql8 = "INSERT INTO offre_competence (Code_offre_emploi, code_competence) VALUES ('$nombreAleatoire', '$comp')";
        $conn->query($sql8); }
      //////////////////////////////////////////insertion table offre diplome////////////////////////////////////////////

        foreach($diplomes as $diplome) {
          $sql8e = "INSERT INTO offre_diplome (Code_offre_emploi, code_diplome) VALUES ('$nombreAleatoire', '$diplome')";
          $conn->query($sql8e);
        }
        session_start();                                       
        $pseudo = $_SESSION['nom'];
        $req2 = "SELECT Code_registre_commerce, ID FROM employeur WHERE Pseudo = :pseudo";
        $stmt2 = $conn->prepare($req2);
        $stmt2->bindParam(':pseudo', $pseudo);
        $stmt2->execute();
        $resultat2 = $stmt2->fetch(PDO::FETCH_ASSOC);
        $code_registre = $resultat2['Code_registre_commerce'];  
        $id_employeur = $resultat2['ID']; 
        $sql8ez = "INSERT INTO employeur_offre (Code_registre_commerce, code_offre_emploi, ID_offreur) VALUES ('$code_registre', '$nombreAleatoire', '$id_employeur')";
        $conn->query($sql8ez);
        include("acc2.php"); 

        
        
        
        
       
        

        

      






}

?>