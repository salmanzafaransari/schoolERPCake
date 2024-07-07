<?php $this->start('title') ?>Add Parents<?php $this->end() ?>
<?php $this->start('activeStu') ?>sub-group-active<?php $this->end() ?>
<?php $this->start('activeAP') ?>menu-active<?php $this->end() ?>
<?php $this->start('stylescss') ?>
<link rel="stylesheet" href="<?= $this->Url->webroot('css/select2.min.css') ?>">
<link rel="stylesheet" href="<?= $this->Url->webroot('css/jquery.dataTables.min.css') ?>">
<?php $this->end() ?>
<div class="breadcrumbs-area">
    <h3>Students</h3>
    <ul>
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>Student parents Form</li>
    </ul>
</div>
<?= $this->Flash->render() ?>
<!-- Admit Form Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>All Parents Data</h3>
            </div>
            <div class="dropdown">
                
            </div>
        </div>
        <form class="mg-b-20">
            <div class="row gutters-8">
                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                    <input type="text" placeholder="Search by Roll ..." class="form-control">
                </div>
                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                    <input type="text" placeholder="Search by Name ..." class="form-control">
                </div>
                <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                    <input type="text" placeholder="Search by Class ..." class="form-control">
                </div>
                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                    <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                </div>
            </div>
        </form>
        <!-- <div class="table-responsive">
            <table class="table display data-table text-nowrap">
            <thead>
                <div class="dropdown">
                   <button type="button" class="modal-trigger" data-toggle="modal"
                       data-target="#large-modal" data-student="">
                       SEARCH
                   </button>
                </div>
                
             </div> 
                </thead>
            </table>
        </div> -->
        
        <div class="table-responsive">
            <table class="table display data-table text-nowrap">
                <thead>
                    <tr>
                        <th>Admission No</th>
                        <th>Full Name</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Parents / Guardian</th>
                        <th>Address</th>
                        <th>Date Of Birth</th>
                    </tr>
                </thead>
                <div class="modal fade" id="large-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Parents</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?= $this->Form->create(null, ['class' => 'new-added-form', 'id'=> 'parentForm']) ?>
                                <?= $this->Form->hidden('student_id', ['id' => 'student_id']) ?>
                                <div class="form-group">
                                    <?= $this->Form->control('parent_type', ['type' => 'select', 'options' => ['Double Parents' => 'Double Parents', 'Single Parent' => 'Single Parent'], 'empty' => 'Select Parent Type', 'id' => 'parent-type', 'class' => 'select2']) ?>
                                </div>

                                <!-- Father Details -->
                                <div id="father-details">
                                    <h3>Father Details</h3>
                                    <div class="row p-3">
                                        <div class="col-xl-4 form-group">
                                            <?= $this->Form->control('father_name', ['label' => 'Name', 'class' => 'form-control']) ?>
                                        </div>
                                        <div class="col-xl-4 form-group">
                                            <?= $this->Form->control('father_middle_name', ['label' => 'Middle Name', 'class' => 'form-control']) ?>
                                        </div>
                                        <div class="col-xl-4 form-group">
                                            <?= $this->Form->control('father_last_name', ['label' => 'Last Name', 'class' => 'form-control']) ?>
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('father_address', ['label' => 'Address', 'class' => 'form-control']) ?>
                                        </div>
                                        <div class="col-xl-6 form-group">
                                            <?= $this->Form->control('father_mobile', ['label' => 'Mobile', 'class' => 'form-control']) ?>
                                        </div>
                                        <div class="col-xl-6 form-group">
                                            <?= $this->Form->control('father_email', ['label' => 'Email', 'class' => 'form-control']) ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Mother Details -->
                                <div id="mother-details">
                                    <h3>Mother Details</h3>
                                    <div class="row p-3">
                                        <div class="col-xl-4 form-group">
                                            <?= $this->Form->control('mother_name', ['label' => 'Name', 'class' => 'form-control']) ?>
                                        </div>
                                        <div class="col-xl-4 form-group">
                                            <?= $this->Form->control('mother_middle_name', ['label' => 'Middle Name', 'class' => 'form-control']) ?>
                                        </div>
                                        <div class="col-xl-4 form-group">
                                            <?= $this->Form->control('mother_last_name', ['label' => 'Last Name', 'class' => 'form-control']) ?>
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('mother_address', ['label' => 'Address', 'class' => 'form-control']) ?>
                                        </div>
                                        <div class="col-xl-6 form-group">
                                            <?= $this->Form->control('mother_mobile', ['label' => 'Mobile', 'class' => 'form-control']) ?>
                                        </div>
                                        <div class="col-xl-6 form-group">
                                            <?= $this->Form->control('mother_email', ['label' => 'Email', 'class' => 'form-control']) ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Guardian Details -->
                                <div id="guardian-details">
                                    <h3>Guardian Details</h3>
                                    <div class="row p-3">
                                        <div class="col-xl-4 form-group">
                                            <?= $this->Form->control('guardian_name', ['label' => 'Name', 'class' => 'form-control']) ?>
                                        </div>
                                        <div class="col-xl-4 form-group">
                                            <?= $this->Form->control('guardian_middle_name', ['label' => 'Middle Name', 'class' => 'form-control']) ?>
                                        </div>
                                        <div class="col-xl-4 form-group">
                                            <?= $this->Form->control('guardian_last_name', ['label' => 'Last Name', 'class' => 'form-control']) ?>
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('guardian_address', ['label' => 'Address', 'class' => 'form-control']) ?>
                                        </div>
                                        <div class="col-xl-4 form-group">
                                            <?= $this->Form->control('guardian_gender', ['type' => 'select', 'options' => ['Male' => 'Male', 'Female' => 'Female'], 'label' => 'Gender', 'class' => 'select2']) ?>
                                        </div>
                                        <div class="col-xl-4 form-group">
                                            <?= $this->Form->control('guardian_mobile', ['label' => 'Mobile', 'class' => 'form-control']) ?>
                                        </div>
                                        <div class="col-xl-4 form-group">
                                            <?= $this->Form->control('guardian_email', ['label' => 'Email', 'class' => 'form-control']) ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <?= $this->Form->button('Add Now', ['class' => 'footer-btn text-white btn-gradient-yellow btn-hover-bluedark']) ?>
                                </div>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </div>
                </div>
                <tbody>
                    <?php 
                    $count =1; 
                    foreach ($students as $student): 
                    ?>
                    <tr>
                        <td><?php echo h($student->admission_id); ?></td>
                        <td><?php echo h($student->full_name); ?></td>
                        <td align=center><?php echo h($student->classlist->class_name); ?></td>
                        <td align=center><?php echo h($student->classlist->section); ?></td>
                        <td align=center>
                        <?php 
                        if(empty($student->parent)){
                        ?>
                            <button type="button" class="modal-trigger btn bg-red text-light sid" data-toggle="modal"
                                data-target="#large-modal" data-student-id="<?= $student->id ?>">
                                Add Parents
                            </button>
                        </td>
                        <?php 
                        }
                        
                        $parents = $student->parent;
                        // debug($parents);
                            if (is_array($parents)) {
                                foreach ($parents as $parent) {
                                    
                                    if (isset($parent->parent_type) && $parent->parent_type === "Double Parents") {
                                        echo "Mr. & Mrs " . $parent->father_name . " " . $parent->father_middle_name . " " . $parent->father_last_name . "<br/><button class='modal-trigger btn bg-warning text-light eid' data-toggle='modal' data-target='#large-modal' data-student-id='".$student->id."'>Edit Parent</button>";
                                        
                                    }
                                    if (isset($parent->parent_type) && $parent->parent_type === "Single Parent") {
                                           
                                            if($parent->guardian_gender == 'Male'){
                                                echo "Mr." ." ". $parent->guardian_name . " " . $parent->guardian_middle_name . " " . $parent->guardian_last_name . "<br/><button class='modal-trigger btn bg-warning text-light eid' data-toggle='modal' data-target='#large-modal' data-student-id='".$student->id."'>Edit Parent</button>";
                                            }
                                            if($parent->guardian_gender == 'Female'){
                                                echo "Miss." ." ". $parent->guardian_name . " " . $parent->guardian_middle_name . " " . $parent->guardian_last_name . "<br/><button class='modal-trigger btn bg-warning text-light eid' data-toggle='modal' data-target='#large-modal' data-student-id='".$student->id."'>Edit Parent</button>";
                                            }
        
                                    }
                                }
                            }
                            
                         ?>
                        <td>TA-107 Newyork</td>
                        <td><?php echo h($student->date_of_birth); ?></td>
                        
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->start('scripts') ?>
<script src="<?= $this->Url->webroot('js/select2.min.js') ?>"></script>
<script src="<?= $this->Url->webroot('js/jquery.dataTables.min.js') ?>"></script>
<script>
   $(document).ready(function() {
    function resetParentDetails() {
        $('#father-details, #mother-details, #guardian-details').hide('slow');
        $('#father-details input, #mother-details input, #guardian-details input').val('');
    }

    function setParentDetails(parentType) {
        if (parentType == 'Double Parents') {
            $('#father-details, #mother-details').show('slow');
            $('#guardian-details').hide('slow').find('input').val('');
        } else if (parentType == 'Single Parent') {
            $('#father-details, #mother-details').hide('slow').find('input').val('');
            $('#guardian-details').show('slow');
        } else {
            resetParentDetails();
        }
    }

    $('.modal-trigger').click(function() {
        $('.modal-title').text('Add Parents');
        $('.footer-btn').text('Add Now');
        resetParentDetails();
        $('#student_id').val($(this).data('student-id'));
    });
    $('.sid').click(function(e){
        e.preventDefault();
        var ptype = $('#parent-type').val();
        setParentDetails(ptype)
    });

    $('#parent-type').change(function() {
        setParentDetails($(this).val());
    });

    $('.eid').click(function() {
        var studentId = $('#student_id').val();
        $('.modal-title').text('Edit Parents');
        $('.footer-btn').text('Save Changes');

        $.ajax({
            url: '<?= $this->Url->build(['action' => 'getParentData']) ?>/' + studentId,
            method: 'GET',
            dataType: 'json',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            },
            success: function(response) {
                var parent = response.parents[0];
                var ptype = parent?.parent_type;

                setParentDetails(ptype);

                if (ptype == 'Single Parent') {
                    $('#parent-type').val('Single Parent').trigger('change');
                    $('#guardian-name').val(parent.guardian_name);
                    $('#guardian-middle-name').val(parent.guardian_middle_name);
                    $('#guardian-last-name').val(parent.guardian_last_name);
                    $('#guardian-address').val(parent.guardian_address);
                    $('#guardian-mobile').val(parent.guardian_mobile);
                    $('#guardian-email').val(parent.guardian_email);
                    $('#guardian-gender').val(parent.guardian_gender).trigger('change');
                } else if (ptype == 'Double Parents') {
                    $('#parent-type').val('Double Parents').trigger('change');
                    $('#father-name').val(parent.father_name);
                    $('#father-middle-name').val(parent.father_middle_name);
                    $('#father-last-name').val(parent.father_last_name);
                    $('#father-address').val(parent.father_address);
                    $('#father-mobile').val(parent.father_mobile);
                    $('#father-email').val(parent.father_email);
                    $('#mother-name').val(parent.mother_name);
                    $('#mother-middle-name').val(parent.mother_middle_name);
                    $('#mother-last-name').val(parent.mother_last_name);
                    $('#mother-address').val(parent.mother_address);
                    $('#mother-mobile').val(parent.mother_mobile);
                    $('#mother-email').val(parent.mother_email);
                    $('#guardian-gender').val()
                }
            }
        });
    });
});

</script>
<script src="<?= $this->Url->webroot('js/jquery.scrollUp.min.js') ?>"></script>
<?php $this->end() ?>