<?php

function chargerQuestions() {
    return [
        ["Quelle est la couleur du cheval blanc d'Henri IV ?", ["1. Noir", "2. Blanc", "3. Rouge"], 2],
        ["Date de la prise de la Bastille ?", ["1. 1789", "2. 1750", "3. 1800"], 1],
        ["Combien font 2 + 2 ?", ["1. 3", "2. 4", "3. 5"], 2],
        ["Quelle est la capitale de la France ?", ["1. Rome", "2. Madrid", "3. Paris"], 3],
        ["Quel langage est utilisé pour le web dynamique ?", ["1. PHP", "2. C", "3. Java"], 1],
        ["Qui a peint La Joconde ?", ["1. Van Gogh", "2. Léonard de Vinci", "3. Picasso"], 2],
        ["Quelle planète est la plus proche du soleil ?", ["1. Mars", "2. Terre", "3. Mercure"], 3],
    ];
}

function jouerQuiz() {
    $scoreFile = 'score.txt';
    $previousScore = file_exists($scoreFile) ? (int) file_get_contents($scoreFile) : 0;

    $questions = chargerQuestions();
    shuffle($questions); // Mélange des questions

    $score = 0;
    $bonneReponses = 0;
    $totalQuestions = count($questions);

    echo "###################################################\n";
    echo "######## Qui veut gagner des millions ?! ##########\n";
    echo "###################################################\n\n";

    echo "Score précédent : $previousScore\n";
    echo "###################################################\n";

    foreach ($questions as $index => $q) {
        list($question, $propositions, $bonneReponse) = $q;

        echo "###################################################\n";
        echo "Score : $score\n";
        echo "###################################################\n\n";

        echo "Question " . ($index + 1) . " :\n\n";
        echo $question . "\n";
        foreach ($propositions as $prop) {
            echo $prop . "\n";
        }

        $handle = fopen("php://stdin", "r");
        $userInput = trim(fgets($handle));

        echo "\nSuspennnnce !\n\n";

        if ((int)$userInput === $bonneReponse) {
            echo "Bien joué !\n\n";
            $score += 10;
            $bonneReponses++;
            echo "*Le score augmente de 10*\n";
        } else {
            echo "NON !\n\n";
            echo "*Le score n'augmente pas. :(*\n";
        }

        echo "\n";
    }

    // Sauvegarde
    file_put_contents($scoreFile, $score);

    $pourcentage = ($bonneReponses / $totalQuestions) * 100;

    echo "###################################################\n";
    echo "Score final : $score\n";
    echo "###################################################\n";

    echo "\n########### GAME OVER ###########\n";
    echo "Pourcentage de bonne réponse : " . round($pourcentage, 2) . "%\n\n";

    if ($pourcentage > 50) {
        echo "Bien joué tu as gagné des millions ! 💰\n";
    } else {
        echo "Dommage... Tu reviendras plus fort ! 😢\n";
    }

    // Rejouer ?
    echo "\nSouhaites-tu rejouer ? (o/n) : ";
    $handle = fopen("php://stdin", "r");
    $rejouer = strtolower(trim(fgets($handle)));
    if ($rejouer === 'o') {
        jouerQuiz(); // relancer
    } else {
        echo "Merci d'avoir joué ! À bientôt 👋\n";
    }
}

jouerQuiz();
