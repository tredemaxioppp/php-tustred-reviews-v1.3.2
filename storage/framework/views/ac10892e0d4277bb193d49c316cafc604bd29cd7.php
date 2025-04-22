<?php $__env->startSection('section_title'); ?>
<strong>Ads Setup</strong>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section_body'); ?>

<form method="POST">
<?php echo csrf_field(); ?>

<div class="row">
	<div class="col-xs-12 col-md-8">
	<dl>
		<br>
		<dt>Sidebar Ads Code</dt>
		<dd>
			<textarea name="sideAd" rows="5" class="form-control"><?php echo Options::get_option( 'sideAd' ); ?></textarea>
		</dd>
		<dt>Homepage Ads Code</dt>
		<dd>
			<textarea name="homeAd" rows="5" class="form-control"><?php echo Options::get_option( 'homeAd' ); ?></textarea>
		</dd>
		<dt>Categories Ads Code</dt>
		<dd>
			<textarea name="catAd" rows="5" class="form-control"><?php echo Options::get_option( 'catAd' ); ?></textarea>
		</dd>
		<dt>&nbsp;</dt>
		<dd>
			<input type="submit" name="sb_settings" value="Save Ads" class="btn btn-primary">	
		</dd>
	</dl>
	</div>
</div>

</form>

</div><!-- ./row -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/crivion/Sites/reviews/resources/views/admin/ads.blade.php ENDPATH**/ ?>