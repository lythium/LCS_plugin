$=jQuery.noConflict();
$(document).ready(function() {
	$('#groupe-type').on("change","input[type=radio]",function(){
	    var type = $('[name="lcs_type_add"]:checked').val();
		DisplayOptions (type);
	});

	function DisplayOptions (type) {
		if (type == 1) {
			$('.option-cards').hide(500);
			$('.option-slide').show(500);
		} else if (type == 2) {
			$('.option-slide').hide(500);
			$('.option-cards').show(500);
		};
	};


});
