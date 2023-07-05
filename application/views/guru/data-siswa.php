<?php 
$userdata = $this->session->userdata('userdata');
if($this->input->get('nama_siswa')){
    $search = $this->input->get('nama_siswa');
}else{
    $search = '';
}


//query mengambil semua data siswa
if($this->input->get('nama_siswa')){
    $this->db->like('siswa_nama', $this->input->get('nama_siswa'));
}
$getsiswa = $this->db->get('tb_siswa');
?>

<?php if(!empty($this->session->flashdata('message'))){ ?>
    <!-- Message Success -->
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('message'); ?>
    </div>
<?php }elseif(!empty($this->session->flashdata('error_message'))){ ?>
    <!-- Message Failed -->
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('message'); ?>
    </div>
<?php } ?>
<?php echo validation_errors('<pre>', '</pre>') ?>
<div class="box box-primary">
    <div class="box-header">
        <h2 style="margin-top: 0px;">Data Siswa</h2>
        <div class="row">
            <div class="col-md-8"> 
                <?php if($this->session->userdata('userdata')['level'] == 2){ ?>
                <a href="<?php echo base_url('Guru/view/tambah-siswa') ?>" class="btn btn-primary">
                    Tambah Siswa <i class="fa fa-plus"></i>
                </a>
                <?php } ?>
            </div>
            <div class="col-md-4 text-right">
                <form action="" method="get">
                    <div class="input-group">
                        <input type="search" value="<?php echo $search ?>" name="nama_siswa" placeholder="Cari nama siswa" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-primary">CARI</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="box-body">
        <button style="margin-top: 10px;" class="btn btn-sm btn-primary">Jumlah Siswa <?php echo $getsiswa->num_rows() ?></button>
        <a style="margin-top: 10px;" href="<?php echo base_url('Export_excel/export_data_siswa') ?>" class="btn btn-sm btn-success">Export</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="7%">#</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Telepon</th>
                    <th>Alamat Siswa</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat Perusahaan</th>
                    <th>Surat Permohonan</th>
                    <th>Surat Balasan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach($getsiswa->result() as $show){
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $show->siswa_nama ?></td>
                    <td><?php echo $show->siswa_kelas ?></td>
                    <td><?php echo $show->siswa_telepon ?></td>
                    <td><?php echo $show->siswa_alamat ?></td>
                    <td><?php echo $show->nama_perusahaan ?></td>
                    <td><?php echo $show->alamat_perusahaan ?></td>
                    <td><?php echo $show->surat_permohonan ?></td>
                    <td><?php echo $show->surat_balasan ?></td>
                    <td>
                        <a href="<?php echo base_url('Guru/read_siswa/'.$show->siswa_code) ?>" class="btn btn-sm btn-success">
                            <i class="fa fa-bookmark"></i>
                            Read
                        </a>
                        <?php if($this->session->userdata('userdata')['level'] == 2){ ?>

                        <a href="<?php echo base_url('Guru/edit_siswa/'.$show->siswa_code) ?>" class="btn btn-sm btn-warning">
                            <i class="fa fa-edit"></i>
                            Edit
                        </a>
                        <a href="<?php echo site_url('Guru/hapus_siswa/'.$show->siswa_code) ?>" onclick="javasciprt: return confirm('Holla, Betul mau Hapus Data ini ?')" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i>
                            Hapus
                        </a>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php if($this->session->userdata('userdata')['level'] == 2){ ?>
            <!-- <a style="margin-top: 10px;" href="<?php echo base_url('Export_excel/export_data_siswa') ?>" class="btn btn-sm btn-success">Export</a> -->
        <?php } ?>
    </div>