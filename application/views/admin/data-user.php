<?php 
$userdata = $this->session->userdata('userdata');
//Validasi apakah ada method get dengan nama index "username";
if($this->input->get('username')){
    //JIka ada maka variabel search bernilai sesuai get dengan nama index "username"
    $search = $this->input->get('username');
}else{
    //Jika tidak ada, variable search bernilai kosong
    $search = '';
}

//Query mengambil semua data user
if($this->input->get('username')){
    $this->db->like('username', $this->input->get('username'));
}
$this->db->where('id !=', $userdata['id']);
$this->db->join('tb_group', 'tb_group.group_id = tb_user.level');
$getuser = $this->db->get('tb_user');
?>

<?php if(!empty($this->session->flashdata('message'))){ ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('message'); ?>
    </div>
<?php } ?>
<?php echo validation_errors('<pre>', '</pre>') ?>
<div class="box box-primary">
    <div class="box-header">
        <h2 style="margin-top: 0px;">Data User</h2>
        <div class="row">
            <div class="col-md-8">
                <a href="<?php echo base_url('administrator/view/tambah-user') ?>" class="btn btn-primary">
                    Tambah User <i class="fa fa-plus"></i>
                </a>
                <button class="btn btn-primary">Jumlah User <?php echo $getuser->num_rows() ?></button>
            </div>
            <div class="col-md-4 text-right">
                <form action="" method="get">
                    <div class="input-group">
                        <input type="search" value="<?php echo $search ?>" name="username" placeholder="Cari username" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-primary">CARI</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="box-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="7%">#</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($getuser->result() as $show){
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $show->username ?></td>
                        <td><?php echo $show->nama_lengkap ?></td>
                        <td><?php echo $show->group_name ?></td>
                        <td>
                            <a href="<?php echo base_url('administrator/view/read_user/'.$show->user_code) ?>" class="btn btn-sm btn-success">
                                <i class="fa fa-bookmark"></i>
                                Read
                            </a>

                            <a href="<?php echo base_url('administrator/edit_user/'.$show->user_code) ?>" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i>
                                Edit
                            </a>

                            <a href="<?php echo site_url('administrator/hapus_user/'.$show->user_code) ?>" onclick="javasciprt: return confirm('Holla, Betul mau Hapus Data ini ?')" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                                Hapus
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</div>