<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class ClasslistTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('classlists'); // Set the table name explicitly
    }
}
