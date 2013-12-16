<?php

class Party_member extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'party_id' => 'required',
		'user_id' => 'required',
		'role' => 'required'
	);
}
