<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CommentairesTable extends Table
{
    public function initialize(array $config): void {
        parent::initialize($config);
        $this->addBehavior('Timestamp');
        $this->belongsTo("Images");
    }

    public function validationDefault(Validator $validator): Validator {
        return $validator;
    }
}
