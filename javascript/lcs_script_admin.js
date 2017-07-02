$=jQuery.noConflict();
$(document).ready(function() {
	$('#groupe-type').on("change","input[type=radio]",function(){
    var type = $('[name="lcs_type_add"]:checked').val();
		DisplayOptions (type);
		console.log(type);
	});

	function DisplayOptions (type) {
		if (type = '1') {
			console.log('slide');
			$('#cards-op').hide(500);
			$('#slide-op').show(500);
		}
		if (type = '2') {
			console.log('cards');
			$('#slide-op').hide(500);
			$('#cards-op').show(500);
		}
	};


});
