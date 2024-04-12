<div class="content-body">
    <div class="entete">
        <div class="promo">Presences</div>
        <div class="crea">
            Presences
            <ul>
                <li>Liste</li>
            </ul>
        </div>
    </div>
    <div class="milieu-user">
        <form action="" method="POST">
            <div class=" search-pre">
                <div>
                    <select name="referentiel">
                        <option value="">Tous les référentiels</option>
                        <?php foreach ($referentiels as $referentiel) : ?>
                            <option value="<?= $referentiel ?>" <?= ($referentiel == $selectedReferentiel) ? 'selected' : '' ?>>
                                <?= $referentiel ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <select name="statut">
                        <option value="">Tous les statuts</option>
                        <?php foreach ($statuts as $statut) : ?>
                            <option value="<?= $statut ?>" <?= ($statut == $selectedStatut) ? 'selected' : '' ?>>
                                <?= ucfirst($statut) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <select name="date"> 
                        <option value="">Toutes les dates</option>
                        <?php foreach ($dates as $date) : ?>
                            <option value="<?= $date ?>" <?= ($date == $selectedDate) ? 'selected' : '' ?>>
                                <?= $date ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="raf">
                    <input type="hidden" name="filter_submit" value="true">
                    <button type="submit">Filtrer</button>
                </div>

            </div>
        </form>

        <div class="register4">
            <div class="List-App">
                <div class="liste-apprenant">
                    <div class="titre-liste">
                        <div>Matricule</div>
                        <div>Nom</div>
                        <div>Prénom</div>
                        <div>Téléphone</div>
                        <div>Reférentiel</div>
                        <div>Heure d'arrivée</div>
                        <div>Status</div>
                    </div>
                    <div class="cont-liste">
                        <?php foreach ($filteredPresence as $presenceItem) : ?>

                            <div class="apprenants">
                                <div class="mat"><?= $presenceItem['matricule'] ?></div>
                                <div><?= $presenceItem['nom'] ?></div>
                                <div><?= $presenceItem['prenom'] ?></div>
                                <div><?= $presenceItem['telephone'] ?></div>
                                <div><?= $presenceItem['referentiel'] ?></div>
                                <div class="heure"><?= $presenceItem['heure-arriver'] ?></div>
                                <div>
                                    <div class="statu-PRES"><?= $presenceItem['status'] ?></div>
                                </div>
                            </div>
                        <?php endforeach;  ?>

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
                        <!-- Affichage des boutons précédent et suivant -->
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
                        
                        <span>Page <?= $paginationData['currentPage'] ?> sur <?= $paginationData['totalPages'] ?></span>
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
                        

                        <!-- Affichage des informations sur la pagination -->
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>