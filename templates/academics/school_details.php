<?php $this->start('title') ?>School Details<?php $this->end() ?>
<?php $this->start('stylescss') ?>
<link rel="stylesheet" href="<?= $this->Url->webroot('css/select2.min.css') ?>">
<link rel="stylesheet" href="<?= $this->Url->webroot('css/datepicker.min.css') ?>">
<?php $this->end() ?>
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Academics</h3>
    <ul>
        <li>
            <a href="/">Home</a>
        </li>
        <li>School Details</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->
<?= $this->Flash->render() ?>
<div class="row">
    <div class="col-md-12">
     <div class="card account-settings-box">
         <div class="card-body"  style="margin-top:80px;">
             <div class="heading-layout1 mg-b-20">
                 <div class="item-title">
                     <h3>User Details</h3>
                 </div>
                <div class="dropdown">
                   <button type="button" class="modal-trigger" data-toggle="modal"
                       data-target="#large-modal">
                       Edit This Info
                   </button>
                 </div>
                 <div class="modal fade" id="large-modal" tabindex="-1" role="dialog" aria-hidden="true">
                     <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title">Large Modal</h5>
                                 <button type="button" class="close" data-dismiss="modal"
                                     aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body" style="padding:40px;">
                <?= $this->Form->create($schoolinfo, ['class' => 'new-added-form']) ?>
                    <div class="row">
                        <div class="col-xl-12 form-group">
                        <?= $this->Form->control('school_name', ['label' => 'School Name', 'class' => 'form-control']) ?>
                        </div>
                        <div class="col-xl-6 form-group">
                        <?= $this->Form->control('school_code', ['label' => 'School code', 'class' => 'form-control']) ?>
                        </div>
                        <div class="col-xl-6 form-group">
                        <?= $this->Form->control('affiliation_no', ['label' => 'Affiliation no', 'class' => 'form-control']) ?>
                        </div>
                        <div class="col-xl-12 form-group">
                        <?= $this->Form->control('address_line_1', ['label' => 'Address 1', 'class' => 'form-control']) ?>
                        </div>
                        <div class="col-xl-12 form-group">
                        <?= $this->Form->control('address_line_2', ['label' => 'Address 2', 'class' => 'form-control']) ?>
                        </div>
                        <div class="col-xl-4 form-group">
                        <?= $this->Form->control('city', ['label' => 'City', 'class' => 'form-control']) ?>
                        </div>
                        <div class="col-xl-4 form-group">
                        <?= $this->Form->control('state', ['label' => 'State', 'class' => 'form-control']) ?>
                        </div>
                        <div class="col-xl-4 form-group">
                        <?= $this->Form->control('country', ['label' => 'Country', 'class' => 'form-control']) ?>
                        </div>
                        <div class="col-xl-6 form-group">
                        <?= $this->Form->control('pincode', ['label' => 'Pincode', 'class' => 'form-control']) ?>
                        </div>
                        <div class="col-xl-6 form-group">
                        <?= $this->Form->control('board', ['label' => 'Board Name', 'class' => 'form-control']) ?>
                        </div>
                        <div class="col-xl-6 form-group">
                        <?= $this->Form->control('session_start_date', ['label' => 'Session Start', 'class'=>'form-control air-datepicker', 'type'=>'text', 'placeholder'=>"dd/mm/yyyy"]) ?><i class="far fa-calendar-alt"></i>
                        </div>
                        <div class="col-xl-6 form-group">
                        <?= $this->Form->control('session_end_date', ['label' => 'Session End', 'class'=>'form-control air-datepicker', 'type'=>'text', 'placeholder'=>"dd/mm/yyyy"]) ?><i class="far fa-calendar-alt"></i>
                        </div>
                        <div class="col-xl-12 form-group">
                        <?= $this->Form->control('email', ['label' => 'Email', 'class' => 'form-control']) ?>
                        </div>
                        <div class="col-xl-6 form-group">
                        <?= $this->Form->control('phone', ['label' => 'Phone', 'class' => 'form-control']) ?>
                        </div>
                        <div class="col-xl-6 form-group">
                        <?= $this->Form->control('support_no', ['label' => 'Support No', 'class' => 'form-control']) ?>
                        </div>
                        <div class="col-xl-6 form-group">
                        <?= $this->Form->control('support_email', ['label' => 'Support Email', 'class' => 'form-control']) ?>
                        </div>
                        <div class="col-xl-6 form-group">
                        <?= $this->Form->control('website', ['label' => 'Website', 'class' => 'form-control']) ?>
                        </div>
                        <div class="col-xl-12 form-group">
                        <?= $this->Form->control('principal', ['label' => 'Principal Name', 'class' => 'form-control']) ?>
                        </div>
                    </div>
                    </div>
                             <div class="modal-footer">
                                 <div class="col-6">
                            <?= $this->Form->button('Save Changes', ['class' => 'btn-fill-lg btn-gradient-yellow btn-hover-bluedark']) ?>

                                </div>
                                <div class="col-6  d-flex justify-content-end">
                                    <button type="button" class="btn-fill-lg  footer-btn bg-dark-low" data-bs-toggle="popover" data-bs-placement="right"
                                        data-dismiss="modal">Close</button>
                                </div>
                             </div>
                         </div>
                     </div>
                     
                <?= $this->Form->end() ?>
                 </div>
             </div>
             <div class="user-details-box">
                 <div class="d-flex" style="justify-content:center;">
                  <div class="item-img" style="margin-top:-160px; width:150px; height:150px;">
                      <img src="<?= $this->Url->webroot('img/figure/user.jpg') ?>" alt="School Logo" style=" border:4px solid #fff">
                  </div>
                 </div>
                 <div class="item-content">
                     <div class="info-table table-responsive">
                         <table class="table text-nowrap">
                             <tbody>
                                 <tr>
                                     <td>School Name:</td>
                                     <td class="font-medium text-dark-medium"><?php echo $schoolinfo['school_name']; ?></td>
                                 </tr>
                                 <tr>
                                     <td>School Code:</td>
                                     <td class="font-medium text-dark-medium"><?php echo $schoolinfo['school_code']; ?> </td>
                                 </tr>
                                 <tr>
                                  <td>Affliation No.:</td>
                                  <td class="font-medium text-dark-medium"><?php echo $schoolinfo['affiliation_no']; ?></td>
                                 </tr>
                                 <tr>
                                     <td>Address Line 1:</td>
                                     <td class="font-medium text-dark-medium"><?php echo $schoolinfo['address_line_1']; ?></td>
                                 </tr>
                                 <tr>
                                     <td>Address Line 2:</td>
                                     <td class="font-medium text-dark-medium"><?php echo $schoolinfo['address_line_2']; ?></td>
                                 </tr>
                                 <tr>
                                     <td>City:</td>
                                     <td class="font-medium text-dark-medium"><?php echo $schoolinfo['city']; ?></td>
                                 </tr>
                                 <tr>
                                     <td>State:</td>
                                     <td class="font-medium text-dark-medium"><?php echo $schoolinfo['state']; ?></td>
                                 </tr>
                                 <tr>
                                     <td>Country:</td>
                                     <td class="font-medium text-dark-medium"><?php echo $schoolinfo['country']; ?></td>
                                 </tr>
                                 <tr>
                                     <td>Pincode:</td>
                                     <td class="font-medium text-dark-medium"><?php echo $schoolinfo['pincode']; ?></td>
                                 </tr>
                                 <tr>
                                     <td>Board:</td>
                                     <td class="font-medium text-dark-medium"><?php echo $schoolinfo['board']; ?></td>
                                 </tr>
                                 <tr>
                                     <td>Session Start Date:</td>
                                     <td class="font-medium text-dark-medium"><?php echo $schoolinfo['session_start_date']; ?></td>
                                 </tr>
                                 <tr>
                                     <td>Session End Date:</td>
                                     <td class="font-medium text-dark-medium"><?php echo $schoolinfo['session_end_date']; ?></td>
                                 </tr>
                                 <tr>
                                     <td>E-mail:</td>
                                     <td class="font-medium text-dark-medium"><?php echo $schoolinfo['email']; ?></td>
                                 </tr>
                                 <tr>
                                     <td>Phone:</td>
                                     <td class="font-medium text-dark-medium"><?php echo $schoolinfo['phone']; ?></td>
                                 </tr>
                                 <tr>
                                     <td>Support No.:</td>
                                     <td class="font-medium text-dark-medium"><?php echo $schoolinfo['support_no']; ?></td>
                                 </tr>
                                 <tr>
                                     <td>Support Email.:</td>
                                     <td class="font-medium text-dark-medium"><?php echo $schoolinfo['support_email']; ?></td>
                                 </tr>
                                 <tr>
                                     <td>Website:</td>
                                     <td class="font-medium text-dark-medium"><?php echo $schoolinfo['website']; ?></td>
                                 </tr>
                                 <tr>
                                     <td>Principal:</td>
                                     <td class="font-medium text-dark-medium"><?php echo $schoolinfo['principal']; ?></td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
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