<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?=url('dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?=session()->get('username') ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active">
        <a href="<?=url('admin')?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-star pull-right"></i>
          </span>
        </a>
      </li>
      <li>
        <a href="<?=url('admin/newpost')?>">
          <i class="fa fa-pencil"></i> <span>New Post</span>
        </a>
      </li>
      <li>
        <a href="<?=url('admin/newpage')?>">
          <i class="fa fa-file"></i> <span>New Page</span>
        </a>
      </li>
      <li>
        <a href="<?=url('admin/menus')?>">
          <i class="fa fa-list-alt"></i> <span>Menus</span>
        </a>
      </li>
      <li>
        <a href="<?=url('admin/categories')?>">
          <i class="fa fa-list-alt"></i> <span>Categories</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
