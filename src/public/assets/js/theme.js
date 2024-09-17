$(document).ready(function () {
    $('#themeButton').click(function () {
        $('body').toggleClass('bg-dark text-light bg-light text-dark');
        $('.navbar').toggleClass('navbar-dark');

        let icon = $('#themeButton img');
        if ($('body').hasClass('bg-light')) {
            icon.attr('src', '/assets/img/moon.svg');
        } else {
            icon.attr('src', '/assets/img/sun.svg');
        }
    });
});