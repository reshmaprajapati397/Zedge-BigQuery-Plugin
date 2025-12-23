var currentPage = 1;
var limit = 25;
var isSortingData = false;
let getData = (fromSorting, fromLoadMore, fromFilter = false) => {
    if(!fromLoadMore){
        $('.bigquery-data.hrs').addClass('fetch-filters');
    }else{
        $('#loadingLoadMore').show();
    }
    // var formsData = $('#ZFilterForm').serializeArray();
    var result = $('#ZFilterForm').serializeJSON();
    // console.log("formsDataJson ====>", formsDataJson);
    // var result = {};
    // $.each(formsData, function(){
    //     result[this.name] = this.value;
    // });
    // result['action'] = 'getMoreHorseInfo';
    var horse = $(this);
    if(fromLoadMore){
        $('.loadMoreButton').attr('disabled', true);
        $('.loadMoreButton').html('Loading...');
    }
    var totalPages = $('.totalPages').val();
    var paged = $('#paged').val();
    $.ajax({
        url: bq_object.ajax_url+'?action=getMoreHorseInfo',
        data: result,
        type: 'POST',
        success: function(data){
            $('.loadMoreButton').show();
            if(data != ''){
                // let name = "str1,str2,str3,str4".match(new RegExp("str", "g"));
                let totalRecs =  data.match(new RegExp("hr-outer", "g")).length;
                // console.log("totalRecstotalRecstotalRecs", totalRecs);
                // if(parseInt(totalRecs) === limit){
                    if(fromLoadMore){
                        $('.hrs-table-body').append(data);
                        if(fromLoadMore){
                            $('#loadingLoadMore').hide();
                            $('.loadMoreButton').attr('disabled', false);
                            $('.loadMoreButton').html('Load More');
                        }
                    }else{
                        $('.hrs-table-body').html(data);
                    }
                    if(parseInt(currentPage) >= parseInt(totalPages)){
                        horse.hide();
                    }
                    horse.attr('disabled', false);
                    horse.html('Load More');
                    $('#loading').hide();
                    $('.bigquery-data.hrs').removeClass('fetch-filters');
                    $('.loadMoreButton').show();
                    isSortingData = false;
                    if(fromLoadMore && parseInt(totalRecs) < limit){
                        $('.loadMoreButton').hide();
                    }else if(fromFilter && parseInt(totalRecs) < limit){
                        $('.loadMoreButton').hide();
                    }
                // }else{
                    // $('.hrs-table-body').html(data);
                    // $('.bigquery-data.hrs').removeClass('fetch-filters');
                    // $('#loading').hide();
                    // $('.loadMoreButton').hide();    
                // }
            }else{
                $('#loading').hide();
                $('.hrs-table-body').html("<center style='margin-top:10px;'>No data found</center>");
                $('.loadMoreButton').hide();
                $('.bigquery-data.hrs').removeClass('fetch-filters');
                isSortingData = false;
            }
        },
        error: function(e){
            $('#loading').hide();
            $('.bigquery-data.hrs').removeClass('fetch-filters');
            $('.loadMoreButton').hide();
            isSortingData = false;
        }
    });
}
$(document).on('click', '.loadMoreButton', function (e) {
    currentPage++;
    $('#paged').val(currentPage);
    getData(false, true)
})

$(document).on('click', '.sorter', function(e){
    if(isSortingData){
        return false;
    }else{
        isSortingData = true;
        e.preventDefault();
        currentPage = 1;
        $('#paged').val(currentPage);
        var oldSort = $(this).data('order');
        var oldFilterIcon;
        switch (oldSort) {
            case 'rand':
                oldFilterIcon = 'sortIcon fa fa-sort-amount-desc';
                break;
            case 'desc':
                oldFilterIcon = 'sortIcon fa fa-sort-amount-asc';
                break;
            default:
                oldFilterIcon = 'sortIcon fa-solid fa-sort';
                break;
        }

        $('.sorter').data('order', 'rand');
        $('.sorter').find('.sortIcon').removeClass().addClass('sortIcon fa-solid fa-sort');    
        
        $(this).data('order', oldSort);
        $(this).find('.sortIcon').removeClass().addClass(oldFilterIcon);

        var sortBy = $(this).data('orderby');
        var currentSort = $(this).data('order');
        var newFilterIcon = '';
        switch (currentSort) {
            case 'rand':
                newFilterIcon = 'sortIcon fa fa-sort-amount-desc';
                currentSort = 'desc';
                break;
            case 'desc':
                newFilterIcon = 'sortIcon fa fa-sort-amount-asc';
                currentSort = 'asc';
                break;
            default:
                newFilterIcon = 'sortIcon fa-solid fa-sort';
                currentSort = 'rand';
                break;
        }
        $('.sorter').data('order', 'rand');
        $('.sorter').find('.sortIcon').removeClass().addClass('sortIcon fa-solid fa-sort');
        $(this).data('order', currentSort);
        $(this).find('.sortIcon').removeClass().addClass(newFilterIcon);
        $('#current_order_by').val(sortBy);
        $('#current_order').val(currentSort);
        
        getData(true, false);   
    }
})

$(document).on('click', '.btnApplyFilter', function(){
    $('#paged').val('1');
    getData(false, false, true);
    $('#loading').show();
    
    // Reset sorting on apply filter
    $('#current_order_by').val('');
    $('#current_order').val('');
    $('.sorter').data('order', 'rand');
    $('.sorter').find('.sortIcon').removeClass().addClass('sortIcon fa-solid fa-sort');
    if($('.bottom-filters').hasClass('active')){
        $('#ZFilters').click();
    }
});

$(document).on('click', '.zform-zbtn', function(){
    $('.zform-zbtn').removeClass('zbtn-active');
    $(this).addClass('zbtn-active');
    $('.listingPrices').val($(this).data('value'));
    $(".btnApplyFilter").trigger('click'); 
})

$(document).on('click', '.button-view-more', function () {
    var horse = $(this);
    horse.attr('disabled', true);
    var dloader = '<div id="dloading" class="zload" style=""><span class="zload-text">Loading Records...</span><div class="zload-bar">Loading Records...</div></div>';
    $('.button-view-more').html('<i class="fa-solid fa-caret-down">');
    //$('.detailsContainer').html('').slideDown('slow')
    $(this).toggleClass('isOpen');
    if ($(this).hasClass('isOpen')) {
        horse.closest('.hr').append(dloader);
        //$('.bigquery-data.hrs').addClass('fetch-filters');
        $(this).html('<i class="fa-solid fa-caret-up">')
        $.ajax({
            url: bq_object.ajax_url,
            data: {action:'getMoreHorseDetails', horseId: horse.data('id')},
            success: function(data){
                horse.attr('disabled', false);
                horse.closest('.hr').find('.detailsContainer').html(data).slideDown('slow')
                horse.closest('.hr').find('.zload').remove();
                $('.bigquery-data.hrs').removeClass('fetch-filters');
            },
            error: function(e){
                console.log(e);
                horse.closest('.hr').find('.zload').remove();
                $('.bigquery-data.hrs').removeClass('fetch-filters');
            }
        });
    } else {
        horse.attr('disabled', false);
        $(this).html('<i class="fa-solid fa-caret-down">')
        horse.closest('.hr').find('.detailsContainer').slideUp().html("")
    }
})

$(document).on('click', '.resetFormBtn', function(){
    $("input:not(.keep)").val('');
    $("select:not(.keep)").val('');
    $(".btnApplyFilter").trigger('click'); 
    //$('#ShowListingAll').click();
})

/* $(document).ready(function(){
    $('#ZHStable').select2({
        ajax: {
            url: bq_object.ajax_url,
            data: function(params){
                var query = {
                    action:'getStablesBySearch',
                    search: params.term,
                    page: params.page || 1
                }
                return query;
            },
            dataType: 'json',
            delay: 250,
            // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
        },
        placeholder: 'Search for stable',
        closeOnSelect: false,
    }); 
}) */
   
var timeout;
$(document).on('keyup', '#ZHStable', function() {
    clearTimeout(timeout);
    $('.zff-group.zff-stb').addClass('loader-active');
    let term = $(this).val();
    let selectedStables = $('.selectedStables').val();
    timeout = setTimeout(function() {
        if(term != ''){
            $.ajax({
                url: bq_object.ajax_url,
                data: {action: 'getStablesBySearch', search: term, defaults: selectedStables},
                dataType: 'json',
                success: function(res) {
                    $('.stableSuggestions').html(res.options);
                    $('.zff-group.zff-stb').addClass('content-active');
                    $('.zff-group.zff-stb').removeClass('loader-active');
                },
                error: function(err){
                    console.log(err);
                }   
            })
        }else{
            $('.zff-group.zff-stb').removeClass('loader-active');
        }
    }, 1000);
});
$(document).on('keyup', '#zHFemale', function() {
    clearTimeout(timeout);
    $('.zff-group.zff-stb').addClass('loader-active');
    let term = $(this).val();
    let selectedStables = $('.selectedStables').val();
    timeout = setTimeout(function() {
        if(term != ''){
            $.ajax({
                url: bq_object.ajax_url,
                data: {action: 'getFemalesBySearch', search: term, defaults: selectedStables},
                dataType: 'json',
                success: function(res) {
                    $('.stableSuggestions').html(res.options);
                    $('.zff-group.zff-stb').addClass('content-active');
                    $('.zff-group.zff-stb').removeClass('loader-active');
                },
                error: function(err){
                    console.log(err);
                }   
            })
        }else{
            $('.zff-group.zff-stb').removeClass('loader-active');
        }
    }, 1000);
});   
let chosenStables = [];
$(document).on('click', '.stableChoice', function(){
    if($(this).is(':checked')){
        chosenStables.push($(this).val())
    }else{
        let item = $(this).val();
        let index = chosenStables.indexOf(item);
        if (index !== -1) {
            chosenStables.splice(index, 1);
        }
    }
    let selectedStables = '';
    if(chosenStables.length){
        selectedStables = chosenStables.join(',');
    }
    $('.chosenCount').remove();
    $('.stableSuggestion').prepend('<div class="chosenCount">' + chosenStables.length + ' Selected</div>');
    $('.selectedStables').val(selectedStables)
});

$(document).ready(function () { 
    $('.zff-stb-closer').click(function () { 
        $('.zff-group.zff-stb').removeClass('content-active');
        $('.zff-group.zff-stb').removeClass('loader-active');
    });
    
    $('#ZHStable').click(function () {
        let term = $('#ZHStable').val();
        if(term != ''){
            $('.zff-group.zff-stb').addClass('content-active');
        }
    });
}); 
$(document).on("click", function(event){
    
    if(!$(event.target).closest(".zff-stb").length){
        $('.zff-group.zff-stb').removeClass('content-active');
        $('.zff-group.zff-stb').removeClass('loader-active');
    } 
		
}); 
