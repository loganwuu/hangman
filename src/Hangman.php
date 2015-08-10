<?php
    class Hangman
    {
        private $word;
        private $guess;
        private $letters_guessed;
        private $hidden_word;
        private $message;

        function __construct($new_word, $starting_guess = 0, $letters_guessed = array(), $hidden_word = array(), $message = "")
        {
            $this->word = $new_word;
            $this->guess = $starting_guess;
            $this->letters_guessed = $letters_guessed;
            $this->hidden_word = $hidden_word;
            $length = strlen($this->word);
            for($i =0; $i <= $length; $i++) {
                array_push($this->hidden_word, '_');
            }
            $this->message = $message;
        }

        function setWord($new_word)
        {
            $this->word = $new_word;
        }

        function getWord()
        {
            return $this->word;
        }

        function setGuess($new_guess)
        {
            $this->guess = $new_guess;
        }

        function getGuess()
        {
            return $this->word;
        }

        function setLettersGuessed($new_letter)
        {
            array_push($this->letters_guessed, $new_letter);
        }

        function getLettersGuessed()
        {
            return $this->letters_guessed;
        }

        function setHiddenWord($word)
        {
            $this->hidden_word = $word;
        }

        function getHiddenWord()
        {
            return $this->hidden_word;
        }

        function setMessage($new_message)
        {
            $this->message = $new_message;
        }

        function getMessage()
        {
            return $this->message;
        }

        function wrongGuess()
        {
            $this->guess += 1;
        }

        function checkGameOver()
        {
            if($this->guess == 6){
                return true;
            } else {
                return false;
            }
        }

        function checkWord($guess_word)
        {
            if(strtolower($this->word) == strtolower($guess_word)){
                return true;
            } else {
                return false;
            }
        }

        function checkLetter($guess_letter)
        {
            if(strpos($this->word, strtolower($guess_letter)) != false)
            {
                return true;
            } else {
                return false;
            }
        }

        function checkIfGuessed($guess_letter)
        {
            foreach($this->letters_guessed as $letter)
            {
                if(strtolower($letter) == strtolower($guess_letter))
                {
                    return true;
                } else {
                    return false;
                }
            }
        }

        function fillHiddenWord($letter)
        {
            $length = strlen($this->word);
            for($i =0; $i <= $length; $i++) {
                $current_letter =substr( $this->word, $i, 1 );
                if($this->checkLetter($current_letter)) {
                    $this->hidden_word[$i] = $current_letter;
                }
            }
        }

        function save()
        {
            array_push($_SESSION['list_of_hangmans'], $this);
        }

        static function getAll()
        {
            return $_SESSION['list_of_hangmans'];
        }

        static function deleteAll()
        {
            $_SESSION['list_of_hangmans'] = array();
        }

    }
?>
