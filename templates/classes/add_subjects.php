<?php $this->start('title') ?>Add Subjects to Class<?php $this->end() ?>
<?php $this->start('activeClasses') ?>sub-group-active<?php $this->end() ?>
<?php $this->start('activeSubClass') ?>menu-active<?php $this->end() ?>

<?php $this->start('stylescss') ?>
<link rel="stylesheet" href="<?= $this->Url->webroot('css/select2.min.css') ?>">
<link rel="stylesheet" href="<?= $this->Url->webroot('css/datepicker.min.css') ?>">
<?php $this->end() ?>
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Class Manage</h3>
    <ul>
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>Classes Subject</li>
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
                        <h3>All Subjectes for Class</h3>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="modal-trigger" data-toggle="modal"
                            data-target="#add-modal">
                            Add / Modify Subjects
                        </button>
                    </div>
                    <!-- add model -->
                    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add / Modify Subjects to Class</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?= $this->Form->create(null, ['class' => 'new-added-form']) ?>
                                    <div class="row">
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('classes', ['label' => 'Selelct Classes', 'class' => 'select2' ,'id'=>'classes', 'empty' => 'Please select class']) ?>
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('subjects', ['label' => 'Subject Code', 'class' => 'select2', 'multiple'=>true, 'id'=>'subjects', 'placeholder'=>'Select Subjects from below']) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <?= $this->Form->button('Submit', ['class' => 'btn-fill-lg btn-gradient-yellow btn-hover-bluedark']) ?>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- copy subject modal -->
                    <div class="modal fade" id="copy-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Copy <span id="className"></span> Subjects to Another Class</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?= $this->Form->create(null, ['url' => ['action' => 'copySubjects'], 'id' => 'copy-form']) ?>
                                    <div class="form-group">
                                        <?= $this->Form->control('source_class_id', ['type' => 'hidden', 'id' => 'source-class-id']) ?>
                                        <?= $this->Form->control('target_class_id', [
                                            'label' => 'Select Target Class',
                                            'options' => $classes, // List of classes
                                            'class' => 'form-control'
                                        ]) ?>
                                    </div>
                                    <div class="form-group">
                                        <?= $this->Form->button('Copy', ['class' => 'btn-fill-lg btn-gradient-yellow btn-hover-bluedark']) ?>
                                    </div>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="table-responsive">
                    <table class="table display data-table text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Copy</th>
                                <th>Class Name</th>
                                <th>Subjects (Subject Code)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $count = 1;
                            foreach ($groupedSubjects as $group): ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td>
                                     <a href="#!" class="copy-btn" title="Make Copy for other Class"
                                      data-toggle="modal" data-target="#copy-modal" 
                                      data-class-id="<?= $group['class_id'] ?>" data-class-name="<?= $group['class_name'] ?>">
                                      <i class="fas fa-copy modal-trigger"></i>
                                     </a>
                                    </td>
                                    <td><?= h($group['class_name']); ?></td>
                                    <td><?= h(implode(', ', $group['subjects'])); ?></td>
                                </tr>
                            <?php endforeach; ?>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

$(document).ready(function () {
    $('.select2').select2();

    // When the class dropdown changes
    $('#classes').change(function () {
        const classId = $(this).val();

        if (classId) {
            $.ajax({
                url: `get_class_subjects/${classId}`, // Update with your controller and action
                method: 'GET',
                success: function (response) {
                    if (response.subjectIds) {
                        const subjectsDropdown = $('#subjects');

                        // Clear existing selections
                        subjectsDropdown.val(null).trigger('change');

                        // Preselect the fetched subjects
                        subjectsDropdown.val(response.subjectIds).trigger('change');
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Unable to fetch subjects for the selected class.', 'error');
                },
            });
        }
    });

    $('.copy-btn').on('click', function () {
        const classId = $(this).data('class-id'); // Get class ID from data attribute
        $('#source-class-id').val(classId);  
        const className = $(this).data('class-name');
        $('#className').text(className);
    });

    // Handle form submission with SweetAlert
    $('#copy-form').on('submit', function (e) {
    e.preventDefault(); // Prevent default form submission

    const formData = $(this).serialize(); // Serialize form data

    // Check if the target class already has subjects
    $.ajax({
        url: '<?= $this->Url->build(['action' => 'checkClassSubjects']) ?>',
        method: 'POST',
        data: formData,
        success: function (response) {
            if (response.hasSubjects) {
                // Show SweetAlert confirmation
                Swal.fire({
                    title: 'Class Already Has Subjects',
                    text: 'The selected class already has subjects. Do you want to update them?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Update',
                    cancelButtonText: 'No, Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Proceed with update
                        $.ajax({
                            url: '<?= $this->Url->build(['action' => 'copySubjects']) ?>',
                            method: 'POST',
                            data: formData,
                            success: function (response) {
                                Swal.fire({
                                    title: 'Success',
                                    text: response.message,
                                    icon: 'success',
                                    showConfirmButton: false, // Hide the confirm button
                                    timer: 1500 // Auto-close after 1.5 seconds
                                }).then(() => {
                                    location.reload(); // Reload the page after the alert closes
                                });
                            },
                            error: function () {
                                Swal.fire('Error', 'Failed to copy subjects.', 'error');
                            },
                        });
                    }
                });
            } else {
                // No subjects, proceed with insert
                $.ajax({
                    url: '<?= $this->Url->build(['action' => 'copySubjects']) ?>',
                    method: 'POST',
                    data: formData,
                    success: function (response) {
                        Swal.fire({
                            title: 'Success',
                            text: response.message,
                            icon: 'success',
                            showConfirmButton: false, // Hide the confirm button
                            timer: 1500 // Auto-close after 1.5 seconds
                        }).then(() => {
                            location.reload(); // Reload the page after the alert closes
                        });
                    },
                    error: function () {
                        Swal.fire('Error', 'Failed to copy subjects.', 'error');
                    },
                });
            }
        },
        error: function () {
            Swal.fire('Error', 'Failed to check class subjects.', 'error');
        },
    });
});

});

</script>

<?php $this->end() ?>