<?php

class User_badge extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'user_id' => 'required',
		'badge_id' => 'required'
	);
}
