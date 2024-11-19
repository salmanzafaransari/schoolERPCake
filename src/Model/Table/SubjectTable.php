<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class SubjectTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('subjects'); // Set the table name explicitly
    }
}
