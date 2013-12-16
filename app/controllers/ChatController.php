<?php

class ChatController extends BaseController {

    public function postAddChat() {
        $p = new Party_chat;
        $p->user_id = Auth::user()->id;
        $p->party_id = Input::get("party_id");
        $p->message = Input::get("message");
        $p->save();
        return Redirect::back();
    }

    

}
