<?php
    namespace App\Controller;

    use App\Controller\AppController;
    

    class TeacherController extends AppController

    {

      public function initialize(): void
      {
          parent::initialize();
          $this->loadComponent('Academics');
      }

      // Helper method to generate the teacher ID
      private function _generateTeacherId()
      {
          $sequenceCode = $this->Academics->sqCode();
          // Retrieve the last teacher ID
          $this->loadModel('Teacher');
          $lastTeacher = $this->Teacher->find()
              ->select(['id_no'])
              ->order(['id_no' => 'DESC'])
              ->first();
          if ($lastTeacher && preg_match('/^'.$sequenceCode.'EMP(\d+)$/', $lastTeacher->id_no, $matches)) {
              $nextId = (int)$matches[1] + 1;
          } else {
              $nextId = 1; // Start with 1 if no ID exists
          }
          return sprintf($sequenceCode.'EMP%03d', $nextId); // Format with 3 leading zeros
      }

      public function index(){
        
      }

      public function allTeacher(){
        $this->loadModel('Teacher');
        $teachers = $this->Teacher->find()
        ->toArray();
        $this->set(compact('teachers'));
      }
      public function teacherDetails($teacherId = null){
        $this->loadModel('Teacher');
          if ($teacherId) {
            // Edit mode: Find the teacher by ID
            $teacher = $this->Teacher->get($teacherId);

            if (!empty($teacher->date_of_joining)) {
              $teacher->date_of_joining = $teacher->date_of_joining->format('d/m/Y');
            }
      
            if (!empty($teacher->date_of_birth)) {
                $teacher->date_of_birth = $teacher->date_of_birth->format('d/m/Y');
            }

          $teacher = $this->Teacher->find()
          ->where(['id' => $teacherId])
          ->first()
          ->toArray();
          $this->set(compact('teacher'));
            
        }
      }
      public function teacherForm($teacherId = null){
        $this->loadModel('Teacher');
  
        if ($teacherId) {
            // Edit mode: Find the teacher by ID
            $teacher = $this->Teacher->get($teacherId);
            $teacher_id_no = $teacher->id_no;

            if (!empty($teacher->date_of_joining)) {
              $teacher->date_of_joining = $teacher->date_of_joining->format('d/m/Y');
            }
      
            if (!empty($teacher->date_of_birth)) {
                $teacher->date_of_birth = $teacher->date_of_birth->format('d/m/Y');
            }
            
        } else {
            // Add mode: Create a new teacher entity
            $teacher = $this->Teacher->newEmptyEntity();
            $teacher_id_no= $this->_generateTeacherId();
            $teacher->id_no = $teacher_id_no;
        }
        
        if ($this->request->is(['post', 'put'])) {
            // Patch the form data into the teacher entity
            $data = $this->request->getData();
            
            if (isset($data['date_of_joining'])) {
              $joiningDate = \DateTime::createFromFormat('d/m/Y', $data['date_of_joining']);
              if ($joiningDate) {
                $data['date_of_joining'] = $joiningDate->format('Y-m-d');
              }
            }
            
            if (isset($data['date_of_birth'])) {
              $dob = \DateTime::createFromFormat('d/m/Y', $data['date_of_birth']);
              if ($dob) {
                $data['date_of_birth'] = $dob->format('Y-m-d');
              }
            }
            // Save the teacher record
            $teacher = $this->Teacher->patchEntity($teacher, $data);
            if ($this->Teacher->save($teacher)) {
                $this->Flash->success(__('The teacher has been saved successfully.'));
            } else {
                $this->Flash->error(__('There was an error saving the teacher. Please try again.'));
            }
        }
    
        $this->set(compact('teacher'));
      }
      public function updateimage($id){
        if ($this->request->is('post')) {
            $this->loadModel('Teacher');
            $teacher = $this->Teacher->get($id);
            // Retrieve the path of the previously stored image
            $previousImage = $teacher->photo;
            // Delete the previous image from the server
            if (!empty($previousImage)) {
                $imagePath = WWW_ROOT . 'img' . DS . $previousImage;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            // Process the new image
            $file = $this->request->getData('photo');
            $uploadPath = WWW_ROOT . 'img';
            $filename = time() . '_' . $file->getClientFilename();
            $file->moveTo($uploadPath . DS . $filename);
            // Update the entity with the new image filename
            $teacher->photo = $filename;
            // Save the entity
            if ($this->Teacher->save($teacher)) {
                $this->Flash->success(__('Teacher Image Updated Successfully'));
            } else {
                $this->Flash->error(__('Failed to update Teacher Image'));
            }
        }
        $this->set(compact('teacher'));
        
    }

    }
?>