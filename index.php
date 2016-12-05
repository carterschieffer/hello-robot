<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:900|VT323" rel="stylesheet">
    <link rel="stylesheet" href="styles/bootstrap.css">
    <style>
        body{ background:#1B1D1E; color:#F8F8F2; font-size:14px; font-family:'VT323', Consolas, Monaco, monospace; }
        /*.hello-robot-container{ width:100%; max-width:600px; margin:auto; }*/
        h1{ font-family:'Raleway', sans-serif; font-weight:bold; font-size:64px; color:#b70007; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>HELLO ROBOT</h1>
                    <p>A <a href="http://en.wikipedia.org/wiki/Lorem_ipsum">lorem ipsum</a> generator utilizing terminology used on the TV show, <a href="https://en.wikipedia.org/wiki/Mr._Robot_(TV_series)">Mr. Robot</a>.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form action="" method="get">
                        <input name="submit" type="hidden" value="1">

                        Paragraphs:
                        <input name="paras" type="text" value="5" maxlength="2">

                        <input type="submit" value="Bonsoir!">
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