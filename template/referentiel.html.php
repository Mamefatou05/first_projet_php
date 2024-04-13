<div></div>
<div class="content-body">
    <div class="entete">
        <div class="promo">Reférentiel</div>
        <div class="crea">
            Referentiel
            <ul>
                <li>listes</li>
            </ul>
        </div>
    </div>
    <div class="referent">
        <div class="list-ref">
            <?php foreach ($AllReference as $ref) : ?>
                <div class="ref-classe">
                    <div class="dot"><i class="fa-solid fa-ellipsis"></i></div>
                    <div class="img-titre">
                        <div><img id="class" src="<?= $ref['image'] ?>" alt=""></div>
                        <div class="nom-ref"><?= $ref['nom'] ?></div>
                        <div class="active"><?= $ref['etat'] ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="nv-ref">
            <div class="titre-nv">Nouveau Reférentiel</div>
            <form action="">
                <div> <label for="libelle">Libelle</label>
                    <i class="fa-solid fa-user"></i>
                    <input class="input-text" type="text" placeholder="Entrer le libelle" required>
                </div>
                <div> <label for="description">Description</label>
                    <i class="fa-solid fa-user"></i>
                    <input class="input-text" type="text" placeholder="Entrer le description" required>
                </div>
                <button class="btn-enrg"><a href="">Enregistrer</a></button>
            </form>

        </div>
    </div>
</div>