<?php if(validation_errors()) { ?>
    <div class="alert alert-danger">
        <?php echo validation_errors(); ?>
    </div>
<?php } ?>
<form action="<?php echo site_url('administrator/tambah_user'); ?>" method="post">
    <div class="box box-primary">
        <div class="box-header">
            <h2>Form tambah user</h2>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="">Username</label>
                    <input placeholder="Username" autofocus type="username" name="username" class="form-control" value="">
                </div>

                <div class="col-md-6">
                    <label for="">Nama Lengkap</label>
                    <input placeholder="Nama Lengkap" type="text" name="nama_lengkap" class="form-control" value="">
                </div>
            </div>

            <div class="row" style="margin-top: 10px;">
                <div class="col-md-6">
                    <label for="">Level</label>
                    <select class="form-control" name="level">
                        <option value="" disabled selected>-- Pilih Level</option>
                        <?php
                        $level  = $this->db->get('tb_group');
                        foreach($level->result() as $row){
                        ?>
                            <option value="<?php echo $row->group_id ?>"><?php echo $row->group_name ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="">Password</label>
                    <input placeholder="password" type="password" name="password" class="form-control" value="">
                </div>
            </div>

            <div class="row" style="margin-top: 20px;">
                <div class="col-md-12">
                    <button type="button" onclick="history.back();" class="btn btn-danger">Kembali</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</<form>