$(document).ready(function () {
    $('.tab-link').click(function () {
        let selectedTab = $(this).data('tab');
        $('.tab-pane').hide();
        $('#' + selectedTab).show();

        $('.tab-link').removeClass('active');
        $(this).addClass('active');
    });
});