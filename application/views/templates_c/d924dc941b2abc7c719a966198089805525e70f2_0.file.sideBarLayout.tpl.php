<?php
/* Smarty version 3.1.30, created on 2018-01-25 16:14:54
  from "/var/www/html/CI_demo_projects/RestaurantApp/application/views/templates/sideBarLayout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a69b526052da3_88463999',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd924dc941b2abc7c719a966198089805525e70f2' => 
    array (
      0 => '/var/www/html/CI_demo_projects/RestaurantApp/application/views/templates/sideBarLayout.tpl',
      1 => 1516870900,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shared/commonCSS.tpl' => 1,
    'file:shared/commonTopJS.tpl' => 1,
    'file:shared/header.tpl' => 1,
    'file:shared/sideBarMenu.tpl' => 1,
    'file:shared/footer.tpl' => 1,
    'file:shared/modals.tpl' => 1,
    'file:shared/commonBottomJS.tpl' => 1,
  ),
),false)) {
function content_5a69b526052da3_88463999 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	<meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	
	<?php echo '<script'; ?>
>
		var baseURL = "<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
";
	<?php echo '</script'; ?>
>
	<?php $_smarty_tpl->_subTemplateRender("file:shared/commonCSS.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Common CSS"), 0, false);
?>

	<?php $_smarty_tpl->_subTemplateRender("file:shared/commonTopJS.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Common JS"), 0, false);
?>

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
			<?php $_smarty_tpl->_subTemplateRender("file:shared/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Header"), 0, false);
?>

		</nav>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<?php $_smarty_tpl->_subTemplateRender("file:shared/sideBarMenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Sidebar Menu"), 0, false);
?>

		</div>
		<!-- /Left Sidebar Menu -->

        <!-- Main Content -->
		<div class="page-wrapper" >
            <div class="container-fluid pt-25 pg-2">
				<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['contentFile']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Main Content File"), 0, true);
?>

			</div>
			
			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<?php $_smarty_tpl->_subTemplateRender("file:shared/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Footer"), 0, false);
?>

			</footer>
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->
        <?php $_smarty_tpl->_subTemplateRender("file:shared/modals.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Model"), 0, false);
?>

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	<?php $_smarty_tpl->_subTemplateRender("file:shared/commonBottomJS.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Common Bottom JS"), 0, false);
?>

</body>

</html>
<?php }
}
