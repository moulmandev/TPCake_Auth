<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ImagesTable extends Table
{

    public function initialize(array $config): void {
        parent::initialize($config);
        $this->addBehavior('Timestamp');
        $this->hasMany("Commentaires");
    }

    public function validationDefault(Validator $validator): Validator {
        return $validator;
    }
}
