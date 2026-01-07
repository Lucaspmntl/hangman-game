<?php
require_once "Ui.php";
require_once "Word.php";

$ui = new Ui;
$words = Array("Banana", "Macaco", "Tubarao", "Edificio", "Mapa", "Computador", "Lampada");
$randomWord = $words[random_int(0, count($words) - 1)];
$word = new Word($randomWord);
$attempt_letters = [];
$errors = 0;
$max_errors = 5;

while (true) {
    $ui->printHangman($errors);
    $ui->printLetters($attempt_letters, $word->getWord());

    // Verifica se ganhou
    $won = true;
    foreach ($word->toArray() as $char) {
        if (!in_array($char, $attempt_letters)) {
            $won = false;
            break;
        }
    }

    if ($won) {
        echo "\nParabéns! Você acertou a palavra: " . $word->getWord() . "\n";
        break;
    }

    // Verifica se perdeu
    if ($errors >= $max_errors) {
        echo "\nVocê perdeu! A palavra era: " . $word->getWord() . "\n";
        break;
    }

    $input = readline("Digite uma letra: ");
    if ($input === false || strlen($input) === 0) {
        continue;
    }

    $letter = strtoupper($input[0]);

    if (!ctype_alpha($letter)) {
        echo "Por favor, digite apenas letras.\n";
        continue;
    }

    if (in_array($letter, $attempt_letters)) {
        echo "Você já tentou a letra '$letter'. Tente outra.\n";
        continue;
    }

    $attempt_letters[] = $letter;

    if (!$word->containsChar($letter)) {
        $errors++;
        echo "Letra incorreta!\n";
    } else {
        echo "Letra correta!\n";
    }
}
