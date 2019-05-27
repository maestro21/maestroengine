

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
    menuWidth = $('.langs').width() + $('.topmenu').width() + $('.cp').width() + $('.home').width() + 100;
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