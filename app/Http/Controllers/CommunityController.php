<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function community(){
        return view('community/community');
    }

    public function communityDetail($id){
        $data['group_id'] = $id;
        return view('community/detail', $data);
    }
}
