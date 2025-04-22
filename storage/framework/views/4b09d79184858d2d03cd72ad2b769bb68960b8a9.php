<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="author" content="crivion">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <title><?php if(isset($seo_title)): ?> <?php echo e($seo_title); ?> <?php else: ?> <?php echo e(Options::get_option( 'seo_title', 'PHP Trusted Reviews' )); ?> <?php endif; ?></title>

    <?php if( $d = Options::get_option( 'seo_desc' ) ): ?>
    <meta name="description" content="<?php echo e($d); ?>" />
    <?php endif; ?>

    <?php if( $k = Options::get_option( 'seo_keys' ) ): ?>
    <meta name="keywords" content="<?php echo e($k); ?>" />
    <?php endif; ?>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('css/cookieconsent.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/sweetalert.css')); ?>" rel="stylesheet">

    <!-- Bootstrap Select CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
  
    <!-- extra CSS loaded by other views -->
    <?php echo $__env->yieldContent( 'extraCSS' ); ?>

    <?php if( Options::get_option( 'extra_js' ) ): ?>
        <?php echo Options::get_option( 'extra_js' ); ?>

    <?php endif; ?>

  </head>

  <body>
    <?php echo $__env->make( 'partials/navi' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main role="main">
        
     <?php if( 'home' == Route::currentRouteName() ): ?>
      <?php echo $__env->make( 'partials/home-header' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <?php else: ?>
      <?php echo $__env->make( 'partials/inner-header' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <?php endif; ?>

    <?php echo $__env->yieldContent( 'content' ); ?>
    
    </main>
    
    <br/>
    <?php echo $__env->make( 'partials/footer' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>

    <!-- jQuery Lib -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Twitter Bootstrap 4 Lib -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <!-- BS Select JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>

    <!-- Stripe JS SDK -->
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
    <script type="text/javascript">
      Stripe.setPublishableKey('<?php echo e(Options::get_option('STRIPE_PUBLISHABLE_KEY')); ?>');
    </script>

    <!-- App JS -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

	<?php echo $__env->make('sweet::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php echo Options::get_option( 'siteAnalytics' ); ?>


    <!-- extra JS loaded by other views -->
    <?php echo $__env->yieldContent( 'extraJS' ); ?>

    <script src="<?php echo e(asset( 'js/cookieconsent.min.js' )); ?>"></script>
    <script>
        window.cookieconsent.initialise({
          "palette": {
            "popup": {
              "background": "#edeff5",
              "text": "#838391"
            },
            "button": {
              "background": "#4b81e8"
            }
          },
          "content": {
            "message": "<?php echo e(__("This website uses cookies for a better experience.")); ?>",
            "dismiss": "<?php echo e(__("Ok, I understand")); ?>",
            "link": "<?php echo e(__("Privacy Policy")); ?>",
            "href": "<?php echo e(__("/p-privacy-policy")); ?>",
          }
        });
    </script>

  </body>
</html><?php /**PATH /Users/crivion/Sites/reviews/resources/views/base.blade.php ENDPATH**/ ?>