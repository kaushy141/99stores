<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
	<a href="<?php echo base_url('dashboard/index')?>" class="app-brand-link">
	  <span class="app-brand-logo demo">
		<?= img(array("src"=>"public/img/logo.png", "height"=>40))?>
	  </span>
	  <span class="menu-text fw-bolder ms-2"><?=APP_NAME?></span>
	</a>

	<a href="<?php echo base_url('user/layoutcollapse')?>" class="layout-menu-toggle menu-link text-large ms-auto">
	  <i class="bx bx-chevron-left bx-sm align-middle"></i>
	</a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
	<!-- Dashboard -->
	<li class="menu-item <?php echo strpos(current_url(), 'dashboard') !== false ? "active":"";?>">
	  <a href="<?php echo base_url('dashboard/index');?>" class="menu-link">
		<i class="menu-icon tf-icons bx bx-home-circle"></i>
		<div data-i18n="Analytics">Dashboard</div>
	  </a>
	</li>

	<!-- Layouts -->
	
	<li class="menu-header small text-uppercase">
	  <span class="menu-header-text">Settings</span>
	</li>
	<li class="menu-item <?php echo strpos(current_url(), 'settings') !== false ? "active":"";?>">
	  <a href="javascript:void(0);" class="menu-link menu-toggle">
		<i class="menu-icon tf-icons bx bx-layout"></i>
		<div data-i18n="Donner">Application</div>
	  </a>

	  <ul class="menu-sub">
		<li class="menu-item">
		  <a href="<?php echo base_url('settings/config');?>" class="menu-link">
			<div data-i18n="Registration">Configuration</div>
		  </a>
		</li>
		<li class="menu-item">
		  <a href="<?php echo base_url('settings/channel');?>" class="menu-link">
			<div data-i18n="Donner list">Channel</div>
		  </a>
		</li>
		<li class="menu-item">
		  <a href="<?php echo base_url('settings/Website');?>" class="menu-link">
			<div data-i18n="Pending review">Website</div>
		  </a>
		</li>
		<li class="menu-item">
		  <a href="<?php echo base_url('settings/mobileapp');?>" class="menu-link">
			<div data-i18n="Pending review">Mobile App</div>
		  </a>
		</li>
	  </ul>
	</li>
	
	<li class="menu-header small text-uppercase">
	  <span class="menu-header-text">Masters</span>
	</li>
	<li class="menu-item <?php echo strpos(current_url(), 'donner') !== false ? "active":"";?>">
	  <a href="javascript:void(0);" class="menu-link menu-toggle">
		<i class="menu-icon tf-icons bx bx-layout"></i>
		<div data-i18n="Donner">Schoalrship</div>
	  </a>

	  <ul class="menu-sub">
		<li class="menu-item">
		  <a href="<?php echo base_url('user/registration');?>" class="menu-link">
			<div data-i18n="Registration">Registration</div>
		  </a>
		</li>
		<li class="menu-item">
		  <a href="<?php echo base_url('user/donner');?>" class="menu-link">
			<div data-i18n="Donner list">Donner list</div>
		  </a>
		</li>
		<li class="menu-item">
		  <a href="<?php echo base_url('user/donner/review');?>" class="menu-link">
			<div data-i18n="Pending review">Review</div>
		  </a>
		</li>
	  </ul>
	</li>
	
	<li class="menu-header small text-uppercase">
	  <span class="menu-header-text">Modules</span>
	</li>
	<li class="menu-item <?php echo strpos(current_url(), 'modules') !== false ? "active":"";?>">
	  <a href="javascript:void(0);" class="menu-link menu-toggle">
		<i class="menu-icon tf-icons bx bx-layout"></i>
		<div data-i18n="Donner">Donner</div>
	  </a>

	  <ul class="menu-sub">
		<li class="menu-item">
		  <a href="<?php echo base_url('user/registration');?>" class="menu-link">
			<div data-i18n="Registration">Registration</div>
		  </a>
		</li>
		<li class="menu-item">
		  <a href="<?php echo base_url('user/donner');?>" class="menu-link">
			<div data-i18n="Donner list">Donner list</div>
		  </a>
		</li>
		<li class="menu-item">
		  <a href="<?php echo base_url('user/donner/review');?>" class="menu-link">
			<div data-i18n="Pending review">Review</div>
		  </a>
		</li>
	  </ul>
	</li>

	<li class="menu-item <?php echo strpos(current_url(), 'student') !== false ? "active":"";?>">
	  <a href="javascript:void(0);" class="menu-link menu-toggle">
		<i class="menu-icon tf-icons bx bx-dock-top"></i>
		<div data-i18n="Student">Student</div>
	  </a>
	  <ul class="menu-sub">
		<li class="menu-item">
		  <a href="<?php echo base_url('user/student');?>" class="menu-link">
			<div data-i18n="Account">List</div>
		  </a>
		</li>
		<li class="menu-item">
		  <a href="<?php echo base_url('user/student/review');?>" class="menu-link">
			<div data-i18n="Notifications">Review</div>
		  </a>
		</li>
	  </ul>
	</li>
	<li class="menu-item">
	  <a href="javascript:void(0);" class="menu-link menu-toggle">
		<i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
		<div data-i18n="Authentications">Scholarship</div>
	  </a>
	  <ul class="menu-sub">
		<li class="menu-item">
		  <a href="<?php echo base_url('scholarship/add');?>" class="menu-link" target="_blank">
			<div data-i18n="Basic">Add</div>
		  </a>
		</li>
		<li class="menu-item">
		  <a href="<?php echo base_url('scholarship/list');?>" class="menu-link" target="_blank">
			<div data-i18n="Basic">List</div>
		  </a>
		</li>
	  </ul>
	</li>
	
	</ul>
</aside>
<!-- / Menu -->
<div class="layout-page">