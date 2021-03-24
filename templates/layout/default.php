<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?= $this->Html->css([
            "sb-admin-2",
            "fa-all",
            "https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        ]); ?>

        <title>
            <?= $this->fetch('title'); ?>
        </title>
    </head>



    <body id="page-top">
        <div id="wrapper">
            <?= $this->element('front/navigation'); ?>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <?= $this->element('front/header'); ?>

                    <div class="container-fluid">
                        <?= $this->Flash->render(); ?>
                    </div>

                    <?= $this->fetch('content'); ?>
                </div>
                <?= $this->element('front/footer'); ?>
            </div>
        </div>

        <?= $this->Html->script([
            "jquery",
            "bootstrap.bundle",
            "jquery.easing",
            "sb-admin-2"
        ]); ?>

    <body>
</html>
