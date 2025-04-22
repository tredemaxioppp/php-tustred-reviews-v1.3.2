<?php $__env->startSection( 'content' ); ?>

<div class="container">
<div class="row">
<div class="col-10 mx-auto">
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route( 'myaccount' )); ?>"><?php echo e(__('My Reviews')); ?></a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route( 'myprofile' )); ?>"><?php echo e(__('My Profile')); ?></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route( 'mycompany' )); ?>"><?php echo e(__('My Company')); ?></a>
  </li>

  <li class="nav-item">
    <a class="nav-link active" href="<?php echo e(route( 'mybilling' )); ?>"><?php echo e(__('My Billing')); ?></a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route( 'logout' )); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><?php echo e(__('Log Out')); ?></a>
  </li>
</ul>
</div><!-- /.col-10 card -->

<div class="col-10 mx-auto">
<div class="card">
<h2><?php echo e(__('My Billing')); ?></h2>
<hr>

<table class="table table-bordered">
  <thead>
    <tr>
      <th><?php echo e(__('ID')); ?></th>
      <th><?php echo e(__('Company')); ?></th>
      <th><?php echo e(__('Plan')); ?></th>
      <th><?php echo e(__('Price')); ?></th>
      <th><?php echo e(__('Start Date')); ?></th>
      <th><?php echo e(__('Status')); ?></th>
    </tr> 
  </thead>
  <tbody>
    <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e(str_replace('sub_', '', $s->subscription_id)); ?></td>
      <td>
        <?php echo e($s->site->business_name); ?><br>
        <a href="<?php echo e(route('reviewsForSite', ['site'=> $s->site->url])); ?>">
          <?php echo e($s->site->url); ?>

        </a>
      </td>
      <td><?php echo e(ucfirst( $s->plan )); ?></td>
      <td><?php echo e(Options::get_option( 'currency_symbol' ) . $s->subscription_price); ?></td>
      <td><?php echo e(date('jS F Y', $s->subscription_date)); ?></td>
      <td>
          <?php echo e($s->subscription_status); ?><br>
          <?php if( 'Active' == $s->subscription_status ): ?>
          <small>
            <a class="text-danger" href="<?php echo e(route('subscriptionCancel', [ 'id' => $s->id ])); ?>" onclick="return confirm('<?php echo e(__('Are you sure you want to cancel the subscription plan')); ?>?')">
              <?php echo e(__('Cancel')); ?>

            </a>
          </small>
          <?php endif; ?>
      </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table><!-- /.table table-bordered -->


</div><!-- /.card -->
</div><!-- /.col-10 -->


</div><!-- /.container -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make( 'base' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/crivion/Sites/reviews/resources/views/account/my-billing.blade.php ENDPATH**/ ?>