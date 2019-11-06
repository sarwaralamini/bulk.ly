<?php

namespace Bulkly\Http\Controllers;

use Illuminate\Http\Request;
Use Bulkly\BufferPosting;
Use Bulkly\SocialPostGroups;

class HistoryController extends Controller
{
    public function index()
	{
		$histories = BufferPosting::simplePaginate(10);
		$allgroups = SocialPostGroups::get();
		return view('pages.history',compact('histories','allgroups'));
	}
	
	public function hSearch(Request $request){
		$text = $request->text;
		$date = $request->date;
		$group = $request->group;
		
		$histories = BufferPosting::where('post_text',$text)
								->orWhere('sent_at', $date)
								->orWhere('group_id', $group)
								->simplePaginate(5);
		
		if($histories->count() > 0)
		{   
	        $histories = $histories;
			$allgroups = SocialPostGroups::get();
			return view('pages.history',compact('histories','allgroups'));
		}else{
			$histories = BufferPosting::simplePaginate(10);
			$allgroups = SocialPostGroups::get();
			return view('pages.history',compact('histories','allgroups'));
		}		
	}
}
