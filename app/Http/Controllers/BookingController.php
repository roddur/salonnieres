<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
	public function index(Request $request){
		$name = Auth::user()->name;
		DB::insert('insert into booking_info (user, service_id, booking_date, shift, time) values (?, ?, ?, ?, now())', [$name,$_REQUEST["sid"], $_REQUEST["booking_day"], $_REQUEST["shift"]]);
		$t = json_encode("Booked Successfully. Go to <a href=\"\home\">Home</a> to check.");
		echo $t;
	}

	public function check(Request $request){
		$users = DB::table('booking_enable')->where([['service_id', '=', $_REQUEST["sid"]],['date', '=', $_REQUEST["booking_day"]],['shift', '=', $_REQUEST["shift"]],])->count();
		if($users==0){
			$t = DB::table('booking_info')->where([['service_id', '=', $_REQUEST["sid"]],['booking_date', '=', $_REQUEST["booking_day"]],['shift', '=', $_REQUEST["shift"]],])->count();
			$t = json_encode($t);
			echo $t;
		}
		else echo json_encode("No");
	}
}
