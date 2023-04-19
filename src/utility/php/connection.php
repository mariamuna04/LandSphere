<?php

const HOST = 'localhost';
const USER = 'root';
const PASSWORD = '';
const DATABASE = 'dbms_project';

function connection(): bool|mysqli
{
    try {
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    } catch (Exception $e) {
        $connection = mysqli_connect("192.168.0.108", "connectme", "connectme", DATABASE);
    }
    return $connection;
}