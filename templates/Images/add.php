<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Images</h1>
    </div>

    <div class="mb-2">
        <?php

        echo $this->Form->create(NULL, ['type' => 'file']);
        echo $this->Form->file('submittedfile');
        echo $this->Form->control('name',['label' => "Nom de l'image"]);
        echo $this->Form->control('description',['label' => "Description de l'image"]);
        echo $this->Form->control('width',['label' => "Largeur de l'image"]);
        echo $this->Form->control('height',['label' => "Hauteur de l'image"]);
        echo $this->Form->button('Envoyer');
        echo $this->Form->end();
        ?>
    </div>

</div>
