<?php

class Hacker_Speak_API {

    function call_api() {
        require_once 'HackerSpeakGenerator.php';

        $generator = new HackerSpeakGenerator();
        $sentence_number = 0;
        $paragraph_number = 5;

        if (isset($_REQUEST['paras'])) {
            $paragraph_number = intval($_REQUEST['paras']);
        }

        $output = '';

        if ($paragraph_number < 1) {
            $paragraph_number = 1;
        }

        if ($paragraph_number > 100) {
            $paragraph_number = 100;
        }

        $paras = $generator->SpeakToMe(
            $paragraph_number,
            $sentence_number
        );

        header('Access-Control-Allow-Origin: *');

        if (isset($_REQUEST['callback'])) {
            header('Content-Type: application/javascript');
            echo $_GET['callback'] . '(' . json_encode($paras) . ')';
        } else {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($paras);
        }

        exit;

    }
}

$api = new Hacker_Speak_API();
$api->call_api();

?>