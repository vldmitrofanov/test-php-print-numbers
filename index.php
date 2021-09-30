<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        h1{
            font-size: 20px;
            font-weight: 300px;
            line-height: 2;
        }

        .box {
            margin: 10vh auto 0;
            width: 400px;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 10px 30px 40px;
            color: #666;
            justify-content: center;
            align-items: center;
        }

        .results {
            margin-top: 20px;
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }
        .results .tag {
            background-color: #e2f4fa;;
            color: #309eff;
            line-height: 2;
            padding: 0 8px;
            display: inline-block;
            font-weight: 300;
            border-radius: 5px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div id="main">
        <div class="box">
            <h1>Print words from dialpad</h1>
            <p>Please enter a number from 1 to 1000.</p>
            <form method="post">
                <input type="number" name="number" placeholder="Input a Number" />
                <button type="submit">Print letters</button>
            </form>

            <div class="results">
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
                        printf("<span class=\"tag\">%s</span>", $output);
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
        </div>
    </div>
</body>

</html>