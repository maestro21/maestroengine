/* modal */
$('#modal').hide();
$( document ).ready(function() {
    $('.modal-close').click(function() {
		closeModal();
	});

	$('.modal-dialog2 .modal-close').click(function() {
		$(this).parent().parent().toggleClass('hidden');
	});
});

function closeModal() {
	$('#modal').hide();
	$('.modal-overlay').hide();
	if(reload) window.location.reload();
}
function showModal(data) {
	$('#modal .modal-body').html(data);
	$('#modal').show();
	$('.modal-overlay').show();
}

function modal(path,params) {
	$.post(path, params)
	.done(function( data ) {
		showModal(data)
	});
}

function eModal(el) {
	var data = $(el).html(); 
	showModal(data)	
	resizeModal();
	bindAll();
}

function resizeModal() {
	var modal = $('#modal');
	var padLeft = $('#modal').width() / 2;
	var padTop = $('#modal').height() / 2;
	$('.modal').css('marginLeft', -padLeft);
	$('.modal').css('marginTop', -padTop);

}
