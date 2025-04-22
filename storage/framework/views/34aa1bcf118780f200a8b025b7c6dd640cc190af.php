<?php $__env->startSection('section_title'); ?>
<strong>Bulk Import</strong>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section_body'); ?>

<form method="POST" enctype="multipart/form-data" action="/admin/bulk-import">
<?php echo csrf_field(); ?>


<pre>
CSV File Format:
url, business name, latitude, longitude, location, category
</pre>

<input type="file" name="csv_file" class="form-control" required="required">
<input type="submit" name="sb_csv" value="Start Bulk Import" class="btn btn-primary">

</form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/crivion/Sites/reviews/resources/views/admin/bulk-import.blade.php ENDPATH**/ ?>