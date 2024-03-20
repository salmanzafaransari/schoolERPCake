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
                             <div class="modal-body">
                                 <h3 class="font-semibold">You are seeing Large Modal</h3>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur,
                                     assumenda aut eaque eius error, eum expedita iusto nobis obcaecati,
                                     perspiciatis quae quos saepe similique! Iure non perspiciatis qui
                                     veniam vitae!
                                 </p>
                             </div>
                             <div class="modal-footer">
                                 <button type="button" class="footer-btn bg-dark-low"
                                     data-dismiss="modal">Close</button>
                                 <button type="button" class="footer-btn bg-linkedin">Save
                                     Changes</button>
                             </div>
                         </div>
                     </div>
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
                                     <td class="font-medium text-dark-medium">ABC School</td>
                                 </tr>
                                 <tr>
                                     <td>School Code:</td>
                                     <td class="font-medium text-dark-medium">Super Admin</td>
                                 </tr>
                                 <tr>
                                  <td>Affliation No.:</td>
                                  <td class="font-medium text-dark-medium">Male</td>
                                 </tr>
                                 <tr>
                                     <td>Address Line 1:</td>
                                     <td class="font-medium text-dark-medium">Super Admin</td>
                                 </tr>
                                 <tr>
                                     <td>Address Line 2:</td>
                                     <td class="font-medium text-dark-medium">Super Admin</td>
                                 </tr>
                                 <tr>
                                     <td>City:</td>
                                     <td class="font-medium text-dark-medium">Steve Jones</td>
                                 </tr>
                                 <tr>
                                     <td>State:</td>
                                     <td class="font-medium text-dark-medium">Naomi Rose</td>
                                 </tr>
                                 <tr>
                                     <td>Country:</td>
                                     <td class="font-medium text-dark-medium">07.08.2016</td>
                                 </tr>
                                 <tr>
                                     <td>Pincode:</td>
                                     <td class="font-medium text-dark-medium">Islam</td>
                                 </tr>
                                 <tr>
                                     <td>Board:</td>
                                     <td class="font-medium text-dark-medium">07.08.2016</td>
                                 </tr>
                                 <tr>
                                     <td>Session Start Date:</td>
                                     <td class="font-medium text-dark-medium">stevenjohnson@gmail.com</td>
                                 </tr>
                                 <tr>
                                     <td>Session End Date:</td>
                                     <td class="font-medium text-dark-medium">stevenjohnson@gmail.com</td>
                                 </tr>
                                 <tr>
                                     <td>E-mail:</td>
                                     <td class="font-medium text-dark-medium">stevenjohnson@gmail.com</td>
                                 </tr>
                                 <tr>
                                     <td>Phone:</td>
                                     <td class="font-medium text-dark-medium">English</td>
                                 </tr>
                                 <tr>
                                     <td>Support No.:</td>
                                     <td class="font-medium text-dark-medium">English</td>
                                 </tr>
                                 <tr>
                                     <td>Support Email.:</td>
                                     <td class="font-medium text-dark-medium">English</td>
                                 </tr>
                                 <tr>
                                     <td>Website:</td>
                                     <td class="font-medium text-dark-medium">2</td>
                                 </tr>
                                 <tr>
                                     <td>Principal:</td>
                                     <td class="font-medium text-dark-medium">Pink</td>
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