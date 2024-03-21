<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class AcademicsController extends AppController
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
    }
    public function deleteClass($id = null) {
        $this->loadModel('Classlist');
        $this->request->allowMethod(['post', 'delete']);
    
        $class = $this->Classlist->get($id);
    
        if ($this->Classlist->delete($class)) { 
            $this->Flash->success(__('The class has been deleted.'));
        } else {
            $this->Flash->error(__('The class could not be deleted. Please, try again.'));
        }
    
        return $this->redirect(['action' => 'addClass']); // Redirect to the class list page
    }

    public function schoolDetails(){
        $this->loadModel('Schooldetail');
        $school = $this->Schooldetail->newEmptyEntity();
        $schoolinfo = $this->Schooldetail->find()->first();
        $this->set(compact('schoolinfo'));
        if ($this->request->is(['post', 'put'])) {
        $school = $this->Schooldetail->get($schoolinfo->id);
        $school = $this->Schooldetail->patchEntity($school, $this->request->getData());

        if ($this->Schooldetail->save($school)) {
            $this->Flash->success(__('School Information Updated Successfully'));
            return $this->redirect(['action' => 'schoolDetails']);
        } else {
            $this->Flash->error(__('The school information could not be updated. Please, try again.'));
        }
    }
    }

   }
?>