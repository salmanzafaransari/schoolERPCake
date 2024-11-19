<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class ClassteacherTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('class_teachers'); // Set the table name explicitly
        $this->setPrimaryKey('id');

        $this->belongsTo('Classlist', [
         'foreignKey' => 'classes', // Column in Classteacher table referring to Classlist
         'joinType' => 'INNER', // Adjust based on your requirement
     ]);

     $this->belongsTo('Teacher', [
         'foreignKey' => 'teachers', // Column in Classteacher table referring to Teachers
         'joinType' => 'INNER', // Adjust based on your requirement
     ]);
    }
}
