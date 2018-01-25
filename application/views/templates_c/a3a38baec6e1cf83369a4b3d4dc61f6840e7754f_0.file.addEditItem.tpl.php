<?php
/* Smarty version 3.1.30, created on 2018-01-25 16:19:42
  from "/var/www/html/CI_demo_projects/RestaurantApp/application/views/templates/item/addEditItem.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a69b64646db72_32645342',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3a38baec6e1cf83369a4b3d4dc61f6840e7754f' => 
    array (
      0 => '/var/www/html/CI_demo_projects/RestaurantApp/application/views/templates/item/addEditItem.tpl',
      1 => 1516876791,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a69b64646db72_32645342 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row heading-bg adjustHeight">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
	  	<h3 class="txt-dark">Item</h3>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
	  	<ol class="breadcrumb">
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/Item"><span>List Item</span></a></li>
			<li class="active"><span><?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
 Item</span></li>
	  	</ol>
	</div>
	<!-- /Breadcrumb -->
</div>
<!-- Row -->
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
admin/Item/<?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
" id="add_Item_frm" name="add_Item_frm" enctype='multipart/form-data' >
<input type='hidden' name='iItemId' id='iItemId' value = "<?php echo $_smarty_tpl->tpl_vars['singleRecord']->value['iItemId'];?>
">
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default card-view">
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="row">
						<div class="form-wrap">
						 	<div class="col-md-12">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10" for="exampleInputuname_1">Title</label><sup class="required">*</sup>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>
											<input type="text" class="form-control"  name="tTitle"  id="tTitle" 
											value="<?php echo $_smarty_tpl->tpl_vars['singleRecord']->value['tTitle'];?>
" placeholder="Enter Title">
											</div>
											<p class="help-block1 errcolor" id="err_title_area"><img class="validationimg" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/common/img/arrow.png"><span class="errvalidationtext" id="lbltitleerrmsg"></span></p>
										 
									</div>
								</div>
								<div class="col-sm-6">
							        <div class="form-group">
										<label class="control-label mb-10 text-left">Image</label><sup class="required">*</sup>
										<?php if ($_smarty_tpl->tpl_vars['singleRecord']->value['tImage'] != '') {?>
						  					<div class="input-group">
						  					<input type="hidden" id='imagests' value="yes">
								  				<img src="<?php echo $_smarty_tpl->tpl_vars['singleRecord']->value['tImage'];?>
" width="100px" height="100px"><br>
				                                    <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/Item/removeImage/item/<?php echo $_smarty_tpl->tpl_vars['singleRecord']->value['iItemId'];?>
">
				                                    <button type="button" class="btn btn-danger btn-perspective dngrbtn" style="width:100px; margin-top: 2px;" >Remove</button></a>
			  								</div>	
										<?php } else { ?>			
											<div class="fileinput fileinput-new input-group" data-provides="fileinput">
												<div class="form-control required" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename" style="font-size: 11px;"></span></div>
												<span class="input-group-addon fileupload btn btn-info btn-anim btn-file" onchange="test()" btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Select file</span> <span class="fileinput-exists btn-text">Change</span>
												<input type="hidden" id='imagests' value="no">
											    <input type="file" name="tImage" id="tImage" class="form-control required" style="display:none;" onchange="return checkItemValidImage(this.value)" >
													</span> 
											</div>
											<span class="msgformat1" style="color: red;">
					 							[Image extension Must Be Png, Jpg and JPEG allowed.]
												</span>
											<p class="help-block1 errcolor" id="err_item_image_area"><img class="validationimg" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/common/img/arrow.png"><span class="errvalidationtext" id="lblitemimageerrmsg" ></span></p>
										<?php }?>	
									</div>
								</div>	
							</div>
	         				<div class="col-md-12">
	         					<div class="col-md-6">
		         					<div class="form-group">
										<label class="control-label mb-10" for="exampleInputuname_1">Category</label><sup class="required">*</sup>
										<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-cubes mr-20"></i></div>
											<select class="form-control" name="iCategoryId" id="iCategoryId">
												<option value=""> Select Category </option>
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categoryArray']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
								                <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['iCategoryId'];?>
" <?php if ($_smarty_tpl->tpl_vars['value']->value['iCategoryId'] == $_smarty_tpl->tpl_vars['singleRecord']->value['iCategoryId']) {?> selected <?php }?> ><?php echo $_smarty_tpl->tpl_vars['value']->value['tTitle'];?>
</option>
								            	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

											</select>
										</div>
										<p class="help-block1" id="err_category_area"> <img class="validationimg" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/common/img/arrow.png"> <span class="lblcategoryerrmsg" id="lblcategoryerrmsg"></span></p>
									</div>
	         					</div>
								<div class="col-md-6">
									<div class="form-group">
									<label class="control-label mb-10" for="exampleInputuname_1">Status</label><sup class="required">*</sup>
									 <div class="input-group">
									 <div class="input-group-addon"><i class="fa fa-exclamation-circle"></i></div>
										<select class="form-control" name="eStatus" id="eStatus">
											
											<option value="Active" <?php if ($_smarty_tpl->tpl_vars['singleRecord']->value['eStatus'] == 'Active') {?>selected<?php }?> >Active</option>
											<option value="Inactive" <?php if ($_smarty_tpl->tpl_vars['singleRecord']->value['eStatus'] == 'Inactive') {?>selected<?php }?>>Inactive</option>
										</select>

									 </div>
											<p class="help-block1" id="err_status_area"> <img class="validationimg" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/common/img/arrow.png"> <span class="errvalidationtext" id="lblstatuserrmsg"></span></p>
								    </div>
								</div>
							</div>
							<div class="col-md-12 btnTopSpc">
							  	<div class="col-md-6">
									<div class="form-group">
										<input type="button" onclick="itemFormValidation('<?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
')" class="btn btn-success mr-10 btnFrmTopSpc" value="Save" >
										<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/Item">
										<button type="button" class="btn btn-danger btnFrmTopSpc" onclick="returnme('<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/Item')">Cancel</button></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/common/js/itemFormValidation.js"><?php echo '</script'; ?>
>
<?php }
}
