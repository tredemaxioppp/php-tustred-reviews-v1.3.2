<?php $__env->startSection('section_title'); ?>
	<strong>Earnings Past 30 Days (charged from new plans)</strong>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra_top'); ?>
<div class="row">
<div class="col-lg-2 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-yellow">
    <div class="inner">
      <h3><?php echo e(number_format($figures[ 'companies' ], 0)); ?></h3>
      <p>Total Companies In Database</p>
    </div>
    <div class="icon">
      <i class="ion ion-pie-graph"></i>
    </div>
  </div>
</div><!-- total companies -->

<div class="col-lg-2 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-aqua">
    <div class="inner">
      <h3><?php echo e(number_format($figures[ 'reviews' ], 0)); ?></h3>
      <p>Total Reviews In Database</p>
    </div>
    <div class="icon">
      <i class="fa fa-shopping-cart"></i>
    </div>
  </div>
</div><!-- total reviews -->

<div class="col-lg-2 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-olive">
    <div class="inner">
      <h3><?php echo e($monthlyPlans); ?></h3>
      <p>Monthly Subscriptions</p>
    </div>
    <div class="icon">
      <i class="fa fa-money"></i>
    </div>
  </div>
</div>
<div class="col-lg-2 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-maroon">
    <div class="inner">
      <h3><?php echo e($halfYearPlans); ?></h3>
      <p>6 Months Subscriptions</p>
    </div>
    <div class="icon">
      <i class="fa fa-money"></i>
    </div>
  </div>
</div>
<div class="col-lg-2 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-red">
    <div class="inner">
      <h3><?php echo e($yearlyPlans); ?></h3>
      <p>Yearly Subscriptions</p>
    </div>
    <div class="icon">
      <i class="fa fa-money"></i>
    </div>
  </div>
</div>

</div>

<div class="row">
<div class="col-xs-12">
<div style="background: white;">
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Earnings From Monthly Plans</th>
      <th>Earnings From 6 Months Plans</th>
      <th>Earnings From Yearly Plans</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo e(Options::get_option('currency_symbol')); ?> 
          <?php echo e($monthlyPlans*Options::get_option( 'monthlyPrice' )); ?></td>
      <td><?php echo e(Options::get_option('currency_symbol')); ?> 
          <?php echo e($halfYearPlans*Options::get_option( '6monthsPrice' )); ?></td>
      <td><?php echo e(Options::get_option('currency_symbol')); ?> 
          <?php echo e($yearlyPlans*Options::get_option( 'yearlyPrice' )); ?></td>
    </tr>
  </tbody>
</table><!-- /.table table-bordered -->
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section_body'); ?>

<?php if( !$days->count() ): ?>
No new users signed up for a company plan in the past 30 days
<?php endif; ?>

<div class="chart-responsive">
<div class="chart" id="past-30-days" style="height: 300px;"></div>

<script>
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'past-30-days',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    <?php if( $days ): ?>
      <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $earnings => $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      { date: '<?php echo e($date); ?>', value: <?php echo e($earnings); ?> },
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
      { date: '<?php echo e(date( 'jS F Y' )); ?>', value: 0 }
    <?php endif; ?>
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'date',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Earnings']
});
</script>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/crivion/Sites/reviews/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>