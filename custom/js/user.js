// global the manage memeber table 
var manageUserTable;

$(document).ready(function() {
	manageUserTable = $("#manageUserTable").DataTable({
		"ajax": "php_action/retrieveuser.php",
		"order": []
	});

	$("#addUserModalBtn").on('click', function() {
		// reset the form 
		$("#createUserForm")[0].reset();
		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".messages").html("");

		// submit form
		$("#createUserForm").unbind('submit').bind('submit', function() {

			$(".text-danger").remove();

			var form = $(this);

			// validation
			var f_name = $("#f_name").val();
			var l_name = $("#l_name").val();
			var age = $("#age").val();
			var gender = $("#gender").val();
			var username = $("#username").val();
			var password = $("#password").val();
			var usertype = $("#usertype").val();

			if(f_name == "") {
				$("#f_name").closest('.form-group').addClass('has-error');
				$("#f_name").after('<p class="text-danger">Please enter First Name</p>');
			} else {
				$("#f_name").closest('.form-group').removeClass('has-error');
				$("#f_name").closest('.form-group').addClass('has-success');				
			}
			if(l_name == "") {
				$("#l_name").closest('.form-group').addClass('has-error');
				$("#l_name").after('<p class="text-danger">Please enter Last Name</p>');
			} else {
				$("#l_name").closest('.form-group').removeClass('has-error');
				$("#l_name").closest('.form-group').addClass('has-success');				
			}
			if(age == "") {
				$("#age").closest('.form-group').addClass('has-error');
				$("#age").after('<p class="text-danger">Please enter age</p>');
			} else {
				$("#age").closest('.form-group').removeClass('has-error');
				$("#age").closest('.form-group').addClass('has-success');				
			}
			if(gender == "") {
				$("#gender").closest('.form-group').addClass('has-error');
				$("#gender").after('<p class="text-danger">Please enter gender</p>');
			} else {
				$("#gender").closest('.form-group').removeClass('has-error');
				$("#gender").closest('.form-group').addClass('has-success');				
			}
			if(username == "") {
				$("#username").closest('.form-group').addClass('has-error');
				$("#username").after('<p class="text-danger">Please enter a username</p>');
			} else {
				$("#username").closest('.form-group').removeClass('has-error');
				$("#username").closest('.form-group').addClass('has-success');				
			}

			if(password == "") {
				$("#password").closest('.form-group').addClass('has-error');
				$("#password").after('<p class="text-danger">Please enter the password</p>');
			} else {
				$("#password").closest('.form-group').removeClass('has-error');
				$("#password").closest('.form-group').addClass('has-success');				
			}

			if(usertype == "") {
				$("#usertype").closest('.form-group').addClass('has-error');
				$("#usertype").after('<p class="text-danger">Please select a user type</p>');
			} else {
				$("#usertype").closest('.form-group').removeClass('has-error');
				$("#usertype").closest('.form-group').addClass('has-success');				
			}

			if(username && password && usertype) {
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
							$("#createUserForm")[0].reset();		

							// reload the datatables
							manageUserTable.ajax.reload(null, false);
							// this function is built in function of datatables;

						} else {
							$(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
						}  // /else
					} // success  
				}); // ajax subit 				
			} /// if


			return false;
		}); // /submit form for create member
	}); // /add modal

});

function removeUser(user_ID = null) {
	if(user_ID) {
		// click on remove button
		$("#removeBtn").unbind('click').bind('click', function() {
			$.ajax({
				url: 'php_action/removeuser.php',
				type: 'post',
				data: {user_ID : user_ID},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {						
						$(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

						// refresh the table
						manageUserTable.ajax.reload(null, false);

						// close the modal
						$("#removeUserModal").modal('hide');

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

function editUser(user_ID = null) {
	if(user_ID) {

		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".edit-messages").html("");

		// remove the id
		$("#user_ID").remove();

		// fetch the member data
		$.ajax({
			url: 'php_action/getSelectedUser.php',
			type: 'post',
			data: {user_ID : user_ID},
			dataType: 'json',
			success:function(response) {
				$("#editf_name").val(response.f_name);
				
				$("#editl_name").val(response.l_name);
				
				$("#editage").val(response.age);
				
				$("#editgender").val(response.gender);
				
				$("#editUsername").val(response.u_name);

				$("#editPassword").val(response.password);

				$("#editUsertype").val(response.usertype);	

				// User id 
				$(".editUserModal").append('<input type="hidden" name="user_ID" id="user_ID" value="'+user_ID+'"/>');

				// here update the User data
				$("#updateUserForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var editf_name = $("#editf_name").val();
					var editl_name = $("#editl_name").val();
					var editage = $("#editage").val();
					var editgender = $("#editgender").val();
					var editUsername = $("#editUsername").val();
					var editPassword = $("#editPassword").val();
					var editUsertype = $("#editUsertype").val();
					
					if(editf_name == "") {
						$("#editf_name").closest('.form-group').addClass('has-error');
						$("#editf_name").after('<p class="text-danger">Please enter first name</p>');
					} else {
						$("#editf_name").closest('.form-group').removeClass('has-error');
						$("#editf_name").closest('.form-group').addClass('has-success');				
					}
					if(editl_name == "") {
						$("#editl_name").closest('.form-group').addClass('has-error');
						$("#editl_name").after('<p class="text-danger">Please enter last name</p>');
					} else {
						$("#editl_name").closest('.form-group').removeClass('has-error');
						$("#editl_name").closest('.form-group').addClass('has-success');				
					}
					if(editage == "") {
						$("#editage").closest('.form-group').addClass('has-error');
						$("#editage").after('<p class="text-danger">Please enter age</p>');
					} else {
						$("#editage").closest('.form-group').removeClass('has-error');
						$("#editage").closest('.form-group').addClass('has-success');				
					}
					if(editgender == "") {
						$("#editgender").closest('.form-group').addClass('has-error');
						$("#editgender").after('<p class="text-danger">Please enter gender</p>');
					} else {
						$("#editgender").closest('.form-group').removeClass('has-error');
						$("#editgender").closest('.form-group').addClass('has-success');				
					}
					if(editUsername == "") {
						$("#editUsername").closest('.form-group').addClass('has-error');
						$("#editUsername").after('<p class="text-danger">Please enter a username</p>');
					} else {
						$("#editUsername").closest('.form-group').removeClass('has-error');
						$("#editUsername").closest('.form-group').addClass('has-success');				
					}

					if(editPassword == "") {
						$("#editPassword").closest('.form-group').addClass('has-error');
						$("#editPassword").after('<p class="text-danger">Please enter the password</p>');
					} else {
						$("#editPassword").closest('.form-group').removeClass('has-error');
						$("#editPassword").closest('.form-group').addClass('has-success');				
					}

					if(editUsertype == "") {
						$("#editUsertype").closest('.form-group').addClass('has-error');
						$("#editUsertype").after('<p class="text-danger">Please select a user type</p>');
					} else {
						$("#editUsertype").closest('.form-group').removeClass('has-error');
						$("#editUsertype").closest('.form-group').addClass('has-success');				
					}

					if(editf_name && editl_name && editage && editgender && editUsername && editPassword && editUsertype) {
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
									manageUserTable.ajax.reload(null, false);
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