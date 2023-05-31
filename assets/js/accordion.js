$(document).ready(function () {
    $('.question__text').click(function (event) {
        if($('.questions__accordion').hasClass('one')){
            $('.question__text').not($(this)).removeClass('active');
            $('.question__answer').not($(this).next()).slideUp(300);
        }
        $(this).toggleClass('active').next().slideToggle(300);
    });

});