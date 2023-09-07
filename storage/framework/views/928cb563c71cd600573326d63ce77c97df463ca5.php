
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    <?php include(public_path().'/assets/bootstrap3/css/bootstrap.min.css');?>
    <?php include(public_path().'/assets/css/report.css');?>    
</style>

<div class="container">
    <div class="row mt-3">
        <div class="col-xs-2" align="left">
            <img src="<?php echo e(Voyager::image(setting('site.vtoc-logo'))); ?>" alt="logo-vtoc">
            
        </div>
        <div class="col-xs-10" align="right">
            <h3><?php echo e($datasum['companyname']); ?></h3>            
            <ul class="list-unstyled">
                <li><?php echo e($datasum['address']); ?></li>
                <li>(84) 935 795 179 - (84) 905 396 336</li>
                <li>info@vtoc.vn</li>
            </ul>
        </div>        
    </div>
    <div class="mt-3" align="center">
        <h3><?php echo e($datasum['title']); ?></h3>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <ul class="list-unstyled">
                <li><?php echo e($datasum['customer']); ?>: <?php echo e($datasum['sitename']); ?></li>
                <li><?php echo e($datasum['staff']); ?>: <?php echo e($datasum['uname']); ?></li>
            </ul>
        </div>
        <div class="col-xs-6" align="right">
            <ul class="list-unstyled">
                <li>Report: IT Support Daily Report</li>
                <li><?php echo e($datasum['from']); ?>: <?php echo e(date('d-m-Y', strtotime($datasum['fromdate']))); ?> <?php echo e($datasum['to']); ?> <?php echo e(date('d-m-Y', strtotime($datasum['enddate']))); ?></li>
            </ul>
        </div>
    </div>
    <table class="table table-bordered ">        
        <thead class="thead-dark">
            <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center"><?php echo e($datasum['col1']); ?></th>
            <th scope="col"><?php echo e($datasum['col2']); ?></th>
            <th scope="col" class="text-center"><?php echo e($datasum['col3']); ?></th>
            <th scope="col" class="text-center"><?php echo e($datasum['col4']); ?></th>
            <th scope="col" class="text-center"><?php echo e($datasum['col5']); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $dataTypeContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th class="text-center vertical" scope="row"><?php echo e($row->id); ?></th>
                    <td class="text-center vertical"><?php echo e(date('d-m-Y', strtotime($row->date))); ?> </td>
                    <td>
                        <strong><?php echo e($row->subject); ?></strong>
                        <ul class="list-unstyled task-detail">
                            <li><?php echo html_entity_decode($row->detail); ?></li>
                        </ul>
                    </td>
                    <td class="text-center vertical"><?php echo e($row->typename); ?></td>
                    <td class="text-center vertical"><?php echo e($row->requestname); ?></td>
                    <td class="text-center vertical">
                        <span class="badge badge-lg" style="background-color: <?php echo e($row->color); ?>">
                            <?php echo e($row->status); ?>

                        </span>
                        <br>
                        <?php echo e($row->timestart); ?> - <?php echo e($row->timeend); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="row mt-3">
        <div class="col-xs-8" align="left">
            <ul class="list-unstyled">
                <li><?php echo e($datasum['partya']); ?>: <?php echo e($datasum['sitename']); ?></li>
                <li><?php echo e($datasum['datetime']); ?>:</li>
            </ul>
        </div>
        <div class="col-xs-4" align="left">
            <ul class="list-unstyled">
                <li><?php echo e($datasum['partyb']); ?>: <?php echo e($datasum['companyname']); ?></li>
                <li><?php echo e($datasum['represented']); ?>: <?php echo e($datasum['uname']); ?></li>
                <li><?php echo e($datasum['datetime']); ?>:</li>
            </ul>
            
        </div>       
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\Support Manage\resources\views/report.blade.php ENDPATH**/ ?>