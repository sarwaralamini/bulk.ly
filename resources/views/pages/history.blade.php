@extends('layouts.app')
@section('content')
<div class="container-fluid app-body">
	<h3>Recent Posts Sent To Buffer</h3>

	<div class="row">
		<div class="col-md-12">
			<div class="search">
				<form method="POST" action="{{ route('h.search') }}">
				    {{ csrf_field() }}
					<div class="row">
						<div class="col-md-4">
						  <div class="form-group">
							<label class="sr-only" for="exampleInputAmount"></label>
							<div class="input-group">
							  <div class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></div>
							  <input type="text" name="text" class="form-control" id="exampleInputAmount" placeholder="Search">
							</div>
						  </div>
						</div>
						<div class="col-md-4">
						  <div class="form-group">
							<label class="sr-only" for="exampleInputAmount"></label>
							<div class="input-group">
							  <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
							  <input type="text" name="date" class="form-control" id="datepicker" placeholder="Select Date">
							</div>
						  </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label class="sr-only" for="exampleInputAmount"></label>
								<div class="input-group">
								  <select class="form-control" style="width: auto" name="group">
									<option>All Groups</option>
									@foreach($allgroups as $group)
										<option value="{{ $group->id }}">{{ ucwords(str_replace("-"," ",$group->type)) }}</option>
									@endforeach
								  </select>
								</div>
							</div>
						</div>
						<button class="btn btn-primary">Search</button>
					</div>
				</form>
			</div>
			<table class="table table-hover social-accounts"> 
				<thead> 
					<tr>
						<th>Group Name</th>
						<th>Group Type</th>
						<th>Account Name</th>
						<th>Post Text</th> 
						<th>Time</th>
					</tr> 
				</thead> 
				<tbody> 
					@foreach($histories as $history)
						<tr>
							<th>{{ $history->groupInfo->name }}</th>
							<th>{{ $history->groupInfo->type }}</th>
							<th>
								<image src="{{ $history->accountInfo->avatar }}" style="max-width:50px;border-radius: 50%;;"/>
								@if($history->accountInfo->type == "facebook")
								<div class="social-icon-avatar">
										<i class="fa fa-facebook"></i>
								</div>
								@elseif($history->accountInfo->type == "twitter")
								<div class="social-icon-avatar">
										<i class="fa fa-twitter"></i>
								</div>
								@elseif($history->accountInfo->type == "google")
								<div class="social-icon-avatar">
										<i class="fa fa-google-plus"></i>
								</div>
								@elseif($history->accountInfo->type == "linkedin")
								<div class="social-icon-avatar">
										<i class="fa fa-linkedin"></i>
								</div>
								@elseif($history->accountInfo->type == "instagram")
								<div class="social-icon-avatar">
										<i class="fa fa-instagram"></i>
								</div>
								@endif
								
							</th>
							<th>{{ $history->post_text }}</th>
							<th>{{ date('j F, Y g:i a',strtotime($history->sent_at)) }}</th>
						</tr> 
					@endforeach()
				</tbody> 
			</table>
			<div style="background-color:#cccccc;">
				{{ $histories->appends(request()->input())->links() }}
			</div>
		</div>
	</div>
</div>
@endsection
