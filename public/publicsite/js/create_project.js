//Initialize tooltips
$('.list-steps > li a[title]').tooltip();

//Wizard
$('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

    var target = $(e.target);

    if (target.parent().hasClass('disabled')) {
        return false;
    }
});
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    $(window).trigger("resize");
});

// Next step
$(".next-step").click(function (e) {
	
    if ($(this).hasClass('first-step')) {
        var nextClicked = true;
        var goNext = false;
        var trueCount = 0;
        var checkNumber = 6;
        $('#project-form').yiiActiveForm('validateAttribute', 'projects-title');
        $('#project-form').yiiActiveForm('validateAttribute', 'projects-specialties');
        $('#project-form').yiiActiveForm('validateAttribute', 'projects-skills');
        $('#project-form').yiiActiveForm('validateAttribute', 'projects-package');
        $('#project-form').yiiActiveForm('validateAttribute', 'projects-duration');
        $('#project-form').yiiActiveForm('validateAttribute', 'projects-describtion');
        // $('#project-form').data('yiiActiveForm').submitting = true;
        // $('#project-form').yiiActiveForm('validate');
    }else {
        var nextClicked = false;
        var goNext = true;
    }

    $('#project-form').on('afterValidateAttribute', function (e, attribute, messages) {
        
        if (nextClicked) {
        
            if (messages.length) {
                nextClicked = false;
                $('html, body').animate({
                    scrollTop: $(attribute.input).offset().top-10
                }, 500);
            }else {
                nextClicked = true;
                trueCount++;
                if (trueCount == checkNumber) {
                    $('html, body').animate({
                        scrollTop: $("#start_form").offset().top-40
                    }, 500);

                    var active = $('.list-steps li.active');
                    active.next().removeClass('disabled');
                    nextTab(active);
                }
            }
        }
    });

    if (goNext) {
        $('html, body').animate({
            scrollTop: $("#start_form").offset().top-40
        }, 500);

        var active = $('.list-steps li.active');
        active.next().removeClass('disabled');
        nextTab(active);
    };

});
// Prev step
$(".prev-step").click(function (e) {

	$('html, body').animate({
        scrollTop: $("#start_form").offset().top-40
    }, 500);

    var active = $('.list-steps li.active');
    prevTab(active);

});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}


// Check Payment
$( window ).load(function() {
    if ($("#complete").hasClass('by-default')) {
        $(".check-payment").trigger( "click" );
        $('html, body').animate({
            scrollTop: $("#error_summary").offset().top-20
        }, 500);
    }
});
$(".check-payment").click(function (e) {
	var addons_title = [];
	var addons_price = [];
    $.each($("input[name='Projects[addons][]']:checked"), function(){            
        addons_title.push($(this).parent().find('.title').html());            
        addons_price.push($(this).parent().find('.price i').html());
    });

    if (addons_title.length > 0) {
		var total = 0;
    	$('#addons').html('');
    	$.each(addons_title, function( index, value ) {
    		$('#addons').append('<tr><th>'+value+'</th><td class="uk-text-right"><span>'+addons_price[index]+' ر.س</span></th></tr>');
    		total += parseInt(addons_price[index]);
		});
		$('#addons').append('<tr><th>المجموع</th><td class="uk-text-right"><span class="price-blue">'+total+' ر.س</span></th></tr>');
    };
    
    if (typeof(total) != "undefined" && total !== 0) {
		$('#payment_gate_on').show();
		$('#payment_gate_off').hide();
		$('.payments-way').show();
    }else {
		$('#payment_gate_on').hide();
		$('#payment_gate_off').show();
    	$('#addons').html('');
		$('.payments-way').hide();
    }
});


// prevent enter submit
$('#project-form').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});

// Submit button active and disable
$('#project-form').on('submit', function(){
    $('#submit_form').attr("disabled", 'disabled');
    $('#submit_form').text('جارى الحفظ..');
});
$('#project-form').on('afterValidate', function (e) {
    if ($('#project-form').find('.has-error').length) {
        $('#submit_form').attr("disabled", false);
        $('#submit_form').text('اضافة');
    }
});

// Leave warning
formmodified=0;
$('form *').change(function(){
    formmodified=1;
});
window.onbeforeunload = confirmExit;
function confirmExit() {
    if (formmodified == 1) {
        return "هل انت متأكد من الخروج من الصفحة؟ لن يتم حفظ التغييرات التى قمت بها";
    }
}
$("#submit_form").click(function() {
    formmodified = 0;
});
