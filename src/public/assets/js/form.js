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
            {data: 'username'},
            {data: 'user_input'},
            {data: 'fibonacci_number'}
        ],
        paging: true,
        serverSide: true
    });

    $('#tabTable').click(function () {
        $('#tableTab').show();
        $('#historyTab').hide();
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
    });

    $('#tabHistory').click(function () {
        $('#historyTab').show();
        $('#tableTab').hide();
        $('.nav-link').removeClass('active');
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
                console.log(response)
                $('#loadingOverlay').removeClass('visible');
                $('#result').html('<div class="alert alert-success">Fibonacci Number: ' + response.fibonacci + '</div>');
            },
            error: function () {
                $('#loadingOverlay').removeClass('visible');
                $('#result').html('<div class="alert alert-danger">Error calculating Fibonacci number.</div>');
            }
        });
    });
});