<?php $__env->startSection('content'); ?>
 <br><br><br><br><br><br>
 <div class="col-md-12 col-sm-12 col-xs-12">
                  <?php if(!empty($errors->first())): ?>
                      <div class="alert alert-danger"><?php echo $errors->first(); ?></div>
                    <?php endif; ?>
                  </div>
                  <div class="x_title">
                    <center><h2>Edit Data Tunjangan Pegawai</h2></center>
                  </div>
                    <br />
    <?php echo Form::model($data,['method' => 'PATCH','route'=>['TunjanganP.update',$data->id],'class' => 'form-horizontal form-label-left']); ?>

<div class="form-group">
        <div class="control-label col-md-3 col-sm-3 col-xs-12">
            <?php echo Form::label('Kode Tunjangan', 'Kode Tunjangan '); ?>

             <span class="required">*</span>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control col-md-7 col-xs-12" name="Kode_tunjangan_id">
             <option value="<?php echo e($tp_select->id); ?>" selected><?php echo e($tp_select->Kode_tunjangan); ?></option>
            <?php $__currentLoopData = $tp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($data->id); ?>"><?php echo e($data->Kode_tunjangan); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
      <div class="form-group">
          <div class="control-label col-md-3 col-sm-3 col-xs-12">
              <?php echo Form::label('Pegawai ', 'Pegawai '); ?>

               <span class="required">*</span>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control col-md-7 col-xs-12" name="pegawai_id">
            <option value="<?php echo e($pselect->id); ?>" selected><?php echo e($pselect->Nip); ?>| <?php echo e($pselect->User->name); ?></option>
            <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($data->id); ?>"><?php echo e($data->Nip); ?>&nbsp;|&nbsp;<?php echo e($data->User->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
      </div>
      <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <?php echo Form::submit('Save', ['class' => 'btn btn-success form-control']); ?>

          </div>
      </div>
    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.penggajian', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>