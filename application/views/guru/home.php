<?php 
$titie = "Dashh";
$jumlah_siswa = $this->db->get('tb_siswa')->num_rows();

?>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo $jumlah_siswa ?></h3>
                <p>Jumlah Siswa</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
        </div>
    </div><!-- ./col -->
</div><!-- /.row -->

<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <!-- INFORMASI -->
        <div class="box box-primary">
            <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">SiPKL SMKN 4 MALANG</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <ul class="todo-list">
                    <li>
                        <!-- drag handle -->
                        <span class="handle">
                            <i class="fa fa-ellipsis-v"></i>
                        </span>
                        <!-- todo text -->
                        <span class="text">Selamat Datang Di Menu Guru SiPKL SMKN 4 MALANG</span>
                    </li>
                    <br>
                    <text>
                        <?php echo date("d F Y") ?>
                    </text>
                </ul>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section><!-- /.Left col -->
</div><!-- /.row (main row) -->