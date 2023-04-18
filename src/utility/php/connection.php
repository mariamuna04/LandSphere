<?php

const HOST = 'localhost';
const USER = 'root';
const PASSWORD = '';
const DATABASE = 'dbms_project';

function connection(): bool|mysqli{
    try {
        return mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    } catch (Exception $e) {
        return false;
    }
}
