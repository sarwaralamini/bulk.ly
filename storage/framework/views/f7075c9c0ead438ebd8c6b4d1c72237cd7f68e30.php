<?php $__env->startSection('content'); ?>
<div class="container-fluid app-body">
	<h3>History</h3>

	<div class="row">
		<div class="col-md-12">
			<div class="search">
				<div class="row">
					<div class="col-md-4">
						<form>
						  <div class="form-group">
							<label class="sr-only" for="exampleInputAmount"></label>
							<div class="input-group">
							  <div class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></div>
							  <input type="text" class="form-control" id="exampleInputAmount" placeholder="Search">
							</div>
						  </div>
						</form>
					</div>
					<div class="col-md-4">
						<form>
						  <div class="form-group">
							<label class="sr-only" for="exampleInputAmount"></label>
							<div class="input-group">
							  <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
							  <input type="text" class="form-control" id="datepicker" placeholder="Search">
							</div>
						  </div>
						</form>
					</div>
					<div class="col-md-4">
						<form>
							<div class="form-group">
								<label class="sr-only" for="exampleInputAmount"></label>
								<div class="input-group">
								  <select class="form-control">
									<option>All Groups</option>
									<?php $__currentLoopData = $allgroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								  </select>
								</div>
							</div>
						</form>
					</div>
				</div>
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
							</th>
							<th><?php echo e($history->post_text); ?></th>
							<th><?php echo e($history->sent_at); ?></th>
						</tr> 
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody> 
			</table>
			<div style="background-color:#cccccc;">
				<?php echo e($histories->links()); ?>

			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>