<?php

class Party_chat extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'party_id' => 'required',
		'user_id' => 'required',
		'message' => 'required'
	);
}
