@extends('layout.main')
@section('title', 'Cara Pemesanan - Arif Furniture Indonesia')
@section('container')
<header class="masthead d-flex">
    <div class="container h-100 py-5 my-auto">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h1 class="font-weight-light text-white">Cara Pemesanan & Pembelian</h1>
                <p class="lead text-light">Arif Funiture Indonesia selalu memberikan pelayanan yang semudah mungkin bagi
                    pelanggan dalam melakukan proses order atau pemesanan secara online maupun offline.</p>
            </div>
        </div>
    </div>
</header>
<div class="container p-5">
    <div class="row">
        <div class="col-md-3 how_to_order mb-3 mb-md-0 pb-3 pb-pd-0">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="how_to_invoice-tab" data-toggle="pill" href="#how_to_invoice" role="tab"
                    aria-controls="how_to_invoice" aria-selected="true">Invoice</a>
                <a class="nav-link" id="how_to_DP-tab" data-toggle="pill" href="#how_to_DP" role="tab"
                    aria-controls="how_to_DP" aria-selected="false">Down Payment</a>
                <a class="nav-link" id="how_to_pelunasan-tab" data-toggle="pill" href="#how_to_pelunasan" role="tab"
                    aria-controls="how_to_pelunasan" aria-selected="false">Pelunasan</a>
                <a class="nav-link" id="how_to_account_no-tab" data-toggle="pill" href="#how_to_account_no" role="tab"
                    aria-controls="how_to_account_no" aria-selected="false">No. Rekening</a>
                <a class="nav-link" id="how_to_ongkir-tab" data-toggle="pill" href="#how_to_ongkir" role="tab"
                    aria-controls="how_to_ongkir" aria-selected="false">Biaya Pengiriman</a>
                <a class="nav-link" id="how_to_production-tab" data-toggle="pill" href="#how_to_production" role="tab"
                    aria-controls="how_to_production" aria-selected="false">Proses Produksi</a>
                <a class="nav-link" id="how_to_pasca_production-tab" data-toggle="pill" href="#how_to_pasca_production"
                    role="tab" aria-controls="how_to_pasca_production" aria-selected="false">Pasca Produksi</a>
                <a class="nav-link" id="how_to_contact_us-tab" data-toggle="pill" href="#how_to_contact_us" role="tab"
                    aria-controls="how_to_contact_us" aria-selected="false">Kontak</a>

            </div>
        </div>
        <hr class="d-block d-md-none">
        <div class="col-md-9 px-5">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="how_to_invoice" role="tabpanel"
                    aria-labelledby="how_to_invoice-tab">
                    <ul>
                        <li>
                            Sebelum Proses Order Diharapkan Untuk mengkonfirmasi Tentang Produk / Furniture Jepara,
                            Seperti Menyertakan Nama Barang, kode barang, ukuran, warna finishing beserta top coatednya,
                            warna dan kain jok /sofa.</li>
                        <li>Proses Order Dimulai Setelah Invoice Yang Kami Ajukan Di Setujui Buyer.</li>
                        <li>Invoice Dibuat Berdasarkan Atas Detail Produk Baik Ukuran, Jenis, Warna Finishing, Harga
                            Produk Dan Biaya Kirim Yang Telah Disepakati.</li>
                        <li>Sertakan Nama Jelas, Alamat Dan No HP Yang Bisa Di Hubungi Setiap Saat.</li>
                        <li>Invoice Bersifat Mengikat Baik Dari Harga Dan Spesifikasi Produk Furniture Yang Tidak Bisa
                            Dirubah Setelah Proses Produksi Dimulai.</li>
                        <li>Invoice Juga Berkekuatan Hukum Tetap Sebagai Bukti Dan Alat Transaksi Yang Dapat
                            Dipertanggung Jawabkan Kepada Pihak Berwajib.</li>
                        <li>Perubahan Harga Dalam Invoice Dapat Terjadi Jika Dalam Proses Produksi Terjadi Perubahan
                            Desain, Material Bahan Baku, Asesories, Hardware Dan Finishing Yang Tidak Tertuang Secara
                            Tertulis Dalam Invoice.</li>
                        <li>Jika kami tidak menerima pembayaran dalam waktu 3 hari Setelah Proforma Invoice Di Kirim,
                            Maka Pesanan Anda Akan Kami Anggap Batal.
                        </li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="how_to_DP" role="tabpanel" aria-labelledby="how_to_DP-tab">
                    <ul>


                        <li>Produksi Siap Dikerjakan Setelah Transfer DP sebesar 40 – 50 % Dari Nominal Invoice Atau
                            Sesuai Kesepakatan Diantara Pembeli Dan Penjual.</li>
                        <li>Khusus Wilayah Jabodetabek DP 20-40 % Dari Nominal Invoice Atau Sesuai Kesepakatan Diantara
                            Pembeli Dan Penjual.</li>
                        <li>Pembatalan Pemesanan Secara Sepihak Oleh Pembeli Selama & Setelah Proses Produksi Berjalan
                            Maka Down Payment Akan Kami Anggap Hilang Sebagai Pengganti Barang Yang Sedang Di Produksi.
                        </li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="how_to_pelunasan" role="tabpanel" aria-labelledby="how_to_pelunasan-tab">
                    <ul>

                        <li>Pelunasan Ketika Barang Loading Di Ekspediai Jepara Dengan Mengirimkan Final Invoice,
                            Dokumentasi Produk, Surat Jalan, Resi Ekspedisi Yang Berkekuatan Hukum Melalui Email Atau
                            Pos Kilat. Barang Berangkat Dari Jepara Setelah Proses Pelunasan Dilakukan.</li>
                        <li>Kami Juga Memberikan Kebebasan Kepada Pembeli Untuk Memilih Ekspedisi Atau Agent Yang
                            Bersifat Netral Atau Jasa Ekspedisi Langganan Anda. Opsi Ini Yang Kami Utamakan.</li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="how_to_account_no" role="tabpanel"
                    aria-labelledby="how_to_account_no-tab">
                    <ul>
                        <li>Bank BCA Cab. Jepara No. Rek 2471748210 Atas Nama Akhmad Syarifuddin</li>
                        <li>Bank BRI Cab. Jepara No. Rek 0038-01-001477-56-6 Atas Nama Akhmad Syarifuddin</li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="how_to_ongkir" role="tabpanel" aria-labelledby="how_to_ongkir-tab">
                    <ul>
                        <li>
                            Penentuan Biaya Kirim Menyesuaikan Dengan Alamat Kirim Yang Sudah Di Konfirm Ke Pihak
                            Ekspedisi Yang Telah Disepakati Antara Pembeli
                            Dan Penjual.</li>
                        <li>Tidak Ada Penambahan Biaya Kirim Dalam Bentuk Apapun Selain Yang Tercantum Di Proforma
                            Invoice Dan Bersifat Statis Atau Tetap. Kecuali adanya kesalah pahaman komunikasi seperti :
                        </li>
                        <ol type="a" class="ml-3">
                            <li>Terjadi Kesulitan dalam akses Pengiriman, sehingga dikenakan biaya tambahan sampai
                                tempat berdasarkan nilai transportasi setempat. seperti pengiriman di jalan protokol
                                atau forboden, larangan truk masuk, jalan yang sempit.</li>
                            <li>Biaya Instalasi Di Tempat Yang Melibatkan Pihak Ekspedisi Atau Pengiriman. seperti
                                tempat tidur, meja solid, lemari pakaian.</li>
                            <li>Cost Drooping / Biaya Bongkar. jika barang yang dipesan tidak bisa di angkat oleh 2
                                orang pengirim dari pihak ekspedisi maka pembeli berkeharusan menyediakan tambahan
                                tenaga bongkar, atau jika dari pihak ekspedisi akan dikenakan biaya tambahan.</li>
                        </ol>
                    </ul>
                </div>
                <div class="tab-pane fade" id="how_to_production" role="tabpanel"
                    aria-labelledby="how_to_production-tab">
                    <ul>
                        <li>Apabila Barang Sold Out Atau Made By Custom, Maka Segera Kami Produksi Pesanan Furniture
                            Dari Pembeli.</li>
                        <li>Dalam Setiap Proses Produksi Furniture, Kami Senantiasa Memberikan Informasi Serta Report
                            Dokumentasi Berupa Gambar Atau Rincian Produksi.
                        </li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="how_to_pasca_production" role="tabpanel"
                    aria-labelledby="how_to_pasca_production-tab">
                    <ul>
                        <li>Kami Tidak Bertanggung Jawab Atas Barang Yang Dipesan Jika Dalam Kurun Waktu 6 Bulan Setelah
                            Barang Selesai Di Produksi Belum Terjadi Proses Pengiriman Karena Terputusnya Komunikasi
                            Secara Sepihak Oleh Pembeli.</li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="how_to_contact_us" role="tabpanel"
                    aria-labelledby="how_to_contact_us-tab">
                   <ul><li>Untuk Mengetahui Informasi Pemesanan Lebih Jelas Serta Detail Mengenai Informasi Pemesanan Hubungi Kami Di <a class="blue" href="{{route('contact_us')}}" target="_blank" rel="noopener noreferrer">Contact Us</a></li></ul></div>

            </div>
        </div>
    </div>


</div>

@endsection