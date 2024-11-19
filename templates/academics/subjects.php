<?php $this->start('title') ?>Add Class<?php $this->end() ?>
<?php $this->start('activeAcademics') ?>sub-group-active<?php $this->end() ?>
<?php $this->start('activeSubject') ?>menu-active<?php $this->end() ?>
<?php $this->start('stylescss') ?>
<link rel="stylesheet" href="<?= $this->Url->webroot('css/select2.min.css') ?>">
<link rel="stylesheet" href="<?= $this->Url->webroot('css/datepicker.min.css') ?>">
<?php $this->end() ?>
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Academics</h3>
    <ul>
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>Subjects</li>
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
                        <h3>All Subjects</h3>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="modal-trigger" data-toggle="modal"
                            data-target="#add-modal">
                            Add Subject
                        </button>
                    </div>
                    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add A Subject</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?= $this->Form->create(null, ['class' => 'new-added-form']) ?>
                                    <div class="row">
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('subject_name', ['label' => 'Subject Name', 'class' => 'form-control']) ?>
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('subject_code', ['label' => 'Subject Code', 'class' => 'form-control']) ?>
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
                    <!-- edit modal  -->
                    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update A Subject</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?= $this->Form->create(null, ['class' => 'new-added-form', 'id' => 'editForm', 'url' => ['action' => 'editSubject']]) ?>
                                    <?= $this->Form->control('id', ['label' => false, 'hidden' => true, 'id' => 'subjectIdValue']) ?>
                                    <div class="row">
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('subject_name', ['label' => 'Subject Name', 'class' => 'form-control', 'id' => 'editSubjectName']) ?>
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('subject_code', ['label' => 'Subject Code', 'class' => 'form-control', 'id' => 'editSubjectCode']) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <?= $this->Form->button('Update', ['class' => 'btn-fill-lg btn-gradient-yellow btn-hover-bluedark']) ?>
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
                                <th style="widht:60px;">#</th>
                                <th style="text-align:center;">Active / Inactive</th>
                                <th>Subject Name</th>
                                <th style="text-align:center;">Subject Code</th>
                                <th style="text-align:center;">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $count = 1; 
                            foreach ($subjects as $subject): ?>
                                <tr class="<?= $subject->status == 0 ? 'bg-red text-white' : '' ?>">
                                    <td><?= $count++ ?></td>
                                    <td align="center">
                                        <?= $this->Form->create(null, [
                                            'id' => 'status-form-' . $subject->id,
                                            'url' => ['action' => 'toggleStatusSubject', $subject->id],
                                            'style' => 'display:inline;',
                                            'type' => 'post'
                                        ]) ?>
                                        <?= $this->Form->hidden('id', ['value' => $subject->id]) ?>
                                        <?= $this->Form->checkbox('status', [
                                            'checked' => $subject->status == 1,
                                            'data-id' => $subject->id,
                                            'data-url' => $this->Url->build(['action' => 'toggleStatusSubject', $subject->id])
                                        ]) ?>
                                        <?= $this->Form->end() ?>
                                    </td>
                                    <td><?= h($subject->subject_name) ?></td>
                                    <td align="center"><?= h($subject->subject_code) ?></td>
                                    <td align="center">
                                        <button type="button" class="btn btn-fill-lg btn-gradient-yellow btn-hover-bluedark edit" 
                                            data-toggle="modal" 
                                            data-target="#edit-modal" 
                                            data-subject-id="<?= h($subject->id) ?>" 
                                            data-subject-name="<?= h($subject->subject_name) ?>" 
                                            data-subject-code="<?= h($subject->subject_code) ?>">
                                            Edit Subject
                                        </button>
                                    </td>
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
    $(document).ready(function() {
        $('input[type="checkbox"][name="status"]').change(function() {
            var checkbox = $(this);
            var isChecked = checkbox.is(':checked');
            var classId = checkbox.data('id');
            var formId = 'status-form-' + classId;

            if (!isChecked) {
                // Show SweetAlert confirmation before unchecking
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to mark this class as inactive.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, mark it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#' + formId).submit();
                    } else {
                        checkbox.prop('checked', true); // Keep it checked if canceled
                    }
                });
            } else {
                $('#' + formId).submit();
            }
        });
        $('.edit').on('click', function() {
        const subjectId = $(this).data('subject-id');
        const subjectName = $(this).data('subject-name');
        const subjectCode = $(this).data('subject-code');

        // Populate modal fields
        $('#subjectIdValue').val(subjectId);
        $('#editSubjectName').val(subjectName);
        $('#editSubjectCode').val(subjectCode);
      });
    });
</script>

<?php $this->end() ?>