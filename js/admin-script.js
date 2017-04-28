var AdminApp = {
	User: {
		addGeneralMember: function(el){
			var actionUrl = jQuery(el).attr('action');
			var dataValues = jQuery(el).serialize();

			jQuery.ajax({
				url: actionUrl,
				type: 'POST',
				dataType: 'json',
				data: dataValues,
				success: function(data){
					if(data.status == "OK"){
						console.log("Success");
					}
					alert(data.msg);
					location.reload();
				},
				error: function(){

				}
			});
		},
		/*addDirectoryMember: function(el){
			var actionUrl = jQuery(el).attr('action');
			var dataValues = jQuery(el).serialize();

			jQuery.ajax({
				url: actionUrl,
				type: 'POST',
				data: new FormData( this ),
				processData: false,
				contentType: false,
				dataType: 'json',
				data: dataValues,
				success: function(data){
					if(data.status == "OK"){
						alert(data.msg);
						console.log("Success");
					}
				},
				error: function(){

				}
			});
		}*/
	}
}

jQuery(document).ready(function($) {
	$(document).on("submit", "#register_member", function(e){
		e.preventDefault();
		AdminApp.User.addGeneralMember($(this));
		return false;
	});

	$(document).on("submit", "#register_directory", function(e){

		$('.allselect option').prop('selected', true);


		var actionUrl = $(this).attr('action');
		var dataValues = $(this).serialize();

		jQuery.ajax({
			url: actionUrl,
			type: 'POST',
			data: new FormData( this ),
			processData: false,
			contentType: false,
			dataType: 'json',
			// data: dataValues,
			success: function(data){
				if(data.status == "OK"){
					console.log("Success");
				}
				alert(data.msg);
				location.reload();
			},
			error: function(){
				alert("Network error!");
			}
		});
		e.preventDefault();
		return false;
	});

	$("#btnLeft").click(function () {
        var selectedItem = $("#rightValues option:selected");
        $("#leftValues").append(selectedItem);
    });

    $("#btnRight").click(function () {
        var selectedItem = $("#leftValues option:selected");
        $("#rightValues").append(selectedItem);
    });

	$("#catBtnLeft").click(function () {
        var selectedItem = $("#catRightValues option:selected");
        $("#catLeftValues").append(selectedItem);
    });

    $("#catBtnRight").click(function () {
        var selectedItem = $("#catLeftValues option:selected");
        $("#catRightValues").append(selectedItem);
    });


});