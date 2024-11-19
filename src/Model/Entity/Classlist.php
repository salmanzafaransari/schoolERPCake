<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Classlist extends Entity
{
    protected $_virtual = ['class_fullname'];
    
    protected function _getClassFullname()
    {
        return trim($this->class_name . ' ' . $this->section);
    }
}