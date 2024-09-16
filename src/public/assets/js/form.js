$(document).ready(function() {
console.log(Toastify);

    $('#fibonacciForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/api/fibonacci',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                const data = JSON.parse(response);
                if (data.error) {
                    Toastify({
                        text: data.error,
                        backgroundColor: "linear-gradient(to right, #FF5F6D, #FFC371)",
                        duration: 5000,
                        close: true,
                        gravity: "top",
                        position: "right"
                    }).showToast();
                } else {
                    Toastify({
                        text: "Fibonacci Number: " + data.fibonacci + " | IP: " + data.ip,
                        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                        duration: 5000,
                        close: true,
                        gravity: "top",
                        position: "right"
                    }).showToast();
                }
            }
        });
    });
});