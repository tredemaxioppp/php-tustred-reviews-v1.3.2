<?php $__env->startSection( 'content' ); ?>
<div class="container">
<?php if( !empty( Options::get_option( 'homeAd' ) ) ): ?>
<div class="row">
<div class="col-xs-12">
    <?php echo Options::get_option( 'homeAd' ); ?>

    <br><br>
</div><!-- /.col-xs-12 -->
</div><!-- /.row -->
<?php endif; ?>
<div class="row">

<?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

    <div class="col-md-4 margin-bottom-25">
        <div class="card">
            <p class="text-warning">
                <?php echo str_repeat('<i class="fa fa-star"></i>', $r->rating); ?>

                <span class="text-muted">
                    <?php echo e(number_format($r->rating,2)); ?>/5.00
                </span>
            </p>
            <div class="row">
            <div class="col-4 col-md-3">
                <img src="<?php echo e($r->user->profileThumb); ?>" alt="profile pic" class="img-fluid rounded-circle shadow">
            </div><!-- /.col-xs-6 col-md-1 -->
            <div class="col-8 col-md-8 text-muted">
                <strong><?php echo e($r->reviewer); ?></strong> <?php echo e(__('reviewed')); ?><br>

                <a href="<?php echo e($r->site->slug); ?>"><?php echo e($r->site->url); ?></a>
            </div><!-- /.col-xs-6 col-md-11 -->
            </div><!-- /.row -->
            <br>
            <p class="text-bold">"<?php echo e($r->review_title); ?>"</p>
            <p><?php echo e(substr( $r->review_content, 0, 99 )); ?>...</p>
            <p class="justify-content-between">
                <span class="text-muted float-left">
                    <?php echo e($r->timeAgo); ?>

                </span>
                <a href="<?php echo e($r->site->slug); ?>" class="btn btn-sm inline btn-success float-right">
                    &raquo; <?php echo e(__('Read Review')); ?>

                </a>
            </p>
            <!-- /.btn btn-xs btn-success -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col-md-3 -->
    
<!-- /.container -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <h1 class="text-center">
      <span class="badge badge-warning">
          <?php echo e(__('No reviews yet :(')); ?>

      </span>
      <!-- /.badge badge-warning -->
    </h1>
<?php endif; ?>
    
</div>
<!-- /.row -->
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make( 'base' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/crivion/Sites/reviews/resources/views/home.blade.php ENDPATH**/ ?>