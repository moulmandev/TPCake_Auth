<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Form\ContactForm;

class ImagesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->Authentication->allowUnauthenticated(['get', 'index', 'view']);
    }

    public function index() {
        $nbrToDraw = 10;
        $page = $this->request->getParam('pass')[0] ?? "0";

        $images = $this->Images
            ->find()
            ->where([
                "id > " => $page * $nbrToDraw,
                "id <= " => ($page * $nbrToDraw) + $nbrToDraw
            ])
            ->limit($nbrToDraw)
            ->toArray();

        $maxPages = floor($this->Images->find()->count() / $nbrToDraw);
        $this->set(compact("images", "page", "maxPages"));
    }

    public function get() {
        $exactImageName = $this->request->getParam('pass')[0] ?? NULL;
        $limit = $this->getRequest()->getQuery('limit') ?? NULL;
        $imageName =  $this->getRequest()->getQuery('name') ?? NULL;
        $comments = $this->getTableLocator()->get('Commentaires');

        if($limit == null && $imageName == null) {
            if ($exactImageName != null) {
                $dataTab = $this->Images->find()->where(["name" => $exactImageName])->toArray();
                $comments->find()->where(["name" => $exactImageName])->toArray();

            } else {
                $dataTab = $this->Images->find()->all()->toArray();
            }
        }
        else{
            $dataTab = $this->Images->find()->where(["name LIKE " => "%".$imageName."%"])->limit($limit)->toArray();
        }

        return $this->response
            ->withStringBody(json_encode($dataTab))
            ->withType('application/json');
    }

    public function view() {
        $imgIndex = $this->request->getParam('pass')[0] ?? NULL;

        if ($imgIndex != null) {
            $data = $this->Images
                ->find()
                ->contain(["Commentaires"])
                ->where(["name" => $imgIndex])
                ->order(['created' => 'DESC'])
                ->toArray();
        }
        $this->add_comments($data);

        $this->set(compact('data'));
    }

    public function add() {
        if ($this->request->is('post')) {
            $fileobject = $this->request->getData('submittedfile');
            $uploadPath = WWW_ROOT . 'img/exif-samples-master/jpg/';
            $destination = $uploadPath.$fileobject->getClientFilename();

            if (file_exists($destination)) {
                $this->Flash->error("Le fichier existe déjà");
            } else {
                $image = $this->Images->newEmptyEntity();

                $this->Images->patchEntity($image, $this->getRequest()->getData());

                if ($this->Images->save($image)) {
                    $fileobject->moveTo($destination);
                    $this->Flash->success("Fichier ajouté avec succès");
                } else {
                    $this->Flash->error("Une erreur est survenue lors de la sauvegarde du fichier");
                }
            }
        }
    }

    public function add_comments($dataImg){
        $commentLocator = $this->getTableLocator()->get('Commentaires');
        $commentsEntity = $commentLocator->newEmptyEntity();

        if(!empty($this->getRequest()->getData())) {
            $comment = $this->request->getData('comment');
            $data = [
                "image_id" => $dataImg[0]["id"],
                "comment" => $comment,
            ];
            $commentLocator->patchEntity($commentsEntity, $data);
            if ($commentLocator->save($commentsEntity)) {
                $this->Flash->success("Ajout du commentaire réussi");
            } else {
                $this->Flash->error("Erreur lors de la sauvegarde du commentaire");
            }
        }
    }

    public function delete() {
        if ($this->request->is('post')) {

            $fileName = $this->request->getData('name');

            $destination = WWW_ROOT . IMAGE_PATH . $fileName;

            if (file_exists($destination)) {
                $imageEntity = $this->Images
                    ->find()
                    ->where(["name" => $fileName])
                    ->toArray();

                if($this->Images->delete($imageEntity[0])){
                    $this->Flash->success("Suppression avec succès");
                    unlink($destination);
                }
            } else {
                $this->Flash->error("Le fichier n'existe pas");
            }
        }
    }
}
