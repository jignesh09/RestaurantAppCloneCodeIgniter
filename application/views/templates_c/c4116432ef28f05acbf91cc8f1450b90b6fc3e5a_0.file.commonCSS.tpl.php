<?php
/* Smarty version 3.1.30, created on 2018-01-25 16:14:54
  from "/var/www/html/CI_demo_projects/RestaurantApp/application/views/templates/shared/commonCSS.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a69b526058f05_39145750',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4116432ef28f05acbf91cc8f1450b90b6fc3e5a' => 
    array (
      0 => '/var/www/html/CI_demo_projects/RestaurantApp/application/views/templates/shared/commonCSS.tpl',
      1 => 1515070530,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a69b526058f05_39145750 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Morris Charts CSS -->
<link href="<?php echo $_smarty_tpl->tpl_vars['theme_base_vendors']->value;?>
bower_components/morris.js/morris.css" rel="stylesheet" type="text/css"/>

<!-- Data table CSS -->
<link href="<?php echo $_smarty_tpl->tpl_vars['theme_base_vendors']->value;?>
bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo $_smarty_tpl->tpl_vars['theme_base_vendors']->value;?>
bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
	
<!-- Custom CSS -->
<link href="<?php echo $_smarty_tpl->tpl_vars['theme_base_dist']->value;?>
css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/common/css/designer.css" rel="stylesheet" type="text/css"><?php }
}
