<?php

function validate_between($check, $min, $max)
{
    $len = mb_strlen(clean($check));
    return $min <= $len && $len <= $max;
}

function is_unique($name, $field, $table)
{
    $db = DB::conn();
    $row = $db->row("SELECT {$field} FROM {$table} WHERE {$field} = ?", array($name));

    return (!$row) ? true : false;
}