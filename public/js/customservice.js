$(function(){

	$(".modal").on("hidden.bs.modal", function(){
	    $(this).find('form')[0].reset();
	    $(this).find('.addServiceForm .inputDiv').not('.inputDiv:first').remove();
	});

	$(".manual-ajax").click(function(){
		event.preventDefault();
	    $("#myModal").modal();
	 });

	$('.serviceTbl').on('click', '.addSubService', function(e){
		e.preventDefault();
		var service_id = $(this).attr('service_id');
		$("#subServiceModal").modal();
		$("#subServiceModal").find('.parent_id').val(service_id)
	});

	$('.addMoreSub').on('click', function(e){
		e.preventDefault();
		e.stopPropagation();
		var clnInput = $('.cloneForm .inputDiv').clone();

		$('.subServiceDiv').append(clnInput);
	})

	$('#subServiceModal').on('click', '.removeSub', function(e){
		e.preventDefault();
		e.stopPropagation();
		$(this).parents('.inputDiv').remove();
	})


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

	$('.saveSubServiceBtn').on('click', function(e){
		e.preventDefault();
		e.stopPropagation();
		$.post('/add-sub-service', $('.addServiceForm').serialize(), function(data){
			if(data.status == 'success'){
				$("#subServiceModal .close").click()
			}
		}, 'json');
	});

	$('.serviceTbl').DataTable({
        "processing": true,
        "serverSide": false,
        "ajax": "/all-services",
        "aoColumns": [
        	{ mData: 'sl' , className: "uniqueClassName", },
	        { mData: 'name' },
	        { mData: 'status' },
	        { mData: 'action' , className: "uniqueClassName" }
	    ],
        "length": 4,
    });
});