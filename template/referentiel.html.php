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
    <div class="titre-apprenant">
        <div>
            <span>Promotion:</span>
            <span>(<?= $active_promotion ?>)</span>
        </div>
    </div>

    <div class="referent">

        <div class="list-ref">
            <?php foreach ($AllReferentiel as $ref) : ?>
                <div class="ref-classe">
                    <div class="dot"><i class="fa-solid fa-ellipsis"></i></div>
                    <div class="img-titre">
                        <div><img id="class" src="../public/image/<?= $ref['image'] ?>" alt=""></div>
                        <div class="nom-ref">
                            <a href="?m=5&referentiel=<?=($ref['libelle']) ?>">
                                <?= $ref['libelle'] ?>
                            </a>
                        </div>
                        <div class="active"><?= $ref['etat'] ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="nv-ref">
            <div class="titre-nv">Nouveau Reférentiel</div>
            <form action="../public/index.php?m=4" method="post" enctype="multipart/form-data">
                <div>
                    <label for="libelle">Libellé:</label>
                    <input id="libelle" name="libelle" value="<?php echo $libelle; ?>">
                    <?php if (isset($errors['libelle'])) {
                        echo "<span style='color:red;'>{$errors['libelle']}</span>";
                    } ?>
                </div>
                <div>
                    <label for="description">Description:</label>
                    <input id="description" name="description" value="<?php echo $description; ?>">
                    <?php if (isset($errors['description'])) {
                        echo "<span style='color:red;'>{$errors['description']}</span>";
                    } ?>
                </div>
                <div>
                    <label for="image">Photo:</label>
                    <input type="file" name="image" id="image" onchange="previewImage()" />
                    <img id="preview" alt=""> 
                    <?php if (isset($errors['image'])) {         
                    echo "<span style='color:red;'>{$errors['image']}</span>";
                     } ?>
                </div>
                <button class="btn-enrg" type="submit" name="submit">Ajouter Référentiel</button>
            </form>


        </div>
    </div>
</div>
<script>
    function previewImage() {
    var preview = document.getElementById('preview');
    var file = document.getElementById('image').files[0];
    var reader = new FileReader();

    reader.onloadend = function() {
      preview.src = reader.result;
    }

    if (file) {
      reader.readAsDataURL(file);
    } else {
      preview.src = "";
    }
  }
</script>