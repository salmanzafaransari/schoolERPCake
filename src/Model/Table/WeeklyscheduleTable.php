<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class WeeklyscheduleTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('weekly_schedules'); // Set the table name explicitly
    }
}
