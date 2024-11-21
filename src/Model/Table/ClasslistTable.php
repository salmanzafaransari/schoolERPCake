<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class ClasslistTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('classlists'); // Set the table name explicitly
        $this->setPrimaryKey('id');

        $this->hasMany('Subjectteacher', [
            'foreignKey' => 'class_id', // This links 'class_id' in Subjectteacher to 'id' in Classlist
        ]);
    }
}
