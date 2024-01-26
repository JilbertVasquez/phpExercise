<?php 

declare(strict_types=1);

function is_input_empty(string $username, string $psswrd) {
    if (empty($username) || empty($psswrd)) {
        return true;
    }
    else {
        return false;
    }
}

function is_user_wrong(bool|array $result) {
    if (!$result) {
        return true;
    }
    else {
        return false;
    }
}

function is_password_wrong(string $psswrd, string $hashpsswrd) {
    if (!password_verify($psswrd, $hashpsswrd)) {
        return true;
    }
    else {
        return false;
    }
}