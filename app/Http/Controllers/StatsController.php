<?php

namespace App\Http\Controllers;

use App\Patient;
use Colors\RandomColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function index() {
    	$stats = DB::select('select count(*) as data , wilayas.nom as labels from patients inner join wilayas on patients.wilaya_id = wilayas.id group by labels order by data asc');
	    $stats_geo = collect($stats);

	    $stats_geo->each(function($item, $key){
			$item->color = RandomColor::one(array(
				'luminosity' => 'dark',
				'hue' => 'red'
			));
	    });

    	return view('stats',compact('stats_geo'));
    }
}
