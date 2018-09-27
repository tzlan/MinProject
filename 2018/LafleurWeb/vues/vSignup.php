
<!--Vue pour la saisie des informations dans un formulaire!-->
<div class="container">
<h1>Creer votre compte Lafleur</h1>
<meta charset="utf-8">
<form name="formAjout" action="" method="post">
  <fieldset>
    <legend>Entrer les donnees necessaires a la creation du compte </legend>
    <p><?php /* <label>Nom : </label> */ ?> <input type="text" placeholder="Nom"name="name" size="10" required/></p>
    <p><?php /*  <label>Mot de passe :</label> */ ?> <input type="password" placeholder="Mot de passe" name="pass" size="20" required/></p>
    <p><?php /*  <label>Repeter mot de passe :</label> */ ?><input type="password" placeholder="Repeter votre mot de passe" name="pass_t" size="20" required/></p>
  </fieldset>
	  <label class="checkbox">
	  	<input type="checkbox" required> <small>En cliquant sur Créer un compte, vous acceptez nos <a href="vues/CGU.php">Conditions</a> et indiquez que vous avez lu notre <a href="vues/CGU.php">Politique d’utilisation des données</a> , y compris notre <a href="vues/CGU.php">Utilisation des cookies</a>. </br>Vous pourrez recevoir des notifications par sms,mail,courrier de la part de Lafleur et pouvez vous désabonner à tout moment. (bien sur c'est une blague vous ne pouvez pas)</small>
  </label>
  <button type="submit" class="btn btn-primary ">Enregistrer</button>
  <button type="reset" class="btn-mini">Annuler</button>
</form>
</div>