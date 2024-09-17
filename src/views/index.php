<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci Calculator</title>
    <link href="/assets/css/main.css" rel="stylesheet">
</head>
<body class="dark-mode">
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Fibonacci App</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a id="tabTable" class="nav-link active" href="#">Graphics</a>
                </li>
                <li class="nav-item">
                    <a id="tabHistory" class="nav-link" href="#">History</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid main-content">
    <div class="row">
        <div class="col-lg-8 left-section">
            <div id="tableTab" class="card tab-content active">
                <h2>Table</h2>
                <table id="fibonacciTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>User Input</th>
                            <th>Fibonacci Number</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div id="historyTab" class="card tab-content">
                <h2>History of Fibonacci</h2>
                <p>Fibonacci numbers are a sequence of numbers first introduced in "Liber Abaci"...</p>
            </div>
        </div>
        <div class="col-lg-4 right-section">
            <div class="card calculator-card">
                <h2>Fibonacci Calculator</h2>
                <form id="fibonacciForm" method="POST">
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
                <div id="loadingOverlay" class="loading-overlay">Loading...</div>
            </div>
            <div class="footer">
                <p>Made by <a href="https://github.com/defProger" class="text-warning" target="_blank">DefProger</a> with Love</p>
            </div>
        </div>
    </div>
    <div class="theme-toggle">
        <button id="themeButton" class="theme-button">
            <img src="/assets/img/sun.svg" class="sun-icon" />
        </button>
    </div>
</div>

<script src="/assets/js/bundle.js"></script>
</body>
</html>