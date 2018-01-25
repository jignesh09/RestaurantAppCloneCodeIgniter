function categoryFormValidation(mode) { 
	var titleStatus=imageStatus=0;
	var tImage = $('#tImage').val();
  	titleStatus = checkTitle();
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
  	

  	if (titleStatus == 0 || imageStatus==0)
  	{
  		return false;
	}
	else
	{
		$('#add_Category_frm').submit();
	}
}

function checkTitle() {
	var string = $('#tTitle').val();
	if($.trim(string) != ''){
		var strRegex = new RegExp(/^[a-zA-Z ]*$/);
		var validstr = strRegex.test(string);
		if(!validstr){
			$('#errTitleArea').show();
			$('#lbltitlemsg').html('Please enter correct title name.');
			return 0;
		}
		else {
			if(string.length>=2 && string.length<=256)
			{
				$('#errTitleArea').hide();
				$('#lbltitlemsg').html('');
				return 1;
			}
			else
			{
				$('#errTitleArea').show();
				$('#lbltitlemsg').html('Title should be between 2 to 256 characters');
				return 0;
			}
		}
	}
	else {
		$('#errTitleArea').show();
		$('#lbltitlemsg').html('Please enter title.');
		return 0;
	}
}
function checkValidCategoryImage(status)
{	
	var a = $.trim(status.substring(status.lastIndexOf('.') + 1).toLowerCase());
	if(a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG' ||a == 'png'){
        $('.msgformat1').hide();
		$('#errPhotoArea').hide();
		$('#lblPhotomsg').hide();    
        return 1;
	}
	else
   	{    	
   		$('.msgformat1').show();
    	$('#errPhotoArea').show();
    	$('#lblPhotomsg').show();
       	$('#lblPhotomsg').html('Error while uploading.');
		return 0;
	}
}
function checkItemImage() {	
	var string = $('#tImage').val();
	if($.trim(string) != ''){
		$('#errPhotoArea').hide();
		$('#lblPhotomsg').hide();    
        return 1;
	}
	else
	{
    	$('#errPhotoArea').show();
       	$('#lblPhotomsg').html('Please select image.');
		return 0;
	}
}