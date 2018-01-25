<?php
/* Smarty version 3.1.30, created on 2018-01-25 16:14:54
  from "/var/www/html/CI_demo_projects/RestaurantApp/application/views/templates/shared/header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a69b526062c87_40873824',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ed8c1afb7e9fa46607a533be9c69ac41950529d' => 
    array (
      0 => '/var/www/html/CI_demo_projects/RestaurantApp/application/views/templates/shared/header.tpl',
      1 => 1516873703,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a69b526062c87_40873824 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="mobile-only-brand pull-left">
	<div class="nav-header pull-left">
		<div class="logo-wrap">
			<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/Dashboard" >
				<h3 style="font-family: initial;">Restaurant App</h3>
			</a>
		</div>
	</div>
	<!-- <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a> -->
	<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
	<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
</div>

<?php }
}
