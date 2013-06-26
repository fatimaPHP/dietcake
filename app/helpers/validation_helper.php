<?php

function validate_between($check, $min, $max)
{
    $n = mb_strlen($check);
    return $min <= $n && $n <= $max;
}

function is_unique($name, $field, $table)
{
    $db = DB::conn();
    $row = $db->row("SELECT {$field} FROM {$table} WHERE {$field} = ?", array($name));

    return (!$row) ? true : false;
}