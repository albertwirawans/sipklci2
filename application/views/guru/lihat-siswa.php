<div class="box box-primary">
    <div class="box-header">
        <h2>Lihat Siswa</h2>
    </div>
    <div class="box-body">
        
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td width="40%">Nama Siswa</td>
                    <td><?php echo $siswa->siswa_nama ?></td>
                </tr>
                <tr>
                    <td width="40%">Kelas</td>
                    <td><?php echo $siswa->siswa_kelas ?></td>
                </tr>
                <tr>
                    <td width="40%">Telepon</td>
                    <td><?php echo $siswa->siswa_telepon ?></td>
                </tr>
                <tr>
                    <td width="40%">Alamat Siswa</td>
                    <td><?php echo $siswa->siswa_alamat ?></td>
                </tr>
                <tr>
                    <td width="40%">Nama Perusahaan</td>
                    <td><?php echo $siswa->nama_perusahaan ?></td>
                </tr>
                <tr>
                    <td width="40%">Alamat Perusahaan</td>
                    <td><?php echo $siswa->alamat_perusahaan ?></td>
                </tr>
                <tr>
                    <td width="40%">Surat Permohonan</td>
                    <td><?php echo $siswa->surat_permohonan ?></td>
                </tr>
                <tr>
                    <td width="40%">Surat Balasan</td>
                    <td><?php echo $siswa->surat_balasan ?></td>
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-12">
                <button type="button" onclick="history.back();" class="btn btn-danger">Kembali</button>
            </div>
        </div>
    </div>
</div>