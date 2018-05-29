<div class="container" align="center"><?php /*
<h1><center>Se connecter </center></h1> */ ?>
<br><legend>Se connecter a Lafleur</legend>
<form name="formAjout" action="" method="post" onSubmit="return valider()">
 <fieldset>
	<form class="form-horizontal">
	  <div class="control-group"> <?php /*
	    <label class="control-label" for="inputEmail">Nom</label> */ ?>
	    <div class="controls">
	      <input type="text" id="inputEmail" class="input-medium search-query" placeholder="Nom" name="username" size="10">
	    </div>
	  </div><p>	
	  <div class="control-group"> <?php /*
	    <label class="control-label" for="inputPassword">Password</label> */ ?>
	    <div class="controls">
	      <input type="password" id="inputPassword" class="input-medium search-query" placeholder="Password" name="password" size="20">
	    </div>
	  </div></p>
</fieldset>
	  <p><div class="subchck">
	  	  <input type="checkbox"> Se souvenir de moi <p><br>
	      <button type="submit" class="btn btn-success">Suivant</button>
	      <button type="reset" class="btn-mini">Annuler</button>
	      <span class="separator">&nbsp;&nbsp;</span>
	  </div>
	</form>
</form>
Nouveau sur Lafleur ? 
<a href="signup.php">S'inscrire maintenant »</a>
</div>