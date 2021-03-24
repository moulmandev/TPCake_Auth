<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Images</h1>
    </div>

    <div class="mb-2">
        <?php

        echo '<div class="card shadow mb-4">';
        echo '<div class="card-header py-3">';
        /** @var array $data */
        echo '<h6 class="m-0 font-weight-bold text-primary">'.$data[0]["name"].'</h6>';
        echo '</div>';
        echo '<div class="card-body">';
        echo $this->Html->image(IMAGE_PATH.$data[0]["name"], ['alt' => ($data[0]['description'] ?? 'no description')]);
        echo "</div>";
        echo "</div>";
        ?>
    </div>


    <?php
    if (!empty($this->Session->read("Auth.id"))) {
        echo '<div class="mb-2">';
        echo '<div class="card shadow mb-4">';
        echo '<div class="card-header py-3">';
        echo '<h6 class="m-0 font-weight-bold text-primary">Commentaires</h6>';
        echo '</div>';
        echo '<div class="card-body">';
        echo '<div class="panel-group tool-tips widget-shadow" >';
        echo $this->Form->create(null);
        echo $this->Form->control('comment', ['label' => "Ajouter un commentaire"]);
        echo $this->Form->button('Envoyer');
        echo $this->Form->end();
        echo "</div>";
        echo "</div>";
        echo '</div>';
    }
    ?>

    <?php
    foreach ($data[0]["commentaires"] as $value){
        echo '<div class="mb-2">';
            echo '<div class="card shadow mb-4">';
            echo '<div class="card-header py-3">';
            echo '</div>';
            echo '<div class="card-body">';
            echo '<div class="panel-group tool-tips widget-shadow" >';
                echo '<p>Créer le : '.$value["created"].'</p>';
                echo '<p>Dernière modification le : '.$value["modified"].'</p>';
                echo '<p>'.$value["comment"].'</p>';
            echo "</div>";
            echo "</div>";
        echo '</div>';
    }
    ?>
</div>
