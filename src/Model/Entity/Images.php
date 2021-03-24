<?php


namespace App\Model\Entity;


use Cake\ORM\Entity;

class Images extends Entity
{
    public function toJson() {
        $data =[
            'name' => $this->name,
            'description' => $this->description,
            'width' => $this->width,
            'height' => $this->height,
            'created' => $this->created ?? 'unknown',
            'modified' => $this->modified ?? 'unknown'
        ];

        return json_encode($data);
    }
}

