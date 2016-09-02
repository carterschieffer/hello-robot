<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <input name="submit" type="hidden" value="1">

        Paragraphs:
        <input name="paras" type="text" value="5" maxlength="2">

        <input type="submit" value="Bonsoir!">
    </form>

    <?php

        $output = '';

        if (isset($_REQUEST['submit'])) {
            require_once 'HackerSpeakGenerator.php';

            $generator = new HackerSpeakGenerator();
            $paragraph_number = 5;
            if (isset($_REQUEST['paras'])) {
                $paragraph_number = intval($_REQUEST['paras']);
            }

            if ($paragraph_number < 1) {
                $paragraph_number = 1;
            }

            if ($paragraph_number > 100) {
                $paragraph_number = 100;
            }

            $paragraphs = $generator->SpeakToMe($paragraph_number);


            $output .= '<div>';
            foreach ($paragraphs as $paragraph) {
                $output .= '<p>' . $paragraph . '</p>';
            }
            $output .= '</div>';
        }

        echo $output;

    ?>
</body>
</html>