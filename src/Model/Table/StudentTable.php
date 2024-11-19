<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Entity;

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
        // $this->belongsTo('Parent', [
        //     'foreignKey' => 'student_id',
        //     'joinType' => 'INNER'
        // ]);
        $this->hasMany('Parent', [
            'foreignKey' => 'student_id',
            'joinType' => 'INNER'
        ]);
    }
}
