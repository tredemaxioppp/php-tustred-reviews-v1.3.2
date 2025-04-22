<?php $__env->startSection( 'content' ); ?>

<div class="container card">
<form method="POST">
<?php echo e(csrf_field()); ?>


<label>License Key (<a href="https://codecanyon.net/downloads/" target="_blank">Get It</a>)</label>
<input type="text" name="license" placeholder="enter your license key" class="form-control">

<label>Domain</label>
<input type="text" name="domain" value="<?php echo e(URL::to('/')); ?>" class="form-control">
<br />

<input class="btn btn-lg btn-primary" type="submit" name="sb" value="Confirm"/>
</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make( 'base' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/crivion/Sites/reviews/resources/views/validate-license.blade.php ENDPATH**/ ?>