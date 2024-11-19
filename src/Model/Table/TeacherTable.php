<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class TeacherTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('teachers'); // Set the table name explicitly
    }
}
