<?php

/*
 * Prevent XSS attack
 */
function eh($string)
{
    if (!isset($string)) return;
    echo htmlspecialchars($string, ENT_QUOTES);
}

/*
 *  Preserve line breaks
 */
function readable_text($string)
{
    $string = htmlspecialchars($string,ENT_QUOTES);
    $string = nl2br($string);
    return $string;
}

/*
 * Remove whitespaces and html tags
 */
function clean($string)
{
    $string = trim($string);
    $string = strip_tags($string);
    return $string;
}

/*
 * Redirect to specified URL
 */
function redirect($url)
{
    header("Location: {$url}");
}

/*
 * Return the value of the session specified
 */
function session($key_name)
{
    return (isset($_SESSION[$key_name])) ? htmlspecialchars($_SESSION[$key_name]) : '';
}