<?php $__env->startSection( 'content' ); ?>

    <?php if( session()->has( 'admin' ) AND $review->publish == 'No' ): ?>
    <div class="alert alert-danger text-center">
        <?php echo e(__('Only admin can see this preview listing.')); ?>

    </div><!-- /.alert alert-danger -->
    <?php endif; ?>

    <div class="container-fluid card inner-site-header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="<?php echo e($review->screenshot); ?>" alt="" class="img-responsive" style="max-width: 100%;">
                </div>
                <div class="col-md-5">
                    <h2><?php echo e($review->business_name); ?></h2>
                    <h4 class="text-muted"><?php echo e($review->reviews()->wherePublish('Yes')->count()); ?> <?php echo e(__('reviews')); ?></h4>
                    <h2 class="text-warning">
                      <?php echo str_repeat('<i class="fa fa-star"></i>', $review->reviews()->wherePublish('Yes')->avg('rating')); ?>

                        <span class="badge badge-light">
                          <?php echo e(number_format($review->reviews()->wherePublish('Yes')->avg('rating'),2)); ?>/5.00
            </span>
                    </h2>
                </div>
                <!-- /.col-md-5 -->
                <div class="col-md-4">
                    <div class="bordered-rounded">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a class="list-group-item" href="http://<?php echo e($review->url); ?>" target="_blank"
                                   rel="nofollow">
                                    <h4>
                                        <i class="fas fa-external-link-alt"></i> <?php echo e($review->url); ?>

                                    </h4>
                                    <?php echo e(__('Visit Website')); ?>

                                </a>
                            </li>
                            <li class="list-group-item">
                                <?php if($review->claimedBy): ?>
                                    <a class="list-group-item" href="#0" data-toggle="tooltip"
                                       title="<?php echo e(__('This company was claimed and manages reviews on our site')); ?>">
                                        <h4><i class="far fa-check-square"></i> <?php echo e(__('Claimed')); ?></h4>
                                        <?php echo e(__('Company Claimed')); ?>

                                    </a>
                                <?php else: ?>
                                    <a class="list-group-item" href="<?php echo e(route('companiesPlans')); ?>?company=<?php echo e($review->url); ?>" data-toggle="tooltip" title="<?php echo e(__('If you own or manage this company, you can claim it by verifying the ownership.')); ?>">
                                        <h4><i class="far fa-question-circle"></i> <?php echo e(__('Unclaimed')); ?></h4>
                                        <?php echo e(__('Claim this company')); ?>

                                    </a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div><!-- /.bordered-rounded -->
                </div>
                <!-- /.col-md-9 -->
                <!-- /.col-md-3 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div><!-- /.container -->

    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                
                <?php if( !$alreadyReviewed ): ?>
                <a href="javascript:void(0);" class="btn btn-primary btn-block btn-toggle-review-form">
                    <?php echo e(__('Leave a review')); ?> <i class="fa fa-arrow-down"></i>
                </a>
                <?php endif; ?>
                
                <?php if( auth()->guest() ): ?>
                <div class="card">
                    <div style="display: inline;">
                        <?php echo e(__( 'Please' )); ?> 
                        <a href="<?php echo e(route('login')); ?>?return=<?php echo e(url()->current()); ?>" style="text-decoration: underline">
                            <?php echo e(__( 'Login' )); ?>

                        </a> or 
                        <a href="<?php echo e(route('register')); ?>?return=<?php echo e(url()->current()); ?>" style="text-decoration: underline;">
                            <?php echo e(__( 'Signup' )); ?>

                        </a> <?php echo e(__('to leave feedback')); ?>

                    </div>
                    </div>
                <?php else: ?>
                    <?php if( $alreadyReviewed ): ?>
                        <div class="alert alert-secondary">
                        <?php echo e(__('You already reviewed this company. You can update your rating in your user panel')); ?>.
                    </div>
                    <?php else: ?>
                        <?php echo $__env->make( 'components/review-form' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                <?php endif; ?>
                <div style="clear:both;height: 10px;"></div>

        <br>
                
                <!-- /.row -->
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card">

                    <div class="row">
                    <div class="col-md-2 col-3 text-center">
                        <img src="<?php echo e($r->user->profileThumb); ?>" alt="profile pic" class="img-fluid rounded-circle shadow">
                        <p class="text-muted">
                            <strong><?php echo e($r->reviewer); ?></strong>
                            <br>
                            <span class="badge badge-light">
                                <?php echo e($r->timeAgo); ?>

                            </span>
                        </p>
                    </div><!-- /.col-md-2 col-4 -->
                    
                    <div class="col-md-10 col-9">
                        <p class="text-warning">
                            <?php echo str_repeat('<i class="fa fa-star"></i>', $r->rating); ?>

                            <span class="text-muted">
                                <?php echo e(number_format($r->rating,2)); ?>/5.00
                            </span>
                        </p>
                        

                        <p class="text-bold">"<?php echo e($r->review_title); ?>"</p>
                        <p>
                            <?php echo nl2br(e($r->review_content)); ?>

                        </p>
                        <p class="text-right">
                            <?php if( $r->votes()->where('ip', request()->ip())->exists() ): ?>
                                <small class="text-secondary"><?php echo e(__('You already upvoted')); ?></small>
                            <?php else: ?>
                                <a href="javascript:void(0);" class="text-success upvote no-hover" data-review="<?php echo e($r->id); ?>">
                                    <i class="fas fa-thumbs-up"></i> <span class="upvotes" data-review="<?php echo e($r->id); ?>"><?php echo e($r->votes_count); ?></span>
                                </a>
                            <?php endif; ?>
                        </p>
                        <!-- /.btn btn-xs btn-success -->
                        <?php if( !is_null($review->claimedBy) AND auth()->check() AND $review->claimedBy == auth()->user()->id AND is_null($r->company_reply) ): ?>
                            <hr>
                            <a href="javascript:void(0);" class="btn btn-danger btn-reply" data-id="<?php echo e($r->id); ?>"><?php echo e(__('Reply as company')); ?></a>
                            
                            <form method="POST" name="replyAsCompany<?php echo e($r->id); ?>" style="display:none;" action="<?php echo e(route('replyAsCompany', ['review' => $r])); ?>">
                                <?php echo csrf_field(); ?> 
                                <textarea name="replyTo_<?php echo e($r->id); ?>" class="form-control" rows="5" placeholder="<?php echo e(__('ie. Thank you for sharing your thoughts')); ?>"></textarea>
                                <input type="submit" name="sbReplyAsCompany<?php echo e($r->id); ?>" class="btn btn-block btn-primary" value="<?php echo e(__('Send Reply')); ?>">
                            </form>
                        <?php endif; ?>
                        <?php if( !is_null( $r->company_reply ) ): ?>
                        <hr>
                        <h6 class="text-warning text-bold"><?php echo e(__( 'Company Reply' )); ?></h6>
                        <?php echo e($r->company_reply); ?>

                        <?php endif; ?>

                        </div><!-- /.col-md-10 col-8 -->
                        </div><!--./ row -->

                    </div>
                    <!-- /.card -->
                    <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php echo e($reviews->links()); ?>

            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
                <?php if( $review->claimedBy ): ?>
                <div class="card">
                    <img src="<?php echo e(asset('images/premium-badge.svg')); ?>" alt="premium badge" height="50"> 
                    <h5 class="text-center"><?php echo e(__( 'Premium Company' )); ?></h5>
                </div><!-- /.card -->
                <br>
                <?php endif; ?>

                <div class="card">

                    <h3><?php echo e(__( 'Embed Badge' )); ?></h3>
                    
                    <iframe src="<?php echo e(route('embeddedScore', ['site' => $review])); ?>" frameborder="0" width="250" height="150" scrolling="no"/></iframe>
                    
                    <small>
                    <?php echo e(__( 'Add to your site' )); ?>

                    <textarea class="form-control" rows="5"><iframe src="<?php echo e(route('embeddedScore', ['site' => $review])); ?>" frameborder="0" width="250" height="150" scrolling="no"/></iframe></textarea>
                    </small>
                </div><!-- /.card -->
                <br>

                <div class="card">
                    <h3><?php echo e($review->business_name); ?></h3>
                    <?php if( isset( $review->metadata ) && isset( $review->metadata[ 'description' ] )): ?>
                        <?php echo e($review->metadata[ 'description' ]); ?>

                    <?php else: ?>
                        <?php echo e(__('No description about this company yet. If you are the owner or manage this company you can claim it and add a short description.')); ?>

                    <?php endif; ?>
                </div>
                <!-- /.card -->
                <?php if($review->location): ?>
                <br>
                <div class="card">
                    <h3><?php echo e(__('Location')); ?></h3>
                    <p><i class="fa fa-globe"></i> <?php echo e($review->location); ?></p>
                    <!-- /.fa fa-globe -->
                </div>
                <!-- /.card -->
                <?php endif; ?>
                <br>
                <?php if(is_null($review->claimedBy)): ?>
                <div class="card">
                    <h3><?php echo e(__('Sidebar Ads')); ?></h3>
                    <?php echo Options::get_option( 'sideAd' ); ?>

                    <!-- /.fa fa-globe -->
                </div>
                <?php endif; ?>
            </div>
            <!-- /.col-md-3 -->
            <!-- /.col-md-1 -->
        </div>
    </div>
    <!-- /.container -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection( 'extraCSS' ); ?>
<?php if( $review->reviews->count() ): ?>
<script type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "LocalBusiness",
    "image": "<?php echo e($review->screenshot); ?>",
    "name": "<?php echo e($review->url); ?>",
    "description": "<?php echo e($review->business_name); ?> collection of reviews",
    "address": "<?php echo e($review->location); ?>",
    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": "<?php echo e($review->reviews->avg('rating')); ?>",
      "bestRating": "5",
      "worstRating": "1",
      "ratingCount": "<?php echo e($review->reviews->count()); ?>"
    }
  }
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extraJS'); ?>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        jQuery(document).ready(function($) {

            // handle upvoting
            $( '.upvote' ).click( function() {

                var review = parseInt($( this ).data( 'review' ));

                $.getJSON( '<?php echo e(route('vote', ['review' => '/'])); ?>/' + review, function( r ) {

                    if (r.hasOwnProperty('error')) {
                        var oopsMsg = '<?php echo e(__("Oops...")); ?>';
                        sweetAlert(oopsMsg, r.error, "error");
                    }else{
                        $( 'span.upvotes[data-review="' + review +'"]' ).html( r.upvotes );
                    }

                });
                
            });
    
            // handle text when hovering stars!
            $( '.star' ).hover( function() {

                // define which star was clicked
                var dataNo = $( this ).data( 'no' );

                // hide all other texts
                $( '.text-star' ).hide();

                // reveal text under hovered star
                $( '.text-star-' + dataNo ).show();

            }, 
            function() {

            });

            // add rating value into the form input
            $( '.star' ).click( function() {

                var rating = $( this ).data( 'rating' );
                
                $( "input[name=rating]" ).val( rating );

                console.log( 'Rating Chosen: ' + rating );

            });

            $( '.btn-toggle-review-form' ).click( function() {

                $( '.review-form-toggle' ).toggle();

            });

            $( '.btn-reply' ).click( function() {
                var replyID = $( this ).data( 'id' );
                $(this).hide();
                
                var replyForm = $("form[name=replyAsCompany" + replyID + "]");
                replyForm.show();



            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make( 'base' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/crivion/Sites/reviews/resources/views/review-single.blade.php ENDPATH**/ ?>