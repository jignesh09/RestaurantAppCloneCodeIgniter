function itemFormValidation(mode) { 
	var titleStatus = imageStatus = categoryStatus = 0;
	var base_url="{$base_url}";
	titleStatus=checkItemTitle();
	if (mode == 'Edit') {
		var imagests=$('#imagests').val();
		if (imagests == 'no') {
			imageStatus=checkItemImage();
		}
		else
		{
			imageStatus= 1;
		}
	}
	else
	{
		imageStatus=checkItemImage();
	}
	
	categoryStatus=checkCategory();
	if(titleStatus== 0|| imageStatus==0 || categoryStatus == 0) 
	{
		return false;
	}
	else
	{
		$('#add_Item_frm').submit();
    }
}
/* Item Form Validation*/
function checkItemTitle() {
	var string=$('#tTitle').val();
	if($.trim(string) != ''){
		var strRegex = new RegExp(/^[a-zA-Z ]*$/);
		var validstr = strRegex.test(string);
		if(!validstr){
			$('#err_title_area').show();
			$('#lbltitleerrmsg').html('Please enter correct title.');
			return 0;
		}
		else {
			if(string.length>=2 && string.length<=256)
			{
				$('#err_title_area').hide();
				$('#lbltitleerrmsg').html('');
				return 1;
			}
			else
			{
				$('#err_title_area').show();
				$('#lbltitleerrmsg').html('Title should be between 2 to 256 characters');
				return 0;
				
			}
		}
	}
	else {
		$('#err_title_area').show();
		$('#lbltitleerrmsg').html('Please enter title.');
		return 0;
	}
}
function checkItemImage() {	
	var string = $('#tImage').val();
	if($.trim(string) != ''){
		$('#err_item_image_area').hide();
		$('#lblitemimageerrmsg').hide();    
        return 1;
	}
	else
	{
    	$('#err_item_image_area').show();
       	$('#lblitemimageerrmsg').html('Please select image.');
		return 0;
	}
}
function checkItemValidImage(status)
{
	var a = $.trim(status.substring(status.lastIndexOf('.') + 1).toLowerCase());
	if(a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG' ||a == 'png'){
        $('.msgformat1').hide();
		$('#err_item_image_area').hide();
		$('#lblitemimageerrmsg').hide();    
        return 1;
	}
	else{
		$('.msgformat1').show();
    	$('#err_item_image_area').show();
    	$('#lblitemimageerrmsg').show();
       	$('#lblitemimageerrmsg').html('Error while uploading.');
		return 0;
   	}
}
function checkCategory(){
	var iCategoryId = $('#iCategoryId').val();
	if($.trim(iCategoryId) != ''){
		$('#err_category_area').hide();
		return 1;
	}
	else {
		$('#err_category_area').show();
		$('#lblcategoryerrmsg').html('Please select category.');
		return 0;
	}
}