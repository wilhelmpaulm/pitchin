<?php

class Badge extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required',
		'conditions' => 'required',
		'picture' => 'required'
	);
}
