<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Terminal Quiz</title>
    <style>
        body {
            font-family: monospace;
            background: #222;
            color: #eee;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
        .terminal {
            background: #111;
            padding: 30px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.5);
            width: 600px;
            min-height: 300px;
        }
        .output {
            white-space: pre-wrap;
            min-height: 200px;
        }
        .btn {
            background: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 20px;
        }
        .btn:hover {
            background: #217dbb;
        }
    </style>
</head>
<body>
    <div class="terminal">
        <div class="output" id="output">Tapez "lancer quiz" puis appuyez sur Entrée :</div>
        <input type="text" id="cmd" style="width:100%;margin-top:10px;background:#222;color:#eee;border:1px solid #444;padding:8px;" autofocus>
        <button class="btn" onclick="runQuiz()">Lancer quiz.php</button>
    </div>
    <script>
        function runQuiz() {
            document.getElementById('output').textContent += "\n$ php quiz.php\n";
            fetch('quiz.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('output').textContent += data;
                })
                .catch(err => {
                    document.getElementById('output').textContent += "\nErreur : " + err;
                });
        }

        document.getElementById('cmd').addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                if (this.value.trim().toLowerCase() === 'lancer quiz') {
                    runQuiz();
                } else {
                    document.getElementById('output').textContent += "\n$ " + this.value;
                }
                this.value = '';
            }
        });
    </script>
</body>
</html>