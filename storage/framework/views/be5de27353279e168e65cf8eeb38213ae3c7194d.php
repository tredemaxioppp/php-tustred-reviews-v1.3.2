<?php $__env->startSection('section_title'); ?>
<strong>Mail Configuration</strong>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section_body'); ?>

<form method="POST">
<?php echo csrf_field(); ?>

<div class="row">
	<div class="col-xs-12 col-md-8">
	<dl>
		<dt>Mail Driver</dt>
		<dd>
			<input type="radio" name="MAIL_DRIVER" value="mail" <?php if(env('MAIL_DRIVER', 'mail') == 'mail'): ?> checked <?php endif; ?>> Mail ( not recommended, up to your host quality to deliver )
			<input type="radio" name="MAIL_DRIVER" value="smtp" <?php if(env('MAIL_DRIVER', 'smtp') == 'smtp'): ?> checked <?php endif; ?>> SMTP ( strongly recommended )
		</dd>
		<br>
		<dt>SMTP Mail Server</dt>
		<dd>
			<input type="text" name="MAIL_HOST" value="<?php echo e(env('MAIL_HOST')); ?>" class="form-control" placeholder="smtp.example.com">
		</dd>
		<dt>SMTP Mail Port</dt>
		<dd>
			<input type="number" name="MAIL_PORT" value="<?php echo e(env('MAIL_PORT')); ?>" class="form-control" placeholder="465">
		</dd>
		<dt>SMTP Mail Username</dt>
		<dd>
			<input type="text" name="MAIL_USERNAME" value="<?php echo e(env('MAIL_USERNAME')); ?>" class="form-control" placeholder="you@example.com">
		</dd>
		<dt>SMTP Mail Password</dt>
		<dd>
			<input type="password" name="MAIL_PASSWORD" value="<?php echo e(env('MAIL_PASSWORD')); ?>" class="form-control">
		</dd>
		<dt>SMTP Mail Encryption</dt>
		<dd>
			<select class="form-control" name="MAIL_ENCRYPTION">
				<option value="null" <?php if(env( 'MAIL_ENCRYPTION' ) == 'null'): ?> selected <?php endif; ?>>None</option>
				<option value="ssl" <?php if(env( 'MAIL_ENCRYPTION' ) == 'ssl'): ?> selected <?php endif; ?>>SSL</option>
				<option value="tls" <?php if(env( 'MAIL_ENCRYPTION' ) == 'tls'): ?> selected <?php endif; ?>>TLS</option>
			</select>
		</dd>
		<dt>&nbsp;</dt>
		<dd>
			<input type="submit" name="sb_settings" value="Save Mail Settings" class="btn btn-primary">	
			<a href="/admin/mailtest" class="btn btn-warning">Send Test Email (use after hitting Save first)</a>
		</dd>
	</dl>
	</div>
</div>

</form>

</div><!-- ./row -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/crivion/Sites/reviews/resources/views/admin/mail-configuration.blade.php ENDPATH**/ ?>