<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
	<div class="app-brand demo">
		<a href="<?php echo base_url('dashboard/index') ?>" class="app-brand-link">
			<span class="app-brand-logo demo">
				<?= img(array("src" => "public/img/logo.png", "height" => 40)) ?>
			</span>
			<span class="menu-text fw-bolder ms-2"><?= APP_NAME ?></span>
		</a>

		<a href="#" class="layout-menu-toggle menu-link text-large ms-auto">
			<i class="bx bx-chevron-left bx-sm align-middle"></i>
		</a>
	</div>

	<div class="menu-inner-shadow"></div>

	<ul class="menu-inner py-1">
		<!-- Dashboard -->
		<li class="menu-item <?php echo strpos(current_url(), 'dashboard') !== false ? "active" : ""; ?>">
			<a href="<?php echo base_url('dashboard/index'); ?>" class="menu-link">
				<i class="menu-icon tf-icons bx bx-home-circle"></i>
				<div data-i18n="Analytics">Dashboard</div>
			</a>
		</li>

		<?php
		$menuArray = array(
			ARRAY(
				"title" => "Settings",
				"type"  => "header"
			),
			ARRAY(
				"title" => "Configuration",
				"type"  => "item",
				"icon"	=> "bx-cog",
				"key"   => "settings",
				"menu"  => ARRAY(
					ARRAY(
						"title" => "Basic",
						"key"	=> "basic"
					),
					ARRAY(
						"title" => "Advanced",
						"key"	=> "advance"
					),
					ARRAY(
						"title" => "Web App",
						"key"	=> "webapp"
					),
					ARRAY(
						"title" => "Scan App",
						"key"	=> "mobileapp"
					),
					ARRAY(
						"title" => "Website",
						"key"	=> "website"
					)
				)
			),
			ARRAY(
				"title" => "Masters",
				"type"  => "item",
				"icon"	=> "bx-layout",
				"key"   => "app",
				"menu"  => ARRAY(
					ARRAY(
						"title" => "Skills",
						"key"	=> "skills"
					),
					ARRAY(
						"title" => "Identities",
						"key"	=> "identities"
					)
				)
			),
			ARRAY(
				"title" => "Modules",
				"type"  => "header"
			),
			ARRAY(
				"title" => "Users",
				"type"  => "item",
				"icon"	=> "bx-user",
				"key"   => "user",
				"menu"  => ARRAY(
					ARRAY(
						"title" => "New Registration",
						"key"	=> "registration"
					),
					ARRAY(
						"title" => "Admins",
						"key"	=> "admin"
					),
					ARRAY(
						"title" => "Vendors",
						"key"	=> "vendor"
					),
					ARRAY(
						"title" => "Customers",
						"key"	=> "customer"
					)
				)
			),
			ARRAY(
				"title" => "Stores",
				"type"  => "item",
				"icon"	=> "bx-layout",
				"key"   => "store",
				"menu"  => ARRAY(
					ARRAY(
						"title" => "Registration",
						"key"	=> "registration"
					),
					ARRAY(
						"title" => "List",
						"key"	=> "list"
					)
				)
			),
		);

		foreach($menuArray as $menu){
			if($menu['type'] == 'header'){
				echo '<li class="menu-header small text-uppercase">
				<span class="menu-header-text">'.$menu['title'].'</span>
			</li>';
			}elseif($menu['type'] == 'item'){
				echo '<li class="menu-item '.(strpos(current_url(), $menu['key']) !== false ? "active open" : "").'">';
				echo '<a href="javascript:void(0);" class="menu-link menu-toggle">
					<i class="menu-icon tf-icons bx '.$menu['icon'].'"></i>
					<div data-i18n="'.$menu['title'].'">'.$menu['title'].'</div>
				</a>';
				echo '<ul class="menu-sub">';
				foreach($menu['menu'] as $submenu){
					echo '<li class="menu-item '.(strpos(current_url(), $menu['key'].'/'.$submenu['key']) !== false ? "active" : "").'">
						<a href="'.base_url($menu['key'].'/'.$submenu['key']).'" class="menu-link">
							<div data-i18n="'.$submenu['title'].'">'.$submenu['title'].'</div>
						</a>
					</li>';
				}
				echo '</ul>';
				echo '</li>';
			}
		}
		?>

		
	</ul>
</aside>
<!-- / Menu -->
<div class="layout-page">