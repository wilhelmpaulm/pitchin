<?php

class ContributionsController extends BaseController {

    public function postAddContribution() {
        $p = new Party_contribution;
        $p->party_id = Input::get("party_id");
        $p->user_id = Auth::user()->id;
        $p->contribution_id = Input::get("contribution_id");
        $p->quantity = Input::get("quantity");
        $p->name = Input::get("name");
        $p->save();
        return Redirect::back();
    }

    public function postDeleteContribution() {
        Party_contribution::find(Input::get("id"))->delete();
        return Redirect::back();
    }


}
