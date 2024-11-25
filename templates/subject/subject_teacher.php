<?php $this->start('title') ?>Subjetcs<?php $this->end() ?>
<?php $this->start('activeSubject') ?>sub-group-active<?php $this->end() ?>
<?php $this->start('activeSubTea') ?>menu-active<?php $this->end() ?>

<?php $this->start('stylescss') ?>
<link rel="stylesheet" href="<?= $this->Url->webroot('css/select2.min.css') ?>">
<link rel="stylesheet" href="<?= $this->Url->webroot('css/datepicker.min.css') ?>">
<style>
    #loading{
        display:none;
    }
</style>
<?php $this->end() ?>
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Manage Subject</h3>
    <ul>
        <li><a href="index.html">Home</a></li>
        <li>Subject Teacher</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->
<?= $this->Flash->render() ?>
<div class="row">
    <div class="col-md-12">
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Subject Teacher</h3>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="modal-trigger" data-toggle="modal" data-target="#manageModal">
                            Add / Modify Subject Teacher
                        </button>
                    </div>
                    <!-- add model -->
                    <div class="modal fade" id="manageModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Manage Subject Teachers</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?= $this->Form->create(null, ['id' => 'subjectTeacherForm', 'url' => ['controller' => 'Subject', 'action' => 'save']]) ?>
                                    <div class="form-group">
                                        <?= $this->Form->control('class_id', [
                                            'label' => 'Select Class',
                                            'class' => 'form-control select2',
                                            'options' => $classes,
                                            'empty' => 'Select a Class',
                                            'id' => 'classDropdown'
                                        ]) ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="subject">Select Subject</label>
                                        <select id="subject_id" name="subject_id" class="form-control select2">
                                            <option value="">Select Subject</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <?= $this->Form->control('teacher_id', [
                                            'label' => 'Select A Teacher',
                                            'class' => 'form-control select2',
                                            'options' => $teachers,
                                            'empty' => 'Select a Teacher',
                                            'id' => 'teacher_id'
                                        ]) ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <?= $this->Form->button('Submit', ['class' => 'btn-fill-lg btn-gradient-yellow btn-hover-bluedark']) ?>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?= $this->Form->create(null, ['id' => 'searchForm', 'class' => 'mg-b-20']) ?>
                    <div class="row gutters-8">
                        <div class="col-3-xxxl col-xl-5 col-lg-3 col-12 form-group">
                            <?= $this->Form->select('search_parameter', [
                                'class_id' => 'Class',
                                'subject_name' => 'Subject Name',
                                'teacher_name' => 'Teacher Name'
                            ], ['id' => 'search-parameter', 'class' => 'select2']) ?>
                        </div>
                        <div class="col-4-xxxl col-xl-5 col-lg-3 col-12 form-group" id="class-section-container">
                            <?= $this->Form->control('class_id', ['label' => false, 'class'=>'select2', 'options' => $classes]) ?>
                        </div>
                        <div class="col-4-xxxl col-xl-5 col-lg-3 col-12 form-group d-none" id="subject-section-container">
                            <?= $this->Form->control('subject_name', ['label' => false, 'class'=>'select2', 'options' => $subjects]) ?>
                        </div>
                        <div class="col-4-xxxl col-xl-5 col-lg-3 col-12 form-group d-none" id="teacher-section-container">
                            <?= $this->Form->control('teacher_name', ['label' => false, 'class'=>'select2', 'options' => $teachers]) ?>
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
                                <th>#</th>
                                <th>Class</th>
                                <th>Subject (code)</th>
                                <th>Teacher</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($subjectteachers)): ?>
                                <?php foreach ($subjectteachers as $key => $subjectteacher): ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td> <!-- Serial number -->
                                        <td><?= h($subjectteacher->classlist->class_name); ?></td> <!-- Class Name -->
                                        <td>
                                            <?= h($subjectteacher->subject->subject_name); ?> 
                                            (<?= h($subjectteacher->subject->subject_code); ?>)
                                        </td> <!-- Subject Name (Code) -->
                                        <td><?= h($subjectteacher->teacher->full_name); ?></td> <!-- Teacher Name -->
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">No data available</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->start('scripts') ?>
<script src="<?= $this->Url->webroot('js/select2.min.js') ?>"></script>
<script src="<?= $this->Url->webroot('js/datepicker.min.js') ?>"></script>
<script src="<?= $this->Url->webroot('js/jquery.scrollUp.min.js') ?>"></script>
<script>
$(document).ready(function () {
    $('.select2').select2();
    $('#searchForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission
        var data = $(this).serialize()
        
        $.ajax({
            url: '<?= $this->Url->build(['action' => 'search']) ?>',
            method: 'POST',
            headers: {
                'X-CSRF-Token': csrfToken
            },
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                $('#loading').css('display', 'inline-block'); // Show loading spinner
            },
            data: $(this).serialize(), // Serialize the form data
            success: function(data) {
                if (data.length > 0) {
                    var tableBody = '';
                    $.each(data, function(index, subjectteacher) {
                        tableBody += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${subjectteacher.classlist.class_name}</td>
                                <td>${subjectteacher.subject.subject_name} (${subjectteacher.subject.subject_code})</td>
                                <td>${subjectteacher.teacher.full_name}</td>
                            </tr>
                        `;
                    });
                    $('table.data-table tbody').html(tableBody); // Update table body
                } else {
                    $('table.data-table tbody').html('<tr><td colspan="4" class="text-center">No data available</td></tr>');
                }
            },
            error: function() {
                alert('There was an error processing your request.');
            },
            complete: function() {
                $('#loading').css('display', 'none'); // Hide loading spinner
            }
        });
    });

    const csrfToken = $('meta[name="csrfToken"]').attr('content');
    $('#classDropdown').on('change', function(){
        var classId = $(this).val();
        $.ajax({
            url: '<?= $this->Url->build(['controller' => 'Subject', 'action' => 'getSubjects']) ?>',
            method: 'POST',
            headers: {
                'X-CSRF-Token': csrfToken
            },
            data: { class_id: classId },
            success: function (response) {
                const subjectSelect = $('#subject_id'); 
                subjectSelect.empty();

                if (response && response.length > 0) {
                    subjectSelect.append(new Option('Select Subject', '')); 
                    response.forEach(function (subject) {
                        // Add each subject to the dropdown
                        subjectSelect.append(
                            new Option(
                                `${subject.subject_name} (${subject.subject_code})`, 
                                subject.id
                            )
                        );
                    });
                } else {
                    subjectSelect.append(new Option('No subjects found', '')); // No subjects case
                }
            },
            error: function (xhr) {
                console.error('Error:', xhr.responseText);
                // Handle error
            }
        });
    });


    $('#classDropdown, #subject_id').on('change', function() {
        var classId = $('#classDropdown').val();
        var subjectId = $('#subject_id').val();

        // Only make the request if both class and subject are selected
        if (classId && subjectId) {
            $.ajax({
                url: '<?= $this->Url->build(['controller' => 'Subject', 'action' => 'getTeacherByClassAndSubject']) ?>',
                method: 'POST',
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                data: { class_id: classId, subject_id: subjectId },
                success: function(response) {
                    // Preselect the teacher if a teacher is assigned
                    var teacherId = response.teacher_id;
                    if (teacherId) {
                        $('#teacher_id').val(teacherId).trigger('change'); // Preselect the teacher
                    } else {
                        $('#teacher_id').val('').trigger('change'); // No teacher assigned, reset the selection
                    }
                },
                error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                    // Handle error
                }
            });
        }
    });

    $('#search-parameter').on('change', function () {
    var selectedParam = $(this).val();

    // Hide all sections first
    $('#class-section-container').addClass('d-none');
    $('#subject-section-container').addClass('d-none');
    $('#teacher-section-container').addClass('d-none');

    // Show the corresponding section based on the selected parameter
    if (selectedParam === 'class_id') {
        $('#class-section-container').removeClass('d-none');
    } else if (selectedParam === 'subject_name') {
        $('#subject-section-container').removeClass('d-none');
    } else if (selectedParam === 'teacher_name') {
        $('#teacher-section-container').removeClass('d-none');
    }
});


});
</script>
<?php $this->end() ?>
