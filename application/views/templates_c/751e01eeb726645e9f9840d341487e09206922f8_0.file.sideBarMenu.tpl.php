<?php
/* Smarty version 3.1.30, created on 2018-01-25 16:14:54
  from "/var/www/html/CI_demo_projects/RestaurantApp/application/views/templates/shared/sideBarMenu.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a69b52606c6c8_16133302',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '751e01eeb726645e9f9840d341487e09206922f8' => 
    array (
      0 => '/var/www/html/CI_demo_projects/RestaurantApp/application/views/templates/shared/sideBarMenu.tpl',
      1 => 1516873721,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a69b52606c6c8_16133302 (Smarty_Internal_Template $_smarty_tpl) {
?>
<ul class="nav navbar-nav side-nav nicescroll-bar">
	<li><hr class="light-grey-hr mb-10"/></li>
	<li>
		<a class="<?php echo $_smarty_tpl->tpl_vars['page']->value == 'Category' ? 'active' : '';?>
" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/Category"><div class="pull-left"><i class="fa fa-cubes mr-20"></i><span class="right-nav-text" >Category</span></div><div class="clearfix"></div></a>
	 </li>
	 <li><hr class="light-grey-hr mb-10"/></li>
	 <li>
		<a class="<?php echo $_smarty_tpl->tpl_vars['page']->value == 'Item' ? 'active' : '';?>
" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/Item"><div class="pull-left"><i class="glyphicon glyphicon-th-list mr-20"></i><span class="right-nav-text" >Item</span></div><div class="clearfix"></div></a>
	 </li>
</ul><?php }
}
