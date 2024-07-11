<style>


</style>
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
    <div>
    <form method="POST" action="">
    <input type="hidden" name="m" value="4"> </input>

    <label><input type="radio" name="promotion_filter[]" value="all" <?php echo in_array('all', $selected_filters) ? 'checked' : ''; ?>> Tous les référentiels</label><br>
    <label><input type="radio" name="promotion_filter[]" value="assigned" <?php echo in_array('assigned', $selected_filters) ? 'checked' : ''; ?>> Référentiels affectés</label><br>
    <label><input type="radio" name="promotion_filter[]" value="unassigned" <?php echo in_array('unassigned', $selected_filters) ? 'checked' : ''; ?>> Référentiels non affectés</label><br>
    <button type="submit">Filtrer</button>
</form>

    </div>

    <div class="referent">



        <div class="list-ref">
            <?php foreach($filteredReferentiels as $ref) : ?>
                <div class="ref-classe">
                    <div class="dot"><i class="fa-solid fa-ellipsis"></i></div>
                    <div class="img-titre">
                        <div id="class">

                            <img src="../public/image/referentiel/<?= $ref['image'] ?>" alt="" />

                        </div>

                        <div class="nom-ref">
                            <a href="?m=5&referentiel=<?= ($ref['libelle']) ?>">
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
                    <div class="file-upload-container">
                        <label class="custom-file-upload" onclick="chooseFile()">Choisir un fichier</label>

                        <input type="file" name="image" id="image" accept="image/jpeg, image/png, image/jpg, image/gif"  onchange="previewImage()" />

                        <!-- <input type="text" id="imageName" value="<?php  //  echo $file_name;  ?>" readonly> Ajout de la valeur PHP -->

                        <img src="../public/image/referentiel/default.jpg" id="preview" alt="">


                        <?php if (isset($errors['image'])) {
                            echo "<span style='color:red;'>{$errors['image']}</span>";
                        } ?>
                    </div>


                </div>
                <div>
                    <input type="checkbox" id="add_to_promotion" name="add_to_promotion" value="1" style="display: none;">
                    <label for="add_to_promotion" id="toggle_button" class="toggle-button">
                        <span class="circle"></span>
                    </label>
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

    function chooseFile() {
        document.getElementById("image").click();
    }
 
</script>

<!-- <img id="class" src="data:<?php
                                //  echo $img_info['mime']; 
                                ?>;base64,<?php
                                            //  echo base64_encode(gzuncompress( $ref['image'])); 
                                            ?>" 
                     alt=""> -->