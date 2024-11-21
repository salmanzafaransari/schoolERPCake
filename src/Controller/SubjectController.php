<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class SubjectController extends AppController
    {

        public function subjectTeacher(){
            $this->loadModel('Classlist');
            $this->loadModel('Teacher');
            $this->loadModel('Subject');
            $this->loadModel('Classsubject');
            $this->loadModel('Subjectteacher');
        
            // Fetch all classes
            $classes = $this->Classlist->find('list', [
                'keyField' => 'id',
                'valueField' => 'class_fullname',
                'conditions' => ['status' => 1]
            ])->toArray();
        
            // Fetch all teachers
            $teachers = $this->Teacher->find('list', [
            'keyField' => 'id',
            'valueField' => 'full_name',
            'conditions' => ['status' => 1]
            ])->toArray();

            $subjectteachers = $this->Subjectteacher->find('all')
            ->contain([
                    'Subject' => ['fields' =>['subject_name', 'subject_code']],
                    'Classlist' => ['fields' => ['class_name', 'section']],
                    'Teacher' => ['fields' => ['first_name', 'middle_name', 'last_name']]
                ])->order(['class_id' => 'ASC'])->toArray();

            $subjects = $this->Subject->find('list',
                [
                'keyField'=>'id',
                'valueField'=>'subject_name',
                'conditions'=> ['status'=>1]
                ])->toArray();

                
                $this->set(compact('classes', 'teachers','subjects','subjectteachers'));
        }

        public function search(){
            $this->loadModel('Classlist');
            $this->loadModel('Teacher');
            $this->loadModel('Subject');
            $this->loadModel('Subjectteacher');

            if ($this->request->is('post')) {
                $data = $this->request->getData();
                // Get the search parameters from the request data
                // debug($data);
                // die();
                $searchParameter = $this->request->getData('search_parameter');
                $classId = $this->request->getData('class_id');
                $subjectId = $this->request->getData('subject_name'); // Assuming this is actually the subject ID
                $teacherId = $this->request->getData('teacher_name'); // Assuming this is actually the teacher ID

                // Initialize the base query
                $query = $this->Subjectteacher->find()
                    ->contain([
                        'Subject' => ['fields' => ['id', 'subject_name', 'subject_code']],
                        'Classlist' => ['fields' => ['id', 'class_name', 'section']],
                        'Teacher' => ['fields' => ['id', 'first_name', 'middle_name', 'last_name']]
                    ]);

                // Apply conditions dynamically based on the search parameter
                if ($searchParameter === 'class_id' && !empty($classId)) {
                    $query->where(['Subjectteacher.class_id' => $classId]);
                } elseif ($searchParameter === 'subject_name' && !empty($subjectId)) {
                    $query->where(['Subjectteacher.subject_id' => $subjectId]);
                } elseif ($searchParameter === 'teacher_name' && !empty($teacherId)) {
                    $query->where(['Subjectteacher.teacher_id' => $teacherId]);
                }

                // Fetch the results
                $subjectteachers = $query->toArray();
                $this->viewBuilder()->disableAutoLayout();
                $this->autoRender = false;

                // Return JSON response
                return $this->response->withType('application/json')->withStringBody(json_encode($subjectteachers));

                
            }
        }

        public function getSubjects(){
            $this->loadModel('Classsubject');
            $this->loadModel('Subject');
            $this->loadModel('Subjectteacher');
            $this->request->allowMethod(['post']);
                
            $classId = $this->request->getData('class_id');

            $classSubject = $this->Classsubject->find()
            ->where(['classes' => $classId])
            ->first();

            if ($classSubject && !empty($classSubject->subjects)) {
                // Explode the comma-separated IDs
                $subjectIds = explode(',', $classSubject->subjects);

                // Fetch subject details for these IDs
                $subjects = $this->Subject->find()
                    ->where(['id IN' => $subjectIds, 'status' => 1])
                    ->all();

                $this->set([
                    'subjects' => $subjects,
                    '_serialize' => ['subjects']
                ]);
            } else {
                $this->set([
                    'subjects' => [],
                    '_serialize' => ['subjects']
                ]);
            }
            
            $this->viewBuilder()->disableAutoLayout();
            $this->autoRender = false;
            
            return $this->response->withType('application/json')->withStringBody(json_encode($subjects));
        }

        public function getTeacherByClassAndSubject() {
            $this->loadModel('Subjectteacher');
            $this->request->allowMethod(['post']);
        
            // Get class_id and subject_id from the request
            $classId = $this->request->getData('class_id');
            $subjectId = $this->request->getData('subject_id');
        
            // Find the teacher assigned to the selected class and subject
            $teacherAssignment = $this->Subjectteacher->find()
                ->where(['class_id' => $classId, 'subject_id' => $subjectId])
                ->first();
        
            $teacherId = null;
            if ($teacherAssignment) {
                $teacherId = $teacherAssignment->teacher_id;
            }
        
            // Return the teacher ID in JSON format
            return $this->response->withType('application/json')->withStringBody(json_encode(['teacher_id' => $teacherId]));
        }
        
        public function save(){
            $this->loadModel('Subjectteacher');

            if ($this->request->is('post')) {
                $data = $this->request->getData();
            
                $classId = $data['class_id'];
                $subjectId = $data['subject_id'];
                $teacherId = $data['teacher_id'];
            
                // Check if the combination of class_id and subject_id already exists
                $existing = $this->Subjectteacher->find()
                    ->where(['class_id' => $classId, 'subject_id' => $subjectId])
                    ->first();
            
                if ($existing) {
                    // Update the existing record
                    $existing->teacher_id = $teacherId;
                    if ($this->Subjectteacher->save($existing)) {
                        $this->Flash->success('Subject teacher updated successfully.');
                    } else {
                        $this->Flash->error('Unable to update the subject teacher. Please try again.');
                    }
                } else {
                    // Insert a new record
                    $newRecord = $this->Subjectteacher->newEntity([
                        'class_id' => $classId,
                        'subject_id' => $subjectId,
                        'teacher_id' => $teacherId
                    ]);
                    if ($this->Subjectteacher->save($newRecord)) {
                        $this->Flash->success('Subject teacher added successfully.');
                    } else {
                        $this->Flash->error('Unable to add the subject teacher. Please try again.');
                    }
                }
            
                return $this->redirect(['action' => 'subjectTeacher']);
            }
            
        }

        public function subjectTime(){
            
        }

        public function subjectAdd(){
            
            $this->loadModel('Subject');
            $subjects = $this->Subject->find()
            ->toArray();
            $subject = $this->Subject->newEmptyEntity();
            $this->set(compact('subjects'));
    
            if ($this->request->is(['post'])) {
                $subject = $this->Subject->patchEntity($subject, $this->request->getData());
        
                if ($this->Subject->save($subject)) {
                    $this->Flash->success(__('Subject Added Successfully'));
                    return $this->redirect(['action' => 'subjectAdd']);
                } else {
                    $this->Flash->error(__('The subject could not be saved. Please, try again.'));
                }
             }
        }
    
        public function toggleStatusSubject($id = null) {
            $this->loadModel('Subject');
            $this->request->allowMethod(['post']);
            $subject = $this->Subject->get($id);
            $subject->status = $subject->status == 1 ? 0 : 1; // Toggle status
            if ($this->Subject->save($subject)) {
                $this->Flash->success(__('The Subject status has been updated.'));
            } else {
                $this->Flash->error(__('The Subject status could not be updated. Please, try again.'));
            }
            return $this->redirect(['action' => 'subjectAdd']);
        }
        public function editSubject()
        {
            $this->request->allowMethod(['post', 'put']); 
            $this->loadModel('Subject');
    
            $data = $this->request->getData();
    
            $subject = $this->Subject->get($data['id']); // Fetch the subject by ID
            $subject = $this->Subject->patchEntity($subject, $data);
    
            if ($this->Subject->save($subject)) {
                $this->Flash->success(__('The subject has been updated.'));
            } else {
                $this->Flash->error(__('Unable to update the subject. Please try again.'));
            }
    
            return $this->redirect(['action' => 'subjectAdd']);
        }

    }


?>