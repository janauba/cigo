	$(function() {
		
		//$("form#addOrder").validate();
		
		$( "form#addOrder" ).validate( {
			rules: {
				firstName: "required",
				phoneNumber: {
				  required: true,
				  minlength: 7
				},
				scheduledDate: "required",
				streetAddress: "required",
				city: "required",
				stateProvince: {
				  required: true,
				  minlength: 2
				},
				country: "required"
			},
			messages: {
				firstName: "Please enter the first name",
				phoneNumber: "Please enter the phone number",
				scheduledDate: "Please enter the scheduled date",
				streetAddress: "Please enter the street address",
				city: "Please enter the city",
				stateProvince: "Please enter the state / province",
				country: "Please enter the country"
			},
			errorElement: "em",
			errorPlacement: function ( error, element ) {
				// Add the `help-block` class to the error element
				error.addClass( "invalid-feedback" );

				if ( element.prop( "type" ) === "checkbox" ) {
					error.insertAfter( element.parent( "label" ) );
				} else {
					error.insertAfter( element );
				}
			},
			highlight: function ( element, errorClass, validClass ) {
				//$( element ).parents( ".col-sm" ).addClass( "has-danger" ).removeClass( "has-success" );
				$( element ).addClass( "is-invalid" );
			},
			unhighlight: function (element, errorClass, validClass) {
				//$( element ).parents( ".col-sm" ).addClass( "has-success" ).removeClass( "has-danger" );
				$( element ).removeClass( "is-invalid" );
			}		
		} );
		
		$("#cancelOrder").click(function(){
			$("form#addOrder").validate().resetForm();		
		});

		$("#submitOrder").click(function(){
			if($("form#addOrder").valid()){
				let input = {
					"firstName": $("#firstName").val() ,
					"lastName": $("#lastName").val() , 
					"email": $("#email").val() ,
					"phoneNumber": $("#phoneNumber").val() ,
					"scheduledDate": $("#scheduledDate").val() ,
					"streetAddress": $("#streetAddress").val() ,
					"city": $("#city").val() ,
					"stateProvince": $("#stateProvince").val() ,
					"postalZipCode": $("#postalZipCode").val() ,
					"country": $("#country").val()
				};
				
				$.ajax({
					url:baseURL+'index.php/cigo/addOrder', 	
					method: 'post',
					data: input,
					dataType: 'html',
					success: function(response){
						$("form#addOrder").validate().resetForm();
						$("form#addOrder").trigger("reset");
						$("table#orders tbody").prepend(response);
						$("table#orders .dropdown-toggle").each(function() {
						  updateToggle($(this));
						});						
					}
				});	
				
			}
		});
		
		$( "table#orders .dropdown-toggle" ).each(function() {
		  updateToggle($(this));
		});
		
		$('#deleteModal').on('show.bs.modal', function (event) {
			let order = $(event.relatedTarget).data('order') 
			//$(this).find('.modal-body').html(order)
			$(this).find('#deleteOrder').data( "order", order )
		})
		
	});
	
	function updateToggle(toggle) {
		toggle.removeClass("btn-primary btn-light btn-success btn-danger btn-warning");
		switch (toggle.html()) {
		  case "Assigned":
			toggle.addClass("btn-primary"); break;
		  case "Pending":
			toggle.addClass("btn-light"); break;
		  case "On Route":
			toggle.addClass("btn-warning"); break;
		  case "Done":
			toggle.addClass("btn-success"); break;
		  case "Canceled":
			toggle.addClass("btn-danger"); break;
		}
		
		if( toggle.html() == "Assigned"
			|| toggle.html() == "Pending" ) {
			toggle.siblings(".btn-circle").prop( "disabled", false );
		} else {
			toggle.siblings(".btn-circle").prop( "disabled", true );
		}
	}
	
	function updateToggleItem(item) {
		let status = $(item).text();
		let toggle = $(item).parents(".dropdown-menu").siblings(".dropdown-toggle");
		let order = toggle.data("order");
		
		$.ajax({
			url:baseURL+'index.php/cigo/updateOrder/'+order+'/'+status,
			method: 'post',
			success: function(response){
				toggle.html(status);
				$("form#addOrder").trigger("reset");
				updateToggle(toggle);				
			}
		});	

	}	
	
	function dropOrder(order){
		$.ajax({
			url:baseURL+'index.php/cigo/deleteOrder/'+order,
			method: 'post',
			success: function(response){
				$( "#order_"+order ).remove();
			}
		});			
	}
	