<?php

echo "==============================";
echo "Chord Dataset Generator";
echo "==============================";

$names = ["C","C#","D","D#","E","F","F#","G","G#","A","A#","B"];
$suffix = ['', 'm', 'dim','7','11','sus2','sus4'];

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


