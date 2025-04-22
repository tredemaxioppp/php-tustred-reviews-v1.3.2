 

<?php $__env->startSection('content'); ?>
<div class="container card">
	<div class="col-6 mx-auto">
		<div class="jumbotron" style="font-size: 18px;">
		<div class="row">
			<div class="col-8">
				<h1><i class="far fa-check-circle"></i> <?php echo e(__('Thank you')); ?></h1>
				<div class="separator-3"></div>
			</div>
		</div>

		<?php echo e(__('Your company ownership should appear in your account')); ?> <span class="badge badge-warning"><?php echo e(__('maximum 2 hours')); ?></span> <?php echo e(__('from now')); ?>.
		<br><br>

		<?php echo sprintf(__('Go to %s My Account %s overview'), '<a href="'.route('myaccount').'" class="btn btn-primary btn-sm">', '</a>'); ?>

		</div><!-- /.well -->
	</div>
	<!-- .col-* -->
</div>
<!-- ./container add-paddings -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/crivion/Sites/reviews/resources/views/checkout/success.blade.php ENDPATH**/ ?>