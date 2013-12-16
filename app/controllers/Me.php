<?php

class Me extends BaseController {

    public function getIndex() {
        return View::make('me.index');
    }
    
    public function getEvents(){
        $data = [
          "parties" => Party::where("owner","=", Auth::user()->id)->get(),  
          "types" => Party_type::all(),  
        ];
        
        return View::make('me.events', $data);
    }


}
