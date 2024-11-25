<?php $this->start('title') ?>Teacher Details<?php $this->end() ?>
<?php $this->start('activeTea') ?>sub-group-active<?php $this->end() ?>
<?php $this->start('activeAllT') ?>menu-active<?php $this->end() ?>
<?php $this->start('stylescss') ?>
<link rel="stylesheet" href="<?= $this->Url->webroot('css/select2.min.css') ?>">
<link rel="stylesheet" href="<?= $this->Url->webroot('css/datepicker.min.css') ?>">
<style>
 .item-img{
    position: relative;
    display: inline-block;
 }
 .centered-button {
    position: absolute;
    bottom: 20%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 16px;
}
</style>
<?php $this->end() ?>
<div class="breadcrumbs-area">
    <h3>Teacher</h3>
    <ul>
        <li>
            <a href="/">Home</a>
        </li>
        <li>
        <?php echo $this->Html->link('All Teachers', ['controller' => 'Teacher', 'action' => 'allTeacher']); ?>
        </li>
        <li>Teacher Details</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->
<?= $this->Flash->render() ?>
<!-- Admit Form Area Start Here -->
<div class="card height-auto">
 
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>Teacher Details</h3>
            </div>
            <div class="dropdown">
                
            </div>
        </div>
        <div class="single-info-details">
            <div class="item-img">
                <?php
                if(isset($teacher['photo'])&& !empty($teacher['photo'])){
                    $image = $teacher['photo'];
                    echo $this->Html->image('/img/'.$teacher['photo'], [ 'alt'=> "Teacher"]);
                    echo "<button type='button' class='centered-button btn font-normal radius-4 text-light btn-gradient-yellow' id='modalpop'>Change Photo</button>";

                }else {
                    // echo '<img src="' . str_replace(WWW_ROOT, '/', WWW_ROOT . 'img/figure/teacher.jpg') . '" alt="default">';
                    $image = 'figure/teacher.jpg';
                    echo $this->Html->image('/img/figure/teacher.jpg', [ 'alt'=> "Defualt"]);
                    // echo $this->Html->link('Upload Photo', '#', ['class' => 'centered-button btn-fill-lg font-normal radius-4 text-light btn-gradient-yellow']);
                    echo "<button type='button' class='centered-button btn font-normal radius-4 text-light btn-gradient-yellow' id='modalpop'>Upload Photo</button>";

                }
                
                ?>
             
              <div class="modal fade" id="standard-modal" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title">Update Image</h5>
                              <button type="button" class="close" data-dismiss="modal"
                                  aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            <center>
                                <div class="item-img-2" style="width:150px; height:150px;">
                                    <img id="changeLogoPreview" src="<?= $this->Url->webroot('/img/'.$image) ?>" style="border: 4px solid #ffae01;">
                                </div>
                            </center>
                            <br/><br/>
                            <?= $this->Form->create(null, ['url' => ['action' => 'updateimage', $teacher["id"] ], 'enctype' => 'multipart/form-data']) ?>
                            <div class="d-flex justify-content-between">
                                <?= $this->Form->control('photo', ['type' => 'file', 'class' => 'form-control-file', 'label' => false, 'id' => 'fileInput']) ?>
                                
                                <button type="submit" class="btn btn-lg text-white btn-gradient-yellow btn-hover-bluedark">Update</button>
                            </div>
                            <?= $this->Form->end() ?>
                          </div>
                      </div>
                  </div>
              </div>

            </div>
            <div class="item-content">
                <div class="header-inline item-header">
                    <h3 class="text-dark-medium font-medium">About Teacher</h3>
                    <div class="header-elements">
                        <ul>
                            <li>
                                <?php 
                                   echo $this->Html->link(
                                       '<i class="far fa-edit"></i>', 
                                       ['controller' => 'Teacher', 'action' => 'teacherForm',$teacher['id']], 
                                       ['escape' => false]
                                   ); 
                                 ?>
                            <li><a href="#"><i class="fas fa-print"></i></a></li>
                            <li><a href="#"><i class="fas fa-download"></i></a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="info-table table-responsive">
                    <table class="table text-nowrap">
                        <tbody>
                            <tr>
                                <td>Name:</td>
                                <td class="font-medium text-dark-medium"><?php echo $teacher['full_name']; ?></td>
                            </tr>
                            <tr>
                                <td>Gender:</td>
                                <td class="font-medium text-dark-medium"><?php echo $teacher['gender']; ?></td>
                            </tr>
                            <tr>
                                <td>Father Name:</td>
                                <td class="font-medium text-dark-medium"><?php echo $teacher['father_name']; ?></td>
                            </tr>
                            <tr>
                                <td>Mother Name:</td>
                                <td class="font-medium text-dark-medium"><?php echo $teacher['mother_name']; ?></td>
                            </tr>
                            <tr>
                                <td>Religion:</td>
                                <td class="font-medium text-dark-medium"><?php echo $teacher['religion']; ?></td>
                            </tr>
                            <tr>
                                <td>Joining Date:</td>
                                <td class="font-medium text-dark-medium"><?php echo $teacher['date_of_joining']; ?></td>
                            </tr>
                            <tr>
                                <td>E-mail:</td>
                                <td class="font-medium text-dark-medium"><?php echo $teacher['email']; ?></td>
                            </tr>
                            <tr>
                                <td>ID No:</td>
                                <td class="font-medium text-dark-medium"><?php echo $teacher['id_no']; ?></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td class="font-medium text-dark-medium"><?php echo $teacher['address']; ?></td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td class="font-medium text-dark-medium"><?php echo $teacher['phone']; ?></td>
                            </tr>
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
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="<?= $this->Url->webroot('js/jquery.scrollUp.min.js') ?>"></script>
<script>

$(document).ready( function(){
 $('#modalpop').on('click', function() {
    $('#standard-modal').modal('show');
});

})
</script>
<?php $this->end() ?>