<?php $__env->startSection('content'); ?>
<!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <?php if(Auth::guest()): ?>
                    <img class="img-responsive" alt="" src="<?php echo e(url('penggajian/img/lock.png')); ?>">
                    <div class="intro-text">
                        <span class="name">SELAMAT DATANG</span>
                        <hr class="star-light">
                        <span class="skills">Anda Tidak Meiliki Hak Akses , Anda Harus Login/Registrasi Terlebih Dahulu!</span>
                    </div>
                    <?php else: ?>
                    <img class="img-responsive" alt="" src="<?php echo e(url('penggajian/img/profile.png')); ?>">
                    <div class="intro-text">
                        <span class="name">Lembur Pegawai</span>
                        <hr class="star-light">
                        <span class="skills"> <b><?php echo e(Auth::user()->name); ?></b> , Anda Memilih Lembur Pegawai</span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
<br>
	 <div class="right_col" role="main">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <?php if(Session::has('pesan_sukses')): ?>
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo e(Session::get('pesan_sukses')); ?>

                  </div>
                <?php elseif(Session::has('pesan_gagal')): ?>
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo e(Session::get('pesan_gagal')); ?>

                  </div>
                <?php endif; ?>
              </div>
  <div class="container">
 &nbsp;&nbsp;&nbsp;<a href="<?php echo e(url('Lembur/create')); ?>" class="btn btn-primary">Input Lembur Pegawai&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                    <center><h2>Daftar Lembur Pegawai</h2></center>
                    <hr>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th><p class="center"><center>No.</center></p></th>
                          <th><p class="center"><center>Kode Lembur</center></p></th>
                          <th><p class="center"><center>NIP</center></p></th>
                          <th><p class="center"><center>Pegawai</center></p></p></th>
                          <th><p class="center"><center>Jumlah Jam</center></p></p></th>
                          <th><p class="center"><center>Besaran Uang</center></p></p></th>
                          <th colspan="3"><p class="center"><center>Tindakan</center></p></th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php $no=1; ?>
                         <?php $__currentLoopData = $lembur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <tr>
                                 <th><center><?php echo e($no++); ?></center></th>
                                 <th><center><?php echo e($data->Kategori_lembur->Kode_lembur); ?></center></th>
                                 <th><center><?php echo e($data->Pegawai->Nip); ?></center></th>
                                 <th><center><?php echo e($data->Pegawai->User->name); ?></center></th>
                                 <th><center><?php echo e($data->Jumlah_jam); ?></center></th>
                                 <th><center><?php echo 'Rp.'. number_format($data->Kategori_lembur->Besaran_uang*$data->Jumlah_jam, 2,",","."); ?></center></th>
                                 <th><center><a title="Detail" href="<?php echo e(url('Lembur',$data->id)); ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a></center></th>
                                 <th><center><a title="Edit" href="<?php echo e(route('Lembur.edit',$data->id)); ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a></center></th>
                                 <th><center>
                                   <a data-toggle="modal" href="#delete<?php echo e($data->id); ?>" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                                  <?php echo $__env->make('modals.del', [
                                    'url' => route('Lembur.destroy', $data->id),
                                    'model' => $data
                                  ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></center>
                                 </th>
                             </tr>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.penggajian', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>