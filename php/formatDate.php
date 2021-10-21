<?php

function formatterDate($date)
{
    $formattedDate = date('d-m-Y', strtotime($date));
    $formattedDate = str_replace("-", "/", $formattedDate);
    return $formattedDate;
}
