<?php $this->start('title') ?>Add Student<?php $this->end() ?>
<?php $this->start('activeStu') ?>sub-group-active<?php $this->end() ?>
<?php $this->start('activeAllStu') ?>menu-active<?php $this->end() ?>
<?php $this->start('stylescss') ?>
    <link rel="stylesheet" href="<?= $this->Url->webroot('css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= $this->Url->webroot('css/jquery.dataTables.min.css') ?>">
    <style>
        #loading{
            display:none;
        }
    </style>
<?php $this->end() ?>
<div class="breadcrumbs-area">
    <h3>Students</h3>
    <ul>
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>All Students</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->
<?= $this->Flash->render() ?>
<!-- Admit Form Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>All Students Data</h3>
            </div>
            <div class="dropdown">
                
            </div>
        </div>
        <?= $this->Form->create(null, ['id' => 'searchForm', 'class' => 'mg-b-20']) ?>
            <div class="row gutters-8">
                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                    <?= $this->Form->select('search_parameter', [
                        'student_id' => 'Admission No.',
                        'student_name' => 'Student Name',
                        'father_name' => 'Father Name',
                        'class' => 'Class'
                    ], ['id' => 'search-parameter', 'class' => 'select2']) ?>
                </div>
                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group" id="search-value-container">
                    <?= $this->Form->text('search_value', ['placeholder' => 'Enter value...', 'id' => 'search-value', 'class' => 'form-control']) ?>
                </div>
                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group d-none" id="class-section-container">
                    <?= $this->Form->control('class_id', ['label' => false, 'class'=>'select2', 'options' => $classes]) ?>
                </div>
                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                    <button type="submit" class="fw-btn-fill btn-gradient-yellow">
                        <i class="fa fa-spinner fa-spin" id="loading"></i> SEARCH
                    </button>

                </div>
            </div>
        <?= $this->Form->end() ?>
        <div class="table-responsive">
            <table class="table display data-table text-nowrap">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Admission No</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Parents/Guardian</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody id="loadSearch">
                <?php 
                            $count =1; 
                            foreach ($students as $student): 
                            ?>
                    <tr>
                        <td align=center>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <span class="flaticon-more-button-of-three-dots"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Disable</a>
                                    
                                    <?php 
                                        echo $this->Html->link(
                                            '<i class="fas fa-cogs text-dark-pastel-green"></i>Edit', 
                                            ['controller' => 'Student', 'action' => 'studentForm', $student->id], 
                                            ['escape' => false, 'class' => 'dropdown-item' . $this->fetch('activeAS')]
                                        ); 
                                        ?>
                                    <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                </div>
                            </div>
                        </td>
                        <td><?php echo h($student->admission_id); ?></td>
                        <td><?php echo h($student->full_name); ?></td>
                        <td align=center><?php echo h($student->gender); ?></td>
                        <td align=center><?php echo h($student->classlist->class_name); ?></td>
                        <td align=center><?php echo h($student->classlist->section); ?></td>
                        <td> 
                        <?php
                            $pstring = '';
                            if(!empty($student->parent)){
                                foreach ($student->parent as $parent) {
                                    if ($parent['parent_type'] == "Double Parents") {
                                        $pstring .= 'Mr & Mrs ' . trim($parent['father_name'] . ' ' . $parent['father_middle_name'] . ' ' . $parent['father_last_name']) . '<br>';
                                    } elseif ($parent['parent_type'] == "Single Parent") {
                                        if (!empty($parent['guardian_gender'])) {
                                            if ($parent['guardian_gender'] == "Male") {
                                                $pstring .= 'Mr ' . trim($parent['guardian_name'] . ' ' . $parent['guardian_middle_name'] . ' ' . $parent['guardian_last_name']) . '<br>';
                                            } elseif ($parent['guardian_gender'] == "Female") {
                                                $pstring .= 'Miss ' . trim($parent['guardian_name'] . ' ' . $parent['guardian_middle_name'] . ' ' . $parent['guardian_last_name']) . '<br>';
                                            }
                                        } else {
                                            $pstring .= 'Mr ' . trim($parent['father_name'] . ' ' . $parent['father_middle_name'] . ' ' . $parent['father_last_name']) . '<br>';
                                        }
                                    }
                                }
                                echo $pstring;
                            }else{
                                $pstring = '<span class="text-danger">Parent Not added yet.</span>';
                                echo $pstring;
                            }
                        ?>

                        </td>
                        <td><?php echo h($student->address_residential); ?></td>
                        
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->start('scripts') ?>
<script src="<?= $this->Url->webroot('js/select2.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        $('#search-parameter').on('change', function() {
            var selectedParam = $(this).val();
            if (selectedParam === 'class') {
                $('#search-value-container').addClass('d-none');
                $('#class-section-container').removeClass('d-none');
            } else {
                $('#search-value-container').removeClass('d-none');
                $('#class-section-container').addClass('d-none');
                var placeholderText = 'Enter value...';
                if (selectedParam === 'student_id') {
                    placeholderText = 'Enter Student ID...';
                } else if (selectedParam === 'student_name') {
                    placeholderText = 'Enter Student Name...';
                } else if (selectedParam === 'father_name') {
                    placeholderText = 'Enter Father Name...';
                }
                $('#search-value').attr('placeholder', placeholderText);
            }
        });

        $('#searchForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= $this->Url->build(['action' => 'search']) ?>',
                method: 'GET',
                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                    $('#loading').css('display','inline-block');
                },
                data: $(this).serialize(),
                success: function(data) {
                    var tbody = $('#loadSearch');
                    tbody.empty(); // Clear existing data
                    var students = data.students
                    // console.log(data);
                    
                    students.forEach(function(student) {
                        var parentDetails = '';
                        var address = '';
                        if (student.parent.length > 0) {
                            student.parent.forEach(function(parent) {
                                if (parent.parent_type === "Double Parents") {
                                    parentDetails += 'Mr & Mrs ' + parent.father_name + ' ' + parent.father_middle_name + ' ' + parent.father_last_name + '<br>';
                                } else if (parent.parent_type === "Single Parent") {
                                    if (parent.guardian_gender === "Male") {
                                        parentDetails += 'Mr ' + parent.guardian_name + ' ' + parent.guardian_middle_name + ' ' + parent.guardian_last_name + '<br>';
                                    } else if (parent.guardian_gender === "Female") {
                                        parentDetails += 'Miss ' + parent.guardian_name + ' ' + parent.guardian_middle_name + ' ' + parent.guardian_last_name + '<br>';
                                    } else {
                                        parentDetails += 'Mr ' + parent.father_name + ' ' + parent.father_middle_name + ' ' + parent.father_last_name + '<br>';
                                    }
                                }
                            });
                        } else {
                            parentDetails = '<span class="text-danger">Parent Not added yet.</span>';
                        }
                        if(student.address_residential == null){
                            address = '';
                        }else{
                            address = student.address_residential;
                        }

                        var row = `
                            <tr>
                                <td align="center">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <span class="flaticon-more-button-of-three-dots"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Disable</a>
                                            <a class="dropdown-item" href="<?= $this->Url->build(['action' => 'studentForm']) ?>/${student.id}"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                        </div>
                                    </div>
                                </td>
                                <td>${student.admission_id}</td>
                                <td>${student.full_name}</td>
                                <td align="center">${student.gender}</td>
                                <td align="center">${student.classlist.class_name}</td>
                                <td align="center">${student.classlist.section}</td>
                                <td>${parentDetails}</td>
                                <td>${address}</td>
                            </tr>
                        `;
                        tbody.append(row);
                    });
                },
                error: function() {
                    alert('There was an error processing your request.');
                },
                complete: function(){
                    $('#loading').css('display','none');
                }
            });
        });
    });
</script>
<script src="<?= $this->Url->webroot('js/jquery.scrollUp.min.js') ?>"></script>
<script src="<?= $this->Url->webroot('js/jquery.dataTables.min.js') ?>"></script>
<?php $this->end() ?>