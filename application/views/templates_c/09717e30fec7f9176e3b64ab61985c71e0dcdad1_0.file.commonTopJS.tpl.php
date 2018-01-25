<?php
/* Smarty version 3.1.30, created on 2018-01-25 16:19:27
  from "/var/www/html/CI_demo_projects/RestaurantApp/application/views/templates/shared/commonTopJS.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a69b6376dc116_47529901',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09717e30fec7f9176e3b64ab61985c71e0dcdad1' => 
    array (
      0 => '/var/www/html/CI_demo_projects/RestaurantApp/application/views/templates/shared/commonTopJS.tpl',
      1 => 1516877344,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a69b6376dc116_47529901 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- jQuery -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_base_vendors']->value;?>
bower_components/jquery/dist/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/common/js/common.js"><?php echo '</script'; ?>
>
<?php }
}
