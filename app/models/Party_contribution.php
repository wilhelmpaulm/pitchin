<?php

class Party_contribution extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'party_id' => 'required',
		'user_id' => 'required',
		'contribution_id' => 'required',
		'quantity' => 'required',
		'name' => 'required'
	);
}
