<div class="container-fluid">
    <div class="row">
        <div class="col md-2"></div>
        <div class="col md-8">
            <div class="btn btn-success">
                <?php
                $grand_total = 0;
                if ($keranjang = $this->cart->contents()){
                    foreach ($keranjang as $item){
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "<h4>Total Belanja Anda: Rp. ".number_format($grand_total,0,',','.');
                
                ?>
            </div><br><br>
            <h3>Input Alamat dan pembayaran</h3>

            <form method="post" action="<?= base_url('beranda/proses_pesanan'); ?> ">
                
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
                </div>
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
                </div>
                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" name="no_telp" placeholder="Nomer Telepon Anda" class="form-control">
                </div>
                <div class="form-group">
                    <label>Metode Pengiriman</label>
                    <select class="form-control">
                        <option>JNE</option>
                        <option>TIKI</option>
                        <option>J&T</option>
                        <option>Grab</option>
                        <option>Gojek</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Metode Pembayaran</label>
                    <select class="form-control">
                        <option>BCA - xxxxxxx</option>
                        <option>BRI - xxxxxxx</option>
                        <option>MANDIRI - xxxxxxx</option>
                        <option>DANA - xxxxxxx</option>
                        <option>GOPAY - xxxxxxx</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mb-3">Pesan</button>

        </form>

        <?php
                }else{
                    echo "<h4>Keranjang Belanja Anda Masih Kosong ";
                } 
        ?>

        </div>
        <div class="col md-2"></div>
    </div>
</div>