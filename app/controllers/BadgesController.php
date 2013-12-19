<?php

class BadgesController extends BaseController {

    public static function loopMembers($party_id) {
        $party = Party::find($party_id);

        $party_members = Party_member::where("party_id", "=", $party->id)->get();
        foreach($party_members as $pm){
            BadgesController::loopAddBadge($pm->user_id);
        }
    }

    public static function loopAddBadge($user_id) {
        $contributions = Contribution::all();
        foreach ($contributions as $c) {
            $pc = Party_contribution::where("user_id", "=", $user_id)->where("contribution_id", "=", $c->id)->get();
            if ($pc->count() >= 3) {
                BadgesController::addBadge($user_id, BadgesController::matchBadge($c->id));
            }
        }
    }

    public static function addBadge($user_id, $badge_id) {
        if (User_badge::where("user_id", "=", $user_id)->where("badge_id", "=", $badge_id)->get()->count() == 0) {
            $ub = new User_badge;
            $ub->user_id = $user_id;
            $ub->badge_id = $badge_id;
            $ub->save();
        }
    }

    public static function matchBadge($i) {
        $badge_id = 0;

        if ($i == 1) {
            $badge_id = 8;
        } elseif ($i == 2) {
            $badge_id = 7;
        } elseif ($i == 3) {
            $badge_id = 4;
        } elseif ($i == 4) {
            $badge_id = 16;
        } elseif ($i == 5) {
            $badge_id = 15;
        } elseif ($i == 6) {
            $badge_id = 7;
        } elseif ($i == 7) {
            $badge_id = 9;
        } elseif ($i == 8) {
            $badge_id = 5;
        } elseif ($i == 9) {
            $badge_id = 13;
        } elseif ($i == 10) {
            $badge_id = 10;
        } elseif ($i == 11) {
            $badge_id = 14;
        } elseif ($i == 12) {
            $badge_id = 6;
        } elseif ($i == 13) {
            $badge_id = 12;
        } elseif ($i == 14) {
            $badge_id = 11;
        }



        return $badge_id;
    }

}
