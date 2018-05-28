
  <!-- Menu
    ================================================== -->
    <nav class="navbar navbar-inverse navbar-fixed-top ">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="./index.php">Accueil</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active">
                <a href="./index.php">Accueil</a>
              </li>
              <li class="nav">
                <a href="lister.php">Lister</a>
              </li>
              <li class="nav">
                <a href="rechercher.php">Rechercher</a>
              </li>
              <li class="nav">
                <a href="contact.php">Contact</a>
              </li>

            
<?php
// Si session administrateur
if (estAdministrateurConnecte())
{
  ?>
    <li class="nav"> 
      <a href="ajouter.php" >Ajouter </a>  
    </li>
    <li class="nav">          
      <a href="supprimer.php" >Supprimer</a>    
    </li>
    <li class="nav">
       <a href="modifier.php" >Modifier</a> 
    </li>
  <?php
}

if (estVisiteurConnecte()){
  ?>
  <li class="nav"> 
    <a href="panier.php" >Panier </a>  
  </li>
  <?php
}

if (!estConnecte())
{
  ?>
      <li class="nav">  
        <a href="connecter.php" >Se connecter</a> 
      </li>
      <li class="nav">  
        <a href="signup.php" >S'inscrire</a> 
      </li>    
  <?php
}   


if (estConnecte())
{
  ?>
      <li class="nav">  
        <a href="deconnecter.php" >Se deconnecter</a> 
      </li>   
  <?php
}


  ?> 
            </ul>
          </div>
        </div>
      </div>
    </div>
</nav>

