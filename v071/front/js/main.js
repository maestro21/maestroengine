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




function popup(id) {
    $('#' + id).show();
    var popup = '#' + id + ' .popup';
    $(popup).css({'margin-left':'-'+($(popup).width()/2)+'px','margin-top':'-'+($(popup).height()/2)+'px'});
}

function closepopup(id) {
    $('#' + id).hide();
}


function toggleMenu() {
    $('.topmenu').toggle();
}

$( window ).resize(function() {
    checkDisplayMenu();
});

var menuWidth = 0;
$(function() {
    menuWidth = $('.langs').width() + $('.topmenu').width() + $('.cp').width() + $('.logo').width() + 100;
    checkDisplayMenu();
});

function checkDisplayMenu() {
    if(menuWidth > $(window).width()) {
        $('.topmenu').removeClass('dropdown');
        $('.toggleMenu').show();
        $('.topmenu').hide();
        $('.tmcn').hide();
        $('.tmcm').show();
    } else {
        $('.topmenu').addClass('dropdown');
        $('.toggleMenu').hide();
        $('.topmenu').show();
        $('.tmcm').hide();
        $('.tmcn').show();
    }
}

function toggleCp() {
    $('.adminpanel').toggleClass('open');
    $('body').toggleClass('open')
    $('.adminbtn').toggleClass('open')
}


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