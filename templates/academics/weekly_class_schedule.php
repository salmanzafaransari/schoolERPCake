<?php $this->start('title') ?>Add Class<?php $this->end() ?>
<?php $this->start('activeAcademics') ?>sub-group-active<?php $this->end() ?>
<?php $this->start('activeSchedule') ?>menu-active<?php $this->end() ?>
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
        <li>Weekly Class Schedule</li>
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
                        <h3>Weekly Class Schedule</h3>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="modal-trigger" data-toggle="modal"
                            data-target="#add-modal">
                            Create Schedule
                        </button>
                    </div>
                    <!-- add shift  -->
                    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Weekly Class Schedule</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?= $this->Form->create(null, ['class' => 'new-added-form']) ?>
                                    <div class="row">
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('shift_name', ['label' => 'Shift Name', 'class' => 'form-control']) ?>
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('shift_start', ['label' => 'Shift Start Time', 'class' => 'form-control', 'type'=>'time']) ?>
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('shift_end', ['label' => 'Shift End Time', 'class' => 'form-control', 'type'=>'time']) ?>
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('recess', ['label' => 'Recess Time (Must be in Minute)', 'class' => 'form-control', 'type'=>'number', 'max'=>'60']) ?>
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
                                
                            </tr>
                        </thead>
                        <tbody>
                        
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

    });
</script>

<?php $this->end() ?>