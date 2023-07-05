<?php if(validation_errors()) { ?>
    <div class="alert alert-danger">
        <?php echo validation_errors(); ?>
    </div>
<?php } ?>
<form action="<?php echo site_url('Guru/update_data_siswa'); ?>" method="post">
    <div class="box box-primary">
        <div class="box-header">
            <h2>Form edit siswa</h2>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="">Nama Siswa</label>
                        <input placeholder="Nama Siswa"  autofocus type="text" name="siswa_nama" class="form-control" value="<?php echo $siswa->siswa_nama ?>">
                        <input type="hidden" name="siswa_code" class="form-control" value="<?php echo $siswa->siswa_code ?>">
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 10px;">
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <!-- <input placeholder="Kelas" type="text" name="siswa_kelas" class="form-control" value=""> -->
                        <select name="siswa_kelas" class="form-control">
                            <option value="" disabled selected>Pilih Kelas</option>
                            <option value="XI - TKJ1">XI- TKJ1</option>
                            <option value="XI - TKJ2">XI- TKJ2</option>
                            <option value="XI - TKJ3">XI- TKJ3</option>
                            <option value="XI - RPL1">XI- RPL1</option>
                            <option value="XI - RPL2">XI- RPL2</option>
                            <option value="XI - RPL3">XI- RPL3</option>
                            <option value="XI - MM2">XI- MM2</option>
                            <option value="XI - MM1">XI- MM1</option>
                            <option value="XI - MM3">XI- MM3</option>
                            <option value="XI - AK1">XI- AK1</option>
                            <option value="XI - AK2">XI- AK2</option>
                            <option value="XI - AK3">XI- AK3</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Telepon</label>
                        <input placeholder="Telepon" type="text" name="siswa_telepon" class="form-control" value="<?php echo $siswa->siswa_telepon ?>">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="siswa_alamat" class="form-control" cols="10" rows="2"><?php echo $siswa->siswa_alamat ?></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nama Perusahaan</label>
                        <input placeholder="Nama Perusahaan" type="text" name="nama_perusahaan" class="form-control" value="<?php echo $siswa->nama_perusahaan ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Alamat Perusahaan</label>
                        <input placeholder="Alamat Perusahaan" type="text" name="alamat_perusahaan" class="form-control" value="<?php echo $siswa->alamat_perusahaan ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Surat Permohonan</label>
                        <!-- <input placeholder="Kelas" type="text" name="siswa_kelas" class="form-control" value=""> -->
                        <select name="surat_permohonan" class="form-control">
                            <option value="" disabled selected>Pilih</option>
                            <option value="terkirim">Terkirim</option>
                            <option value="belum terkirim">Belum Terkirim</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Surat Balasan</label>
                        <!-- <input placeholder="Kelas" type="text" name="siswa_kelas" class="form-control" value=""> -->
                        <select name="surat_balasan" class="form-control">
                            <option value="" disabled selected>Pilih</option>
                            <option value="diterima">Diterima</option>
                            <option value="belum diterima">Belum Diterima</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 20px;">
                <div class="col-md-12">
                    <button type="button" onclick="history.back();" class="btn btn-danger">Kembali</button>
                    <button type="submit" class="btn btn-success">Edit</button>
                </div>
            </div>
        </div>
    </div>
</<form>