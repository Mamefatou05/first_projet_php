<div class="content-body">
    <div class="entete">
        <div class="promo">Promotion</div>
        <div class="crea">
            Promos
            <ul>
                <li>Liste</li>
            </ul>
        </div>
    </div>

    <div class="milieu-promotion">
        <div class="content-milieu">
            <div class="titre-register">
                <div>
                    <span>Listes des promotion</span><span class="nbre">(<?= $totalItems ?>)</span>
                </div>
                <div>
                    <form method="POST" action="">
                        <div class="cherche-promo">
                            <span>
                                <input value="<?= $searchpromo ?>" type="text" name="cherch" placeholder="Rechercher" />
                            </span>
                            <span>
                                <a href="#"><i class="fa fa-search fa-xm"></i></a>
                            </span>
                        </div>
                    </form>
                    <button id="nvel"><a href="?m=2">Nouvelle</a></button>
                </div>
            </div>

            <div class="List-promotion">
                <div class="titre-liste">
                    <div>Libelle</div>
                    <div>Date de debut</div>
                    <div>Date de Fin</div>
                    <div>Action</div>
                </div>

                <div class="cont-liste">
                    <form method="post">
                        <?php foreach ($paginationData['items'] as $promotion) : ?>
                            <div class="Promotions">
                                <div class="lib-promo"><?= $promotion['libelle'] ?></div>
                                <div><?= $promotion['date_debut'] ?></div>
                                <div><?= $promotion['date_fin'] ?></div>
                                <div>
                                    <input type="radio" name="promotion_libelle" value="<?= $promotion['libelle'] ?>" <?php echo PromotionChecked($promotion['libelle'], $selected_promotion_libelle) ? 'checked' : ''; ?> onchange="this.form.submit()">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </form>
                </div>
            </div>
            <div class="dispo">

                <div>
                    <span>Items par page:</span>
                    <span>
                        <select name="perPage" id="perPage">
                            <option value="<?= $perPage ?>"><?= $perPage ?></option>
                        </select>
                    </span>
                </div>

                <div class="pagination">
                    <div class="pagination">
                        <span>
                            <form action="" method="POST">
                                <input type="hidden" name="page" value="<?= max(1, $currentpage - 1) ?>">
                                <button type="submit" <?= ($currentpage <= 1) ? 'disabled' : '' ?>><i class="fas fa-angle-left"></i></button>
                            </form>
                        </span>
                        <span>Page <?= $currentpage ?> sur <?= $totalPages ?></span>
                        <span>
                            <form action="" method="POST">
                                <input type="hidden" name="page" value="<?= min($totalPages, $currentpage + 1) ?>">
                                <button type="submit" <?= ($currentpage >= $totalPages) ? 'disabled' : '' ?>><i class="fas fa-angle-right"></i></button>
                            </form>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>