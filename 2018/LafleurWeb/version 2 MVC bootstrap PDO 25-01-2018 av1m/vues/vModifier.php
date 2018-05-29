<!--Vue pour la saisie des informations dans un formulaire!-->
<div class="container">

<form name="formAjout" action="" method="post">
  <fieldset>
    <legend>Entrez les données sur la fleur à modifier </legend>
    <?php
    $i = 0;
    while($i < count($lafleur))
    { 
 ?>     
            <label> Reference : </label> <input type="text" value=<?php echo $lafleur[$i]["ref"]?> name="ref" size="10" /><br />
            <label>Designation :</label> <input type="text" value=<?php echo $lafleur[$i]["designation"]?> name="des" size="20"  /><br />
            <label>Prix :</label> <input type="text" value=<?php echo $lafleur[$i]["prix"]?> name="prix" size="10" /><br />
            <label>Image :</label> <input type="text" value=<?php echo $lafleur[$i]["image"]?> name="image" size="20"/><br />    
            <label>Categorie :</label>
              <select name="cat">
                 <option selected value = <?php echo $lafleur[$i]["categorie"]?> ><?php echo $lafleur[$i]["categorie"]?></option>
                 <option value = "bul">Bulbes</option>
                 <option value = "mas">Plantes à massif</option>
                 <option value = "ros">Rosiers</option>
              </select> 
<?php
        $i = $i + 1;
     }
?> 
  </fieldset>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn">Annuler</button>
  <p />
</form>
</div>