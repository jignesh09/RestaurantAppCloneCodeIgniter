function changeThemeFun(){
	if($('#changeTheme').val()!=''){
		window.location.href = baseURL+'Theme/index/'+$('#changeTheme').val();
	}
}

$(document).ready(function(){
	$("#check_all").change(function(){
		$('input:checkbox').prop('checked', this.checked);         
	});
	var screenWidth = $(window).innerWidth();
	if(screenWidth<1390){
		$(".wrapper.theme-1-active").addClass('slide-nav-toggle');
		$(".pg-2").css( { 'margin-right' : "225px" });
	}
	else {
		$(".wrapper.theme-1-active").removeClass('slide-nav-toggle');
	}
	$("#btn-active").click(function() {
		
		$("#action").val("Active");
		var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
		if(atLeastOneIsChecked == false){
			$(".modal-body").html( "<p>Please Select Atleast One Record </p>" );
    	    $("#DangerModalColor").modal('show');
        	return false;
        }
	});
	$("#btn-inactive").click(function() {
		$("#action").val("Inactive");
		var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
		if(atLeastOneIsChecked == false){
	        $(".modal-body").html( "<p>Please Select Atleast One Record </p>" );
    	    $("#DangerModalColor").modal('show');
        	return false;
        }
	});
	$("#btn-delete").click(function() {
		$("#action").val("Deleted");
		var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
		if(atLeastOneIsChecked == false){
	        $(".modal-body").html( "<p>Please Select Atleast One Record </p>" );
    	    $("#DangerModalColor").modal('show');
        	return false;
        }
	});
		$("#btn-archive").click(function() {
		$("#action").val("Archive");
		var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
		if(atLeastOneIsChecked == false){
	        $(".modal-body").html( "<p>Please Select Atleast One Record </p>" );
    	    $("#DangerModalColor").modal('show');
        	return false;
        }
	});
	$("#btn-approve").click(function() {
		$("#action").val("Approved");
		var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
		if(atLeastOneIsChecked == false){
			alert("Please Select Atleast One Record ");
	        $(".modal-body").html( "<p>Please Select Atleast One Record </p>" );
    	    $("#DangerModalColor").modal('show');
        	return false;
        }
	});
	$("#btn-reject").click(function() {
		$("#action").val("Rejected");
		var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
		if(atLeastOneIsChecked == false){
	        $(".modal-body").html( "<p>Please Select Atleast One Record </p>" );
    	    $("#DangerModalColor").modal('show');
        	return false;
        }
	});
	$("#btn-recommend").click(function() {
		$("#action").val("Recommend");
		var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
		if(atLeastOneIsChecked == false){
	        $(".modal-body").html( "<p>Please Select Atleast One Record </p>" );
    	    $("#DangerModalColor").modal('show');
        	return false;
        }
	});
	$("#btn-remove-recommendation").click(function() {
		$("#action").val("RemoveRecommendation");
		var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
		if(atLeastOneIsChecked == false){
	        $(".modal-body").html( "<p>Please Select Atleast One Record </p>" );
    	    $("#DangerModalColor").modal('show');
        	return false;
        }
	});
});
function returnme(url)
{
	window.location.href=url;
}
function addme(url)
{
	window.location.href=url;
}


    