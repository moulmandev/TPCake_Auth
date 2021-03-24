<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Images</h1>
    </div>

    <?php

    if (!empty($this->Session->read("Auth.id"))) {

        echo $this->Html->link(
            'Ajouter une image',
            '/add',
            ['class' => 'btn btn-secondary align-middle']
        );
        echo $this->Html->link(
            'Supprimer une image',
            '/delete',
            ['class' => 'btn btn-secondary align-middle']
        );
        echo "<br><br>";
    } else {
        echo $this->Html->link(
            'Se connecter',
            '/users/login',
            ['class' => 'btn btn-secondary align-middle']
        );
        echo "<br><br>";
    }

    /** @var int $page */
    if ($page > 0) {
        echo $this->Html->link(
            'Page précédente',
            (($page - 1) == 0 ? "/" : "/page/" . ($page - 1)),
            ['class' => 'btn btn-primary align-middle']
        );
    }
    /** @var int $maxPages */
    if ($page != $maxPages) {
        echo $this->Html->link(
            'Page suivante',
            "/page/" . ($page + 1),
            ['class' => 'btn btn-primary align-middle']
        );
    }

    ?>

    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg mb-2">
            <?php
            /** @var array $images */
            foreach ($images as $k => $v) {
            echo '<div class="card shadow mb-4">';
                echo '<div class="card-header py-3">';
                echo '</div>';
                echo '<div class="card-body">';
                    echo $this->Html->image(IMAGE_PATH.$v["name"], ['alt' => ($v['description'] ?? 'no description')]);
                    echo "<br>";
                    echo $this->Html->link(
                        'Voir plus',
                        "/view/".$v["name"],
                        ['class' => 'btn btn-primary align-middle']
                    );
                echo "</div>";
            echo "</div>";
            }

            ?>

        </div>
    </div>
</div>
