<?php $this->start('title') ?>Add Teacher<?php $this->end() ?>
<?php $this->start('activeTea') ?>sub-group-active<?php $this->end() ?>
<?php $this->start('activeAllT') ?>menu-active<?php $this->end() ?>
<?php $this->start('stylescss') ?>
    <link rel="stylesheet" href="<?= $this->Url->webroot('css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= $this->Url->webroot('css/jquery.dataTables.min.css') ?>">
    <style>
        #loading{
            display:none;
        }
    </style>
<?php $this->end() ?>
<div class="breadcrumbs-area">
    <h3>Teachers</h3>
    <ul>
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>All Teachers</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->
<?= $this->Flash->render() ?>
<!-- Admit Form Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>All Teachers Data</h3>
            </div>
            <div class="dropdown">
                
            </div>
        </div>
        <?= $this->Form->create(null, ['id' => 'searchForm', 'class' => 'mg-b-20']) ?>
            <div class="row gutters-8">
                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                    <?= $this->Form->select('search_parameter', [
                        'student_id' => 'Admission No.',
                        'student_name' => 'Student Name',
                        'father_name' => 'Father Name',
                        'class' => 'Class'
                    ], ['id' => 'search-parameter', 'class' => 'select2']) ?>
                </div>
                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group" id="search-value-container">
                    <?= $this->Form->text('search_value', ['placeholder' => 'Enter value...', 'id' => 'search-value', 'class' => 'form-control']) ?>
                </div>
                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group d-none" id="class-section-container">
                    <?= $this->Form->control('class_id', ['label' => false, 'class'=>'select2', 'options' => $classes]) ?>
                </div>
                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                    <button type="submit" class="fw-btn-fill btn-gradient-yellow">
                        <i class="fa fa-spinner fa-spin" id="loading"></i> SEARCH
                    </button>

                </div>
            </div>
        <?= $this->Form->end() ?>
        <div class="table-responsive">
            <table class="table display data-table text-nowrap">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Teacher ID</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Contact</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody id="loadSearch">
                     <?php 
                      $count =1; 
                      foreach ($teachers as $teacher): 
                     ?>
                    <tr>
                        <td align=center>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <span class="flaticon-more-button-of-three-dots"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Disable</a>
                                    
                                    <?php 
                                        echo $this->Html->link(
                                            '<i class="fas fa-cogs text-dark-pastel-green"></i>Edit', 
                                            ['controller' => 'Teacher', 'action' => 'teacherForm', $teacher->id], 
                                            ['escape' => false, 'class' => 'dropdown-item']
                                        ); 
                                        ?>
                                    <?php 
                                        echo $this->Html->link(
                                            '<i class="fas fa-user text-orange-peel"></i>Get Details', 
                                            ['controller' => 'Teacher', 'action' => 'teacherDetails', $teacher->id], 
                                            ['escape' => false, 'class' => 'dropdown-item']
                                        ); 
                                        ?>
                                </div>
                            </div>
                        </td>
                        <td><?php echo h($teacher->id_no); ?></td>
                        <td><?php echo h($teacher->full_name); ?></td>
                        <td align=center><?php echo h($teacher->gender); ?></td>
                        <td align=center><?php echo h($teacher->phone); ?></td>
                        <td align=center><?php echo h($teacher->address); ?></td>
                        
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->start('scripts') ?>
<script src="<?= $this->Url->webroot('js/select2.min.js') ?>"></script>
<script src="<?= $this->Url->webroot('js/jquery.scrollUp.min.js') ?>"></script>
<script src="<?= $this->Url->webroot('js/jquery.dataTables.min.js') ?>"></script>
<?php $this->end() ?>