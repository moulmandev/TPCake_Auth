<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Images</h1>
    </div>

    <div class="mb-2">
        <?php

        echo $this->Form->create(NULL);
        echo $this->Form->control('name',['label' => "Nom de l'image"]);
        echo $this->Form->button('Supprimer');
        echo $this->Form->end();
        ?>
    </div>

</div>
