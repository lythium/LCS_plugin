$=jQuery.noConflict();
$(document).ready(function() {
	$('#groupe-type-add').on("change","input[type=radio]",function(){
	    var type = $('[name="lcs_type_add"]:checked').val();
		DisplayOptions (type);
	});
	$('#groupe-type-update').on("change","input[type=radio]",function(){
	    var type = $('[name="lcs_type_update"]:checked').val();
		DisplayOptions (type);
	});

	function DisplayOptions (type) {
		if (type == 1) {
			$('.option-cards').hide(500);
			$('#cat_option_cards').hide(500);
			$('.option-slide').show(500);
			$('#cat_option_slide').show(500);
		} else if (type == 2) {
			$('.option-slide').hide(500);
			$('#cat_option_slide').hide(500);
			$('.option-cards').show(500);
			$('#cat_option_cards').show(500);
		};
	};

	// Category script
	jQuery(function(){
	    var max = 4;
	    var checkboxes = $('#list-chk li input[type="checkbox"]');
			var verifType = $('[name="lcs_type_update"]:checked').val();
	    checkboxes.change(function(){
	        var current = checkboxes.filter(':checked').length;
	        checkboxes.filter(':not(:checked)').prop('disabled', current >= max);
					if (current > max) {
						console.log(this);
						$(this).prop('checked', false).prop('disabled', true);
					}
	    });
	});
});
