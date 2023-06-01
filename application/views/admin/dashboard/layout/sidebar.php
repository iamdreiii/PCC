<?php
  $user = $this->session->userdata('user');
  extract($user);
?>
<div id="loading-overlay">
  <div id="loading-spinner"></div>
</div>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>assets/dist/img/avatar3.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo strtoupper($username)?></p>
          <?php if($this->session->userdata('user')['active_status'] == 'active'){ ?>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          <?php }else{?>
          <a href="#"><i class="fa fa-circle text-error"></i> Offline</a>
          <?php }?>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="">
          <a class="" href="<?php echo base_url()?>dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <?php if($this->session->userdata('user')['type'] == 'admin') : ?>
        <li>
          <a href="<?php echo base_url()?>blog-admin">
            <i class="fa fa-users"></i> <span>Announcements</span>
          </a>
        </li>
        <?php endif?>
        <!-- START MANAGE STUDENTS -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Manage Students</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="<?php echo base_url()?>all_student"><i class="fa fa-circle-o"></i> All Students</a></li> -->
            <li><a href="<?php echo base_url()?>students_list"><i class="fa fa-circle-o"></i> Students List</a></li>
            <!-- <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> BSE Students Lists
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?=base_url()?>bse_student_list_first_year"><i class="fa fa-circle-o"></i> First Year</a></li>
                <li><a href="<?=base_url()?>bse_student_list_second_year"><i class="fa fa-circle-o"></i> Second Year</a></li>
                <li><a href="<?=base_url()?>bse_student_list_third_year"><i class="fa fa-circle-o"></i> Third Year</a></li>
                <li><a href="<?=base_url()?>bse_student_list_fourth_year"><i class="fa fa-circle-o"></i> Fourth Year</a></li>
              </ul>
            </li>
            <li li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> BPA Students Lists
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?=base_url()?>bpa_student_list_first_year"><i class="fa fa-circle-o"></i> First Year</a></li>
                <li><a href="<?=base_url()?>bpa_student_list_second_year"><i class="fa fa-circle-o"></i> Second Year</a></li>
                <li><a href="<?=base_url()?>bpa_student_list_third_year"><i class="fa fa-circle-o"></i> Third Year</a></li>
                <li><a href="<?=base_url()?>bpa_student_list_fourth_year"><i class="fa fa-circle-o"></i> Fourth Year</a></li>
              </ul>
            </li> -->
            
          </ul>
        </li>
        <!-- START MANAGE STUDENTS SUBJECTS -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Manage Students Subjects</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> BSE Student Subjects
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <!-- YEAR LEVEL -->
              <ul class="treeview-menu">
                <li><a href="<?=base_url()?>bse_student_loads_first_year"><i class="fa fa-circle-o"></i> First Year</a></li>
                <li><a href="<?=base_url()?>bse_student_loads_second_year"><i class="fa fa-circle-o"></i> Second Year</a></li>
                <li><a href="<?=base_url()?>bse_student_loads_third_year"><i class="fa fa-circle-o"></i> Third Year</a></li>
                <li><a href="<?=base_url()?>bse_student_loads_fourth_year"><i class="fa fa-circle-o"></i> Fourth Year</a></li>
              </ul>
            </li>
            <li li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> BPA Student Subjects
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <!-- YEAR LEVEL -->
              <ul class="treeview-menu">
                <li><a href="<?=base_url()?>bpa_student_loads_first_year"><i class="fa fa-circle-o"></i> First Year</a></li>
                <li><a href="<?=base_url()?>bpa_student_loads_second_year"><i class="fa fa-circle-o"></i> Second Year</a></li>
                <li><a href="<?=base_url()?>bpa_student_loads_third_year"><i class="fa fa-circle-o"></i> Third Year</a></li>
                <li><a href="<?=base_url()?>bpa_student_loads_fourth_year"><i class="fa fa-circle-o"></i> Fourth Year</a></li>
              </ul>
            </li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Manage Grades</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> BSE Students
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <!-- YEAR LEVEL -->
              <ul class="treeview-menu">
                <li><a href="<?=base_url()?>bse_student_grades_first_year"><i class="fa fa-circle-o"></i> First Year</a></li>
                <li><a href="<?=base_url()?>bse_student_grades_second_year"><i class="fa fa-circle-o"></i> Second Year</a></li>
                <li><a href="<?=base_url()?>bse_student_grades_third_year"><i class="fa fa-circle-o"></i> Third Year</a></li>
                <li><a href="<?=base_url()?>bse_student_grades_fourth_year"><i class="fa fa-circle-o"></i> Fourth Year</a></li>
                <!-- <li><a href="<?=base_url()?>bse_student_grades_graduates"><i class="fa fa-circle-o"></i> Graduates</a></li> -->
              </ul>
            </li>
            <li li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> BPA Students
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <!-- YEAR LEVEL -->
              <ul class="treeview-menu">
                <li><a href="<?=base_url()?>bpa_student_grades_first_year"><i class="fa fa-circle-o"></i> First Year</a></li>
                <li><a href="<?=base_url()?>bpa_student_grades_second_year"><i class="fa fa-circle-o"></i> Second Year</a></li>
                <li><a href="<?=base_url()?>bpa_student_grades_third_year"><i class="fa fa-circle-o"></i> Third Year</a></li>
                <li><a href="<?=base_url()?>bpa_student_grades_fourth_year"><i class="fa fa-circle-o"></i> Fourth Year</a></li>
                <!-- <li><a href="<?=base_url()?>bse_student_grades_graduates"><i class="fa fa-circle-o"></i> Graduates</a></li> -->
              </ul>
            </li>
          </ul>
        </li>
        <!-- END MANAGE STUDENTS -->
        <!-- START MANAGE CLASS -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Manage Class</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>Class"><i class="fa fa-circle-o"></i> List of Class</a></li>
            <!-- <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Manage Teachers
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Teacher Class</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Teacher Loads</a></li>
                
              </ul>
            </li> -->
          </ul>
        </li>
        <!-- END MANAGE CLASS -->
        <?php if($this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff') : ?>
        <!-- START MANAGE SUBJECTS -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Manage Subjects</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>Subject"><i class="fa fa-circle-o"></i> Subjects List</a></li>
            <li><a href="<?php echo base_url()?>Subject_Prereq_BSE"><i class="fa fa-circle-o"></i> BSE Prerequisites</a></li>
            <li><a href="<?php echo base_url()?>Subject_Prereq_BPA"><i class="fa fa-circle-o"></i> BPA Prerequisites</a></li>
          </ul>
        </li>
        <!-- END MANAGE Grades -->
        <?php endif?>
        <!-- START MANAGE SUBJECTS -->
        
        <!-- END MANAGE Grades -->
       <!-- START MANAGE SUBJECTS -->
       <li>
          <a href="<?php echo base_url()?>records">
            <i class="fa fa-files-o"></i> <span>Records</span>
          </a>
        </li>
        <!-- END MANAGE SUBJECTS -->
        <li class="header"></li>
        <?php if($this->session->userdata('user')['type'] == 'admin') : ?>
        <li>
          <a href="<?php echo base_url()?>school-year">
            <i class="fa fa-calendar-o"></i> <span> School Year</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url()?>programs">
            <i class="fa fa-book"></i> <span> Programs</span>
          </a>
        </li>
        <!-- START MANAGE SETTINGS -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>manage_staff"><i class="fa fa-users"></i> Staff</a></li>
            <li><a href="<?=base_url()?>Signatory"><i class="fa fa-pencil"></i> Signatory</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-laptop"></i> Website
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <!-- <li><a href=""><i class="fa fa-info"></i> About Us</a></li> -->
                <li><a href="<?=base_url()?>manage_links"><i class="fa fa-external-link"></i> Links</a></li>
                <li><a href="<?=base_url()?>blog-setting"><i class="fa fa-gear"></i> Blog Settings</a></li>
              </ul>
            </li>
            
          </ul>
        </li>
        <?php endif ?>
        <!-- END MANAGE SUBJECTS -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<!-- ADD ACTIVE Indicator to Active Menu -->
<script>
// Get the current URL
const currentUrl = window.location.href;
// Get all the links in the sidebar and treeview menus
const sidebarLinks = document.querySelectorAll(".sidebar-menu a");
const treeviewLinks = document.querySelectorAll(".treeview-menu a");
// Loop through the links and add the active class to the one that corresponds to the current page
sidebarLinks.forEach((link) => {
  if (link.href === currentUrl) {
    link.parentElement.classList.add("active");
  }
});
// Loop through the treeview links and add the active class to the corresponding parent treeview menu item
treeviewLinks.forEach((link) => {
  if (link.href === currentUrl) {
    link.parentElement.classList.add("active");

    // Loop through the parent treeview menu items and add the active class to each one
    let parent = link.parentElement.parentElement;
    while (parent.classList.contains("treeview-menu")) {
      parent.parentElement.classList.add("active");
      parent = parent.parentElement.parentElement;
    }
  }
});
  </script>