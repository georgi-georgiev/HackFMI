$(document).ready(function() {
	//RegisterForm
	$('#register-form').hide();
    $('#register-button').click(function() {
        $.blockUI({
            message: $('#register-form'),
            css: {
                top: '20%',
                border: 'none',
	            padding: '18px',
	            backgroundColor: '#fff',
	            '-webkit-border-radius': '10px',
	            '-moz-border-radius': '10px',
	            color: '#000',
                width: '312px',
                cursor: 'auto'
            }
        });
	$('.blockOverlay').attr('title','Натисни за да затвориш').click($.unblockUI);
    });

	//LoginForm
    $('#login-form').hide();
    $('#login-button').click(function() {
        $.blockUI({
            message: $('#login-form'),
            css: {
                top: '20%',
                border: 'none',
                padding: '18px',
                backgroundColor: '#fff',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                color: '#000',
                width: '312px',
                cursor: 'auto'
            }
        });
	$('.blockOverlay').attr('title','Натисни за да затвориш').click($.unblockUI);
    });
}); 