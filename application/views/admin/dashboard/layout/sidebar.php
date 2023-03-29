<?php
  $user = $this->session->userdata('user');
  extract($user);
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo strtoupper($username)?></p>
          <?php if($this->session->userdata('user')){?>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          <?php }else{?>
          <a href="#"><i class="fa fa-circle text-error"></i> Offline</a>
          <?php }?>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="">
          <a class="" href="<?php echo base_url()?>dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="header">Manage</li>
        <li>
          <a href="<?php echo base_url()?>blog-admin">
            <i class="fa fa-users"></i> <span>Announcements</span>
          </a>
        </li>
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
            <li><a href="<?php echo base_url()?>Users"><i class="fa fa-circle-o"></i> Students</a></li>
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
            <li><a href="#"><i class="fa fa-circle-o"></i> Students Class</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Manage Teachers
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Teacher Class</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Teacher Loads</a></li>
                
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <!-- END MANAGE CLASS -->
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
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Manage Teachers Subjects
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Teacher's Loads</a></li>
              </ul>
            </li>
            
          </ul>
        </li>
        <!-- END MANAGE SUBJECTS -->
       <!-- START MANAGE SUBJECTS -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Course/Programs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Programs List</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Manage Teachers Subjects
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Teacher's Loads</a></li>
              </ul>
            </li>
            
          </ul>
        </li>
        <!-- END MANAGE SUBJECTS -->
        <li class="header"></li>
        <li><a href="<?php echo base_url()?>school-year"><i class="fa fa-circle-o"></i> School Year</a></li>
        <!-- START MANAGE SUBJECTS -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Users</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Staff</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Website
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> About Us</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Logo/Names</a></li>
              </ul>
            </li>
            
          </ul>
        </li>
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