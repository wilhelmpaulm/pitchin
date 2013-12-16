<?php

class Me extends BaseController {

    public function getIndex() {
        return View::make('me.index');
    }
    
    public function getMyParties(){
        $data = [
          "parties" => Party::where("owner","=", Auth::user()->id)->get(),  
          "types" => Party_type::all(),  
        ];
        
        return View::make('me.parties', $data);
    }
    public function getOtherParties(){
        $data = [
          "parties" => Party::all(),  
          "types" => Party_type::all(),  
        ];
        
        return View::make('me.otherparties', $data);
    }


}
