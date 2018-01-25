<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>{$title}</title>
	<meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	
	<script>
		var baseURL = "{$base_url}";
	</script>
	{include file="shared/commonCSS.tpl" title="Common CSS"}
	{include file="shared/commonTopJS.tpl" title="Common JS"}
</head>

<body>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper theme-1-active box-layout pimary-color-red">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top dev-fixed-top-width">
			{include file="shared/header.tpl" title="Header"}
		</nav>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			{include file="shared/sideBarMenu.tpl" title="Sidebar Menu"}
		</div>
		<!-- /Left Sidebar Menu -->

        <!-- Main Content -->
		<div class="page-wrapper" >
            <div class="container-fluid pt-25 pg-2">
				{include file=$contentFile title="Main Content File"}
			</div>
			
			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				{include file="shared/footer.tpl" title="Footer"}
			</footer>
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->
        {include file="shared/modals.tpl" title="Model"}
    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	{include file="shared/commonBottomJS.tpl" title="Common Bottom JS"}
</body>

</html>
