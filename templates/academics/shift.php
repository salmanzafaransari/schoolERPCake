<?php $this->start('title') ?>Add Class<?php $this->end() ?>
<?php $this->start('activeAcademics') ?>sub-group-active<?php $this->end() ?>
<?php $this->start('activeShift') ?>menu-active<?php $this->end() ?>
<?php $this->start('stylescss') ?>
<link rel="stylesheet" href="<?= $this->Url->webroot('css/select2.min.css') ?>">
<link rel="stylesheet" href="<?= $this->Url->webroot('css/datepicker.min.css') ?>">
<?php $this->end() ?>
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Academics</h3>
    <ul>
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>Shift</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->
<?= $this->Flash->render() ?>
<div class="row">
    <div class="col-md-12">
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>All Shifts</h3>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="modal-trigger" data-toggle="modal"
                            data-target="#add-modal">
                            Add Shift
                        </button>
                    </div>
                    <!-- add shift  -->
                    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add A Shift</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?= $this->Form->create(null, ['class' => 'new-added-form']) ?>
                                    <div class="row">
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('shift_name', ['label' => 'Shift Name', 'class' => 'form-control']) ?>
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('shift_start', ['label' => 'Shift Start Time', 'class' => 'form-control', 'type'=>'time']) ?>
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('shift_end', ['label' => 'Shift End Time', 'class' => 'form-control', 'type'=>'time']) ?>
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('recess', ['label' => 'Recess Time (Must be in Minute)', 'class' => 'form-control', 'type'=>'number', 'max'=>'60']) ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <?= $this->Form->button('Submit', ['class' => 'btn-fill-lg btn-gradient-yellow btn-hover-bluedark']) ?>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- edit shift -->

                    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Shift</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?= $this->Form->create(null, ['class' => 'new-added-form']) ?>
                                    <div class="row">
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('shift_name', ['label' => 'Shift Name', 'class' => 'form-control', 'id' => 'edit-shift-name']) ?>
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('shift_start', ['label' => 'Shift Start Time', 'class' => 'form-control', 'type'=>'time', 'id' => 'edit-shift-start']) ?>
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('shift_end', ['label' => 'Shift End Time', 'class' => 'form-control', 'type'=>'time', 'id' => 'edit-shift-end']) ?>
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <?= $this->Form->control('recess', ['label' => 'Recess Time (Must be in Minute)', 'class' => 'form-control', 'type'=>'number', 'max'=>'60', 'id' => 'edit-recess']) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <?= $this->Form->button('Update', ['class' => 'btn-fill-lg btn-gradient-yellow btn-hover-bluedark', 'id' => 'update-btn']) ?>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="table-responsive">
                    <table class="table display data-table text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="text-align:center;">Active / Inactive</th>
                                <th>Shift Name</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Total Hour</th>
                                <th>Recess Time</th>
                                <th>Actions</th> <!-- Add new column for actions -->
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($shifts)): ?>
                            <?php foreach ($shifts as $index => $shift): ?>
                                <tr  class="<?= $shift->status == 0 ? 'bg-red text-white' : '' ?>">
                                    <td><?= $index + 1; ?></td>
                                    <td align="center">
                                        <?= $this->Form->create(null, [
                                            'id' => 'status-form-'.$shift->id,
                                            'url' => ['action' => 'toggleStatusShift', $shift->id],
                                            'style' => 'display:inline;',
                                            'type' => 'post'
                                        ]) ?>
                                        <?= $this->Form->hidden('id', ['value' => $shift->id]) ?>
                                        <?= $this->Form->checkbox('status', [
                                            'checked' => $shift->status == 1,
                                            'data-id' => $shift->id,
                                            'data-url' => $this->Url->build(['action' => 'toggleStatusShift', $shift->id])
                                        ]) ?>
                                        <?= $this->Form->end() ?>
                                    </td>
                                    <td><?= h($shift->shift_name); ?></td> <!-- Shift Name -->
                                    <td><?= h($shift->shift_start); ?></td> <!-- Start Time -->
                                    <td><?= h($shift->shift_end); ?></td> <!-- End Time -->
                                    <td>
                                       <?php 
                                       // Convert shift start and end times to DateTime objects
                                       $startTime = new \DateTime($shift->shift_start);
                                       $endTime = new \DateTime($shift->shift_end);

                                       // Calculate the difference in hours and minutes
                                       $interval = $startTime->diff($endTime);
                                       echo $interval->format('%h hours %i minutes'); 
                                       ?>
                                   </td>
                                    <td><?= h($shift->recess) . ' minutes'; ?></td>
                                    <td>
                                        <!-- Edit Button with Data Attributes for the Modal -->
                                        <button class="btn btn-fill-lg text-light btn-gradient-yellow edit-btn" data-toggle="modal" data-target="#edit-modal"
                                            data-id="<?= $shift->id ?>"
                                            data-name="<?= h($shift->shift_name) ?>"
                                            data-start="<?= h($shift->shift_start) ?>"
                                            data-end="<?= h($shift->shift_end) ?>"
                                            data-recess="<?= h($shift->recess) ?>">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">No shifts found.</td>
                            </tr>
                        <?php endif; ?>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {

        $('input[type="checkbox"][name="status"]').change(function() {
            var checkbox = $(this);
            var isChecked = checkbox.is(':checked');
            var classId = checkbox.data('id');
            var formId = 'status-form-' + classId;

            if (!isChecked) {
                // Show SweetAlert confirmation before unchecking
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to mark this Shift as inactive.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, mark it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#' + formId).submit();
                    } else {
                        checkbox.prop('checked', true); // Keep it checked if canceled
                    }
                });
            } else {
                $('#' + formId).submit();
            }
        });


        $('.edit-btn').on('click', function() {
            // Get data attributes from the button
            var shiftId = $(this).data('id');
            var shiftName = $(this).data('name');
            var shiftStart = $(this).data('start');
            var shiftEnd = $(this).data('end');
            var recessTime = $(this).data('recess');
            
            // Populate the modal fields with the selected data
            $('#edit-shift-name').val(shiftName);
            $('#edit-shift-start').val(shiftStart);
            $('#edit-shift-end').val(shiftEnd);
            $('#edit-recess').val(recessTime);
            
            // Update the form action to point to the edit URL
            var editUrl = '<?= $this->Url->build(['action' => 'shift']); ?>/' + shiftId;
            $('#edit-modal form').attr('action', editUrl);
        });
    });
</script>

<?php $this->end() ?>