<?php $this->start('title') ?>Add Teacher<?php $this->end() ?>
<?php $this->start('activeTea') ?>sub-group-active<?php $this->end() ?>
<?php $this->start('activeAT') ?>menu-active<?php $this->end() ?>
<?php $this->start('stylescss') ?>
<link rel="stylesheet" href="<?= $this->Url->webroot('css/select2.min.css') ?>">
<link rel="stylesheet" href="<?= $this->Url->webroot('css/datepicker.min.css') ?>">
<?php $this->end() ?>
<div class="breadcrumbs-area">
    <h3>Teacher</h3>
    <ul>
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>Add New Teacher</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->
<?= $this->Flash->render() ?>
<!-- Admit Form Area Start Here -->
<?php
 $title = isset($teacher->id) && !empty($teacher->id) ? 'Edit Teacher Record' : 'Add New Teacher';
?>
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="dropdown">
                
            </div>
        </div>
        <div class="new-added-form">
            <?= $this->Form->create($teacher ?? null, ['type' => 'file']) ?>
            <?= $this->Form->control('status', ['label' =>false,'hidden'=>true, 'value'=>1]) ?>

                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <?= $this->Form->control('id_no', ['label' => 'ID No', 'class' => 'form-control', 'readonly'=>true]) ?>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <?= $this->Form->control('first_name', ['label' => 'First Name *', 'class' => 'form-control', 'required' => true]) ?>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <?= $this->Form->control('middle_name', ['label' => 'Middle Name', 'class' => 'form-control']) ?>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <?= $this->Form->control('last_name', ['label' => 'Last Name *', 'class' => 'form-control', 'required' => true]) ?>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <?= $this->Form->control('gender', [
                            'type' => 'select',
                            'options' => ['Male' => 'Male', 'Female' => 'Female', 'Others' => 'Others'],
                            'empty' => 'Please Select Gender *',
                            'label' => 'Gender *',
                            'class' => 'select2',
                            'required' => true
                        ]) ?>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <?= $this->Form->control('date_of_birth', [
                            'type' => 'text',
                            'label' => 'Date Of Birth *',
                            'class' => 'form-control air-datepicker',
                            'placeholder' => 'dd/mm/yyyy',
                            'required' => true
                        ]) ?>
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <?= $this->Form->control('father_name', ['label' => 'Father Name', 'class' => 'form-control']) ?>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <?= $this->Form->control('mother_name', ['label' => 'Mother Name *', 'class' => 'form-control']) ?>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <?= $this->Form->control('date_of_joining', [
                            'type' => 'text',
                            'label' => 'Joining From Date *',
                            'class' => 'form-control air-datepicker',
                            'placeholder' => 'dd/mm/yyyy',
                            'required' => true
                        ]) ?>
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <?= $this->Form->control('religion', [
                            'type' => 'select',
                            'options' => ['Islam' => 'Islam', 'Hindu' => 'Hindu', 'Christian' => 'Christian', 'Buddhist' => 'Buddhist', 'Others' => 'Others'],
                            'empty' => 'Please Select Religion *',
                            'label' => 'Religion *',
                            'class' => 'select2',
                            'required' => true
                        ]) ?>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                    <?= $this->Form->control('category', ['label' => 'Cast / Category', 'class'=>'select2', 'options' => ['General' => 'Genral', 'OBC' => 'OBC', 'SC' => 'SC', 'ST'=> 'ST']]) ?>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <?= $this->Form->control('email', ['type' => 'email', 'label' => 'E-Mail', 'class' => 'form-control']) ?>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <?= $this->Form->control('address', ['label' => 'Address', 'class' => 'form-control']) ?>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <?= $this->Form->control('phone', ['label' => 'Phone', 'class' => 'form-control']) ?>
                    </div>
                    
                    <div class="col-12 form-group mg-t-8">
                        <?= $this->Form->button(__(isset($teacher->id) && !empty($teacher->id) ? 'Save Changes' : 'Save Now'), ['class' => 'btn-fill-lg btn-gradient-yellow btn-hover-bluedark']) ?>
                    </div>
                </div>
            <?= $this->Form->end() ?>
        </div>

    </div>
</div>
<?php $this->start('scripts') ?>
<script src="<?= $this->Url->webroot('js/select2.min.js') ?>"></script>
<script src="<?= $this->Url->webroot('js/datepicker.min.js') ?>"></script>
<script src="<?= $this->Url->webroot('js/jquery.scrollUp.min.js') ?>"></script>
<?php $this->end() ?>