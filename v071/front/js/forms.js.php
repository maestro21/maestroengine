
$( document ).ready(function() {
	if($(".imgselect").length) {
		$(".imgselect").msDropDown();
		setTimeout(function(){ $(".imgselect").msDropDown().data('dd').close(); }, 500);
	}	

	$.validator.addMethod('phone', function (value, element) { console.log('called');
		return this.optional(element) || /^[+]?[(]?[0-9]{3}[)]?[-s.]?[0-9]{3}[-s.]?[0-9]{4,6}$/im.test(value);
	}, "<?php echo T('error_phone'); ?>");
	$.validator.addClassRules('phone', { phone: true });

	$.validator.addMethod('slug', function (value, element) { console.log('called');
		return this.optional(element) || /^[-a-z0-9]*$/im.test(value);
	}, "<?php echo T('error_slug'); ?>");
	$.validator.addClassRules('slug', { slug: true });

	$('form').each(function(e) {
		var $this = $(this);
		var $id = $(this).attr('id');
		$this.find('.submit').click(function () { sendForm($this); });

        $(this).validate({

            rules: {
                phone: {
                    phone: true,
                    required: true
                },
            },

            invalidHandler: function(event, validator) {
                addmsg('<?php echo T('error_form'); ?>', 'error');
            }
        });
	});



	/*  $(window).keydown(function(event){
	    if(event.keyCode == 13) {
	      event.preventDefault();
				<!-- sendFormById();-->
	      return false;
	    }
	  });*/
	/*
	$("#form").submit(function(e){ sendForm(); return false; });
	$('.submit').click(function(e) {  sendForm(); return false; });
	function saveFn(){ saveForm(); } */

	$('.tabMenu div').click(function() {
		tab($(this).data('id'));
	});
	tab(1);


	$.fn.serializefiles = function() {
		var obj = $(this);
		/* ADD FILE TO PARAM AJAX */
		var formData = new FormData();
		$.each($(obj).find("input[type='file']"), function(i, tag) {
			$.each($(tag)[0].files, function(i, file) {
				formData.append(tag.name, file);
			});
		});
		var params = $(obj).serializeArray();
		$.each(params, function (i, val) {
			formData.append(val.name, val.value);
		});
		return formData;
	};

});


function tab(i) {
	$('body').addClass('test');
	$('.tabMenu div').removeClass();
	$('.tabMenu div[data-id=' + i + ']').addClass('active');
	$('.tabs .tab').hide();
	$('.tabs .tab[data-id=' + i + ']').show();
}


function bindForm() {
	$('input[type="file"]').on('change', function() {
	  var val = $(this).val().replace(/^.*\\/, "");
	  $(this).siblings('span').text(val);
	})
	$('.delfile').click(function() {
		var data = {
			file: $(this).siblings('a').attr('href')
		};
		console.log(data);
		//$(this).parentNode.html('<?php echo T("no files selected");?>');
		$.post('<?php echo BASE_URL . 'fileviewer/delbyurl';?>?ajax=1',data);
	});
}

function sendForm(form,path) {
    if(form == null) return;
    if(!form.valid()) return;
    if(path == null) path = form.attr("action");
	syncEditorContents();

	var data = $(form).find('input, select, textarea').not('[name*="{key}"]').serializefiles();


    // add files
    $.each( $(form).find('input[type="file"]'), function( key, value ) {
       data.append(value.id, value.files[0]);
    });

		    console.log(data);

	$.ajax({
		url: path,
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		type: 'POST',
		success: function(data){
			processResponse(data);
		}
	});
}

function sendFormById(id,path) {
	if(id == null) id = 'form';
    if(!$('#' + id)) return;
    sendForm($('#' + id),path);
}


function processResponse(data, form) {
	data = jQuery.parseJSON(data); console.log(data);
	$('.messages').html('');
	$('.messages').hide();
	addmsg(data.message, data.status);
	if(data.status == 'success') {
		var timeout = 2000;
		if(data.timeout) timeout = data.timeout;
		setTimeout(function() {
			if(data.redirect) {
				if(data.redirect == 'self' || data.redirect == 'reload')
					window.location.reload();
				else
					window.location = data.redirect;
			}
		},timeout);
	}
}

function sendGetForm(id,path) {
	$.get(path, $('#' + id).serialize())
	.done(function( data ) {
		processResponse(data);
	});
}


function conf(action, text) {
	if(confirm(text)){
		$.get(action + '?ajax=1')
		.done(function( data ) {
			processResponse(data);
		});
	}
}


function addmsg(txt, cl, selector) {
	if(!['error','info', 'warning', 'success'].includes(cl)) cl = 'info';
	toastr[cl](txt);
}


/* Editor editor */
function syncEditorContents() {
	 $('textarea').each(function() {
        var id = $(this).attr("id");
		if($(this).hasClass('html')) {
			$(this).appendTo('form');
			$(this).val(tinyMCE.get(id).getContent());
		}
    });
}