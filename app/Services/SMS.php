<?php

namespace App\Services;

use Twilio\Rest\Client;

class SMS {

	protected $sid;
	protected $token;

	public function __construct($sid,$token) {
		$this->sid = $sid;
		$this->token = $token;
	}

	public function client() {
		return new Client($this->sid,$this->token);
	}

}