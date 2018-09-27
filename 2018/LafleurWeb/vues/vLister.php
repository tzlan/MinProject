
  <!-- Vue pour lister les fleurs
    ================================================== -->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <br>
      <thead> 
        <tr> 
          <th>Image</th>     
          <th>Référence</th>
          <th>Libellé</th>
          <th>Prix</th>
          <?php
          if (estVisiteurConnecte()){
            	?>
          		<th>Ajout Panier</th>
			  	<?php
		  }
          ?>
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($lafleur)) { 
?>     
        <tr> 
            <td align="center"><img class="img-polaroid" src="./images/<?php echo $lafleur[$i]["image"]?>" /></td>  
            <td><?php echo $lafleur[$i]["ref"]?></td>
            <td><?php echo $lafleur[$i]["designation"]?></td>
            <td align="right"><?php echo $lafleur[$i]["prix"]?></td>
<?php
            if (estVisiteurConnecte()){
?>
            	<td align="right"><a href="lister.php?ref=<?php echo $lafleur[$i]["ref"]?>">Ajouter au panier</a></td>
        </tr>
<?php
            }
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>