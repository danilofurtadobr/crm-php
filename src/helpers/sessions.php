<?php

function user() {
    if(isset($_SESSION[LOGGED])) {
        return $_SESSION[LOGGED];
    }
}

function logged() {
    return isset($_SESSION[LOGGED]);
}

function requireUserBySession() {
    $session = $_SESSION[LOGGED] ?? null;
    validateSession($session);
    return $session;
}

function validateSession($session) {
    if(!$session) {
        header('Location: /login');
    }
}
