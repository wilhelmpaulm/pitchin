<?php

class RemindersController extends BaseController {

    public function postAddReminder() {
        $p = new Reminder;
        $p->user_id = Input::get("user_id");
        $p->sender_id = Auth::user()->id;
        $p->subject = Input::get("subject");
        $p->message = Input::get("message");
        $p->save();
        return Redirect::back();
    }
    public function postDeleteReminder() {
        $p = Reminder::find(Input::get("id"))->delete();
        return Redirect::back();
    }

    

}
