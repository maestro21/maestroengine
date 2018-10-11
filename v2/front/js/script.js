$(function() {
    toastr.options = {
		"positionClass": "toast-bottom-center"
	}
});

function handleResponse(response) {
    response = JSON.parse(response);
    toastr[response.type](response.message);
}