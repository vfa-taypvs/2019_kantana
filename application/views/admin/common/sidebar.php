<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Admin Kantana</p>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN CONTROL</li>
      <li>
        <a href="<?php echo base_url(); ?>adminhome">
          <i class="fa fa-files-o"></i> <span>Home</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i> <span>Services</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" class="active">
          <li><a href="<?php echo base_url(); ?>adminservicesrow1"><i class="fa fa-circle-o"></i>Services Row 1</a></li>
          <li><a href="<?php echo base_url(); ?>adminservicesrow2"><i class="fa fa-circle-o"></i>Services Row 2</a></li>
          <li><a href="<?php echo base_url(); ?>adminservicesrow3"><i class="fa fa-circle-o"></i>Services Row 3</a></li>
          <li><a href="<?php echo base_url(); ?>adminservicesrow4"><i class="fa fa-circle-o"></i>Services Row 4</a></li>
        </ul>
      </li>
      <li  class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i> <span>Client</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" class="active">
          <li><a href="<?php echo base_url(); ?>adminclient?row=1"><i class="fa fa-circle-o"></i>Row 1</a></li>
          <li><a href="<?php echo base_url(); ?>adminclient?row=2"><i class="fa fa-circle-o"></i>Row 2</a></li>
          <li><a href="<?php echo base_url(); ?>adminclient?row=3"><i class="fa fa-circle-o"></i>Row 3</a></li>
          <li><a href="<?php echo base_url(); ?>adminclient?row=4"><i class="fa fa-circle-o"></i>Row 4</a></li>
        </ul>
      </li>
      <li>
        <a href="<?php echo base_url(); ?>adminteam">
          <i class="fa fa-files-o"></i> <span>Team</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span>Career</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" class="active">
          <li><a href="<?php echo base_url(); ?>admincareer"><i class="fa fa-circle-o" class="active"></i>Recruitment</a></li>
          <li><a href="<?php echo base_url(); ?>adminapplication"><i class="fa fa-circle-o"></i>Application</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
