<div class="row heading-bg adjustHeight">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
	  	<h3 class="txt-dark">Item</h3>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
	  	<ol class="breadcrumb">
			<li><a href="{$base_url}admin/Item"><span>List Item</span></a></li>
			<li class="active"><span>{$mode} Item</span></li>
	  	</ol>
	</div>
	<!-- /Breadcrumb -->
</div>
<!-- Row -->
<form method="post" action="{$data.base_url}admin/Item/{$mode}" id="add_Item_frm" name="add_Item_frm" enctype='multipart/form-data' >
<input type='hidden' name='iItemId' id='iItemId' value = "{$singleRecord.iItemId}">
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
											value="{$singleRecord.tTitle}" placeholder="Enter Title">
											</div>
											<p class="help-block1 errcolor" id="err_title_area"><img class="validationimg" src="{$base_url}assets/common/img/arrow.png"><span class="errvalidationtext" id="lbltitleerrmsg"></span></p>
										 
									</div>
								</div>
								<div class="col-sm-6">
							        <div class="form-group">
										<label class="control-label mb-10 text-left">Image</label><sup class="required">*</sup>
										{if $singleRecord.tImage neq ''}
						  					<div class="input-group">
						  					<input type="hidden" id='imagests' value="yes">
								  				<img src="{$singleRecord.tImage}" width="100px" height="100px"><br>
				                                    <a href="{$base_url}admin/Item/removeImage/item/{$singleRecord.iItemId}">
				                                    <button type="button" class="btn btn-danger btn-perspective dngrbtn" style="width:100px; margin-top: 2px;" >Remove</button></a>
			  								</div>	
										{else}			
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
											<p class="help-block1 errcolor" id="err_item_image_area"><img class="validationimg" src="{$base_url}assets/common/img/arrow.png"><span class="errvalidationtext" id="lblitemimageerrmsg" ></span></p>
										{/if}	
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
												{foreach from=$categoryArray item=value}
								                <option value="{$value.iCategoryId}" {if $value.iCategoryId eq $singleRecord.iCategoryId} selected {/if} >{$value.tTitle}</option>
								            	{/foreach}
											</select>
										</div>
										<p class="help-block1" id="err_category_area"> <img class="validationimg" src="{$base_url}assets/common/img/arrow.png"> <span class="lblcategoryerrmsg" id="lblcategoryerrmsg"></span></p>
									</div>
	         					</div>
								<div class="col-md-6">
									<div class="form-group">
									<label class="control-label mb-10" for="exampleInputuname_1">Status</label><sup class="required">*</sup>
									 <div class="input-group">
									 <div class="input-group-addon"><i class="fa fa-exclamation-circle"></i></div>
										<select class="form-control" name="eStatus" id="eStatus">
											
											<option value="Active" {if $singleRecord.eStatus eq 'Active'}selected{/if} >Active</option>
											<option value="Inactive" {if $singleRecord.eStatus eq 'Inactive'}selected{/if}>Inactive</option>
										</select>

									 </div>
											<p class="help-block1" id="err_status_area"> <img class="validationimg" src="{$base_url}assets/common/img/arrow.png"> <span class="errvalidationtext" id="lblstatuserrmsg"></span></p>
								    </div>
								</div>
							</div>
							<div class="col-md-12 btnTopSpc">
							  	<div class="col-md-6">
									<div class="form-group">
										<input type="button" onclick="itemFormValidation('{$mode}')" class="btn btn-success mr-10 btnFrmTopSpc" value="Save" >
										<a href="{$base_url}admin/Item">
										<button type="button" class="btn btn-danger btnFrmTopSpc" onclick="returnme('{$base_url}admin/Item')">Cancel</button></a>
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
<script src="{$base_url}assets/common/js/itemFormValidation.js"></script>
