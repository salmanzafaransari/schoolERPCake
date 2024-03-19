<?php $this->start('stylescss') ?>
<link rel="stylesheet" href="<?= $this->Url->webroot('css/select2.min.css') ?>">
<link rel="stylesheet" href="<?= $this->Url->webroot('css/datepicker.min.css') ?>">
<?php $this->end() ?>
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Classes</h3>
    <ul>
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>Add New Class</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->
<?= $this->Flash->render() ?>
<div class="row">
<div class="col-md-5">
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Add New Class</h3>
                    </div>
                </div>
                <?= $this->Form->create(null, ['class' => 'new-added-form']) ?>
                    <div class="row">
                        <div class="col-xl-12 form-group">
                            <?= $this->Form->control('class_name', ['label' => 'Class Name', 'class' => 'form-control']) ?>
                        </div>
                        <div class="col-xl-12 form-group">
                            <?= $this->Form->control('section', ['label' => 'Section', 'class' => 'select2', 'options' => ['' => 'Please Select', 'A' => 'A', 'B' => 'B', 'C' => 'C']]) ?>
                        </div>
                        <div class="col-12 form-group mg-t-10">
                            <?= $this->Form->button('Submit', ['class' => 'btn-fill-lg btn-gradient-yellow btn-hover-bluedark']) ?>
                        </div>
                    </div>
                <?= $this->Form->end() ?>

            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>All Classes</h3>
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
                                    <?= $this->Form->postLink(
                                        __('Delete'),
                                        ['action' => 'deleteClass', $class->id],
                                        ['confirm' => __('Are you sure you want to delete Class {0} ?', $class->class_name), 'class' => 'btn btn-lg btn-danger']
                                    ) ?>
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
<?php $this->end() ?>