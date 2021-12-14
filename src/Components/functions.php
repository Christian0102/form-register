<?php
if (!function_exists('render')) {
    function render($var)
    {
        echo htmlspecialchars($var, ENT_QUOTES);
    }
}


if (!function_exists('checkNameLength')) {
    function checkNameLength($name): bool
    {
        if (strlen($name) >= 6 && strlen($name) <= 51) {
            return true;
        }
        return false;
    }
}


if (!function_exists('checkEmail')) {
    function checkEmail($email): bool
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
}

if (!function_exists('comparePassword')) {
    function comparePassword(string $password, string $confirmPassword): bool
    {
        if ($password === $confirmPassword) {
            return true;
        }
        return false;
    }
}

if (!function_exists('validationPassword')) {
    function validationPassword(string $password): bool
    {
        if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,30}$/', $password) == true) {
            return true;
        }
        return false;
    }
}




if(!function_exists('csrf')) {
    function csrf() {
        // Check if a token is present for the current session
        if(!isset($_SESSION["csrf_token"])) {
            $_SESSION["csrf_token"] = $token;
        } else {
            $token = $_SESSION["csrf_token"];
        }
        return $token;
      }
}