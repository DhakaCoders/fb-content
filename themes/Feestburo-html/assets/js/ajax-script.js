(function($){
/*var filterVal = '';
if($('#current_cat').length){
    targetID = $('#current_cat').data('termid');
}
$("#loadMore").on('click', function(e) {
e.preventDefault();
//init
var that = $(this);
var page = $(this).data('page');
var newPage = page + 1;
var ajaxurl = that.data('url');
console.log(page);
//ajax call
$.ajax({
    url: ajaxurl,
    type: 'post',
    data: {
        page: page,
        tartget_id: targetID,
        action: 'ajax_product_script_load_more'

    },
    beforeSend: function ( xhr ) {
      $('#ajxaloader2').show();
    },
    error: function(response) {
        console.log(response);
    },
    success: function(response) {
        //check
        if (response == 0) {
            $('#ajax-content').append('<div class="clearfix"></div><div class="text-center"><p>No more posts to load.</p></div>');
            $('#loadMore').hide();
            $('#ajxaloader2').hide();
        } else {
            $('#ajxaloader2').hide();
            that.data('page', newPage);
            $('#ajax-content').append(response.substr(response.length-1, 1) === '0'? response.substr(0, response.length-1) : response);
        }
    }
});
});*/


if($("#catSlug").length){
  var catSlug = $("#catSlug").data('slug');
}
if($("#keyWord").length){
  var keyWord = $("#keyWord").data('keyword');
}
$("#loadMore").on('click', function(e) {
    e.preventDefault();
    var cat_slug = '';
    var key_word = '';
    if(catSlug != ''){
      cat_slug = catSlug;
    }
    if(keyWord != ''){
      key_word = keyWord;
    }
    //init
    var that = $(this);
    var page = $(this).data('page');
    var newPage = page + 1;
    var ajaxurl = that.data('url');
    
    //ajax call
    $.ajax({
        url: ajaxurl,
        type: 'post',
        data: {
            page: page,
            cat_slug: cat_slug,
            key_word: key_word,
            action: 'ajax_product_script_load_more'
        },
        beforeSend: function ( xhr ) {
            $('#ajxaloader').show();
        },
        
        success: function(response) {
            console.log(response);
            //check
            if (response == 0) {
                $('#ajax-content').append('<div class="clearfix"></div><div class="text-center"><p>No more products to load.</p></div>');
                $('#loadMore').hide();
                $('#ajxaloader').hide();
            } else {
                $('#ajxaloader').hide();
                that.data('page', newPage);
                $('#ajax-content').append(response.substr(response.length-1, 1) === '0'? response.substr(0, response.length-1) : response);
            }
        },
        error: function(response) {
            console.log(response);
        },
    });
});
})(jQuery);