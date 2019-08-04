<div class="container" style="margin-top: 3.5cm">

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message') ?>
        </div>
    </div>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4 py-2 px-2">
                <img src="<?= base_url('assets/img/users/') . $gambar ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $nama_user ?></h5>
                    <p class="card-text"><?= $email ?></p>
                    <a href="<?= base_url('home/edit') ?>" class="template-btn">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>