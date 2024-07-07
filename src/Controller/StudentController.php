<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class StudentController extends AppController
    {
    
    protected function _generateStudentId() {
        $this->loadModel('Student');
        
        // Get the current year
        $currentYear = date('Y');
        $prefix = 'MH' . $currentYear;
    
        // Find the highest existing student ID for the current year
        $existingRecord = $this->Student->find()
            ->select(['admission_id'])
            ->where(['admission_id LIKE' => $prefix . '%'])
            ->order(['admission_id' => 'DESC'])
            ->first();
        if (!$existingRecord) {
            $newId = $prefix . '0001';
        } else {
            $serialNumber = (int)substr($existingRecord->admission_id, 6);
            $serialNumber++;
            $newId = $prefix . str_pad($serialNumber, 4, '0', STR_PAD_LEFT);
        }
        
        return $newId;
    }
        
     public function profile(){
     }
     public function studentForm($studentId = null) {
        $this->loadModel('Classlist');
        $this->loadModel('Student');
        $classes = $this->Classlist->find('list', [
            'keyField' => 'id',
            'valueField' => function ($row) {
                $value = $row['class_name'];
                if (!empty($row['section'])) {
                    $value .= ' ' . $row['section'];
                }
                return $value;
            }
        ])->where(['status' => 1]);
    
        $schooldetailsTable = $this->getTableLocator()->get('Schooldetail');
        $currsession = $schooldetailsTable->getSessionList(3); 
    
        if ($studentId) {
            $student = $this->Student->get($studentId);
            $admissionId = $student->admission_id;
        } else {
            $admissionId = $this->_generateStudentId();
            $student = $this->Student->newEmptyEntity();
            $student->admission_id = $admissionId;
        }
    
        if ($this->request->is(['post', 'put'])) {
            $data = $this->request->getData();
            $isUpdate = isset($student->id) && !empty($student->id);
            $student = $this->Student->patchEntity($student, $data);
            if ($this->Student->save($student)) {
                if ($isUpdate) {
                    $this->Flash->success(__('The student record has been updated.'));
                    return $this->redirect(['action' => 'allStudent']);
                } else {
                    $this->Flash->success(__('The student has been saved.'));
                    return $this->redirect(['action' => 'studentForm']);
                }
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
        $this->loadModel('Parent');
    
        // Fetch students and their parent data
        $students = $this->Student->find()
            ->contain(['Classlist', 'Parent'])
            ->toArray();
            $this->set(compact('students'));
    
        if ($this->request->is(['post', 'put'])) {
            $data = $this->request->getData();
            $studentId = $data['student_id'];
            $existingParent = $this->Parent->find()
                ->where(['student_id' => $studentId])
                ->first();
    
            if ($existingParent) {
                $parent = $this->Parent->patchEntity($existingParent, $data);
            } else {
                $parent = $this->Parent->newEmptyEntity();
                $parent = $this->Parent->patchEntity($parent, $data);
            }
    
            // Save parent data
            if ($this->Parent->save($parent)) {
                $this->Flash->success(__('The parent information has been saved.'));
            } else {
                $this->Flash->error(__('Unable to save the parent information.'));
            }
        }
    }
    
     public function getParentData($studentId)
    {
        $this->loadModel('Student');
        $this->loadModel('Parent');
            $student = $this->Student->get($studentId, [
                'contain' => ['Parent']
            ]);
            
            $parents = $student->parent;
            
            $this->set(compact('parents'));
            $this->set('_serialize', ['parents']);
    }
    }


?>