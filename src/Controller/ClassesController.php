<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ClassesController extends AppController
    {

     public function index(){
      
     }
     public function listClassSubjects(){
        $this->loadModel('Classsubject');
        $this->loadModel('Subject');
        $this->loadModel('Classlist');

        // Fetch all class subjects
        $classSubjects = $this->Classsubject->find('all')->toArray();

        $subjects = [];
        foreach ($classSubjects as $classSubject) {
            $subjectIds = explode(',', $classSubject->subjects);
            $classId = $classSubject->class_id;

            // Get class name
            $className = $this->Classlist->get($classId)->class_fullname;

            // Get subject details
            $subjectDetails = $this->Subject->find('all', [
                'conditions' => ['id IN' => $subjectIds],
            ])->toArray();

            foreach ($subjectDetails as $subject) {
                $subjects[] = [
                    'class_name' => $className,
                    'subject_name' => $subject->subject_name,
                    'subject_code' => $subject->subject_code,
                    'status' => $subject->status, // Assuming 'status' is part of the `subjects` table
                ];
            }
        }
        $this->set(compact('subjects'));
     }

     public function addSubjects(){
         $this->loadModel('Classlist');
         $this->loadModel('Subject');
         $this->loadModel('Classsubject');

         $classSubjects = $this->Classsubject->find('all')->toArray();

         $groupedSubjects = []; // To store grouped data
         foreach ($classSubjects as $classSubject) {
             $subjectIds = explode(',', $classSubject->subjects);
             $classId = $classSubject->classes;
         
             // Get class name
             $className = $this->Classlist->get($classId)->class_fullname;
             // Get subject details
             $subjectDetails = $this->Subject->find('all', [
                 'conditions' => ['id IN' => $subjectIds],
             ])->toArray();
         
             // Prepare subjects as "Subject Name (Subject Code)"
             $formattedSubjects = [];
             foreach ($subjectDetails as $subject) {
                 $formattedSubjects[] = "{$subject->subject_name} ({$subject->subject_code})";
             }
         
             // Group subjects by class
             if (!isset($groupedSubjects[$className])) {
                 $groupedSubjects[$className] = [
                     'class_name' => $className,
                     'class_id'=> $classId,
                     'subjects' => [],
                 ];
             }
             $groupedSubjects[$className]['subjects'] = array_merge($groupedSubjects[$className]['subjects'], $formattedSubjects);
         }
         // Fetch classes and subjects for the dropdowns
         $classes = $this->Classlist->find('list', [
             'keyField' => 'id',
             'valueField' => 'class_fullname',
             'conditions' => [
                 'status' => 1 // Only include active subjects
             ]
         ])->toArray();
         
         $subjects = $this->Subject->find('list', [
             'keyField' => 'id',
             'valueField' => 'subject_name',
             'conditions' => [
                  'status' => 1
              ]
         ])->toArray();
         
         $this->set(compact('classes', 'subjects','groupedSubjects'));
         
         if ($this->request->is(['post'])) {
             $data = $this->request->getData();
             
             // Convert 'subjects' array into a comma-separated string
             if (isset($data['subjects']) && is_array($data['subjects'])) {
                 $data['subjects'] = implode(',', $data['subjects']);
             }
     
             // Check if a record for the selected class already exists
             $existingRecord = $this->Classsubject->find()
                 ->where(['classes' => $data['classes']])
                 ->first();
     
             if ($existingRecord) {
                 // Update existing record
                 $existingRecord = $this->Classsubject->patchEntity($existingRecord, $data);
                 if ($this->Classsubject->save($existingRecord)) {
                     $this->Flash->success(__('Subjects updated for the selected class.'));
                     return $this->redirect(['action' => 'addSubjects']);
                 } else {
                     $this->Flash->error(__('The subjects could not be updated. Please, try again.'));
                 }
             } else {
                 // Insert new record
                 $subject = $this->Classsubject->newEmptyEntity();
                 $subject = $this->Classsubject->patchEntity($subject, $data);
                 if ($this->Classsubject->save($subject)) {
                     $this->Flash->success(__('Subjects added to the class successfully.'));
                     return $this->redirect(['action' => 'addSubjects']);
                 } else {
                     $this->Flash->error(__('The subjects could not be saved. Please, try again.'));
                 }
             }
         }
     }

     public function classTeacher(){
             $this->loadModel('Classlist');
             $this->loadModel('Teacher');
             $this->loadModel('Classteacher');

             $classteacher = $this->Classteacher->find('all', [
                 'contain' => [
                     'Classlist' => ['fields' => ['id', 'class_name', 'section']],
                     'Teacher' => ['fields' => ['id', 'first_name', 'middle_name', 'last_name']]
                 ],
             ])->toArray();

             $classes = $this->Classlist->find('list', [
                 'keyField' => 'id',
                 'valueField' => 'class_fullname',
                 'conditions' => ['status' => 1]
             ])->toArray();

             $teachers = $this->Teacher->find('list', [
                 'keyField' => 'id',
                 'valueField' => 'full_name',
                 'conditions' => ['status' => 1]
             ])->toArray();

             $this->set(compact('classteacher', 'teachers', 'classes'));
          
          if ($this->request->is(['post'])) {
           $data = $this->request->getData();

           // Check if a record for the selected class already exists
           $existingRecord = $this->Classteacher->find()
           ->where(['classes' => $data['classes']])
           ->first();

            if ($existingRecord) {
                // Update existing record
                $existingRecord = $this->Classteacher->patchEntity($existingRecord, $data);
                if ($this->Classteacher->save($existingRecord)) {
                    $this->Flash->success(__('Class Teacher updated for the selected class.'));
                    return $this->redirect(['action' => 'classTeacher']);
                } else {
                    $this->Flash->error(__('The subjects could not be updated. Please, try again.'));
                }
            } else {
                // Insert new record
                $classteacher = $this->Classteacher->newEmptyEntity();
                $classteacher = $this->Classteacher->patchEntity($classteacher, $data);
                if ($this->Classteacher->save($classteacher)) {
                    $this->Flash->success(__('Class Teacher has assigned to the class successfully.'));
                    return $this->redirect(['action' => 'classTeacher']);
                } else {
                    $this->Flash->error(__('The Class Teacher could not be saved. Please, try again.'));
                }
            }

        }
     }

     public function checkClassSubjects(){
         $this->request->allowMethod(['post']);
         $targetClassId = $this->request->getData('target_class_id');

         $this->loadModel('Classsubject');

         // Check if target class already has subjects
         $existingClass = $this->Classsubject->find()
             ->where(['classes' => $targetClassId])
             ->first();

         $response = [
             'hasSubjects' => $existingClass ? true : false,
         ];
         // Disable view rendering
         $this->viewBuilder()->disableAutoLayout();
         $this->autoRender = false;

         // Return JSON response
         return $this->response->withType('application/json')->withStringBody(json_encode($response));

     }

     public function copySubjects(){
         $this->request->allowMethod(['post']);
         $sourceClassId = $this->request->getData('source_class_id');
         $targetClassId = $this->request->getData('target_class_id');

         $this->loadModel('Classsubject');

         // Fetch subjects for the source class
         $sourceClass = $this->Classsubject->find()
             ->where(['classes' => $sourceClassId])
             ->first();

         if (!$sourceClass) {
             return $this->response->withType('application/json')->withStringBody(json_encode([
                 'status' => 'error',
                 'message' => 'No subjects found for the source class.',
             ]));
         }

         // Check if the target class already has subjects
         $existingClass = $this->Classsubject->find()
             ->where(['classes' => $targetClassId])
             ->first();

         if ($existingClass) {
             // Update the existing class subjects
             $existingClass->subjects = $sourceClass->subjects;
             if ($this->Classsubject->save($existingClass)) {
                 return $this->response->withType('application/json')->withStringBody(json_encode([
                     'status' => 'success',
                     'message' => 'Subjects updated successfully for the target class.',
                 ]));
             }
         } else {
             // Insert new record for the target class
             $newClassSubject = $this->Classsubject->newEntity([
                 'classes' => $targetClassId,
                 'subjects' => $sourceClass->subjects,
             ]);

             if ($this->Classsubject->save($newClassSubject)) {
                 return $this->response->withType('application/json')->withStringBody(json_encode([
                     'status' => 'success',
                     'message' => 'Subjects copied successfully to the target class.',
                 ]));
             }
         }

         return $this->response->withType('application/json')->withStringBody(json_encode([
             'status' => 'error',
             'message' => 'Failed to copy subjects. Please try again.',
         ]));
     }

     public function getClassSubjects($classId = null){
        $this->RequestHandler->renderAs($this, 'json');
        $this->request->allowMethod(['ajax']);
        $this->loadModel('Classsubject');

        if (!$classId) {
            throw new BadRequestException(__('Invalid Class ID'));
        }

        $classSubjects = $this->Classsubject->find()
            ->where(['classes' => $classId])
            ->select(['subjects'])
            ->first();

        $subjectIds = [];
        if ($classSubjects) {
            $subjectIds = explode(',', $classSubjects->subjects); // Assuming 'subjects' is stored as a comma-separated string
        }

        $this->set('subjectIds', $subjectIds);
        $this->set('_serialize', ['subjectIds']); // For JSON response
     }


  }
?>