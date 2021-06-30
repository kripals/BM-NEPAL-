<?php
    // pull cml and convert to json
    $xml_obj = simplexml_load_file('convert-file.xml');
    $json_data = json_encode($xml_obj, JSON_PRETTY_PRINT);

    is_dir('files') ?: mkdir('files'); //check if folder exists
    
    // create and write in file
    $file_path = 'files/converted_' . date('s_s') .  '.json';
    $file = fopen($file_path, 'w');
    fwrite($file, $json_data);
    fclose($file);

    header("Content-Type: application/octet-stream");
    header("Content-Transfer-Encoding: Binary");
    header("Content-disposition: attachment; filename=\"" . basename($file_path) . "\"");
    readfile($file_path); // do the double-download-dance (dirty but worky)
