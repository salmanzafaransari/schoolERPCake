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
                                <th>#</th>
                                <th>Class Name</th>
                                <th style="text-align:center;">Section</th>
                                <th style="text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $count =1; 
                            foreach ($classes as $class): ?>
                                <tr>
                                    <td><?php  echo $count++; ?></td> 
                                    <td><?php echo h($class->class_name); ?></td> 
                                    <td align="center"><?php echo h($class->section); ?></td>
                                    <td align="center">
                                        <?= $this->Form->create(null, ['id' => 'delete-form-'.$class->id, 'style' => 'display:none;', 'url' => ['action' => 'deleteClass', $class->id]]) ?>
                                        <?= $this->Form->end() ?>
                                        <?= $this->Form->button(__('Delete'), [
                                            'class' => 'btn btn-lg btn-danger',
                                            'onclick' => "deleteConfirmation({$class->id}, '{$class->class_name}', '{$class->section}')"
                                        ]) ?>
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
    function deleteConfirmation(classId, className, section) {
        Swal.fire({
            title: 'Are you sure?',
            text: `You want to delete Class ${className} ${section} ?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector(`#delete-form-${classId}`).submit();
            }
        });
    }
</script>

<?php $this->end() ?>