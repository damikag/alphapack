<?php

// This is the use of strategey design pattern to use to login function.
// here we implement the real login funciton in the loginFunction() method which implemented in the concreate classes
require_once('../Controller/dbh.php');

interface IStrategyLogin{
	
	public function login();
}