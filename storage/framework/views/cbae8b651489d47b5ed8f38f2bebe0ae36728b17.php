<?php $__env->startSection('content'); ?>

<br><br><br><br><br><br><br>
  <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                  <?php if(!empty($errors->first())): ?>
                      <div class="alert alert-danger"><?php echo $errors->first(); ?></div>
                    <?php endif; ?>
                  </div>
                    <center><h2>Input Penggajian</h2></center>
                    <br />
              <?php echo Form::open(['url' => 'Penggajians', 'class' => 'form-horizontal form-label-left']); ?>

    <div class="form-group">
        <div class="control-label col-md-3 col-sm-3 col-xs-12">
            <?php echo Form::label('Pegawai', 'Pegawai '); ?>

             <span class="required">*</span>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control col-md-7 col-xs-12" name="tunjangan_pegawai_id">
            <option>--NIP | Nama Pegawai--</option>
            <?php $__currentLoopData = $gaji; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($data->id); ?>"><?php echo e($data->Pegawai->Nip); ?>&nbsp;|&nbsp;<?php echo e($data->Pegawai->User->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
    <div class="form-group">
          <div class="control-label col-md-3 col-sm-3 col-xs-12">
              <?php echo Form::label('Tanggal Pengambilan', 'Tanggal Pengambilan '); ?>

               <span class="required">*</span>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
              <?php echo Form::date('Tanggal_pengambilan',null,['class'=>'form-control col-md-7 col-xs-12']); ?>

          </div>
      </div>
    <div class="form-group">
          <div class="control-label col-md-3 col-sm-3 col-xs-12">
              <?php echo Form::label('Petugas Penerima', 'Petugas Penerima'); ?>

               <span class="required">*</span>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
              <?php echo Form::text('Petugas_penerima',null,['class'=>'form-control col-md-7 col-xs-12']); ?>

          </div>
      </div>
       <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <?php echo Form::submit('Save', ['class' => 'btn btn-success form-control']); ?>

          </div>
      </div>
    </div>
    <?php echo Form::close(); ?>

          </div>
          </div>     
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.penggajian', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>