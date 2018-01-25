<?php
/* Smarty version 3.1.30, created on 2018-01-25 16:14:54
  from "/var/www/html/CI_demo_projects/RestaurantApp/application/views/templates/category/listCategory.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a69b52607a630_29532076',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b81dc9b7030367c99bf516c9528e89145f9c95b3' => 
    array (
      0 => '/var/www/html/CI_demo_projects/RestaurantApp/application/views/templates/category/listCategory.tpl',
      1 => 1516870986,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a69b52607a630_29532076 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row heading-bg adjustHeight">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
	  	<h3 class="txt-dark">Category</h3>
	</div>
</div>
<!-- /Title -->
<form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/Category/action_update"  method='post' role="form">
<input id="action" name="action" type="hidden">
	<?php if ($_smarty_tpl->tpl_vars['message']->value != '') {?>
    	<div class="alert alert-danger alert-dismissable alert-style-1 alertBothSideSpc" id="err_message_area" style="border:1px solid #ea6c41;margin-bottom:12px !important;">
			<i class="icon-bell"></i>
		<?php echo $_smarty_tpl->tpl_vars['message']->value;?>

		</div>	
	<?php }?>
<div class="row">
	<div class="pull-right spcRight">
		<button class="btn btn-primary btnRightSpc" id="btn-active" type="submit">Make Active</button>
		<button class="btn btn-warning btnRightSpc" id="btn-inactive" type="submit">Make Inactive</button>
		<button class="btn btn-info btnRightSpc" id="btn-archive" type="submit">Archive</button>
		<button class="btn btn-success btnRightSpc" onclick="redirectme();"  type="button">Add</button>
		<button class="btn btn-danger btnRightSpc" id="btn-delete" type="submit">Delete</button>
	</div>
</div>

<!-- Row -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="table" class="table table-hover display  pb-30" >
								<thead>
									<tr>
										<th style="width:5%;"><center><input type="checkbox" id="check_all"></center></th>
										<th style="width:20%;">Image</th>
										<th style="width:35%;">Title</th>
										<th style="width:10%;">Status</th>
			 							<th style="width:5%;"><center>Edit</center></th>
									</tr>
								</thead>
								<tbody>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all_Data']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
									<tr>
										<td><center><input id="iId" name="iId[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['iCategoryId'];?>
"></center></td>
										<td><img src="<?php echo $_smarty_tpl->tpl_vars['value']->value['tImage'];?>
" style="width: 150px;border-radius: 5px;"></td>
						 				<td><?php echo $_smarty_tpl->tpl_vars['value']->value['tTitle'];?>
</td>
										<td><span class="label label-primary"><?php echo $_smarty_tpl->tpl_vars['value']->value['eStatus'];?>
</span></td>
									    <td><center><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/Category/edit/<?php echo $_smarty_tpl->tpl_vars['value']->value['iCategoryId'];?>
"><i class="fa fa-edit"></i></a></center></td>
									</tr>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
</form>
<!-- /Row -->

<?php echo '<script'; ?>
 type="text/javascript">
    $(document).ready(function(){
    	setInterval(function() {
            $('#err_message_area').fadeOut("slow");
        }, 5000);
    	$('#table').dataTable().fnDestroy();
		$('#table').dataTable({
			"iDisplayLength":10,
            "bAutoWidth": false,
            "aaSorting": [],
            "aoColumns": [
            { "bSortable": false },
            null,
            null,
            null,
            { "bSortable": false }
            ]
        });
    });
function redirectme()
{

	window.location = "<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
Category/add";
}

<?php echo '</script'; ?>
>
<?php }
}
