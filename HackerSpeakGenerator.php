<?php

/*
    Name ideas:
        RobotSpeak
        HackerSpeak
        RoboIpsum
        RobotIpsum
*/

class HackerSpeakGenerator {

    function GetWords() {
        $words = array(
            'Wi-Fi',
            'fiber connection',
            'gigabit speed',
            'traffic',
            'intercepting traffic',
            'hack',
            'website',
            'network',
            'password',
            'Tor',
            'server farm',
            'anonymous',
            'routing protocol',
            'nodes',
            'exit nodes',
            'emails',
            'system files',
            'log file',
            'dat file',
            'system',
            'operating system',
            '100 terabytes',
            'computer',
            'terminal',
            'AFK',
            'sys admin',
            'wipe',
            'wipe all the data',
            'delete',
            'cyber security',
            'RUDY attack',
            'DDoS attack',
            'DNS',
            'reboot',
            'rootkit',
            'code',
            'malicious code',
            'virus',
            'worm',
            'timing out',
            'boot up',
            'offline',
            'IRC',
            'encryption',
            'IP',
            'data center',
            'decrypt',
            'compromised',
            'brute-force',
            'two-step verification',
            'data dump',
            'breach',
            'disconnect',
            'connect',
            'protocol',
            'backup',
            'off the grid',
            'malware',
            'bonsoir',
            'fsociety'
        );
        
        shuffle($words);

        return $words;
    }


    function MakeSentence() {
        // sentences are between 4 and 15 words
        $sentence = '';
        $length = rand(4,15);

        $includeComma = $length >= 7 && rand(0,2) > 0;

        $words = $this->GetWords();

        if (count($words) > 0) {
            $words[0] = ucfirst($words[0]);

            for ($i = 0; $i < $length; $i++) {
                if ($i > 0) {
                    if ($i >= 3 && $i != $length - 1 && $includeComma) {
                        if (rand(0,1) == 1) {
                            $sentence = rtrim($sentence) . ', ';
                            $includeComma = false;
                        } else {
                            $sentence .= ' ';
                        }
                    } else {
                        $sentence .= ' ';
                    }
                }

                $sentence .= $words[$i];
            }

            $sentence = rtrim($sentence) . '. ';
        }

        return $sentence;
    }


    public function MakeParagraph() {
        // a paragraph should be between 4 and 7 sentences
        $para = '';
        $length = rand(4,7);

        for ($i = 0; $i < $length; $i++) {
            $para .= $this->MakeSentence() . ' ';
        }

        return rtrim($para);
    }


    public function SpeakToMe($paragraph_number = 5, $sentence_number = 0) {
        $paragraphs = array();
        if ($sentence_number > 0) {
            $paragraph_number = 1;
        }

        $words = '';

        for ($i = 0; $i < $paragraph_number; $i++) {
            if ($sentence_number > 0) {
                for ($s = 0; $s < $sentence_number; $s++) {
                    $words .= $this->MakeSentence();
                }
            } else {
                $words = $this->MakeParagraph();
            }

            $paragraphs[] = rtrim($words);
        }

        return $paragraphs;
    }
}

?>