


  function validatemdp(str) {         
	if (str.match( /[0-9]/g) && 
	str.match( /[A-Z]/g) && 
	str.match(/[a-z]/g) && 
	str.match( /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/g) &&
	str.length >= 8) 
return true ;
else 
return false ; }
function estComposeeDeChiffres(chaine) {
	for (let i = 0; i < chaine.length; i++) {
	  if (chaine[i] < '0' || chaine[i] > '9') {
		return false;
	  }
	}
	return true;
  }
  //code qui permet de gerer les checkbox
  function uncheckOther(checkbox) {
	if (checkbox.checked) {
	  var checkboxes = document.getElementsByName('checkboxGroup');
	  for (var i = 0; i < checkboxes.length; i++) {
		if (checkboxes[i] !== checkbox) {
		  checkboxes[i].checked = false;
		}
	  }
	}
  }
  
  var checkbox1 = document.getElementById("checkbox1");
  var checkbox2 = document.getElementById("checkbox2");
  
  checkbox1.onclick = function() {
	uncheckOther(this);
  }
  
  checkbox2.onclick = function() {
	uncheckOther(this);
  }
  



 

function verif_formulaireinsc()

{	
if(document.Forminsc.Nom.value =="")  {
const labelErreur = document.getElementById("erreur");
labelErreur.textContent = "Erreur : Veuillez entrer votre nom et prénom !";
document.Forminsc.Nom.focus();
return false;
}
else if(document.Forminsc.Email.value == "") {
const labelErreur = document.getElementById("erreur");
labelErreur.textContent = "Erreur : Veuillez entrer votre Adresse Email !";
document.formulaire.Email.focus();
return false;
}
else if(document.Forminsc.Email.value.indexOf('@') == -1 || document.Forminsc.Email.value.indexOf('.') == -1 ){
const labelErreur = document.getElementById("erreur");
labelErreur.textContent = "Veuillez entrer une adresse Email valide !";
document.Forminsc.Email.focus();
return false;
}
else if(document.Forminsc.Util.value =="" || validatemdp(document.Forminsc.Util.value)== false   )  {
	const labelErreur = document.getElementById("erreur");
labelErreur.textContent = "Veuillez entrer un pseudo ui contient au moins 10 caractéres\n , une caractére spécial ,un chiffre\n et une lettre en majiscule !";

document.Forminsc.Util.focus();
	return false;
	}

else if(document.Forminsc.Mdp.value ==""  )  {
	const labelErreur = document.getElementById("erreur");
labelErreur.textContent = "Veuillez entrer un Mot de passe !";
document.Forminsc.Mdp.focus();
return false;
   }
else if(validatemdp(document.Forminsc.Mdp.value)== false   )  {
	const labelErreur = document.getElementById("erreur");
labelErreur.textContent = "Veuillez entrer un mot de passe fort qui contient au moins 10 caractéres\n , une caractére spécial ,un chiffre et une lettre en majiscule !";
document.Forminsc.Mdp.focus();
return false;
   }  
					
else if(document.Forminsc.Cmdp.value ==""  )  {
	const labelErreur = document.getElementById("erreur");
labelErreur.textContent = "Veuillez confirmer votre mot de passe !";
document.Forminsc.Cmdp.focus();
return false;
}
else if(document.Forminsc.Cmdp.value !=  document.Forminsc.Mdp.value )  {
	const labelErreur = document.getElementById("erreur");
labelErreur.textContent = "Mot de passe différent !";
document.Forminsc.Cmdp.focus();
return false;
}
else if (document.getElementById("ch1").checked==false && document.getElementById("ch2").checked==false) {
	const labelErreur = document.getElementById("erreur");
	labelErreur.textContent = "Veuillez sélectionner au moins une option Employeur ou demandeur !";
	return false ;
  }
else{
	
	const labelErreur = document.getElementById("erreur");
labelErreur.textContent = "";

}}


function verif_employeur(){
	if(document.Formemployeur.nomes.value =="" ){
		const labelErreur = document.getElementById("erreur");
		labelErreur.textContent = "Veuillez Entrer le nom de votre entreprise !";
		document.Formemployeur.nomes.focus();
		return false ;	}
		else if (document.Formemployeur.nomg.value ==""){
			const labelErreur = document.getElementById("erreur");
			labelErreur.textContent = "Veuillez Entrer le nom et le prénom de gérant !";
			document.Formemployeur.nomg.focus();
			return false ;
		}
		else if (document.Formemployeur.code.value ==""){
			const labelErreur = document.getElementById("erreur");
			labelErreur.textContent = "Veuillez Entrer le code du registre !";
			document.Formemployeur.code.focus();
			return false ;
		}
		else {
			document.Formemployeur.lblpsedou.value= localStorage.getItem("pseudo");
			document.Formemployeur.lblmdp.value= localStorage.getItem("mdp");
			const labelErreur = document.getElementById("erreur");
			labelErreur.textContent = "Erreur : bien !";




		}}

		function checkInputLength() {
			var input = document.getElementById('numTel');
			let labelErreur = document.getElementById("erreur");
					
			 if (input.value.length != 8 ) {
				labelErreur.textContent = "\nLa longueur du Numtel doit être exactement de 8 caractères.\n";
				document.Formemployee.numTel.focus();
				return false;	}
				else {
					labelErreur.innerHTML = "";
					return true ;	 
			}

		  }
		  function checkInputLength1() {
			var input1 = document.getElementById('Cin');
			const labelErreur = document.getElementById("erreur");
			if (input1.value.length != 8) {
				
				labelErreur.textContent = "\nLa longueur du Cin doit être exactement de 8 caractères.";	
				document.Formemployee.Cin.focus();
				return false;}
			else {
				labelErreur.innerHTML = "";
				return true ;	
			}		 
			}

			  
			  
			  

		

		
		  



  
  