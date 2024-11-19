<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Teacher extends Entity
{
    protected $_virtual = ['full_name'];
    
    protected function _getFullName()
    {
        return trim($this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name);
    }
}