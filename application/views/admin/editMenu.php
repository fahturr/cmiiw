<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h6 mb-4 text-gray-800"><?= $judul; ?></h1>

    <div class="row">
        <div class="container">
            <div class="col-md-8">
                <?= form_open_multipart('admin/editM/' . $menu['id_menu'])  ?>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Menu</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="menu" id="menu" value="<?= $menu['nama_menu'] ?>">
                        <input name="id" value="<?= $menu['id_menu'] ?>" hidden>
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="nama" class="form-control" id="harga" name="harga" value="<?= $menu['harga'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Gambar</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/img/menus/') . $menu['gambar_menu'] ?>" class="img-thumbnail" alt="">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <input type="nama" class="form-control" id="deskripsi" name="deskripsi" value="<?= $menu['deskripsi'] ?>">
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->