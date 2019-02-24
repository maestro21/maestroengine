$( document ).ready(function() {
  $('.main *').hide();
   $('.main *').fadeIn(1500); 

   toastr.options = {
		"positionClass": "toast-bottom-center"
	}


    $('.tabHeaders .tab').click(function() {
        var tab = $(this).data('tab');

        $('.tabHeaders .tab').removeClass('active');
        $(this).addClass('active');

        $('.tabContent .tab').hide();
        $('.tabContent .tab_'+ tab).show();

    });

    $('.tabHeaders .tab').first().click();


});

function handleResponse(response) {
    response = JSON.parse(response);
    toastr[response.type](response.message);
}


function call(url) {
    $.get(url)
    .done(function( data ) {
        processResponse(data);
    });
}