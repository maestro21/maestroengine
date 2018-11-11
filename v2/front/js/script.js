$(function() {
    toastr.options = {
		"positionClass": "toast-bottom-center"
	}
});

function handleResponse(response) {
    response = JSON.parse(response);
    toastr[response.type](response.message);
}

function fileFromUrl(url) {
    return url.substring(url.lastIndexOf('/')+1);
}