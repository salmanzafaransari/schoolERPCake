<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class AdminController extends AppController
    {

     public function index(){
      
     }
     
     public function addClass() {
        $this->loadModel('Classlist');
        $class = $this->Classlist->newEmptyEntity();
        if ($this->request->is('post')) {
            $class = $this->Classlist->patchEntity($class, $this->request->getData());
            if ($this->Classlist->save($class)) {
                // Data saved successfully
                $this->Flash->success(__('The class has been Added Successfully.'));
                return $this->redirect(['action' => 'addClass']); // Redirect to index or any other page
            } else {
                // Data failed to save
                $this->Flash->error(__('The class could not be saved. Please, try again.'));
            }
        }
        $classes = $this->Classlist->find('all');
        $this->set(compact('classes'));
        $this->render('Class/add_class');
    }
    public function loadAllClass(){
        $this->loadModel('Classlist');
        // Fetch all classes from the Classlist model
        // debug($classes);
    }
    
     
     public function addStudent(){
      
     }

    }


?>