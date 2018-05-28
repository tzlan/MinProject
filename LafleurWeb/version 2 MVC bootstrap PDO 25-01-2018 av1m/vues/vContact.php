<div class="container" align="center"><?php /*
<h1><center>Page contact </center></h1> */ ?>
<br><legend>Contacter Lafleur</legend>
<form name="formAjout" action="" method="post" onSubmit="return valider()">
 <fieldset>
	<form class="form" method="post">
	  <input type="text" placeholder="Nom" name="nom" size="10"> <br>
      <input type="text" placeholder="Mail" name="mail" size="20">
    <br>
    <textarea rows="7" placeholder="Entrez votre texte ..." name="msg"></textarea>
</fieldset>
	  <p><div class="subchck">
	      <button type="submit" class="btn btn-success">Envoyer</button>
	      <button type="reset" class="btn-mini">Annuler</button>
	      <span class="separator">&nbsp;&nbsp;</span>
	  </div>
	</form>
</form>
</div>