<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class StudentController extends AppController
    {
    
      protected function _generateStudentId()
        {
            $this->loadModel('Student');
            do {
                // Generate a random ID
                $randomNumber = mt_rand(1111, 9999);
                $currentYear = date('Y'); // Get the current year
                $newId = 'MH' . $currentYear .'/'. str_pad($randomNumber, 4, '0', STR_PAD_LEFT);

                // Check if the generated ID already exists in the database
                $existingRecord = $this->Student->find()->where(['admission_id' => $newId])->first();
            } while ($existingRecord); // Repeat if the ID already exists
            return $newId;
      }
     public function profile(){
     }
     public function addStudent($studentId = null) {
        $this->loadModel('Classlist');
        $this->loadModel('Student');
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
    
        // Check if a student ID is provided for editing
        if ($studentId) {
            $student = $this->Student->get($studentId);
            // Pass the existing admission ID to the view
            $admissionId = $student->admission_id;
        } else {
            // Generate admission ID for new student
            $admissionId = $this->_generateStudentId();
            // Create a new student entity and set admission_id
            $student = $this->Student->newEmptyEntity();
            $student->admission_id = $admissionId;
        }
    
        if ($this->request->is(['post', 'put'])) {
            $data = $this->request->getData();
            
            $student = $this->Student->patchEntity($student, $data);
            if ($this->Student->save($student)) {
                $this->Flash->success(__('The student has been saved.'));
                return $this->redirect(['action' => 'addStudent']);
            } else {
                $this->Flash->error(__('Unable to save the student.'));
            }
        }
        $this->set(compact('classes', 'currsession', 'admissionId', 'student'));
     }
     public function allStudent(){
        $this->loadModel('Student');
        $students = $this->Student->find()
        ->contain('Classlist')
        ->toArray();
        $this->set(compact('students'));
     }
     public function addParent(){
        $this->loadModel('Student');
        $students = $this->Student->find()
        ->contain('Classlist')
        ->toArray();
        $this->set(compact('students'));
     }
    }


?>