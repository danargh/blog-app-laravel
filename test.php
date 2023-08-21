<?php
$haystack = 'How are you?';
$needle   = 'me';

if (str_contains($haystack, $needle)) {
    echo "This returned true!";
} else {
    echo "This returned false!";
}
