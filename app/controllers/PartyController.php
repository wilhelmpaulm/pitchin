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
        return Redirect::to("me/my-parties");
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
        return Redirect::to("me/my-parties");
    }

    public function postDeleteParty() {
        Party::find(Input::get('id'))->delete();
        return Redirect::back();
    }

    public function postJoinParty() {

        $pm = new Party_member;
        $pm->party_id = Input::get('party_id');
        $pm->user_id = Auth::user()->id;
        $pm->save();

        return Redirect::to('party/manage/'.Input::get('party_id'));
    }

    public function postLeaveParty() {
        Party_member::where("party_id", "=", Input::get('party_id'))->where("user_id", "=", Auth::user()->id)->first()->delete();
        return Redirect::to('me/');
    }
    
    public function getManage($id){
        $data = [
            "contributions" => Contribution::all(),
            "party" => Party::find($id),
            "party_members" => Party_member::where("party_id", "=", $id)->get(),
            "chats" => Party_chat::where("party_id", "=", $id)->get(),
            "party_contributions" => Party_contribution::where("party_id", "=", $id)->get(),
            "my_contributions" => Party_contribution::where("party_id", "=", $id)->where("user_id", "=", Auth::user()->id)->get(),
        ];
        
        
        return View::make("party.manage", $data);
    }
    
    public static function isPartyMember($party_id, $user_id){
           $pm = Party_member::where("party_id","=", $party_id)->get();
           foreach($pm as $p){
               if($user_id == $p->user_id)
               {
                   return true;
               }
           }
           return false;
           
    }

}
