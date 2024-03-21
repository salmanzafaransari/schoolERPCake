<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class SchooldetailTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('schooldetails'); // Set the table name explicitly
    }
}
