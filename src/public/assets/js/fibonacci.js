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

    $('#fibonacciForm').on('submit', function (e) {
        e.preventDefault();

        let username = $('#username').val();
        let number = $('#number').val();
        let usernamePattern = /^[A-Za-z]{3,15}$/;

        if (!usernamePattern.test(username)) {
            $('#result').html('<div class="alert alert-danger">Username must contain only letters and be no longer than 15 characters.</div>');
            return;
        }

        if (isNaN(number) || number < 0 || number > 1000000) {
            $('#result').html('<div class="alert alert-danger">Please enter a number between 0 and 1000000.</div>');
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
});