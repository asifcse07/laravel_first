$(function(){

	$(".manual-ajax").click(function(){
		event.preventDefault();
	    $("#myModal").modal();
	 });


	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$('.saveServiceBtn').on('click', function(e){
		e.preventDefault();
		$.post('/add-service', $('.addServiceForm').serialize(), function(data){
			if(data.status == 'success'){
				$("#myModal .close").click()
			}
		}, 'json');
	});
});