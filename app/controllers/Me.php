<?php

class Me extends BaseController {

    public function getIndex() {
        $id = Auth::user()->id; 
        $data= [
          "reminders" => Reminder::where("user_id", "=", $id)->get(),  
          "user_badges" => User_badge::where("user_id", "=", $id)->get()  
        ];
        
        return View::make('me.index', $data);
    }
    
    public function getMyParties(){
        $data = [
          "my_parties" => Party::where("owner","=", Auth::user()->id)->get(),  
          "parties" => Party::all(),  
          "types" => Party_type::all(),  
        ];
        
        return View::make('me.parties', $data);
    }
    public function getOtherParties(){
        $data = [
          "parties" => Party::where("status", "!=", "ended")->get(),  
          "types" => Party_type::all(),  
        ];
        
        return View::make('me.otherparties', $data);
    }


}
