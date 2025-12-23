var $ = jQuery.noConflict();
/* $(document).on('click', '.button-view-more', function () {
	var horse = $(this);
	$('.button-view-more').html('More <i class="fa-solid fa-caret-down">')
    
	$(this).toggleClass('isOpen');
	if ($(this).hasClass('isOpen')) {
		$(this).html('Less <i class="fa-solid fa-caret-up">')
		$('.detailsContainer').slideUp();
		horse.closest('.horse').find('.detailsContainer').slideDown('slow');
	} else {
       
		$(this).html('More <i class="fa-solid fa-caret-down">')
		horse.closest('.horse').find('.detailsContainer').slideUp('slow');
	}
}); */

// Toggle advance filter //
$(document).on('click', '#ZFilters', function () { 
	$('#ZFilters').html('Advance Filters <i class="fa-solid fa-caret-down"></i>');

	if ($('#ExpandedFilters').hasClass('active')) { 
		$('#ExpandedFilters').removeClass('active');
		$('#ZFilters').html('Advance Filters <i class="fa-solid fa-caret-down"></i>');
	}

	else{ 
		$('#ExpandedFilters').addClass('active');
		$('#ZFilters').html('Close Filters <i class="fa-solid fa-caret-up"></i>');
	}
});

// Toggle filter section group //
$(document).on('click', '.filter-section-toggler', function () { 
	$filterButton = $(this);
	$('.filter-section-toggler').html('<i class="fa-solid fa-plus"></i>');
});

$(document).on('click', 'ul.tl-tabs li', function () {
	var tab_id = $(this).attr('data-tab');

	$(this).parent('ul.tl-tabs').children("li").removeClass('current');
	$(this).parent('ul.tl-tabs').parent('.tl-tabs-wrap').children(".tl-tab-content").removeClass('current');

	$(this).addClass('current');
	$(this).parent('ul.tl-tabs').parent('.tl-tabs-wrap').children("." + tab_id).addClass('current');
});