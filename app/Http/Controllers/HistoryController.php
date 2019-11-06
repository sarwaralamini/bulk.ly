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
		$allgroups = SocialPostGroups::select('type')->distinct()->get();
		return view('pages.history',compact('histories','allgroups'));
	}
}
