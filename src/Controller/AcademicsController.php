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
    public function toggleStatus($id = null) {
        $this->loadModel('Classlist');
        $this->request->allowMethod(['post']);
        $class = $this->Classlist->get($id);
        $class->status = $class->status == 1 ? 0 : 1; // Toggle status
        if ($this->Classlist->save($class)) {
            $this->Flash->success(__('The class status has been updated.'));
        } else {
            $this->Flash->error(__('The class status could not be updated. Please, try again.'));
        }
        return $this->redirect(['action' => 'addClass']);
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
    public function updateLogo($id){
        if ($this->request->is('post')) {
            $this->loadModel('Schooldetail');
            $schoolinfo = $this->Schooldetail->get($id);
            // Retrieve the path of the previously stored image
            $previousImage = $schoolinfo->school_logo;
            // Delete the previous image from the server
            if (!empty($previousImage)) {
                $imagePath = WWW_ROOT . 'img' . DS . $previousImage;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            // Process the new image
            $file = $this->request->getData('school_logo');
            $uploadPath = WWW_ROOT . 'img';
            $filename = time() . '_' . $file->getClientFilename();
            $file->moveTo($uploadPath . DS . $filename);
            // Update the entity with the new image filename
            $schoolinfo->school_logo = $filename;
            // Save the entity
            if ($this->Schooldetail->save($schoolinfo)) {
                $this->Flash->success(__('School logo Updated Successfully'));
                return $this->redirect(['action' => 'schoolDetails']);
            } else {
                $this->Flash->error(__('Failed to update school logo'));
            }
        }
        
        $this->set(compact('schoolinfo'));
        
    }

 

  }
?>