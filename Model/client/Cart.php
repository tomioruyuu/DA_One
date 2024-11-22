<?php
class Cart
{
    public $connect;

    public function __construct()
    {
        $this->connect = new ConnectDatabase();
    }
}
