<?php
use Illuminate\Support\Facades\DB;
function aurl($url)
{
    return url('/admin' . $url);
}
function GetUser($user_id) {

    try {
        // $s = App\Category::where('parent',null)->withCount('stages')->orderBy('stages_count', 'desc')->take(16)->get();
        $user = DB::table('users')->where('id',$user_id)->first();


        return $user;
    } catch (\Exception $e) {
        throw new \Exception("Error In Payments Dose not exist", 1);


    }
}
