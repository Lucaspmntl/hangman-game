<?php

class Word{
    private string $word;

    function __construct($word){
        $this->word = strtoupper($word);
    }

    function getWord() : string
    { return $this->word; }
    function setWord($word): void
    { $this->word = $word; }

    function containsChar($char): bool{
        return str_contains($this->word, $char);
    }

    function toArray() : array{
        return str_split($this->word);
    }

}


$word = new Word("banana");
