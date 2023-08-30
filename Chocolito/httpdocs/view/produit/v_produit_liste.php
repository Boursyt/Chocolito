<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($lstProduit as $unProduit): ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img width="100%" height="225" src="<?=$unProduit['image']?>" alt="image"/>
                            <text x="50%" y="50%" fill="#eceeef" dy=".3em"><?=$unProduit['nom'] ?></text>
                        <div class="card-body">
                            <p class="card-text"><?=substr($unProduit['description'], 0, 100) ?>  </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="produit/<?=$unProduit['identifiant']?>/" class="btn btn-sm btn-outline-secondary">Consulter </a>
                                </div>
                                <small class="text-muted"><?=$unProduit['prix']; echo("€")?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

