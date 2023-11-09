<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tugas Mentoring 19</title>
	<style>
		#loader-container {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.5);
			/* Semi-transparent background */
			display: none;
			/* Initially hidden */
			justify-content: center;
			align-items: center;
			z-index: 9999;
			/* Place above other elements */
		}
		#loader-container.show {
			display: flex;
			/* Show it when needed */
			justify-content: center;
			align-items: center;
		}

		.loader {
			border: 4px solid #f3f3f3;
			border-top: 4px solid #3498db;
			border-radius: 50%;
			width: 50px;
			height: 50px;
			animation: spin 2s linear infinite;
		}

		@keyframes spin {
			0% {
				transform: rotate(0deg);
			}

			100% {
				transform: rotate(360deg);
			}
		}
	</style>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?= base_url('public/plugins/fontawesome-free/css/all.min.css') ?>">
	<!-- IonIcons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('public/css/adminlte.min.css') ?>">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?= base_url('public/modules/datatables/datatables.min.css') ?>">
</head>

<body class="hold-transition sidebar-mini  layout-fixed">
	<div id="loader-container">
		<div class="loader"></div>
	</div>
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="index3.html" class="nav-link">Home</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="#" class="nav-link">Contact</a>
				</li>
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Navbar Search -->
				<li class="nav-item">
					<a class="nav-link" data-widget="navbar-search" href="#" role="button">
						<i class="fas fa-search"></i>
					</a>
					<div class="navbar-search-block">
						<form class="form-inline">
							<div class="input-group input-group-sm">
								<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
								<div class="input-group-append">
									<button class="btn btn-navbar" type="submit">
										<i class="fas fa-search"></i>
									</button>
									<button class="btn btn-navbar" type="button" data-widget="navbar-search">
										<i class="fas fa-times"></i>
									</button>
								</div>
							</div>
						</form>
					</div>
				</li>

				<!-- Messages Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-comments"></i>
						<span class="badge badge-danger navbar-badge">3</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="<?= base_url('/public/img/user1-128x128.jpg') ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										Brad Diesel
										<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm">Call me whenever you can...</p>
									<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="<?= base_url('/public/img/user8-128x128.jpg') ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										John Pierce
										<span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm">I got your message bro</p>
									<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="<?= base_url('/public/img/user3-128x128.jpg') ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										Nora Silvester
										<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm">The subject goes here</p>
									<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
					</div>
				</li>
				<!-- Notifications Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-bell"></i>
						<span class="badge badge-warning navbar-badge">15</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<span class="dropdown-item dropdown-header">15 Notifications</span>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-envelope mr-2"></i> 4 new messages
							<span class="float-right text-muted text-sm">3 mins</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-users mr-2"></i> 8 friend requests
							<span class="float-right text-muted text-sm">12 hours</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-file mr-2"></i> 3 new reports
							<span class="float-right text-muted text-sm">2 days</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-widget="fullscreen" href="#" role="button">
						<i class="fas fa-expand-arrows-alt"></i>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
						<i class="fas fa-th-large"></i>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index3.html" class="brand-link">
				<img src="<?= base_url('public/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">Siakad Lite</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?= base_url('/public/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block">Admin</a>
					</div>
				</div>

				<!-- SidebarSearch Form -->
				<div class="form-inline">
					<div class="input-group" data-widget="sidebar-search">
						<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
						<div class="input-group-append">
							<button class="btn btn-sidebar">
								<i class="fas fa-search fa-fw"></i>
							</button>
						</div>
					</div>
				</div>
				<!-- Sidebar Menu -->
				<nav class="mt-4">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-item ">
							<a href="<?= base_url('index.php/admin') ?>" class="nav-link <?= is_active('admin') ?>">
								<i class="nav-icon fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('index.php/admin/product') ?>" class="nav-link <?= is_active('admin/product') ?>">
								<i class="nav-icon fas fa-cart-plus"></i>
								<p>Product</p>
							</a>
						</li>
					</ul>
				</nav>
			</div>
			<!-- /.sidebar -->
		</aside>

		<div class="content-wrapper">
			<!-- Content Header (Page header) -->

			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">

				<div class="container-fluid mt-4">

					<div class="card mt-4">
						<div class="card-body">
							{CONTENT}
						</div>
					</div>
				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- Content Wrapper. Contains page content -->

		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->

	<!-- Main Footer -->
	<footer class="main-footer">
		<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
		All rights reserved.
		<div class="float-right d-none d-sm-inline-block">
			<b>Version</b> 3.2.0
		</div>
	</footer>
	</div>
	<!-- ./wrapper -->


	<!-- REQUIRED SCRIPTS -->
	<script src="<?= base_url('public/plugins/jquery/jquery.min.js') ?>"></script>
	<script src="<?= base_url('public/modules/datatables/datatables.min.js') ?>"></script>
	<!-- Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
	<!-- AdminLTE -->
	<script src="<?= base_url('public/js/adminlte.min.js') ?>"></script>
	<script>
		function showLoader() {
			$('#loader-container').addClass('show');
		}

		function hideLoader() {
			$('#loader-container').removeClass('show');
		}

		function showButtonLoader(button, label = "") {
			const oldText = button.html();
			const width = button.width();
			button.html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>${label}`);
			button.width(width);
			button.prop('disabled', true);
			return function() {
				button.html(oldText);
				button.width('auto');
				button.prop('disabled', false);
			}
		}
		/*
		 * getAllFields(selector, required)
		 * @param selector string (the form id)
		 * @param required boolean (selector for field that contain required attribute only default false)
		 * to get all input , select , textarea in a form with selector and required
		 * @return array
		 */

		function getAllFields(selector, required = true) {
			fields = $(`${selector}`).find(
				`input:not([type="submit"])${required? '[required]':''}:not(.ck-hidden), textarea${required? '[required]':''}, select${required? '[required]':''}`
			).not('input[name="_token"]').not("input[name='']").not("input[name='method']");
			return Array.from(fields);
		}

		/*
		 * showValidationErrors(errors, formSelector)
		 * @param errors object (the xhr response that contains errors of the fieldss)
		 * @param formSelector string (the form id)
		 * @param exept object<fieldname, Object<key, val>> (the field that custom for showing the error)
		 * avaiable key : selector , class, style
		 * to display all errors in a form and remove the error if the field is valid
		 * @return void
		 */


		function showValidationErrors(errors, formSelector, excepts = {}) {
			const form = $(formSelector);
			const fieldErrorKeys = Object.keys(errors);
			const exceptFields = Object.keys(excepts);


			getAllFields(formSelector, false).forEach(field => {
				fieldTarget = form.find(exceptFields.includes(field.name) ? excepts[field.name].selector :
					`${field.localName}[name="${field.name}"]`)
				if (!fieldErrorKeys.includes(field.name)) {
					if (exceptFields.includes(field.name)) {
						excepts[field.name].styleValid ? fieldTarget.css(excepts[field.name].styleValid).nextAll(
								'.invalid-feedback')
							.html('') : fieldTarget.removeClass(excepts[field.name].class ?? " is-invalid")
							.addClass(
								'form-control is-valid').nextAll('small.invalid-feedback').html('');
					} else {
						fieldTarget.removeClass("is-invalid").addClass('is-valid').next('small.invalid-feedback')
							.html('');
					}
				} else {
					if (exceptFields.includes(field.name)) {
						excepts[field.name].styleInvalid ? fieldTarget.css(excepts[field.name].styleInvalid)
							.nextAll(
								'.invalid-feedback')
							.html(errors[field.name]).show() : fieldTarget.removeClass('is-valid').addClass(
								excepts[field.name]
								.class ?? "is-invalid").nextAll('small.invalid-feedback').html(errors[field.name][
								0
							]).show();
					} else {
						fieldTarget.removeClass('is-valid').addClass("is-invalid").nextAll('small.invalid-feedback')
							.html(errors[
								field.name]);
					}
				}
			});
		}

		/*
		 * resetform
		 * @param selector (the form selector)
		 * to remove all errors on the form and reset the form
		 * @return void
		 */

		function resetForm(selector, excepts = {}) {
			const form = $(selector);
			form[0].reset();
			const exceptFields = Object.keys(excepts);
			getAllFields(selector, false).forEach(field => {
				fieldTarget = form.find(exceptFields.includes(field.name) ? excepts[field.name].selector :
					`${field.localName}[name="${field.name}"]`)

				if (exceptFields.includes(field.name)) {
					excepts[field.name].styleValid ? fieldTarget.removeAttr('style').nextAll('.invalid-feedback')
						.html('') : fieldTarget.removeClass(excepts[field.name].class ??
							"form-control is-invalid is-valid")
						.nextAll('.invalid-feedback').html('');
				} else {
					fieldTarget.removeClass("is-invalid is-valid").next('.invalid-feedback').html('');
				}
			})
		};
	</script>
	@stack('scripts')

</body>

</html>
