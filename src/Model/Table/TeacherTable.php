<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class TeacherTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('teachers'); // Set the table name explicitly
        $this->setPrimaryKey('id');   // Define the primary key as 'id'

        // Define the hasMany relationship to Subjectteacher
        $this->hasMany('Subjectteacher', [
            'foreignKey' => 'teacher_id', // This links 'teacher_id' in Subjectteacher to 'id' in Teacher
        ]);

    }
}
