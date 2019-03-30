<?php
/**
 *
 * Function for cleaning data before POST in database
 *
 */


function cleanData(array $data) : array
{
    foreach ($data as $key => $dataCleaned ){
        $data[$key] = trim($dataCleaned);
    }
    return $data;
};