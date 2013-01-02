// Author: Mfawa Alfred Onen
// Script: Dynamically generate HTML table rows
$(document).ready(function(){

	//A - Institutions Attended with Dates
	$('#addLink').on('click', function(){

		var baseNum = $('.institutions_attended tbody tr').length;
		var newIdNum = Number(baseNum + 1);

		// Table row data
		var cloneStr = $('.institutions_attended tbody tr:last').clone();

		$('.institutions_attended tbody tr:last').parent().append(cloneStr);

		if(newIdNum == 4){
			$('#addLink').hide();
		}

		$('#removeLink').show();

		// Disable the default action
		return false;
	});

	$('#removeLink').on('click', function() {
            var baseNum = $('.institutions_attended tbody tr').length;
            $('.institutions_attended tbody tr:last').remove();     // remove the last table row

            // enable the "add" button
            $('#addLink').show();

            // if only one element remains, disable the "remove" link
            if (baseNum-1 == 1){
				$('#removeLink').hide();
            }
		
		// Disable the default action
        return false;
    });

	$('#removeLink').hide();

	//B - Examinations Passed
	$('#addLinkE').on('click', function(){

		var baseNum = $('.examinations_passed tbody tr').length;
		var newIdNum = Number(baseNum + 1);

		// Table row data
		var cloneStr = $('.examinations_passed tbody tr:last').clone();
		$('.examinations_passed tbody tr:last').parent().append(cloneStr);

		if(newIdNum == 18){
			$('#addLinkE').hide();
		}

		$('#removeLinkE').show();

		// Disable the default action
		return false;
	});

	$('#removeLinkE').on('click', function() {
            var baseNum = $('.examinations_passed tbody tr').length;
            $('.examinations_passed tbody tr:last').remove();     // remove the last table row

            // enable the "add" button
            $('#addLinkE').show();

            // if only one element remains, disable the "remove" link
            if (baseNum-1 == 1){
				$('#removeLinkE').hide();
            }
		
		// Disable the default action
        return false;
    });

	$('#removeLinkE').hide();


	//C - Same as above
	$('input#if_same').on('click', function(){

		var sponsorName = $('input#parent_name').val();
		var sponsorAddress = $('textarea#home_address').val();
		var sponsorGsm = $('input#gsm_no').val();
		var sponsorOccupation = $('input#parent_occupation').val();

		if($('input#if_same').is(':checked') === true){
			// Manipulate the value of fields
			$('input#sponsor_name').attr('readonly', true).val(sponsorName);
			$('textarea#sponsor_address').attr('readonly', true).val(sponsorAddress);
			$('input#sponsor_gsm_no').attr('readonly', true).val(sponsorGsm);
			$('input#sponsor_occupation').attr('readonly', true).val(sponsorOccupation);
		} else {
			// Empty fields value
			$('input#sponsor_name').val('');
			$('textarea#sponsor_address').val('');
			$('input#sponsor_gsm_no').val('');
			$('input#sponsor_occupation').val('');
		}
	});

	// JAMB Awaiting Result
	var score = $('input#jamb_score');
	var ar = $('input#awaiting_result');
	if(score.val() == 'A/R'){
		score.attr('readonly',true);
		ar.attr('checked','true');
	}
	ar.on('click', function(){
		if(ar.is(':checked') === true){
			$('input#jamb_score').attr('readonly', true).val('A/R');
		} else {
			$('input#jamb_score').attr('readonly', false).val('');
		}
	});

});