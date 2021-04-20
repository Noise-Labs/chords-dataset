<?php

echo "==============================";
echo "Chord Dataset Generator";
echo "==============================";

$names = ["C","C#","D","D#","E","F","F#","G","G#","A","A#","B"];
$suffix = ['', 'm', 'dim', 'dim7', 'sus2', 'sus4', '7sus4', '7sg', 'alt', 'aug', '6', '69', '7', '7b5', 'aug7', '9', '9b5', 'aug9', '7b9', '7#9', '11', '9#11', '13', 'maj7', 'maj7b5', 'maj7#5', 'maj9', 'maj11', 'maj13', 'm6', 'm69', 'm7', 'm7b5', 'm9', 'm11', 'mmaj7', 'mmaj7b5', 'mmaj9', 'mmaj11', 'add9', 'madd9', '/E', '/F', '/F#', '/G', '/G#', '/A', '/Bb', '/B', '/C', '/C#', 'm/B', 'm/C', 'm/C#', '/D', 'm/D', '/D#', 'm/D#', 'm/E', 'm/F', 'm/F#', 'm/G', 'm/G#'];

for($i=0;$i<count($names);$i++) {
    $c = $names[$i];
    for($j=0;$j<count($suffix);$j++) {
        $s = $suffix[$j];
        $s = str_replace("/","-",$s);
        $file_name = "./midis/{$c}_{$s}.midi";
        $wav_file = "./waves/${c}_{$s}.wav";
        $cmd = "c2m --bpm 80 ${c}${s} -o ${file_name}";
        system($cmd);
        $cmd = "timidity $file_name -Ow -o $wav_file";
        system($cmd);
    }
}


