<?php if(validation_errors()) { ?>
    <div class="alert alert-danger">
        <?php echo validation_errors(); ?>
    </div>
<?php } ?>
<form action="<?php echo site_url('administrator/update_data_user'); ?>" method="post">
    <div class="box box-primary">
        <div class="box-header">
            <h2>Form Edit user</h2>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="">Username</label>
                <input placeholder="Username" autofocus type="username" name="username" class="form-control" value="<?php echo $user->username ?>">
                <input type="hidden" name="user_code" class="form-control" value="<?php echo $user->user_code ?>">
            </div>
            <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input placeholder="Nama Lengkap" type="text" name="nama_lengkap" class="form-control" value="<?php echo $user->nama_lengkap ?>">
            </div>
            <div class="form-group">
                <label for="">Level</label>
                <select class="form-control" name="level">
                    <option value="" disabled selected>-- Pilih Level</option>
                    <?php
                    $level  = $this->db->get('tb_group');
                    foreach($level->result() as $row){
                        $selected = '';
                        if($row->group_id == $user->level){
                            $selected = 'selected';
                        }
                    ?>
                        <option <?php echo $selected; ?> value="<?php echo $row->group_id ?>"><?php echo $row->group_name ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <button type="button" onclick="history.back();" class="btn btn-danger">Kembali</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</<form>