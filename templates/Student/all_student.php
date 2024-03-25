<?php $this->start('title') ?>Add Student<?php $this->end() ?>
<?php $this->start('activeStu') ?>sub-group-active<?php $this->end() ?>
<?php $this->start('activeAllStu') ?>menu-active<?php $this->end() ?>
<?php $this->start('stylescss') ?>
<?php $this->end() ?>
<div class="breadcrumbs-area">
    <h3>Students</h3>
    <ul>
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>All Students</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->
<?= $this->Flash->render() ?>
<!-- Admit Form Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>All Students Data</h3>
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
                <tbody>
                <?php 
                            $count =1; 
                            foreach ($students as $student): 
                             // debug($student);
                             // die();
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
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <span class="flaticon-more-button-of-three-dots"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-times text-orange-red"></i>Close</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                </div>
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