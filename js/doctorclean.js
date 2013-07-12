$(document).ready(function() {
    $("menu li").hover(
        function() {
            $(this).css('background-image', 'URL(css/menu-hover-bg.gif)');
            $(this).css('border-left-color', '#000');
            $(this).css('border-right-color', '#000');
            $(this).find("a").css('color', 'white');

            if ($(this).attr('class') == 'first') {
                $('.left-menu-end').css('background-image', 'URL(css/menu-hover-lcorner.gif)');
            }
            if ($(this).attr('class') == 'last') {
                $('.right-menu-end').css('background-image', 'URL(css/menu-hover-rcorner.gif)');
            }
        }
    );
    
    $("menu li").mouseleave(
        function() {
            $(this).css('background-image', '');
            $(this).css('border-left-color', '#FFFA5F');
            $(this).css('border-right-color', '#988B00');

            $(this).find("a").css('color', 'black');
            if ($(this).attr('class') == 'first') {
                $('.left-menu-end').css('background-image', 'URL(css/left-menu-end.png)');
            }
            if ($(this).attr('class') == 'last') {
                $('.right-menu-end').css('background-image', 'URL(css/right-menu-end.png)');
            }
        }
    );
});
