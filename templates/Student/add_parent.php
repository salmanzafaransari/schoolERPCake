<?php $this->start('title') ?>Add Parents<?php $this->end() ?>
<?php $this->start('activeStu') ?>sub-group-active<?php $this->end() ?>
<?php $this->start('activeAP') ?>menu-active<?php $this->end() ?>
<div class="breadcrumbs-area">
    <h3>Students</h3>
    <ul>
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>Student parents Form</li>
    </ul>
</div>
<?= $this->Flash->render() ?>
<!-- Admit Form Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>All Parents Data</h3>
            </div>
            <div class="dropdown">
                
            </div>
        </div>
        <form class="mg-b-20">
            <div class="row gutters-8">
                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                    <input type="text" placeholder="Search by Roll ..." class="form-control">
                </div>
                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                    <input type="text" placeholder="Search by Name ..." class="form-control">
                </div>
                <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                    <input type="text" placeholder="Search by Class ..." class="form-control">
                </div>
                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                    <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                </div>
            </div>
        </form>
        <!-- <div class="table-responsive">
            <table class="table display data-table text-nowrap">
            <thead>
                <div class="dropdown">
                   <button type="button" class="modal-trigger" data-toggle="modal"
                       data-target="#large-modal" data-student="">
                       SEARCH
                   </button>
                </div>
                
             </div> 
                </thead>
            </table>
        </div> -->
        
        <div class="table-responsive">
            <table class="table display data-table text-nowrap">
                <thead>
                    <tr>
                        <th>Admission No</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Parents</th>
                        <th>Address</th>
                        <th>Date Of Birth</th>
                        <th></th>
                    </tr>
                </thead>
                <div class="modal fade" id="large-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Parents</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                             <?= $this->Form->create(null, ['class' => 'new-added-form']) ?>
                            <div>
                                 <h3>Father Details</h3>
                            </div>
                                <div class="row p-3">
                                   <div class="col-xl-4 form-group">
                                    <?= $this->Form->control('name', ['label' => 'Name', 'class' => 'form-control']) ?>
                                   </div>
                                   <div class="col-xl-4 form-group">
                                    <?= $this->Form->control('middle_name', ['label' => 'Middle Name', 'class' => 'form-control']) ?>
                                   </div>
                                   <div class="col-xl-4 form-group">
                                    <?= $this->Form->control('last_name', ['label' => 'Last Name', 'class' => 'form-control']) ?>
                                   </div>
                                   <div class="col-xl-12 form-group">
                                    <?= $this->Form->control('address', ['label' => 'Address', 'class' => 'form-control']) ?>
                                   </div>
                                   <div class="col-xl-6 form-group">
                                    <?= $this->Form->control('mobile', ['label' => 'Mobile', 'class' => 'form-control']) ?>
                                   </div>
                                   <div class="col-xl-6 form-group">
                                    <?= $this->Form->control('email', ['label' => 'Email', 'class' => 'form-control']) ?>
                                   </div>
                                </div><br>  
                                   <div style="border-bottom:2px solid #e9ecef; width:100%;"></div>
                                   <div><br>
                                    <h3>Mother Details</h3>
                                   </div>
                                <div class="row p-3">   
                                   <div class="col-xl-4 form-group">
                                    <?= $this->Form->control('name', ['label' => 'Name', 'class' => 'form-control']) ?>
                                   </div>
                                   <div class="col-xl-4 form-group">
                                    <?= $this->Form->control('middle_name', ['label' => 'Middle Name', 'class' => 'form-control']) ?>
                                   </div>
                                   <div class="col-xl-4 form-group">
                                    <?= $this->Form->control('last_name', ['label' => 'Last Name', 'class' => 'form-control']) ?>
                                   </div>
                                   <div class="col-xl-12 form-group">
                                    <?= $this->Form->control('address', ['label' => 'Address', 'class' => 'form-control']) ?>
                                   </div>
                                   <div class="col-xl-6 form-group">
                                    <?= $this->Form->control('mobile', ['label' => 'Mobile', 'class' => 'form-control']) ?>
                                   </div>
                                   <div class="col-xl-6 form-group">
                                    <?= $this->Form->control('email', ['label' => 'Email', 'class' => 'form-control']) ?>
                                   </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                             <?= $this->Form->button('Save Changes', ['class' => 'footer-btn text-white btn-gradient-yellow btn-hover-bluedark']) ?>
                            </div>
                        </div>
                    </div>
                         <?= $this->Form->end() ?>
                </div>
                <tbody>
                <?php 
                            $count =1; 
                            foreach ($students as $student): 
                            ?>
                    <tr>
                        <td><?php echo h($student->admission_id); ?></td>
                        <td><?php echo h($student->full_name); ?></td>
                        <td align=center><?php echo h($student->gender); ?></td>
                        <td align=center><?php echo h($student->classlist->class_name); ?></td>
                        <td align=center><?php echo h($student->classlist->section); ?></td>
                        <td>Jack Sparrow </td>
                        <td>TA-107 Newyork</td>
                        <td><?php echo h($student->date_of_birth); ?></td>
                        <td align=center>
                            <div class="dropdown">
                                <button type="button" class="modal-trigger btn btn-primary" data-toggle="modal"
                                    data-target="#large-modal" data-student="">
                                    SEARCH
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->start('scripts') ?>
<script src="<?= $this->Url->webroot('js/jquery.scrollUp.min.js') ?>"></script>
<?php $this->end() ?>