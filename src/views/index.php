<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci Calculator</title>
    <link href="/assets/css/main.css" rel="stylesheet">
</head>
<body class="bg-dark text-white d-flex justify-content-center align-items-center" style="height: 100vh;">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <div class="card bg-secondary text-white p-4" style="width: 90%;">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">MENU</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#" id="tabTable">Table</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" id="tabHistory">History</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="container mt-4" id="tabContent">
                    <div id="tableTab">
                        <table id="fibonacciTable" class="table table-striped table-bordered text-white">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>User Input</th>
                                <th>Fibonacci Number</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    <div id="historyTab" style="display:none;">
                        <h4>History of Fibonacci Numbers</h4>
                        <p><strong>The Fibonacci sequence</strong> is named after Italian mathematician Leonardo of Pisa, known as Fibonacci...</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 d-flex justify-content-center align-items-center">
            <div class="card bg-secondary text-white" style="width: 100%; position: relative;">
                <div class="card-body position-relative">
                    <h4 class="card-title">Fibonacci Calculator</h4>
                    <form id="fibonacciForm">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">Enter a number</label>
                            <input type="number" class="form-control" id="number" name="number" min="0" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <div id="result" class="mt-3"></div>
                    <div class="loading-overlay" id="loadingOverlay">
                        <div class="spinner-border text-light" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="footer text-center mt-4 mb-2">
                    <small>Made by <a href="https://github.com/defProger" target="_blank" class="text-white">DefProger</a> with Love</small>
                </div>
            </div>
        </div>

        <div class="circle-buttons position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%);">
            <button class="circle-button"></button>
            <button class="circle-button"></button>
            <button class="circle-button"></button>
        </div>
    </div>
</div>

<script src="/assets/js/bundle.js"></script>
</body>
</html>