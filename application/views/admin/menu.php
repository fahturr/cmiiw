<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h6 mb-4 text-gray-800"><?= $judul; ?></h1>

    <div class="row">
        <div class="col-md">
            <?php foreach ($query as $data) :
                echo '
                <div class="card card" style="width: 18rem;">
                    <img src="' . base_url('assets/img/menus/') . $data['gambar_menu'] . '" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">' . $data['nama_menu'] . '</h5>
                        <span>' . 'Rp.' . number_format($data['harga'], 2, ',', '.') . '</span>
                        <p class="card-text">' . $data['deskripsi'] . '</p>
                        <button href="submit" class="btn btn-primary">Go somewhere</button>
                    </div>
                </div><br>
            ';
            endforeach;
            ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->