<!-- Food Area starts -->
<section class="food-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="section-top">
                    <h3><span class="style-change">Menu</span> <br> MW CATERING</h3>
                    Untuk menarik minat pelanggan variasi menu yang menarik dan juga menyediakan paket spesial dengan model yang kekinian serta menyediakan pramusaji untuk menjaga stand pada saat acara.
                    <p class="pt-3"></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($query as $data) :
                $id_menu         = $data->id_menu;
                $nama_menu      = $data->nama_menu;
                $gambar_menu    = $data->gambar_menu;
                $harga = $data->harga;
                $deskripsi = $data->deskripsi;

                if ($harga == 0) {
                    echo
                        '   
                    <div class="col-md-4 col-sm-6">
                        <form action="">
                            <div class="single-food">
                                <div class="food-img">
                                    <img src="' . base_url("assets/img/menus/") . $gambar_menu . '" class="img-fluid" alt="">
                                </div>
                                <div class="food-content">
                                    <div class="d-flex justify-content-between">
                                        <h5>' . $nama_menu . '</h5>
                                        <span class="style-change"></span>
                                    </div>
                                    <p class="pt-3">' . $deskripsi . '</p>
                                </div>
                            </div>
                        </form>
                    </div>
                    ';
                } else {
                    echo
                        '   
                        <div class="col-md-4 col-sm-6">
                            <form action="' . base_url('menu/pesan') . '" method="post">
                                <div class="single-food">
                                    <div class="food-img">
                                        <input name="id" value="' . $id_menu . '" hidden>
                                        <input name="harga" value="' . $harga . '" hidden>
                                        <img src="' . base_url("assets/img/menus/") . $gambar_menu . '" class="img-fluid" alt="">
                                    </div>
                                    <div class="food-content">
                                        <div class="d-flex justify-content-between">
                                            <h5>' . $nama_menu . '</h5>
                                            <small class="style-change">' . "Rp " . number_format($harga, 2, ',', '.') . '</small>
                                        </div>
                                        <p class="pt-3">' . $deskripsi . '</p>
                                        <button type="submit" class="template-btn">Pesan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    ';
                }
            endforeach; ?>
        </div>
    </div>
</section>
<!-- Food Area End -->