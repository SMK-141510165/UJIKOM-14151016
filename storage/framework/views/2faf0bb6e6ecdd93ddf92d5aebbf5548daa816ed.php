<?php $__env->startSection('content'); ?>
 <br><br><br><br><br><br>
 <div class="right_col" role="main">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                  <?php if(!empty($errors->first())): ?>
                      <div class="alert alert-danger"><?php echo $errors->first(); ?></div>
                    <?php endif; ?>
                  </div>
                  <div class="x_title">
                    <center><h2>Edit Kategori Lembur</h2></center>
                  <div class="x_content">
                    <br />
    <?php echo Form::model($data,['method' => 'PATCH','route'=>['Kategori.update',$data->id],'class' => 'form-horizontal form-label-left']); ?>

     <div class="form-group">
    <div class="form-inline">
          <div class="control-label col-md-3 col-sm-3 col-xs-12">
              <?php echo Form::label('Kode Lembur ', 'Kode Lembur  '); ?>

          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
              <?php echo Form::number('Kode_lembur',null,['class'=>'form-control col-md-7 col-xs-12', 'readonly']); ?>&nbsp;&nbsp;
               <a title="Edit Kode Lembur" href="<?php echo e(route('Kategori2.edit',$data->id)); ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
          </div>
      </div>
      </div>
     <div class="form-group">
        <div class="control-label col-md-3 col-sm-3 col-xs-12">
            <?php echo Form::label('Jabatan', 'Jabatan '); ?>

             <span class="required">*</span>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control col-md-7 col-xs-12" name="jabatan_id">
            <option value="<?php echo e($jselect->id); ?>" selected><?php echo e($jselect->Nama_jabatan); ?></option>
            <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($data->id); ?>"><?php echo e($data->Nama_jabatan); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="control-label col-md-3 col-sm-3 col-xs-12">
            <?php echo Form::label('Golongan', 'Golongan '); ?>

             <span class="required">*</span>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control col-md-7 col-xs-12" name="golongan_id">
            <option value="<?php echo e($gselect->id); ?>" selected><?php echo e($gselect->Nama_golongan); ?></option>
            <?php $__currentLoopData = $gol; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($data->id); ?>"><?php echo e($data->Nama_golongan); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
      <div class="form-group">
          <div class="control-label col-md-3 col-sm-3 col-xs-12">
              <?php echo Form::label('Besaran Uang', 'Besaran Uang'); ?>

               <span class="required">*</span>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
              <?php echo Form::number('Besaran_uang',null,['class'=>'form-control col-md-7 col-xs-12']); ?>

          </div>
      </div>
      <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <?php echo Form::submit('Save', ['class' => 'btn btn-success form-control']); ?>

          </div>
      </div>
    </div>
    <?php echo Form::close(); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.penggajian', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>