<?php $this->start('title') ?>Add Student<?php $this->end() ?>
<?php $this->start('activeStu') ?>sub-group-active<?php $this->end() ?>
<?php $this->start('activeASB') ?>menu-active<?php $this->end() ?>
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
        <li>Add Bulk Students</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->
<?= $this->Flash->render() ?>
<!-- Admit Form Area Start Here -->

<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>Add Bulk Students</h3>
            </div>
            <div class="dropdown">
            <?php echo $this->Html->link('Download Sample CSV', ['action' => 'downloadSampleFile'], ['class' => 'btn btn-primary']); ?>

            </div>
        </div>
        <?= $this->Form->create(null, ['url' => ['action' => 'studentBulkForm'], 'type' => 'file']) ?>
            <div class="row">
                <div class="col-md-6">
                    <?= $this->Form->control('student_list', [
                        'type' => 'file', 
                        'class' => 'form-control-file', 
                        'label' => 'Upload Student List (CSV/Excel)',
                        'accept' => '.csv, .xlsx'
                    ]) ?>
                </div>
                <div class="col-md-12 mt-5">
                    <?= $this->Form->button('Bulk Add', [
                        'type' => 'submit',
                        'class' => 'btn btn-lg text-white btn-gradient-yellow btn-hover-bluedark'
                    ]) ?>
                </div>
            </div>
            
        </div>
        <?= $this->Form->end() ?>
</div>
<?php $this->start('scripts') ?>
<script src="<?= $this->Url->webroot('js/select2.min.js') ?>"></script>
<script src="<?= $this->Url->webroot('js/datepicker.min.js') ?>"></script>
<script src="<?= $this->Url->webroot('js/jquery.scrollUp.min.js') ?>"></script>
<?php $this->end() ?>