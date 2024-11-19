<?php $this->start('title') ?>Add Subjects to Class<?php $this->end() ?>
<?php $this->start('activeClasses') ?>sub-group-active<?php $this->end() ?>
<?php $this->start('activeSubClassteacher') ?>menu-active<?php $this->end() ?>

<?php $this->start('stylescss') ?>
<link rel="stylesheet" href="<?= $this->Url->webroot('css/select2.min.css') ?>">
<link rel="stylesheet" href="<?= $this->Url->webroot('css/datepicker.min.css') ?>">
<?php $this->end() ?>
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Class Manage</h3>
    <ul>
        <li><a href="index.html">Home</a></li>
        <li>Class Teacher</li>
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
                        <h3>Class Teachers</h3>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="modal-trigger" data-toggle="modal" data-target="#add-modal">
                            Add / Modify Class Teacher
                        </button>
                    </div>
                    <!-- add model -->
                    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add / Modify Class Teacher</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?= $this->Form->create(null, ['class' => 'new-added-form']) ?>
                                    <div class="row">
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('classes', [
                                                'label' => 'Select Class',
                                                'class' => 'select2',
                                                'id' => 'classes',
                                                'empty' => 'Please select class',
                                                'options' => $classes
                                            ]) ?>
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('teachers', [
                                                'label' => 'Class Teacher',
                                                'class' => 'select2',
                                                'placeholder' => 'Select Class Teacher from below',
                                                'options' => $teachers,
                                                'id' => 'teachers'
                                            ]) ?>
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

                </div>
                
                <div class="table-responsive">
                    <table class="table display data-table text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Class Name</th>
                                <th>Class Teacher</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $count = 1;
                            foreach ($classteacher as $teacher): ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= h($teacher['classlist']['class_fullname']); ?></td>
                                    <td><?= h($teacher['teacher']['full_name']); ?></td>
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
<script>
$(document).ready(function () {
    $('.select2').select2();

    // Listen to class selection and pre-select teacher if assigned
    $('#classes').on('change', function() {
        var classId = $(this).val();
        if (classId) {
            // Find the teacher assigned to the selected class
            var assignedTeacher = <?= json_encode($classteacher) ?>.find(function(assignment) {
                return assignment.classlist.id == classId;
            });

            if (assignedTeacher) {
                // Pre-select the teacher in the modal if assigned
                $('#teachers').val(assignedTeacher.teacher.id).trigger('change');
            }
        }
    });
});
</script>
<?php $this->end() ?>
