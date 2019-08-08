<div class="container" style="margin-top:3.5cm">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:60%; padding:2px">Product</th>
                <th style="width:10%; padding:5px"></th>
                <th style="width:8%; padding:2px">Price</th>
                <th style="width:20%; padding:2px" class="text-center"></th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php if ($this->db->count_all('troli') == 0) {
                    echo '  
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm">
                                    Troli Kosong
                                </div>    
                            </div>
                        </td>
                    </tr> 
                    ';
                } else {
                    foreach ($troli as $data) {
                        echo '
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="col-sm-0">
                                        <img src="' . base_url('assets/img/menus/') . $data['gambar_menu'] . '" width="100" alt="" style="margin-right: 2%;" align="left"/>
                                        <h4 class="nomargin ml-4" style="color:black;">' . $data['nama_menu'] . '</h4>
                                        <p class="ml-4">' . $data['deskripsi'] . '</p>
                                    </div>
                                </div>
                            </div
                        </td>
                        <td data-th="Price"></td>
                        <td data-th="Quantity">' . 'Rp' . number_format($data['harga'], 2, ',', '.') . '</td>
                        <td data-th="Subtotal" class="text-center"></td>
                        <td class="actions" data-th="">
                            <form action="' . base_url('home/hapus') . '" method="post">
                                <input name="id" value="' . $data['id_troli'] . '" hidden>
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>';
                    }
                } ?>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td><a href="<?= base_url('menu') ?>" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center">
                    <?php
                    foreach ($jumlah as $data) {
                        $jum = $data;
                        if ($jum == null) {
                            $jum = 0;
                        }
                        echo
                            '
                            <strong>Total ' . "Rp " . number_format($jum, 2, ',', '.') . '</strong>
                            ';
                    }
                    ?>
                </td>
                <td><button type="submit" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></button></td>
            </tr>
        </tfoot>
    </table>
</div>