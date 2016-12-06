<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
    <link rel="stylesheet" href="styles/bootstrap.css">
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="robotron">
                        <h1>HELLO ROBOT</h1>
                        <h3>A <a href="http://en.wikipedia.org/wiki/Lorem_ipsum">lorem ipsum</a> generator utilizing terminology used on the TV show, <a href="https://en.wikipedia.org/wiki/Mr._Robot_(TV_series)">Mr. Robot</a>.</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <form action="" method="get">
                        <input name="submit" type="hidden" value="1">

                        <div class="input-group">
                            <?php
                                $paras = $_REQUEST['paras'];
                                $paras = mb_convert_encoding($paras, 'UTF-8', 'UTF-8');
                                $paras = htmlentities($paras, ENT_QUOTES, 'UTF-8');
                            ?>
                            <input class="form-control input-lg" name="paras" type="text" placeholder="Paragraphs" autocomplete="off" value="<?= $paras ?>">
                            <span class="input-group-btn">
                                <input class="btn btn-primary btn-lg" type="submit" value="Bonsoir!">
                            </span>
                        </div>
                    </form>

                    <div class="hello-robot-container">
                        <?php
                            $output = '';

                            if (isset($_REQUEST['submit'])) {
                                require_once 'HelloRobotGenerator.php';

                                $generator = new HelloRobotGenerator();
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>