<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{

    public function initialize(array $config): void {
    }

    public function validationDefault(Validator $validator): Validator {
        return $validator;
    }
}
