<div class="container-fluid">
    <!-- Page Heading -->
    <?= $this->session->flashdata('message') ?>
    <h1 class="h6 mb-4 text-gray-800"><?= $judul; ?></h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahMenu">
        Tambah Menu
    </button>

    <!-- Modal -->
    <div class="modal fade" id="tambahMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('admin/tambahMenu'); ?>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama Menu:</label>
                        <input type="text" name="menu" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Harga:</label>
                        <input type="text" name="harga" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Gambar:</label>
                        <div class="custom-file">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Deskripsi:</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <br><br>

    <div class="row">
        <?php foreach ($query as $data) :
            echo '
            <div class="col-md-3">
                <div class="card card" style="width: 18rem; height: 30rem">
                    <img src="' . base_url('assets/img/menus/') . $data['gambar_menu'] . '" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">' . $data['nama_menu'] . '</h5>
                        <span>' . 'Rp.' . number_format($data['harga'], 2, ',', '.') . '</span>
                        <p class="card-text">' . $data['deskripsi'] . '</p>
                        <a href="' .  base_url('admin/editM/') . $data['id_menu'] . '" class="btn btn-primary">Edit</a>
                        <a href="' . base_url('admin/hapusM/') . $data['id_menu'] .  '" class="btn btn-danger">Hapus</a>
                    </div>
                </div><br>
            </div>
            ';
        endforeach;
        ?>
    </div>
</div>
<!-- /.container-fluid -->