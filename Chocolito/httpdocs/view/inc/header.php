<?php
    if(!isset($menu['page'])|| !$menu['page'])   $menu['page'] = null;

?>
<header class="header">
    
    <div >
        <a href="/acceuil"><img class="logo" src="https://cdn.discordapp.com/attachments/982016047911694416/1075194250343501864/chocolitoLOGO.png" alt="logo">
        </a>
        </div>
    <ul  class="nav nav-pills" >

        <li class="nav-item">
            <a href="/acceuil" class="nav-link <?php if($menu['page']== "acceuil")  echo "active"?>" aria-current="page">acceuil</a>
        </li>
        <li class="nav-item">
            <a href="/produit" class="nav-link <?php if($menu['page']== "produit")  echo "active"?>" aria-current="page">produit</a>
        </li>
        <li class="nav-item">
            <a href="/post" class="nav-link <?php if($menu['page']== "post")  echo "active"?>" aria-current="page">blog</a>
        </li>
        <li class="nav-item">
            <a href="/panier" class="nav-link <?php if($menu['page']== "panier")  echo "active"?>" aria-current="page">panier</a>
        </li>
        <li class="nav-item">
            <a href="https://s4-gp87.kevinpecro.info/client/liste" class="nav-link <?php if($menu['page']== "client")  echo "active"?>" aria-current="page">client</a>
        </li>

    </ul>

</header>
    </div>

<main>

