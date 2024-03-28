<?php $this->start('title') ?>Add Student<?php $this->end() ?>
<?php $this->start('activeStu') ?>sub-group-active<?php $this->end() ?>
<?php $this->start('activeAS') ?>menu-active<?php $this->end() ?>
<?php $this->start('stylescss') ?>
<link rel="stylesheet" href="<?= $this->Url->webroot('css/select2.min.css') ?>">
<link rel="stylesheet" href="<?= $this->Url->webroot('css/datepicker.min.css') ?>">
<?php $this->end() ?>
<div class="breadcrumbs-area">
    <h3>Students</h3>
    <ul>
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>Student Admit Form</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->
<?= $this->Flash->render() ?>
<!-- Admit Form Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>Add New Students</h3>
            </div>
            <div class="dropdown">
                
            </div>
        </div>
        <?= $this->Form->create($student ?? null, ['class' => 'new-added-form']) ?>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <?= $this->Form->control('admission_id', ['label' => 'Admission ID', 'class'=>'form-control', 'type'=>'text']) ?>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <?= $this->Form->control('admission_date', ['label' => 'Admission Date', 'class'=>'form-control air-datepicker', 'type'=>'text', 'placeholder'=>"dd/mm/yyyy", 'value' => date('d/m/Y')]) ?><i class="far fa-calendar-alt"></i>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <?= $this->Form->control('session', ['label' => 'Admission Session', 'class'=>'select2', 'options'=>$currsession]) ?>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <?= $this->Form->control('class_id', ['label' => 'Class', 'class'=>'select2', 'options' => $classes]) ?>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <?= $this->Form->control('first_name', ['label' => 'First Name', 'class'=>'form-control', 'type'=>'text']) ?>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <?= $this->Form->control('middle_name', ['label' => 'Middle Name', 'class'=>'form-control', 'type'=>'text']) ?>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <?= $this->Form->control('last_name', ['label' => 'Last Name', 'class'=>'form-control', 'type'=>'text']) ?>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <?= $this->Form->control('gender', ['label' => 'Gender', 'class'=>'select2', 'options' => ['Male' => 'Male', 'Female' => 'Female']]) ?>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <?= $this->Form->control('date_of_birth', ['label' => 'Date Of Birth', 'class'=>'form-control air-datepicker', 'type'=>'text', 'placeholder'=>"dd/mm/yyyy"]) ?><i class="far fa-calendar-alt"></i>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <?= $this->Form->control('religion', ['label' => 'Religion', 'class'=>'select2', 'options' => ['Islam' => 'Islam', 'Hindu' => 'Hindu', 'Christian' => 'Christian', 'Buddish' => 'Buddish', 'Others' => 'Others']]) ?>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <?= $this->Form->control('cast', ['label' => 'Cast', 'class'=>'form-control', 'type'=>'text']) ?>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <?= $this->Form->control('city', ['label' => 'City', 'class'=>'form-control', 'type'=>'text']) ?>
            </div>
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <?= $this->Form->control('address_local', ['label' => 'Address Local', 'class'=>'form-control', 'type'=>'text']) ?>
            </div>
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <?= $this->Form->control('address_permanent', ['label' => 'Address Permanent', 'class'=>'form-control', 'type'=>'text']) ?>
            </div>   
            <div class="col-12 form-group mg-t-8">
                <div class="row">
                    <div class="col-6">
                        <?= $this->Form->button('Submit', ['class' => 'btn-fill-lg btn-gradient-yellow btn-hover-bluedark', 'type' => 'submit']) ?>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <?= $this->Form->button('Reset', ['class' => 'btn-fill-lg bg-blue-dark btn-hover-yellow', 'type' => 'reset']) ?>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
<?php $this->start('scripts') ?>
<script src="<?= $this->Url->webroot('js/select2.min.js') ?>"></script>
<script src="<?= $this->Url->webroot('js/datepicker.min.js') ?>"></script>
<script src="<?= $this->Url->webroot('js/jquery.scrollUp.min.js') ?>"></script>
<?php $this->end() ?>