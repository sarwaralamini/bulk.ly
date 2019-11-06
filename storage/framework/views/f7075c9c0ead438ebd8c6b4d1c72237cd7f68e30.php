<?php $__env->startSection('content'); ?>
<div class="container-fluid app-body">
	<h3>Recent Posts Sent To Buffer</h3>

	<div class="row">
		<div class="col-md-12">
			<div class="search">
				<form method="POST" action="<?php echo e(route('h.search')); ?>">
				    <?php echo e(csrf_field()); ?>

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
									<?php $__currentLoopData = $allgroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($group->id); ?>"><?php echo e(ucwords(str_replace("-"," ",$group->type))); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
					<?php $__currentLoopData = $histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<th><?php echo e($history->groupInfo->name); ?></th>
							<th><?php echo e($history->groupInfo->type); ?></th>
							<th>
								<image src="<?php echo e($history->accountInfo->avatar); ?>" style="max-width:50px;border-radius: 50%;;"/>
								<?php if($history->accountInfo->type == "facebook"): ?>
								<div class="social-icon-avatar">
										<i class="fa fa-facebook"></i>
								</div>
								<?php elseif($history->accountInfo->type == "twitter"): ?>
								<div class="social-icon-avatar">
										<i class="fa fa-twitter"></i>
								</div>
								<?php elseif($history->accountInfo->type == "google"): ?>
								<div class="social-icon-avatar">
										<i class="fa fa-google-plus"></i>
								</div>
								<?php elseif($history->accountInfo->type == "linkedin"): ?>
								<div class="social-icon-avatar">
										<i class="fa fa-linkedin"></i>
								</div>
								<?php elseif($history->accountInfo->type == "instagram"): ?>
								<div class="social-icon-avatar">
										<i class="fa fa-instagram"></i>
								</div>
								<?php endif; ?>
								
							</th>
							<th><?php echo e($history->post_text); ?></th>
							<th><?php echo e(date('j F, Y g:i a',strtotime($history->sent_at))); ?></th>
						</tr> 
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody> 
			</table>
			<div style="background-color:#cccccc;">
				<?php echo e($histories->appends(request()->input())->links()); ?>

			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>