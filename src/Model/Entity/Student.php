<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Student extends Entity
{
    protected function _getFullName(): string
    {
        $fullName = '';
        if ($this->has('first_name')) {
            $fullName .= $this->first_name;
        }
        if ($this->has('middle_name')) {
            $fullName .= ' ' . $this->middle_name;
        }
        if ($this->has('last_name')) {
            $fullName .= ' ' . $this->last_name;
        }
        return $fullName;
    }
}