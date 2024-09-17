$(document).ready(function () {
    let table = $('#fibonacciTable').DataTable({
        ajax: {
            url: '/api/history',
            method: 'GET',
            dataSrc: function (json) {
                return json.data;
            }
        },
        columns: [
            {data: 'id', visible: false},
            {data: 'username'},
            {data: 'user_input'},
            {data: 'fibonacci_number'}
        ],
        order: [[0, 'desc']],
        paging: true,
        serverSide: true
    });

    $('.tab-link').click(function () {
        let selectedTab = $(this).data('tab');
        $('.tab-pane').hide();
        $('#' + selectedTab).show();

        $('.tab-link').removeClass('active');
        $(this).addClass('active');
    });

    $('#fibonacciForm').on('submit', function (e) {
        e.preventDefault();
        $('#loadingOverlay').addClass('visible');
        $.ajax({
            url: '/api/fibonacci',
            method: 'POST',
            dataType: 'json',
            data: $(this).serialize(),
            success: function (response) {
                setTimeout(function () {
                    $('#loadingOverlay').removeClass('visible');
                    $('#result').html('<div class="alert alert-success">Fibonacci Number: ' + response.fibonacci + '</div>');
                    table.ajax.reload();
                }, 300);
            },
            error: function () {
                setTimeout(function () {
                    $('#loadingOverlay').removeClass('visible');
                    $('#result').html('<div class="alert alert-danger">Error calculating Fibonacci number.</div>');
                }, 1000);

            }
        });
    });

    $('#themeButton').click(function () {
        $('body').toggleClass('dark-mode light-mode');
        let icon = $('.theme-button img');
        if ($('body').hasClass('light-mode')) {
            icon.attr('src', '/assets/img/moon.svg');
        } else {
            icon.attr('src', '/assets/img/sun.svg');
        }
    });
});