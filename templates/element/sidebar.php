<?php

use Cake\View\Helper\HtmlHelper;

$html = new HtmlHelper(new \Cake\View\View());
?>
<!-- Sidebar Area Start Here -->
<div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
   <div class="mobile-sidebar-header d-md-none">
        <div class="header-logo">
            <a href="index.html"><img src="<?= $this->Url->webroot('img/logo1.png') ?>" alt="logo"></a>
        </div>
   </div>
    <div class="sidebar-menu-content">
        <ul class="nav nav-sidebar-menu sidebar-toggle-view">
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
                <ul class="nav sub-group-menu">
                    <li class="nav-item">
                        <a href="index.html" class="nav-link"><i class="fas fa-angle-right"></i>Admin</a>
                    </li>
                    <li class="nav-item">
                        <a href="index3.html" class="nav-link"><i
                                class="fas fa-angle-right"></i>Students</a>
                    </li>
                    <li class="nav-item">
                        <a href="index4.html" class="nav-link"><i class="fas fa-angle-right"></i>Parents</a>
                    </li>
                    <li class="nav-item">
                        <a href="index5.html" class="nav-link"><i
                                class="fas fa-angle-right"></i>Teachers</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="flaticon-classmates"></i><span>Students</span></a>
                <ul class="nav sub-group-menu  <?= $this->fetch('activeStu') ?>">
                    <li class="nav-item">
                        <?php echo $html->link('<i class="fas fa-angle-right"></i>All Student', ['controller' => 'Student', 'action' => 'allStudent'], ['escape' => false, 'class' => 'nav-link '.$this->fetch('activeAllStu')]); ?>
                    </li>
                    <li class="nav-item">
                        <a href="student-details.html" class="nav-link"><i
                                class="fas fa-angle-right"></i>Student Details</a>
                    </li>
                    <li class="nav-item">
                        <?php echo $html->link('<i class="fas fa-angle-right"></i>Add Student', ['controller' => 'Student', 'action' => 'studentForm'], ['escape' => false, 'class' => 'nav-link '.$this->fetch('activeAS')]); ?>
                    </li>
                    <li class="nav-item">
                        <?php echo $html->link('<i class="fas fa-angle-right"></i>Add Bulk Student', ['controller' => 'Student', 'action' => 'studentBulkForm'], ['escape' => false, 'class' => 'nav-link '.$this->fetch('activeASB')]); ?>
                    </li>
                    <li class="nav-item">
                        <?php echo $html->link('<i class="fas fa-angle-right"></i>Add Parents', ['controller' => 'Student', 'action' => 'addParent'], ['escape' => false, 'class' => 'nav-link '.$this->fetch('activeAP')]); ?>
                    </li>
                </ul>
            </li>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i
                        class="flaticon-multiple-users-silhouette"></i><span>Teachers</span></a>
                <ul class="nav sub-group-menu <?= $this->fetch('activeTea') ?>">
                    <li class="nav-item">
                        <?php echo $html->link('<i class="fas fa-angle-right"></i>All Teachers', ['controller' => 'Teacher', 'action' => 'allTeacher'], ['escape' => false, 'class' => 'nav-link '.$this->fetch('activeAllT')]); ?>

                    </li>
                    <li class="nav-item">
                        <?php echo $html->link('<i class="fas fa-angle-right"></i>Add Teacher', ['controller' => 'Teacher', 'action' => 'teacherForm'], ['escape' => false, 'class' => 'nav-link '.$this->fetch('activeAT')]); ?>
                    </li>
                    <li class="nav-item">
                        <a href="teacher-payment.html" class="nav-link"><i
                                class="fas fa-angle-right"></i>Payment</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="flaticon-couple"></i><span>Parents</span></a>
                <ul class="nav sub-group-menu">
                    <li class="nav-item">
                        <a href="all-parents.html" class="nav-link"><i class="fas fa-angle-right"></i>All
                            Parents</a>
                    </li>
                    <li class="nav-item">
                        <a href="parents-details.html" class="nav-link"><i
                                class="fas fa-angle-right"></i>Parents Details</a>
                    </li>
                    <li class="nav-item">
                        <a href="add-parents.html" class="nav-link"><i class="fas fa-angle-right"></i>Add
                            Parent</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="flaticon-books"></i><span>Library</span></a>
                <ul class="nav sub-group-menu">
                    <li class="nav-item">
                        <a href="all-book.html" class="nav-link"><i class="fas fa-angle-right"></i>All
                            Book</a>
                    </li>
                    <li class="nav-item">
                        <a href="add-book.html" class="nav-link"><i class="fas fa-angle-right"></i>Add New
                            Book</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="flaticon-technological"></i><span>Acconunt</span></a>
                <ul class="nav sub-group-menu">
                    <li class="nav-item">
                        <a href="all-fees.html" class="nav-link"><i class="fas fa-angle-right"></i>All Fees
                            Collection</a>
                    </li>
                    <li class="nav-item">
                        <a href="all-expense.html" class="nav-link"><i
                                class="fas fa-angle-right"></i>Expenses</a>
                    </li>
                    <li class="nav-item">
                        <a href="add-expense.html" class="nav-link"><i class="fas fa-angle-right"></i>Add
                            Expenses</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i
                        class="flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i><span>Manage Class</span></a>
                <ul class="nav sub-group-menu  <?= $this->fetch('activeClasses') ?>">
                    <li class="nav-item">
                        <?php echo $html->link('<i class="fas fa-angle-right"></i>Classes Subjects', ['controller' => 'Classes', 'action' => 'addSubjects'], ['escape' => false, 'class' => 'nav-link '.$this->fetch('activeSubClass')]); ?>
                    </li>
                    <li class="nav-item">
                        <?php echo $html->link('<i class="fas fa-angle-right"></i>Class Teacher', ['controller' => 'Classes', 'action' => 'classTeacher'], ['escape' => false, 'class' => 'nav-link '.$this->fetch('activeSubClassteacher')]); ?>
                    </li>
                </ul>
            </li>
            <li class="nav-item sidebar-nav-item">
            <a href="#" class="nav-link"><i class="flaticon-open-book"></i><span>Manage Subjects</span></a>
                <ul class="nav sub-group-menu  <?= $this->fetch('activeSubject') ?>">
                    <li class="nav-item">
                        <?php echo $html->link('<i class="fas fa-angle-right"></i>Subject Teacher', ['controller' => 'Subject', 'action' => 'subjectTeacher'], ['escape' => false, 'class' => 'nav-link '.$this->fetch('activeSubTea')]); ?>
                    </li>
                    <li class="nav-item">
                        <?php echo $html->link('<i class="fas fa-angle-right"></i>Subjects Timing', ['controller' => 'Subject', 'action' => 'subjectTime'], ['escape' => false, 'class' => 'nav-link '.$this->fetch('activeSubTim')]); ?>
                    </li>
                    <li class="nav-item">
                        <?php echo $html->link('<i class="fas fa-angle-right"></i>Subject Add / Edit', ['controller' => 'Subject', 'action' => 'subjectAdd'], ['escape' => false, 'class' => 'nav-link '.$this->fetch('activeSubAdd')]); ?>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="class-routine.html" class="nav-link"><i class="flaticon-calendar"></i><span>Class
                        Routine</span></a>
            </li>
            <li class="nav-item">
                <a href="student-attendence.html" class="nav-link"><i
                        class="flaticon-checklist"></i><span>Attendence</span></a>
            </li>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="flaticon-shopping-list"></i><span>Exam</span></a>
                <ul class="nav sub-group-menu">
                    <li class="nav-item">
                        <a href="exam-schedule.html" class="nav-link"><i class="fas fa-angle-right"></i>Exam
                            Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a href="exam-grade.html" class="nav-link"><i class="fas fa-angle-right"></i>Exam
                            Grades</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="transport.html" class="nav-link"><i
                        class="flaticon-bus-side-view"></i><span>Transport</span></a>
            </li>
            <li class="nav-item">
                <a href="hostel.html" class="nav-link"><i class="flaticon-bed"></i><span>Hostel</span></a>
            </li>
            <li class="nav-item">
                <a href="notice-board.html" class="nav-link"><i
                        class="flaticon-script"></i><span>Notice</span></a>
            </li>
            <li class="nav-item">
                <a href="messaging.html" class="nav-link"><i
                        class="flaticon-chat"></i><span>Messeage</span></a>
            </li>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="flaticon-menu-1"></i><span>UI Elements</span></a>
                <ul class="nav sub-group-menu">
                    <li class="nav-item">
                        <a href="notification-alart.html" class="nav-link"><i class="fas fa-angle-right"></i>Alart</a>
                    </li>
                    <li class="nav-item">
                        <a href="button.html" class="nav-link"><i class="fas fa-angle-right"></i>Button</a>
                    </li>
                    <li class="nav-item">
                        <a href="grid.html" class="nav-link"><i class="fas fa-angle-right"></i>Grid</a>
                    </li>
                    <li class="nav-item">
                        <a href="modal.html" class="nav-link"><i class="fas fa-angle-right"></i>Modal</a>
                    </li>
                    <li class="nav-item">
                        <a href="progress-bar.html" class="nav-link"><i class="fas fa-angle-right"></i>Progress Bar</a>
                    </li>
                    <li class="nav-item">
                        <a href="ui-tab.html" class="nav-link"><i class="fas fa-angle-right"></i>Tab</a>
                    </li>
                    <li class="nav-item">
                        <a href="ui-widget.html" class="nav-link"><i
                                class="fas fa-angle-right"></i>Widget</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i
                        class="flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i><span>Academics</span></a>
                <ul class="nav sub-group-menu <?= $this->fetch('activeAcademics') ?>">
                    <li class="nav-item">
                        <!-- <a href="/academics/add-class" class="nav-link"><i class="fas fa-angle-right"></i>School Details</a> -->
                        <?php echo $html->link('<i class="fas fa-angle-right"></i>School Details', ['controller' => 'Academics', 'action' => 'schoolDetails'], ['escape' => false, 'class' => 'nav-link '.$this->fetch('activeSD')]); ?>
                    </li>
                    <li class="nav-item">
                        <?php echo $html->link('<i class="fas fa-angle-right"></i>Classes', ['controller' => 'Academics', 'action' => 'addClass'], ['escape' => false, 'class' => 'nav-link '.$this->fetch('activeClass')]); ?>
                    </li>
                    <li class="nav-item">
                        <?php echo $html->link('<i class="fas fa-angle-right"></i>Shift', ['controller' => 'Academics', 'action' => 'shift'], ['escape' => false, 'class' => 'nav-link '.$this->fetch('activeShift')]); ?>
                    </li>
                    <li class="nav-item">
                        <?php echo $html->link('<i class="fas fa-angle-right"></i>Weekly Class Schedule', ['controller' => 'Academics', 'action' => 'weeklyClassSchedule'], ['escape' => false, 'class' => 'nav-link '.$this->fetch('activeSchedule')]); ?>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="map.html" class="nav-link"><i
                        class="flaticon-planet-earth"></i><span>Map</span></a>
            </li>
            <li class="nav-item">
                <a href="account-settings.html" class="nav-link"><i
                        class="flaticon-settings"></i><span>Account</span></a>
            </li>
        </ul>
    </div>
</div>
<!-- Sidebar Area End Here -->