<div class="row heading-bg adjustHeight">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
	  	<h3 class="txt-dark">Category</h3>
	</div>
</div>
<!-- /Title -->
<form action="{$base_url}admin/Category/action_update"  method='post' role="form">
<input id="action" name="action" type="hidden">
	{if $message neq ''}
    	<div class="alert alert-danger alert-dismissable alert-style-1 alertBothSideSpc" id="err_message_area" style="border:1px solid #ea6c41;margin-bottom:12px !important;">
			<i class="icon-bell"></i>
		{$message }
		</div>	
	{/if}
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
									{foreach $all_Data as $value}
									<tr>
										<td><center><input id="iId" name="iId[]" type="checkbox" value="{$value.iCategoryId}"></center></td>
										<td><img src="{$value.tImage}" style="width: 150px;border-radius: 5px;"></td>
						 				<td>{$value.tTitle}</td>
										<td><span class="label label-primary">{$value.eStatus}</span></td>
									    <td><center><a href="{$base_url}admin/Category/edit/{$value.iCategoryId}"><i class="fa fa-edit"></i></a></center></td>
									</tr>
									{/foreach}
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

<script type="text/javascript">
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

	window.location = "{$data.base_url}Category/add";
}

</script>
