<?php $this->start('title') ?>Add Class<?php $this->end() ?>
<?php $this->start('activeAcademics') ?>sub-group-active<?php $this->end() ?>
<?php $this->start('activeClass') ?>menu-active<?php $this->end() ?>
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
        <li>Classes</li>
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
                        <h3>All Classes</h3>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="modal-trigger" data-toggle="modal"
                            data-target="#add-modal">
                            Add Class
                        </button>
                    </div>
                    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add A Class</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?= $this->Form->create(null, ['class' => 'new-added-form']) ?>
                                    <div class="row">
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('class_name', ['label' => 'Class Name', 'class' => 'form-control']) ?>
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('section', ['label' => 'Section', 'class' => 'select2', 'options' => ['' => 'Please Select', 'A' => 'A', 'B' => 'B', 'C' => 'C']]) ?>
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
                                <th style="widht:60px;">#</th>
                                <th style="text-align:center;">Active / Inactive</th>
                                <th>Class Name</th>
                                <th style="text-align:center;">Section</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $count =1; 
                            foreach ($classes as $class): ?>
                                <tr class="<?= $class->status == 0 ? 'bg-red text-white' : '' ?>">
                                <td><?php  echo $count++; ?></td> 
                                <td align="center">
                                        <?= $this->Form->create(null, [
                                            'id' => 'status-form-'.$class->id,
                                            'url' => ['action' => 'toggleStatus', $class->id],
                                            'style' => 'display:inline;',
                                            'type' => 'post'
                                        ]) ?>
                                        <?= $this->Form->hidden('id', ['value' => $class->id]) ?>
                                        <?= $this->Form->checkbox('status', [
                                            'checked' => $class->status == 1,
                                            'data-id' => $class->id,
                                            'data-url' => $this->Url->build(['action' => 'toggleStatus', $class->id])
                                        ]) ?>
                                        <?= $this->Form->end() ?>
                                    </td>
                                    <td><?php echo h($class->class_name); ?></td> 
                                    <td align="center"><?php echo h($class->section); ?></td>

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
    });
</script>

<?php $this->end() ?>