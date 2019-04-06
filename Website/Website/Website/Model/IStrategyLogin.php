<?php

// This is the use of strategey design pattern to use to login function.
// here we implement the real login funciton in the loginFunction() method.
require_once('../Controller/dbh.php');

interface IStrategyLogin{
	
	public function loginFunction();
	
	public function login();
}