<?php $__env->startSection('section_title'); ?>
	<strong>Users Overview</strong>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section_body'); ?>
<?php if($users): ?>
	<table class="table table-striped table-bordered table-responsive dataTable">
	<thead>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Email</th>
		<th>Date Joined</th>
		<th>Owner Of</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody>
		<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td>
				<?php echo $u->id; ?>

			</td>
			<td>
				<?php echo e($u->name); ?>

			</td>
			<td>
				<?php echo e($u->email); ?>

			</td>
			<td>
				<?php echo e($u->created_at); ?>

			</td>
			<td>
				<?php if( $u->company()->exists() ): ?>
					<?php echo e($u->company->business_name); ?><br>
					<a href="<?php echo e(route('reviewsForSite', ['site' => $u->company->url])); ?>">
						<?php echo e($u->company->url); ?>

					</a><br>
					<a href="<?php echo e(route('manuallyAssign.company', [ 'user' => $u ])); ?>">
						Manage Assignment
					</a>
				<?php else: ?>
					No Company Claimed<br>
					<a href="<?php echo e(route('manuallyAssign.company', [ 'user' => $u ])); ?>">
						Assign Company
					</a>
				<?php endif; ?>
			</td>
			<td>
				<a href="/admin/users/delete/<?php echo e($u->id); ?>" onclick="return confirm('Are you sure you want to remove this user?')">Delete</a>
			</td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
	</table>
<?php else: ?>
	No users in database.
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/crivion/Sites/reviews/resources/views/admin/users.blade.php ENDPATH**/ ?>