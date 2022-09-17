// global the manage memeber table 
var manageItemTable;

$(document).ready(function() {
	manageItemTable = $("#manageItemTable").DataTable({
		"ajax": "php_action/retrieveitem.php",
		"order": []
	});

	$("#addItemModalBtn").on('click', function() {
		// reset the form 
		$("#createItemForm")[0].reset();
		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".messages").html("");

		// submit form
		$("#createItemForm").unbind('submit').bind('submit', function() {

			$(".text-danger").remove();

			var form = $(this);

			// validation
			var sname = $("#sname").val();
			var saddress = $("#saddress").val();
			var rname = $("#rname").val();
			var raddress = $("#raddress").val();
			var item = $("#item").val();
			var amount = $("#amount").val();
			var payment = $("#payment").val();

			if(sname == "") {
				$("#sname").closest('.form-group').addClass('has-error');
				$("#sname").after('<p class="text-danger">Please enter Sender Name</p>');
			} else {
				$("#sname").closest('.form-group').removeClass('has-error');
				$("#sname").closest('.form-group').addClass('has-success');				
			}
			if(saddress == "") {
				$("#saddress").closest('.form-group').addClass('has-error');
				$("#saddress").after('<p class="text-danger">Please enter Sender Address</p>');
			} else {
				$("#saddress").closest('.form-group').removeClass('has-error');
				$("#saddress").closest('.form-group').addClass('has-success');				
			}
			if(rname == "") {
				$("#rname").closest('.form-group').addClass('has-error');
				$("#rname").after('<p class="text-danger">Please enter Receiver Name</p>');
			} else {
				$("#rname").closest('.form-group').removeClass('has-error');
				$("#rname").closest('.form-group').addClass('has-success');				
			}
			if(raddress == "") {
				$("#raddress").closest('.form-group').addClass('has-error');
				$("#raddress").after('<p class="text-danger">Please enter Receiver Address</p>');
			} else {
				$("#raddress").closest('.form-group').removeClass('has-error');
				$("#raddress").closest('.form-group').addClass('has-success');				
			}
			if(item == "") {
				$("#item").closest('.form-group').addClass('has-error');
				$("#item").after('<p class="text-danger">Please enter Item Name</p>');
			} else {
				$("#item").closest('.form-group').removeClass('has-error');
				$("#item").closest('.form-group').addClass('has-success');				
			}

			if(amount == "") {
				$("#amount").closest('.form-group').addClass('has-error');
				$("#amount").after('<p class="text-danger">Please enter the amount</p>');
			} else {
				$("#amount").closest('.form-group').removeClass('has-error');
				$("#amount").closest('.form-group').addClass('has-success');				
			}

			if(payment == "") {
				$("#payment").closest('.form-group').addClass('has-error');
				$("#payment").after('<p class="text-danger">Please select a payment method</p>');
			} else {
				$("#payment").closest('.form-group').removeClass('has-error');
				$("#payment").closest('.form-group').addClass('has-success');				
			}

			if(sname && saddress && rname  && raddress && item && amount && payment) {
				//submit the form to server
				$.ajax({
					url : form.attr('action'),
					type : form.attr('method'),
					data : form.serialize(),
					dataType : 'json',
					success:function(response) {

						// remove the error 
						$(".form-group").removeClass('has-error').removeClass('has-success');

						if(response.success == true) {
							$(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

							// reset the form
							$("#createItemForm")[0].reset();		

							// reload the datatables
							manageItemTable.ajax.reload(null, false);
							// this function is built in function of datatables;

						} else {
							$(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
						}  // /else
					} // success  
				}); // ajax subit 				
			} // if


			return false;
		}); // /submit form for create member
	}); // /add modal

});

function removeItem(trackingID = null) {
	if(trackingID) {
		// click on remove button
		$("#removeBtn").unbind('click').bind('click', function() {
			$.ajax({
				url: 'php_action/removeItem.php',
				type: 'post',
				data: {trackingID : trackingID},
				dataType: 'json',
				success:function(response) {
					
					if(response.success == true) {						
						$(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');
						// refresh the table
						manageItemTable.ajax.reload(null, false);

						// close the modal
						$("#removeItemModal").modal('hide');

					} else {
						$(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
					}
				}
			});
		}); // click remove btn
	} else {
		alert('Error: Refresh the page again');
	}
}

function editItem(trackingID = null) {
	if(trackingID) {

		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".edit-messages").html("");

		// remove the id
		$("#trackingID").remove();

		// fetch the member data
		$.ajax({
			url: 'php_action/getSelectedItem.php',
			type: 'post',
			data: {trackingID : trackingID},
			dataType: 'json',
			success:function(response) {
				$("#editsname").val(response.sname);
				
				$("#editsaddress").val(response.saddress);
				
				$("#editrname").val(response.rname);
				
				$("#editraddress").val(response.raddress);
				
				$("#edititem").val(response.item);

				$("#editamount").val(response.amount);

				$("#editstatus").val(response.status);	

				// Item id 
				$(".editItemModal").append('<input type="hidden" name="trackingID" id="trackingID" value="'+trackingID+'"/>');

				// here update the Item data
				$("#updateItemForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation 
					var editsname = $("#editsname").val();
					var editsaddress = $("#editsaddress").val();
					var editrname = $("#editrname").val();
					var editraddress = $("#editraddress").val();
					var edititem = $("#edititem").val();
					var editamount = $("#editamount").val();
					var editstatus = $("#editstatus").val();
					
					if(editsname == "") {
						$("#editsname").closest('.form-group').addClass('has-error');
						$("#editsname").after('<p class="text-danger">Please enter sender name</p>');
					} else {
						$("#editsname").closest('.form-group').removeClass('has-error');
						$("#editsname").closest('.form-group').addClass('has-success');				
					}
					if(editsaddress == "") {
						$("#editsaddress").closest('.form-group').addClass('has-error');
						$("#editsaddress").after('<p class="text-danger">Please enter sender address</p>');
					} else {
						$("#editsaddress").closest('.form-group').removeClass('has-error');
						$("#editsaddress").closest('.form-group').addClass('has-success');				
					}
					if(editrname == "") {
						$("#editrname").closest('.form-group').addClass('has-error');
						$("#editrname").after('<p class="text-danger">Please receiver name</p>');
					} else {
						$("#editrname").closest('.form-group').removeClass('has-error');
						$("#editrname").closest('.form-group').addClass('has-success');				
					}
					if(editraddress == "") {
						$("#editraddress").closest('.form-group').addClass('has-error');
						$("#editraddress").after('<p class="text-danger">Please enter receiver address</p>');
					} else {
						$("#editraddress").closest('.form-group').removeClass('has-error');
						$("#editraddress").closest('.form-group').addClass('has-success');				
					}
					if(edititem == "") {
						$("#edititem").closest('.form-group').addClass('has-error');
						$("#edititem").after('<p class="text-danger">Please enter item name</p>');
					} else {
						$("#edititem").closest('.form-group').removeClass('has-error');
						$("#edititem").closest('.form-group').addClass('has-success');				
					}

					if(editamount == "") {
						$("#editamount").closest('.form-group').addClass('has-error');
						$("#editamount").after('<p class="text-danger">Please enter amount</p>');
					} else {
						$("#editamount").closest('.form-group').removeClass('has-error');
						$("#editamount").closest('.form-group').addClass('has-success');				
					}

					if(editstatus == "") {
						$("#editstatus").closest('.form-group').addClass('has-error');
						$("#editstatus").after('<p class="text-danger">Please select item status</p>');
					} else {
						$("#editstatus").closest('.form-group').removeClass('has-error');
						$("#editstatus").closest('.form-group').addClass('has-success');				
					}

					if(editsname && editsaddress && editrname && editraddress && edititem && editamount && editstatus) {
						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								if(response.success == true) {
									$(".edit-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
									'</div>');

									// reload the datatables
									manageItemTable.ajax.reload(null, false);
									// this function is built in function of datatables;

									// remove the error 
									$(".form-group").removeClass('has-success').removeClass('has-error');
									$(".text-danger").remove();
								} else {
									$(".edit-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
									'</div>')
								}
							} // /success
						}); // /ajax
					} // /if

					return false;
				});

			} // /success
		}); // /fetch selected Patient info

	} else {
		alert("Error : Refresh the page again");
	}
}