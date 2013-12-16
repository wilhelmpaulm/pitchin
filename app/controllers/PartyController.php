<?php

class PartyController extends BaseController {

    public function postAddParty() {
        $p = new Party;
        $p->name = Input::get("name");
        $p->description = Input::get("description");
        $p->address = Input::get("address");
        $p->type = Input::get("type");
        $p->date_start = Input::get("date_start");
        $p->date_end = Input::get("date_end");
        $p->owner = Auth::user()->id;
        $p->save();
        if (Input::hasFile('picture')) {
            Input::file('picture')->move(public_path() . "/party/picture", "party_" . $p->id . "." . Input::file('picture')->getClientOriginalExtension());
            $p->picture = "party_" . $p->id . "." . Input::file('picture')->getClientOriginalExtension();
        }
        $p->save();
        return Redirect::to("me/events");
    }
    
    public function postEditParty() {
        $p = Party::find("id");
        $p->name = Input::get("name");
        $p->description = Input::get("description");
        $p->address = Input::get("address");
        $p->type = Input::get("type");
        $p->date_start = Input::get("date_start");
        $p->date_end = Input::get("date_end");
        $p->owner = Auth::user()->id;
        $p->save();
        if (Input::hasFile('picture')) {
            Input::file('picture')->move(public_path() . "/party/picture", "party_" . $p->id . "." . Input::file('picture')->getClientOriginalExtension());
            $p->picture = "party_" . $p->id . "." . Input::file('picture')->getClientOriginalExtension();
        }
        $p->save();
        return Redirect::to("me/events");
    }
    
    public function postDeleteParty(){
        Party::find(Input::get('id'))->delete();
        return Redirect::back();
    }
}
