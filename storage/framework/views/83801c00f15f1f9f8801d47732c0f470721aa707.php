<?php $__env->startSection('section_title'); ?>
  <strong>Update Review</strong>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('section_body'); ?>

<form method="post" action="/admin/reviews/update/<?php echo e($r->id); ?>">
<?php echo csrf_field(); ?>


<div class="form-group">
<label><?php echo e(__('Review Rating')); ?></label>
<select name="rating">
   <option value="1" <?php if($r->rating == 1): ?> selected <?php endif; ?>>1 Star</option>
   <option value="2" <?php if($r->rating == 2): ?> selected <?php endif; ?>>2 Stars</option>
   <option value="3" <?php if($r->rating == 3): ?> selected <?php endif; ?>>3 Stars</option>
   <option value="4" <?php if($r->rating == 4): ?> selected <?php endif; ?>>4 Stars</option>
   <option value="5" <?php if($r->rating == 5): ?> selected <?php endif; ?>>5 Stars</option>
</select>
</div>

<div class="form-group">
<label><?php echo e(__('Review Title')); ?></label>
<input class="form-control" type="text" name="review_title" value="<?php echo e($r->review_title); ?>" required="required">
</div>
<div class="form-group">
<label><?php echo e(__( 'Description' )); ?></label>
<textarea class="form-control" style="height: 180px;" name="review_content" required="required"><?php echo e($r->review_content); ?></textarea>
</div>
<button type="submit" name="sbReview" class="btn btn-primary btn-block"><?php echo e(__('Update Review')); ?></button>

</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/crivion/Sites/reviews/resources/views/admin/edit-review.blade.php ENDPATH**/ ?>