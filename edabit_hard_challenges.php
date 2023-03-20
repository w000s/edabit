<?php

class hardChallenges
{

    // sum of digits of a positive integer
    public function sumDigit(int $number)
    {
        if ($number == 0)
            return 0;
        // when dividing by 10, remains no number, perform the method divided by 10 and add it to number
        return ($number % 10 + $this->sumDigit($number / 10));
    }

    // Create a function that takes an array of increasing letters and return the missing letter.
    public function missingLetter(array $sequence)
    {
        $countSequence = count($sequence) + 1;
        $alphabet = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
        $key = array_keys($alphabet, $sequence[0]);
        $sliced = array_slice($alphabet, $key[0], $countSequence);
        $merged = array_merge($sliced, $sequence);
        $values = array_count_values($merged);

        foreach ($values as $key => $value) {
            if ($value < 2) {
                return $key;
            }
        }
    }

    // create a function that determines whether a number is oddish or evenish.
    public function oddishOrEvenish(int $number)
    {
        $numberArray = str_split($number);
        $result = 0;

        foreach ($numberArray as $number) {
            $result = $result += $number;
        }

        if ($result % 2 != 0) {
            return "Oddish";
        }
        return "Evenish";
    }

    // Create a function that splits a string into an array of identical clusters.
    public function splitGroups(string $clusterString)
    {
        $clusterArray = str_split($clusterString);
        $resultArray = [];

        for ($i = 0; $i < count($clusterArray); $i++) {
            if ($clusterArray[$i] == $clusterArray[$i - 1]) {
                $value = $clusterArray[$i - 1] . $clusterArray[$i];
                $resultArray[] =  $value;
            } else {
                $resultArray[] = $clusterArray[$i];
            }
        }

        return $resultArray;
    }

    // Return an array of prices in float format
    public function returnFloatItems(array $groceriesArray)
    {
        $resultArray = [];
        foreach ($groceriesArray as $groceries) {
            array_push($resultArray, preg_replace("/[^0-9.]/", "", $groceries));
        }
        return $resultArray;
    }

    // Create a function that returns true if comments are properly formatted, and false otherwise
    public function commentsCorrect(string $commentString)
    {
        return empty(str_replace(array("/**/", '//'), '', $commentString));
    }

    // longest streak
    public function longestStreak(array $dateArray)
    {

        return count($dateArray) == 0 ?? 0;

        $max_consecutive = $consecutive = 1;
        for ($i = 0; $i < count($dateArray); $i++) {
            date_diff(date_create($dateArray[$i]['date']), date_create($dateArray[$i + 1]['date']));
            return $consecutive > $max_consecutive ?? $max_consecutive;
        }
    }

    // Create a function that inverts words or the phrase depending on the value of parameter type. A "P" means to invert the entire phrase, while a "W" means to invert every word in the phrase.
    public function inverseWords(string $sentence, string $inversionFunction)
    {
        if (ctype_alpha(str_replace(' ', '', $sentence)) === false) {
            $result = 'Name must contain letters and spaces only';
        }

        $inverseSentenceArray = explode(' ', strtolower($sentence));
        $inverseWordsArray = [];

        switch ($inversionFunction) {
            case 'P':
                $result = ucfirst(implode(' ', array_reverse($inverseSentenceArray)));
                break;
            case 'W':
                for ($i = 0; $i < count($inverseSentenceArray); $i++) {
                    $inverseWordsArray[] = $inverseWordsArray . strrev($inverseSentenceArray[$i]);
                }
                $result = ucfirst(implode(' ', $inverseWordsArray));
                break;
            default:
                $result = 'Please specify the function letter';
        }

        return $result;
    }

    // Given a name, return the letter with the highest index in alphabetical order, with its corresponding index, in the form of a string.
    public function indexAlphabeticalOrder(string $name)
    {
        $alphabet = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
        $highestIndexArray = [];

        for ($i = 0; $i < strlen($name); $i++) {
            $uppercase = ctype_upper($name[$i]);
            $highestIndexArray[$name[$i]] = $uppercase ? array_search($name[$i], array_map('strtoupper', $alphabet)) + 1 : array_search($name[$i], array_map(null, $alphabet)) + 1;
        }

        return max($highestIndexArray) . array_search(max($highestIndexArray), $highestIndexArray);
    }


    // Write a function that returns true if the knights are placed on a chessboard such that no knight can capture another knight. Here, 0s represent empty squares and 1s represent knights.
    // Knights can be present in any of the 64 squares. No other pieces except knights exist.
    public function cannotCapture($board)
    {
        $knightsArray = [];

        for ($i = 0; $i < count($board); $i++) {
            for ($j = 0; $j < count($board[$i]); $j++) {
                if ($board[$i][$j]) {
                    $knightsArray[$i] = $j;
                }
            }
        }



        foreach ($knightsArray as $key => $value) {
            if ($key % 2 == 0)
                echo $value;
        }
    }
}

$challenge = new hardChallenges;
$number = 4433;
$string = '5556667788';
$groceriesArray = ["ice cream ($5.99)", "banana ($0.20)", "sandwich ($8.50)", "soup ($1.99)"];
$dateArray = [
    [
        'date' => "2019-09-18"
    ],
    [
        'date' => "2019-09-19"
    ],
    [
        'date' => "2019-09-20"
    ],
    [
        'date' => "2019-09-26"
    ],
    [
        'date' => "2019-09-27"
    ],
    [
        'date' => "2019-09-30"
    ]
];

$chessBoard = [
    [0, 0, 0, 1, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0],
    [0, 1, 0, 0, 0, 1, 0, 0],
    [0, 0, 0, 0, 1, 0, 1, 0],
    [0, 1, 0, 0, 0, 1, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0],
    [0, 1, 0, 0, 0, 0, 0, 1],
    [0, 0, 0, 0, 1, 0, 0, 0]
];

$singleLineComment = "//////";
$multiLineComment = "/**//**////**/";
$falseFormatted = "///*/**/";
$falseFormatted2 = "/////";
$sentence = 'This is Valhalla';

// echo ("sum of digits in " . $number . " is " . $challenge->sumDigit($number));
// echo $challenge->missingLetter(["k", "l", "o", "p"]);
// echo $challenge->oddishOrEvenish($number);
// echo $challenge->splitGroups($string);
// var_dump($challenge->returnFloatItems($groceriesArray));
// echo $challenge->inverseWords($sentence, 'P');
// var_dump($challenge->indexAlphabeticalOrder('aaaa'));


// echo $challenge->longestStreak($dateArray);
echo $challenge->cannotCapture($chessBoard);
