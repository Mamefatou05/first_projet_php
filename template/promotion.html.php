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
                    <div class="cherche-promo">
                        <form action="" method="POST">
                            <input type="text" name="search" placeholder="rechercher" />
                            <button type="submit"><i class="fa fa-search fa-xm"></i></button>
                        </form>
                    </div>
                    <button><a href="?page=home&m=2">Nouvelle</a></button>
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
                    <?php foreach ($paginationData as $promo) : ?>
                        <div class="Promotions">
                            <div class="lib-promo"><?= $promo['libelle'] ?></div>
                            <div><?= $promo['date_debut'] ?></div>
                            <div><?= $promo['date_fin'] ?></div>
                            <div><?= $promo['active'] ?></div>

                        </div>
                    <?php endforeach; ?>
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
                    <span>
                        <form action="" method="POST">
                            <input type="hidden" name="page" value="<?= ($paginationData['currentPage'] - 1) ?>">
                            <?php if ($paginationData['currentPage'] > 1) : ?>
                                <button type="submit"><i class="fas fa-angle-left"></i></button>
                            <?php else : ?>
                                <!-- Désactiver le bouton si c'est la première page -->
                                <button type="button" disabled><i class="fas fa-angle-left"></i></button>
                            <?php endif; ?>
                        </form>
                    </span>
                    <span>Page <?= $paginationData['currentPage'] ?> - <?= $paginationData['totalPages'] ?></span>
                    <span>
                        <form action="" method="POST">
                            <input type="hidden" name="page" value="<?= ($paginationData['currentPage'] + 1) ?>">
                            <?php if ($paginationData['currentPage'] < $paginationData['totalPages']) : ?>
                                <button type="submit"><i class="fas fa-angle-right"></i></button>
                            <?php else : ?>
                                <!-- Désactiver le bouton si c'est la dernière page -->
                                <button type="button" disabled><i class="fas fa-angle-right"></i></button>
                            <?php endif; ?>
                        </form>
                    </span>

                </div>
            </div>
        </div>
    </div>
</div>