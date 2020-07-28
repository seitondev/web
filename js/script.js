$(document).ready(function() {
    $('header .header-options a').each(function(indexInArray, valueOfElement) {
        $(this).css({
            'top': '-200px',
            'position': 'relative'
        });

        $(this).animate({
            'top': '0px'
        }, 2000 + (indexInArray * 300));
    });
});