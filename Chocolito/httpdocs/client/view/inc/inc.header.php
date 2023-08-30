<?php
    if(!isset($menu['page'])|| !$menu['page'])   $menu['page'] = null;

?>
<div class="Sidebar">

  <div class="containerLogo">
     <a href="https://s4-gp87.kevinpecro.info/acceuil"><img class="logo" src="https://cdn.discordapp.com/attachments/982016047911694416/1075194250343501864/chocolitoLOGO.png" alt="logo"></a>
  </div>

  <nav class="NavLink">

    <ul>
      <li class="headerUL" ><a href="liste" <?php if($menu['page']== "liste")  echo "class='active'"?>>liste</a></li>
      <li class="headerUL"><a href="commande" <?php if($menu['page']== "commande")  echo "class='active'"?>>commande</a></li>
      <li class="headerUL"><a href="paiement" <?php if($menu['page']== "paiement")  echo "class='active'"?>>paiement</a></li>
      <li class="headerUL"><a href="teste" <?php if($menu['page']== "teste")  echo "class='active'"?>>teste</a></li>


    </ul>

  </nav>

  <div class="tag">

    <p>© Boursy Theo @chocolito</p>

  </div>






</div>

<div class="main">
  <main>