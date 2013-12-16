<?php

class Reminder extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'user_id' => 'required',
		'message' => 'required'
	);
}
