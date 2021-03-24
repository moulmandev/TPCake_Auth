<?php


namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{
    protected $_virtual = ['full_name'];

    protected function _setPassword(string $password)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }

    public function _getFullName() {

        return $this->name . ' ' . $this->lastname;
    }
}

