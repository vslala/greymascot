$(function() {

    $(".single-post__featured-img img").each(function() {
        var imgSrc = $(this).attr('src');
        var $itemPointer = $(this);
        var $i = new Image();
        $i.src = imgSrc;
        $i.onload = function() {
            $itemPointer.parent().parent().parent().find('.img-loader').fadeOut('slow');
        };
    });

    $('.single-post__content img').each(function () {
        $(this).addClass('responsive-img');
    });

    $("a").each(function () {
        $(this).attr('itemprop', 'url');
    });

    setInterval(function() {
        $('#page_search_loader').fadeOut('slow');
    }, 3000);

});