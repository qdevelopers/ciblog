<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $title ?></title>

	<!-- Global stylesheets -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css"> -->
	<link href="<?php echo base_url(); ?>assets/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?php echo base_url(); ?>assets/global_assets/js/main/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?php echo base_url(); ?>assets/js/app.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/swal.js"></script>

	<!-- /theme JS files -->

</head>

<body class=" navbar-top">
	<!-- Main navbar 
		-->
	<div class="navbar navbar-expand-md navbar-dark fixed-top">
		<div class="navbar-brand">
			<a href="../full/index.html" class="d-inline-block">
				<img src="<?php echo base_url(); ?>assets/global_assets/images/logo_light.png" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>

			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link">
						Text link
					</a>
				</li>

				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link">
						<i class="icon-bell2"></i>
						<span class="d-md-none ml-2">Notifications</span>
						<span class="badge badge-mark border-white ml-auto ml-md-0"></span>
					</a>
				</li>

				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url(); ?>assets/images/users/<?php echo $this->session->userdata['photo'] ?>" class="rounded-circle" alt="">
						<span><?php echo $this->session->userdata['name'] ?></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
						<a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
						<a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-pill bg-blue ml-auto">58</span></a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
						<a href="<?php echo site_url('admpanel/logout') ?>" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user">
					<div class="card-body">
						<div class="media">
							<div class="mr-3">
								<a href="#"><img src="<?php echo base_url(); ?>assets/images/users/<?php echo $this->session->userdata['photo'] ?>" width="38" height="38" class="rounded-circle" alt=""></a>
							</div>

							<div class="media-body">
								<div class="media-title font-weight-semibold"><?php echo $this->session->userdata['name'] ?></div>
								<div class="font-size-xs opacity-50">
									<i class="icon-key font-size-sm"></i> &nbsp;<?php echo $this->session->userdata['access'] ?>
								</div>
							</div>

							<div class="ml-3 align-self-center">
								<a href="#" class="text-white"><i class="icon-cog3"></i></a>
							</div>
						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header">
							<div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i>
						</li>
						<?php foreach ($menu as $parents => $parent) {
							$menu_active;
							if ($parent['menu'] === ucfirst($this->router->fetch_class())) {
								$menu_active = $parent;
							}
							//this is for handling <li> 
							//check whether has children, if yess then echo nav-item-submenu in tag <li>
							$nav_item_sub_menu = (isset($parent['children']) and sizeof($parent['children']) > 0) ? "nav-item-submenu" : NULL;

							//check whether active or no, echo nav-item-expanded if so
							$expanded = ($parent['menu'] === ucfirst($this->router->fetch_class())) ? "nav-item-expanded nav-item-open" : NULL;
							//check whether has sub menu. href will be # if no
							$href = (isset($parent['children']) and sizeof($parent['children']) > 0) ? "#" : site_url($parent['controller'] . '/' . $parent['method']);
							?>
							<!-- /main -->
							<li class="nav-item <?php echo $nav_item_sub_menu . ' ' . $expanded; ?>">
								<!-- a link (menu items) -->
								<a href="<?php echo $href ?>" class="nav-link">

									<i class="<?php echo $parent['icon'] ?>"></i>
									<span><?php echo $parent['menu'] ?></span>

								</a>
								<!-- end of a link -->

								<!-- This part is for submenu (check whether has then show) -->
								<?php if (isset($parent['children'])) : ?>
									<ul class="nav nav-group-sub" data-submenu-title="">
										<?php foreach ($parent['children'] as $child => $submenu) :
													//define url for sub menu
													$href_submenu = site_url($submenu['prefix'] . '/' . $submenu['controller'] . '/' . $submenu['method']);
													$active = (($submenu['controller'] === ucfirst($this->router->fetch_class())) and ($submenu['method'] === $this->router->fetch_method())) ? "active" : NULL;
													?>
											<li class="nav-item">
												<a href="<?php echo $href_submenu; ?>" class="nav-link <?php echo $active ?>">
													<i class="<?php echo $submenu['icon'] ?>"></i> <?php echo $submenu['menu'] ?>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
									<!-- End of This part is for submenu (check whether has then show) -->
								<?php endif; ?>
							</li>
						<?php } ?>
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->

		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-dark has-cover">
				<div class="page-header-content header-elements-inline">
					<div class="page-title">
						<h5>
							<i class="<?php echo $menu_active['icon'] ?> mr-2"></i>
							<span class="font-weight-semibold"><?php echo ucfirst($this->router->fetch_class()) ?></span>
							<small class="d-block opacity-75"><?php echo isset($pageHeader) ? $pageHeader : "Create an awesome thing today, " . $this->session->userdata('name'); ?></small>
						</h5>
					</div>

					<div class="header-elements d-flex align-items-center">

					</div>
				</div>

				<!-- Alternative navbar -->

				<div class="navbar navbar-expand-lg navbar-light bg-light border-top shadow-0">
					<div class="text-center d-lg-none w-100">
						<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-second">
							<i class="icon-unfold mr-2"></i>
							Alternative navbar
						</button>
					</div>

					<div class="navbar-collapse collapse" id="navbar-second">
						<?php if (isset($menu_active['actions']) and sizeof($menu_active['actions']) > 0) { ?>
							<ul class="navbar-nav ml-lg-auto">
								<?php foreach ($menu_active['actions'] as $action => $item) : ?>
									<li class="nav-item">
										<a href="#" data-cmd="<?php echo $item['command'] ?>" data-method="<?php echo $item['method'] ?>" class="navbar-nav-link get-action">
											<i class="<?php echo $item['icon'] ?> mr-2"></i>
											<?php echo $item['name'] ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php } else { ?>
							<ul class="navbar-nav">
								<li class="nav-item navbar-nav-link" onclick="showGreeting()">
									<i class="icon-git-branch mr-2"></i>
									Hey.. look at you, you are gonna make a great life!
								</li>
							</ul>
						<?php } ?>

					</div>
				</div>
				<!-- /alternative navbar -->
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">
				<?php echo $content ?>
			</div>
			<!-- /content area -->


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</span>

					<ul class="navbar-nav ml-lg-auto">
						<li class="nav-item">
							<a href="#" class="navbar-nav-link">Text link</a>
						</li>

						<li class="nav-item">
							<a href="#" class="navbar-nav-link">
								<i class="icon-lifebuoy"></i>
							</a>
						</li>

						<li class="nav-item">
							<a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold">
								<span class="text-pink-400">
									<i class="icon-cart2 mr-2"></i>
									Purchase
								</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<script src="<?php echo base_url(); ?>assets/js/global.js"></script>
	<!-- /page content -->
	<script type="text/javascript">
		function showGreeting() {

			swal({
				title: 'Good Job',
				text: 'you are a curious person. great! Einstein did such a thing as well',
				icon: 'success',
				button: 'Aww yiss!'
			});
		}
	</script>
</body>

</html>
