<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci Calculator</title>
    <!--vendors-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css" rel="stylesheet">
    <!--styles-->
    <link href="/assets/css/main.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">

<div class="row m-3">
    <div class="col-lg-8 p-4">
        <nav class="navbar navbar-expand-lg navbar-dark mb-2">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Fibonacci App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active tab-link" href="#" data-tab="tableTab">Graphics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tab-link" href="#" data-tab="historyTab">History</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="tab-content card p-3">
            <div id="tableTab" class="tab-pane active">
                <div class="container mt-4">
                    <h3>Table</h3>
                    <table id="fibonacciTable" class="table m-2">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>User Input</th>
                            <th>Fibonacci Number</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>

            <div id="historyTab" class="tab-pane">
                <div class="container mt-4">
                    <h2>The Fascinating History of Fibonacci Numbers 🌟</h2>

                    <p>Fibonacci numbers are a <strong>sequence of numbers</strong> first introduced in the famous
                        book <em>Liber
                            Abaci</em> by the Italian mathematician <strong>Leonardo of Pisa</strong>, also known as
                        Fibonacci. But why are these numbers so special? Let’s dive into the <strong>exciting
                            world</strong>
                        of Fibonacci numbers and their incredible applications!</p>

                    <div class="badge bg-warning text-dark">Did you know?</div>
                    <p><strong>Fibonacci numbers</strong> follow a simple rule:<br>
                        Each number is the sum of the two preceding ones!<br>
                        So, the sequence looks like this:<br>
                        <strong>0, 1, 1, 2, 3, 5, 8, 13, 21... and so on!</strong></p>

                    <p>But here’s where things get interesting! 🌀 Fibonacci didn’t invent these numbers himself. He
                        discovered them while studying how <strong>rabbits reproduce</strong>! Imagine you have a
                        pair of
                        rabbits, and every month, they have baby rabbits. Fibonacci realized that the number of
                        rabbit pairs
                        follows this unique sequence.</p>

                    <div class="badge bg-success text-white">Amazing Fact!</div>
                    <p>Fibonacci numbers are everywhere in <strong>nature</strong>! 🌱 You can see them in:</p>
                    <ul>
                        <li>The number of petals on a flower</li>
                        <li>The arrangement of leaves on a stem</li>
                        <li>Pinecones, sunflowers, and even the spiral shells of sea creatures 🐚</li>
                    </ul>

                    <h3><strong>Fibonacci & The Golden Ratio 🌟</strong></h3>
                    <p>Now, let’s talk about something <strong>truly magical</strong>: the <strong>Golden
                            Ratio</strong>! ✨
                    </p>

                    <p>When you divide a Fibonacci number by the previous number in the sequence, you get a number
                        <strong>very
                            close</strong> to 1.618... This is the <strong>Golden Ratio</strong> (also known as
                        <strong>Phi</strong> or <strong>Φ</strong>). It appears in <strong>art</strong>,
                        <strong>architecture</strong>,
                        and even in the proportions of the <strong>human body</strong>! 🤯</p>

                    <div class="text-primary">For example:</div>
                    <ul>
                        <li>If you take the 13th and 14th Fibonacci numbers: <strong>233 ÷ 144 = 1.618...</strong>
                        </li>
                    </ul>

                    <div class="text-warning">Fun Fact:</div>
                    <p>The Golden Ratio has been used by artists like <strong>Leonardo da Vinci</strong> to create
                        <strong>perfectly
                            balanced</strong> and <strong>beautiful</strong> compositions. You can see it in famous
                        works
                        like the <strong>Mona Lisa</strong> and even in ancient Greek architecture like the
                        <strong>Parthenon</strong>!
                    </p>

                    <h3><strong>Fibonacci in Modern Life 🌍</strong></h3>
                    <p>You may be wondering, "Okay, that’s cool, but how are Fibonacci numbers used today?" Well,
                        Fibonacci
                        numbers have found their way into <strong>modern science</strong>,
                        <strong>engineering</strong>, and
                        even <strong>computer algorithms</strong>!</p>

                    <div class="badge bg-primary text-white">Did you know?</div>
                    <p>Fibonacci numbers are used in:</p>
                    <ul>
                        <li><strong>Stock market analysis</strong> 📈 — Traders use Fibonacci retracement levels to
                            predict
                            market movements!
                        </li>
                        <li><strong>Data structures and algorithms</strong> in computer science 💻</li>
                        <li><strong>Cryptography</strong> for securing digital information 🔒</li>
                    </ul>

                    <h3><strong>Fibonacci in Gaming 🎮</strong></h3>
                    <p>If you think Fibonacci numbers are only for math nerds, think again! Some game developers
                        have
                        cleverly used Fibonacci sequences in level design, character health, and even in scoring
                        systems. It
                        adds a subtle layer of balance that makes the game feel <strong>just right</strong>.</p>

                    <div class="badge bg-warning text-dark">Pro Tip:</div>
                    <p>Next time you’re playing your favorite game, try to spot the <strong>Fibonacci
                            sequence</strong> in
                        the way levels are structured or how challenges increase!</p>

                    <hr>

                    <div class="text-primary"><strong>The world of Fibonacci numbers is an adventure! 🌟</strong>
                    </div>
                    <p>From <strong>rabbits</strong> to <strong>stock markets</strong>, and even the <strong>Golden
                            Ratio</strong>, these numbers pop up in the most surprising places. Whether you’re
                        designing a
                        building, painting a masterpiece, or simply enjoying nature, Fibonacci numbers make the
                        world a more
                        <strong>harmonious</strong> and <strong>beautiful</strong> place.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 d-flex flex-column align-items-center justify-content-center end-0 top-0 vh-100 position-fixed">
        <div class="card bg-dark text-white p-3">
            <h2>Fibonacci Calculator</h2>
            <form id="fibonacciForm" method="POST" novalidate>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required
                           pattern="[A-Za-z]{3,15}">
                    <div class="invalid-feedback">Username must be only letters, and no more than 15 characters.</div>
                </div>
                <div class="mb-3">
                    <label for="number" class="form-label">Enter a number</label>
                    <input type="number" class="form-control" id="number" name="number" min="0" required>
                    <div class="invalid-feedback">Please enter a number between 0 and 1000.</div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div id="result" class="mt-3"></div>
            <div id="loadingOverlay" class="loading-overlay">Loading...</div>
        </div>
        <div class="footer mt-3">
            <p>Made by <a href="https://github.com/defProger" class="text-warning" target="_blank">DefProger</a> with
                Love</p>
        </div>

        <button id="themeButton" class="btn btn-primary position-fixed bottom-0 end-0 m-4">
            <img src="/assets/img/moon.svg" alt="Switch Theme" width="30">
        </button>
    </div>
</div>

<!--vendors-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>
<!--scripts-->
<script src="/assets/js/fibonacci.js"></script>
<script src="/assets/js/theme.js"></script>
<script src="/assets/js/tab.js"></script>
</body>
</html>