<?php

// This is the use of strategey design pattern to use to signup function.
// here we implement the real login funciton in the signUpFunction() method which implemented in the concreate classes.
require_once('../Controller/dbh.php');

interface IStrategySignup{
	
	public function signup();
}