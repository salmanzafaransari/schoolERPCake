<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class AdminController extends AppController
    {

     public function index(){
      
     }
    
    
     
     public function addStudent(){
        $this->loadModel('Classlist');
        $classes = $this->Classlist->find('list', [
            'keyField' => 'id',
            'valueField' => function ($row) {
                $value = $row['class_name'];
                if (!empty($row['section'])) {
                    $value .= ' - ' . $row['section'];
                }
                return $value;
            }
        ]);
        
        // get current session
        $schooldetailsTable = $this->getTableLocator()->get('Schooldetail');
        $currsession = $schooldetailsTable->getSessionList(3); 

        $this->set(compact('classes', 'currsession'));
     }

    }


?>