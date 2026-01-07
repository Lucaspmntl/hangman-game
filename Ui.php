<?php
class Ui{

    function printHangman(int $attempts){
        $interface_parts = array();
        $interface_parts[] = "=====================| HangMan |=====================\n" .
                             "                          |                          \n" .
                             "                          |                          \n" .
                             "                          |                          \n" .
                             "                          |                          \n";
        $interface_parts[] = "                          O                          \n";
        $interface_parts[] = "                         /|";
        $interface_parts[] =                            "\                         \n";
        $interface_parts[] = "                         / ";
        $interface_parts[] = "\                         \n";

        for ($i = 0; $i <= $attempts; $i++) {
            if (isset($interface_parts[$i])) {
                echo $interface_parts[$i];
            }
        }
        echo "\n";
    }

    function printLetters(array $attempt_letters, string $word){
        echo "Palavra: ";

        for ($i = 0; $i < strlen($word); $i++) {

            if (in_array($word[$i], $attempt_letters)) {
                echo $word[$i] . " ";
                continue;
            }
            echo "_ ";

        }
        echo "\n";
    }

}