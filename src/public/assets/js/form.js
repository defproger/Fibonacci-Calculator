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

        let username = $('#username').val();
        let number = $('#number').val();
        let usernamePattern = /^[A-Za-z]{1,15}$/;

        if (!usernamePattern.test(username)) {
            $('#result').html('<div class="alert alert-danger">Username must contain only letters and be no longer than 15 characters.</div>');
            return;
        }

        if (isNaN(number) || number < 0 || number > 1000000) {
            $('#result').html('<div class="alert alert-danger">Please enter a number between 0 and 1000.</div>');
            return;
        }

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