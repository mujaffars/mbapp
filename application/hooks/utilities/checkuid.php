<?php

function checkuid($params) {

    $output = shell_exec("echo | {$_ENV['SystemRoot']}\System32\wbem\wmic.exe path win32_computersystemproduct get uuid");
    if ($output) {
        echo "Command succeeded. Output=" . $output;
    } else {
        echo "Command failed.";
        exit;
    }



    echo '<br/>';
    echo $encoded = base64_encode($output);
    echo '<br/>';
    echo base64_decode($encoded);

    echo '<br/>==================<br/>';
    echo '<br/>';
    echo sha1(sha1(md5($output)));
    echo '<br/>';

    echo sha1(sha1(md5($output)));

    echo '<br/>==================<br/>';
    echo password_hash($output, PASSWORD_DEFAULT);
    echo '<br/>';
    echo '<br/>';
    echo password_hash($output, PASSWORD_DEFAULT);

    if (password_verify('rasmuslerdorf', $hash1)) {
        echo 'Password is valid!';
    } else {
        echo 'Invalid password.';
    }

    if (password_verify('rasmuslerdorf', $hash2)) {
        echo 'Password is valid!';
    } else {
        echo 'Invalid password.';
    }
}
