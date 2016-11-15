<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/bootstrap-tour.min.js"></script>

<script type="text/javascript">
  var tour = new Tour({
  steps: [
  {
    element: "#tour1",
    placement:'top',
    title: "Selamat datang",
    content: "ini adalah foto profil anda, anda dapat mengubah nya untuk ditampilkan di testimoni"
  },
  {
    element: "#tour2",
    placement:'right',
    title: "Menu Dashboard",
    content: "Menu ini menampilkan halaman informasi akun anda seperti saat ini."
  },
  {
    element: "#tour3",
    placement:'right',
    title: "Menu Transaksi",
    content: "Anda dapat melihat semua transaksi, keranjang belanja, dan melakukan konfirmasi disini"
  },
  {
    element: "#tour4",
    placement:'right',
    title: "Menu Pengaturan",
    content: "Anda dapat mengubah data diri, alamat untuk pemesanan , serta foto profil anda disini"
  },
  {
    element: "#tour5",
    placement:'right',
    title: "Menu Testimoni",
    content: "Anda dapat mengisikan testimoni setelah selesai belanja yang nanti akan tampilkan di halaman depan website ini"
  },
  {
    element: "#tour6",
    placement:'right',
    title: "Menu Ubah Password",
    content: "Anda dapat mengubah password anda untuk login disini"
  },
  {
    element: "#tour7",
    placement:'right',
    title: "Buat Merchandise",
    content: "Anda dapat membuat merchandise anda disini dan pilih sendiri ornamen yang anda suka. Selamat Memesan"
  }
]});

// Initialize the tour
// tour.init();

// Start the tour
// tour.start();
</script>