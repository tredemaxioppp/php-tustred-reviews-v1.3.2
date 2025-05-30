<?php if( is_null( auth()->user()->email_verified_at )): ?>
<div class="alert alert-danger">
<?php echo e(__( 'Please verify your email address before being able to post a review.' )); ?>

</div><!-- /.alert alert-info -->
<?php else: ?>
<div style="display:none" class="card review-form-toggle">
<div class="star-source">
  <svg>
    <symbol id="star" viewBox="153 89 106 108">   
      <polygon id="star-shape" stroke="url(#grad)" stroke-width="5" fill="currentColor" points="206 162.5 176.610737 185.45085 189.356511 150.407797 158.447174 129.54915 195.713758 130.842203 206 95 216.286242 130.842203 253.552826 129.54915 222.643489 150.407797 235.389263 185.45085"></polygon>
    </symbol>
</svg>
</div><!-- ./star-source -->

<form method="post" action="<?php echo e(route('takeReview', [ 'site' => $review ])); ?>">
<?php echo csrf_field(); ?>

 <input type="hidden" name="rating">
 <div class="star-container">
  <input type="radio" name="star" id="five">
  <label for="five">
    <svg class="star" data-no="five" data-rating="5" data-toggle="modal" data-target="#review-modal">
      <use xlink:href="#star"/>
    </svg>
    <div class="text-star text-star-five">
    <?php echo e(__('Great')); ?>

   </div>
  </label>
  <input type="radio" name="star" id="four">
  <label for="four">
    <svg class="star" data-toggle="modal" data-target="#review-modal" data-rating="4" data-no="four">
      <use xlink:href="#star"/>
    </svg>
    <div class="text-star text-star-four">
    <?php echo e(__('Good')); ?>

   </div>
  </label>
  <input type="radio" name="star" id="three">
  <label for="three">
    <svg class="star" data-toggle="modal" data-target="#form-modal" data-no="three" data-rating="3">
      <use xlink:href="#star"/>
    </svg>
    <div class="text-star text-star-three">
    <?php echo e(__('Okay')); ?>

   </div>
  </label>
  <input type="radio" name="star" id="two">
  <label for="two">
    <svg class="star" data-toggle="modal" data-target="#form-modal" data-no="two" data-rating="2">
      <use xlink:href="#star" />
    </svg>
    <div class="text-star text-star-two">
    <?php echo e(__('Subpar')); ?>

   </div>
  </label>
  <input type="radio" name="star" id="one">
  <label for="one">
   <svg class="star" data-toggle="modal" data-target="#form-modal" data-no="one" data-rating="1">
    <use xlink:href="#star" />
   </svg>
   <div class="text-star text-star-one">
    <?php echo e(__('Bad')); ?>

   </div>
  </label>
</div><!-- ./star-container -->

<div class="form-group">
<label><?php echo e(__('Review Title')); ?></label>
<input class="form-control" type="text" placeholder="<?php echo e(__('ie. Very good company')); ?>" name="review_title" value="<?php echo e(old('review_title')); ?>" required="required">
</div>
<div class="form-group">
<label><?php echo e(__( 'Description' )); ?></label>
<textarea class="form-control" style="height: 180px;" name="review_content" placeholder="<?php echo e(__('Let others know about your experience with this company')); ?>" required="required"><?php echo e(old( 'review_content' )); ?></textarea>
</div>
<button type="submit" name="sbReview" class="btn btn-primary btn-block"><?php echo e(__('Post Review')); ?></button>

</form>
</div>
<?php endif; ?><?php /**PATH /Users/crivion/Sites/reviews/resources/views/components/review-form.blade.php ENDPATH**/ ?>