$( document ).ready(function() {
  $('.main *').hide();
   $('.main *').fadeIn(1500); 

   toastr.options = {
		"positionClass": "toast-bottom-center"
	}

});

function handleResponse(response) {
    response = JSON.parse(response);
    toastr[response.type](response.message);
}
