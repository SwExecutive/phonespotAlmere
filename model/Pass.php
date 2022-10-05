<?php

/**
 * Pass - Contains admin login information. Won't be passed to client.
 *
 */
class Pass
{
    public string $username;
    public string $pass;

    public function __construct()
    {
        $this->username = "PhoneSpot";
        $this->pass = "F0zkTMn251!";
    }


}