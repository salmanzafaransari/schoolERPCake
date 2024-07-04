<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class ParentTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('parents');
        $this->setPrimaryKey('id');
        // Define relationships if any
        $this->belongsTo('Student', [
            'foreignKey' => 'student_id',
            'joinType' => 'INNER'
        ]);
    }
}
