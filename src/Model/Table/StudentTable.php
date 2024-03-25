<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class StudentTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('students');
        
        $this->belongsTo('Classlist', [
         'foreignKey' => 'class_id',
         'joinType' => 'INNER' 
     ]);
    }
}
