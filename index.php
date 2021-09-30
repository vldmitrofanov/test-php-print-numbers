<!DOCTYPE html>
<html>

<body>
    <div id="main">
        <h1>Print words from dialpad</h1>
        <p>Please enter a number from 1 to 1000.</p>
        <form method="post">
            <input type="number" name="number" placeholder="Input a Number" />
            <button type="submit">Print letters</button>
        </form>

        <?php

        $hashTable = [
            0 => '',
            1 => '',
            2 => 'ABC',
            3 => 'DEF',
            4 => 'GHI',
            5 => 'JKL',
            6 => 'MNO',
            7 => 'PQRS',
            8 => 'TUV',
            9 => 'WXYZ'
        ];

        function printWordsUtil($number = [], int $curr_digit, $output = [], int $n)
        {
            global $hashTable;
            if ($curr_digit == $n) {
                printf("%s ", $output);
                return;
            }

            for ($i = 0; $i < strlen($hashTable[$number[$curr_digit]]); $i++) {
                $output[$curr_digit] = $hashTable[$number[$curr_digit]][$i];
                printWordsUtil($number, $curr_digit + 1, $output, $n);
                if ($number[$curr_digit] == 0 || $number[$curr_digit] == 1) return;
            }
        }

        function printWords($input)
        {
            $input_array = str_split($input);
            $result = '';
            printWordsUtil($input_array, 0, $result, sizeof($input_array));
        }

        if ($_POST['number']) {
            $num = (int) $_POST['number'];
            if ($num < 0 || $num > 1000) {
                echo "<p style='color: red'>Invalid number!</p>";
            } else {
                printWords($num);
            }
        }

        ?>

    </div>
</body>

</html>