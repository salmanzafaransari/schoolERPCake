<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class ShiftTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('shifts'); // Set the table name explicitly
    }
}
