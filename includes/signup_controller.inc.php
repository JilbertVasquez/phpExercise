<?php 

declare(strict_types=1);

function is_input_empty(string $username, string $psswrd, string $repsswrd, string $email) {
    if (empty($username) || empty($psswrd) || empty($repsswrd) || empty($email)) {
        return true;
    }
    else {
        return false;
    }
}

function is_password_not_equal(string $psswrd, string $repsswrd) {
    if ($psswrd != $repsswrd) {
        return true;
    }
    else {
        return false;
    }
}

function is_email_invalid(string $email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    else {
        return false;
    }
}

function is_username_taken(object $pdo, string $username) {
    if (get_username($pdo, $username)) {
        return true;
    }
    else {
        return false;
    }
}

function is_email_registered(object $pdo, string $email) {
    if (get_email($pdo, $email)) {
        return true;
    }
    else {
        return false;
    }
}

function create_user(object $pdo, string $username, string $psswrd, string $email) {
    set_user($pdo, $username, $psswrd, $email);
}