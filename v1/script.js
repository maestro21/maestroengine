

function popup(id) {
    $('#' + id).show();
    var popup = '#' + id + ' .popup';
    $(popup).css({'margin-left':'-'+($(popup).width()/2)+'px','margin-top':'-'+($(popup).height()/2)+'px'});
}

function closepopup(id) {
    $('#' + id).hide();
}