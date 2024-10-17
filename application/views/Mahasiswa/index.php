<div class="container">
    <div class="row mt-5">
        <div class="col mt-4">

        <!-- awal validasi error -->
         <?php if(validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  
                <?= validation_errors();?>
            </div>
            <?php endif; ?>
         <!-- akhir validasi error -->

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Data
            </button>

            <div class="row mt-3">
                <div clas="col-md-8">
            </div>

            <!-- awal flashdata -->
             <?php if($this->session->flashdata('flash')) : ?>
                <div class="row mt-3">
                    <div class="col-md--8">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Mahasiswa<strong>Berhasis</strong> <?= $this->session->flashdata('flash'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>             
                    </div>
                </div>
                <?php endif; ?>

            <!-- akhir flashdata -->

            <div class="row mt-2">
                <div class="col-mt-20">
                    <form action="" method="post">
                        <div class="input-group">
                            <input type="text" class="'form-control" placeholder="cari data mahasiswa..." name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Tambah Data -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('mahasiswa') ?>" method="post">
                                <div class="form-group">
                                    <label for="kode">Kode</label>
                                    <input type="number" name="kode" class="form-control" id="kode" placeholder="Masukan Kode">
                                    <small class="form-text text-danger"><?= form_error('kode') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="matakuliah">Matakuliah</label>
                                    <input type="text" name="matakuliah" class="form-control" id="matakuliah" placeholder="Masukan Matakuliah">
                                    <small class="form-text text-danger"><?= form_error('matakuliah') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="sks">Sks</label>
                                    <input type="number" name="sks" class="form-control" id="sks" placeholder="Masukan Sks">
                                    <small class="form-text text-danger"><?= form_error('sks') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="semester">Semester</label>
                                    <input type="number" name="semester" class="form-control" id="semester" placeholder="Masukan Semester">
                                    <small class="form-text text-danger"><?= form_error('semester') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <select class="form-select" id="jurusan" name="jurusan">
                                        <option value="">Pilihan</option>
                                        <?php foreach ($jurusan as $j): ?>
                                            <option><?php echo $j['namajurusan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('jurusan') ?></small>
                                    <!-- input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="Masukan Jurusan"> -->
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </form> <!-- Form closing tag should be inside modal body-->
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tabel Data -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Kode</th>
                        <th scope="col">Matakuliah</th>
                        <th scope="col">Sks</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mahasiswa as $mhs): ?>
                        <tr>
                            <th scope="row"><?= $mhs['kode']; ?></th>
                            <td><?= $mhs['matakuliah']; ?></td>
                            <td><?= $mhs['sks']; ?></td>
                            <td><?= $mhs['semester']; ?></td>
                            <td><?= $mhs['jurusan']; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $mhs['id'] ?>">
                                    Ubah
                                </button>
                                <a href="<?= base_url(); ?>mahasiswa/hapus/<?= $mhs['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Awal Modal Edit -->
<?php $no = 0;
foreach ($mahasiswa as $mhs): $no++; ?>
    <div class="modal fade" id="editModal<?= $mhs['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('mahasiswa/ubah'); ?>
                    <input type="hidden" name="id" value="<?= $mhs['id']; ?>">

                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="number" name="kode" class="form-control" value="<?= $mhs['kode']; ?>" id="kode" placeholder="Masukan Kode" readonly>
                    </div>
                    <div class="form-group">
                        <label for="matakuliah">Matakuliah</label>
                        <input type="text" name="matakuliah" class="form-control" value="<?= $mhs['matakuliah']; ?>" id="matakuliah" placeholder="Masukan Matakuliah">
                    </div>
                    <div class="form-group">
                        <label for="sks">Sks</label>
                        <input type="number" name="sks" class="form-control" value="<?= $mhs['sks']; ?>" id="sks" placeholder="Masukan Sks">
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <input type="number" name="semester" class="form-control" value="<?= $mhs['semester']; ?>" id="semester" placeholder="Masukan Semester">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-select" id="jurusan" name="jurusan">
                            <option value="">Pilihan</option>
                            <?php foreach ($jurusan as $j): ?>
                                <option><?= $j['namajurusan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <!--<input type="text" name="jurusan" class="form-control" value="<?= $mhs['jurusan']; ?>" id="jurusan" placeholder="Masukan Jurusan"> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <!-- Form closing tag should be inside modal body-->
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- Akhir Modal Edit -->