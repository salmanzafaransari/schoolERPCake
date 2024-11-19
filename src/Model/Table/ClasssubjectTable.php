<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class ClasssubjectTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('class_subjects'); // Set the table name explicitly
    }
}
