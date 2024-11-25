<?php
    namespace App\Controller;

    use App\Controller\AppController;
    
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
    use PhpOffice\PhpSpreadsheet\IOFactory;

    class StudentController extends AppController
    {
        public function initialize(): void
        {
            parent::initialize();
            $this->loadComponent('Academics');
        }
        protected function _generateStudentId() {
            $this->loadModel('Student');

            $sequenceCode = $this->Academics->sqCode();
            
            // Get the current year
            $currentYear = date('Y');
            $prefix = $sequenceCode. $currentYear;
        
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
        protected function _parseCsv($filePath) {
            $spreadsheet = IOFactory::load($filePath);
            $worksheet = $spreadsheet->getActiveSheet();

            $expectedHeaders = [
                'admission_id', 'admission_date', 'session', 'class_id', 'first_name',
                'middle_name', 'last_name', 'date_of_birth', 'gender', 'contact',
                'religion', 'cast', 'category', 'address_residential', 'address_permanent', 'status'
            ];

            $data = [];
            $headers = [];

            // Read the first row for headers
            $headerRow = $worksheet->getRowIterator(1, 1)->current();
            $cellIterator = $headerRow->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            
            foreach ($cellIterator as $cell) {
                $headers[] = strtolower(trim($cell->getValue()));
            }

            // Check if the headers match
            if ($headers !== $expectedHeaders) {
                throw new \Exception("XLSX headers do not match expected headers.");
            }

            // Read the data rows starting from row 2
            foreach ($worksheet->getRowIterator(2) as $row) {
                $rowData = [];
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false);

                // Map each cell in the row to the correct header
                $headerIndex = 0;
                foreach ($cellIterator as $cell) {
                    if (isset($expectedHeaders[$headerIndex])) {
                        $rowData[$expectedHeaders[$headerIndex]] = $cell->getValue();
                    }
                    $headerIndex++;
                }

                $data[] = $rowData;
            }

            return $data;
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
            
                if (!empty($student->date_of_birth)) {
                    $student->date_of_birth = $student->date_of_birth->format('d/m/Y');
                }
                if (!empty($student->admission_date)) {
                    $student->admission_date = $student->admission_date->format('d/m/Y');
                }
            } else {
                $admissionId = $this->_generateStudentId();
                $student = $this->Student->newEmptyEntity();
                $student->admission_id = $admissionId;
            }
        
            if ($this->request->is(['post', 'put'])) {
                $data = $this->request->getData();
                if (isset($data['admission_date'])) {
                    $admissionDate = \DateTime::createFromFormat('d/m/Y', $data['admission_date']);
                    if ($admissionDate) {
                        $data['admission_date'] = $admissionDate->format('Y-m-d');
                    }
                }
                
                if (isset($data['date_of_birth'])) {
                    $dob = \DateTime::createFromFormat('d/m/Y', $data['date_of_birth']);
                    if ($dob) {
                        $data['date_of_birth'] = $dob->format('Y-m-d');
                    }
                }
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

        public function studentBulkForm(){
            if ($this->request->is('post')) {
                $this->loadModel('Student');
                // Get the uploaded file
                $fileData = $this->request->getData('student_list');

                // Check if the file is uploaded and is a valid file
                if ($fileData && $fileData->getError() === 0) {
                    // Parse the CSV data using the file path from the UploadedFile object
                    $studentsData = $this->_parseCsv($fileData->getStream()->getMetadata('uri'));

                    // Loop through parsed data and handle each student
                    foreach ($studentsData as $studentRow) {
                        if (empty($studentRow['admission_id']) && empty($studentRow['first_name']) && empty($studentRow['class_id'])) {
                            continue; // Skip this row if it's blank
                        }

                        $student = $this->Student->newEmptyEntity();

                        // Format the admission date
                        if (!empty($studentRow['admission_date'])) {
                            $admissionDate = \DateTime::createFromFormat('Y-m-d', $studentRow['admission_date']);
                            $student->admission_date = $admissionDate ? $admissionDate->format('Y-m-d') : null;
                        }

                        // Format the date of birth
                        if (!empty($studentRow['date_of_birth'])) {
                            $dateOfBirth = \DateTime::createFromFormat('Y-m-d', $studentRow['date_of_birth']);
                            $student->date_of_birth = $dateOfBirth ? $dateOfBirth->format('Y-m-d') : null;
                        }

                        // Ensure integers where necessary
                        $student->admission_id = $studentRow['admission_id'] ?: $this->_generateStudentId();
                        $student->session = $studentRow['session'];
                        $student->class_id = !empty($studentRow['class_id']) ? intval($studentRow['class_id']) : null;
                        $student->first_name = $studentRow['first_name'];
                        $student->middle_name = $studentRow['middle_name'];
                        $student->last_name = $studentRow['last_name'];
                        $student->gender = $studentRow['gender'];
                        $student->contact = $studentRow['contact'];
                        $student->religion = $studentRow['religion'];
                        $student->cast = $studentRow['cast'];
                        $student->category = $studentRow['category'];
                        $student->address_residential = $studentRow['address_residential'];
                        $student->address_permanent = $studentRow['address_permanent'];
                        $student->status = isset($studentRow['status']) ? intval($studentRow['status']) : 0;

                        // Save each student record
                        if (!$this->Student->save($student)) {
                            $this->Flash->error(__('Could not save student: ' . $student->first_name));
                        }
                    }

                    $this->Flash->success(__('Student list has been uploaded successfully.'));
                } else {
                    $this->Flash->error(__('Please upload a valid CSV file.'));
                }
            }
        }
        public function downloadSampleFile()
        {
            // Load class data
            $this->loadModel('Classlist');
            $classData = $this->Classlist->find('list', [
                'keyField' => 'id',
                'valueField' => 'class_name',
            ])->toArray();
            $classIds = array_keys($classData); // Get class IDs for the dropdown

            // Define headers
            $headers = [
                'admission_id',
                'admission_date', // Date format
                'session',
                'class_id',           // Dropdown with class IDs
                'first_name',
                'middle_name',
                'last_name',
                'date_of_birth',  // Date format
                'gender',
                'contact',
                'religion',
                'cast',
                'category',
                'address_residential',
                'address_permanent',
                'status'
            ];

            // Sample data for testing
            $sampleData = [
                ["", "2024-01-01", "2024-2025", "", "John", "A.", "Doe", "2010-08-15", "Male", "1234567890", "Islam", "Doe", "General", "123 Residential St", "456 Permanent St", 1],
                ["", "2024-02-01", "2024-2025", "", "Jane", "B.", "Smith", "2009-10-20", "Female", "9876543210", "Hindu", "Smith", "OBC", "789 Residential Ave", "789 Residential Ave", 1]
            ];

            // Create a new Spreadsheet
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Insert headers
            $sheet->fromArray($headers, NULL, 'A1');

            // Insert sample data
            $sheet->fromArray($sampleData, NULL, 'A2');

            // Calculate total rows for date formatting and dropdown
            $totalRows = count($sampleData) + 1; // Include header row

            // Set date format for admission_date and date_of_birth columns (B and H)
            $sheet->getStyle('B2:B' . $totalRows)->getNumberFormat()->setFormatCode('yyyy-mm-dd');
            $sheet->getStyle('H2:H' . $totalRows)->getNumberFormat()->setFormatCode('yyyy-mm-dd');

            // Set dropdown for class_id column (D)
            $dropdown = implode(',', $classIds); // Convert class IDs to comma-separated list
            $validation = $sheet->getCell('D2')->getDataValidation();
            $validation->setType(DataValidation::TYPE_LIST);
            $validation->setErrorStyle(DataValidation::STYLE_STOP);
            $validation->setAllowBlank(false);
            $validation->setShowDropDown(true);
            $validation->setFormula1('"' . $dropdown . '"');

            // Apply the validation to the entire class_id column (D)
            for ($row = 2; $row <= $totalRows; $row++) {
                $sheet->getCell("D{$row}")->setDataValidation(clone $validation);
            }

            // Output the file
            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="student_bulk_upload_sample.xlsx"');
            $writer->save("php://output");
            exit;
        }

        public function allStudent(){
            $this->loadModel('Student');
            $this->loadModel('Parent');
            $this->loadModel('Classlist');
            $students = $this->Student->find()
            ->contain(['Classlist', 'Parent'])
            ->toArray();
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

            $this->set(compact('students','classes'));
            // debug($students);
            // die();
        }
        public function search(){
            $this->request->allowMethod(['get']);
            $this->loadModel('Student');
            $parameter = $this->request->getQuery('search_parameter');
            $value = $this->request->getQuery('search_value');
            $classId = $this->request->getQuery('class_id');
            $query = $this->Student->find()->contain(['Classlist', 'Parent']);
            if ($parameter === 'student_id' && !empty($value)) {
                $query->where(['Student.admission_id' => $value]);
            } elseif ($parameter === 'student_name' && !empty($value)) {
                $query->where(['OR' => [
                    'Student.first_name LIKE' => '%' . $value . '%',
                ]]);
            } elseif ($parameter === 'father_name' && !empty($value)) {
                $query->matching('Parent', function ($q) use ($value) {
                    return $q->where(['Parent.father_name LIKE' => '%' . $value . '%']);
                });
            } elseif ($parameter === 'class' && !empty($classId)) {
                $query->where(['Student.class_id' => $classId]);
            }
            $students = $query->all();
            $this->set(compact('students'));
            $this->set('_serialize', ['students']);
            $this->viewBuilder()->setLayout('ajax');
    }
        public function addParent(){
            $this->loadModel('Student');
            $this->loadModel('Parent');
            $this->loadModel('Classlist');
        
            // Fetch students and their parent data
            $students = $this->Student->find()
                ->contain(['Classlist', 'Parent'])
                ->toArray();
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
    
                $this->set(compact('students','classes'));
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