$(function() {
	$('#add_description').click(function() {
		var newRow = '<div class="input-group margin">';
		newRow += '<div class="form-group"><input type="text" class="form-control description_item" placeholder="Description ..."></div>';
		newRow += '<span class="input-group-btn">';
		newRow += '<button type="button" class="btn btn-info btn-flat remove-line">X</button>';
		newRow += '</span>';
		newRow += '</div>';
		$('#description_body').append(newRow);
		addRemoveLineClick ();
		sortDescriptionName();

	});

	$('#add_requirement').click(function() {
		var newRow = '<div class="input-group margin">';
		newRow += '<input type="text" class="form-control requirement_item" placeholder="Requirement ...">';
		newRow += '<span class="input-group-btn">';
		newRow += '<button type="button" class="btn btn-info btn-flat remove-line">X</button>';
		newRow += '</span>';
		newRow += '</div>';
		$('#requirement_body').append(newRow);
		addRemoveLineClick ();
		sortRequirementName();
	});

	$('#add_tag').click(function() {
		var newRow = '<div class="input-group margin">';
		newRow += '<input type="text" class="form-control tag_item" placeholder="Tag ...">';
		newRow += '<span class="input-group-btn">';
		newRow += '<button type="button" class="btn btn-info btn-flat">X</button>';
		newRow += '</span>';
		newRow += '</div>';
		$('#tag_body').append(newRow);
		sortTag();
	});

	addRemoveLineClick ();

	function addRemoveLineClick () {
		// Admin CAREER
		$('.remove-line').click(function() {
			console.log("REMOVE");
			$(this).parents().eq(1).remove();
			sortDescriptionName();
			sortRequirementName();
		});
	}

	// Admin TEAM MEMBER
	$('.remove-line_tm').click(function() {
		$(this).parents().eq(1).remove();
		sortTag();
	});

	//Date picker
	$('#datepicker').datepicker({
		autoclose: true
	});
  $('#datepicker_end').datepicker({
		autoclose: true
	});
});

function sortDescriptionName() {
	var count = 0;
	$( ".description_item" ).each(function( index ) {
  	// console.log( index + ": " + $( this ).text() );
		 $(this).attr('name', 'description_item_'+ index);
		 count++;
	});
	$('#deCount').val(count);
}

function sortRequirementName() {
	var count = 0;
	$( ".requirement_item" ).each(function( index ) {
  	// console.log( index + ": " + $( this ).text() );
		 $(this).attr('name', 'requirement_item_'+ index);
		 count++;
	});
	$('#reCount').val(count);
}

function sortTag() {
	var count = 0;
	$(".tag_item").each(function( index ) {
  	// console.log( index + ": " + $( this ).text() );
		 $(this).attr('name', 'tag_item_'+ index);
		 count++;
	});
	$('#tagCount').val(count);
}
