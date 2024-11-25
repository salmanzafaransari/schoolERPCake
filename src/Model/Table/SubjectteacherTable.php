<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class SubjectteacherTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('subjectteachers');  // Ensure your table name is 'subjectteachers'
        $this->setPrimaryKey('id');  // Define the primary key as 'id'

        // Define the belongsTo relationship with the Classlist model
        $this->belongsTo('Classlist', [
            'foreignKey' => 'class_id',  // This links 'class_id' in Subjectteacher to 'id' in Classlist
            'joinType' => 'INNER',
        ]);

        // Define the belongsTo relationship with the Teacher model
        $this->belongsTo('Teacher', [
            'foreignKey' => 'teacher_id',  // This links 'teacher_id' in Subjectteacher to 'id' in Teacher
            'joinType' => 'INNER',
        ]);

        // Define the belongsTo relationship with the Subject model (assuming the Subject model exists)
        $this->belongsTo('Subject', [
            'foreignKey' => 'subject_id',  // This links 'subject_id' in Subjectteacher to 'id' in Subject
            'joinType' => 'INNER',
        ]);
    
    }
}
