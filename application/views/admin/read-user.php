    <div class="box box-primary">
        <div class="box-header">
            <h2>Lihat User</h2>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <td width="40%">Username</td>
                        <td><?php echo $user->username ?></td>
                    </tr>
                    <tr>
                        <td width="40%">Nama Lengkap</td>
                        <td><?php echo $user->nama_lengkap ?></td>
                    </tr>
                    <tr>
                        <td width="40%">Level</td>
                        <td><?php echo $user->group_name ?></td>
                    </tr>
                </table>
            </div>

            <div class="form-group">
                <button type="button" onclick="history.back();" class="btn btn-danger">Kembali</button>
            </div>
        </div>
    </div>