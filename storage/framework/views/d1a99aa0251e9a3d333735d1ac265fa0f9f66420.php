

<?php $__env->startSection('content'); ?>
    <div class="clearfix container-fluid row">
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="card widget center">
                <div class="card-body">
                    <h3 class="card-title">Report daily task</h3>
                    <p class="card-text">Select Site, User, and date to export report daily task.</p>
                    <?php echo Form::open(['action' => 'App\Http\Controllers\Cdbcontroller@getreport', 'method' => 'GET']); ?>

                    <div class="form-group">
                        <?php echo e(Form::label('lang', 'Language:')); ?>                       
                        <?php echo e(Form::select('lang', ['en' => 'English', 'vi' =>  'Tiếng Việt'] , 'en', ['class' => 'form-control'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('selectsite', 'Sites:')); ?>                       
                        <?php echo e(Form::select('selectsite', $listsite->pluck('sitecode', 'id'), $listsite->pluck('sitecode'), ['class' => 'form-control'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('uname', 'User:')); ?>

                        <?php echo e(Form::text('uname', $uname, ['class' => 'form-control', 'readonly'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('fromdate', 'From:')); ?>

                        <?php echo e(Form::date('fromdate','',['class' => 'form-control', 'required'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('enddate', 'To:')); ?>

                        <?php echo e(Form::date('enddate','',['class' => 'form-control', 'required'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::submit('View report', ['class' => 'btn btn-primary'])); ?>

                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('voyager::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\Support Manage\resources\views/report-dashboard.blade.php ENDPATH**/ ?>