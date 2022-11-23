<?php
    class Crud extends CI_Controller
    {
        function __construct(){
            parent:: __construct();
            $this->load->model('m_data');
            $this->load->helper('url');
        }

        function index() {
            $this->load->view('dashboard');
        }

        function data_cust() {
            $data['data'] = $this->m_data->tampil_data_customer()->result();
            $this->load->view('v_tampil_cust', $data);
        }

        function data_karyawan() {
            $data['data'] = $this->m_data->tampil_data_karyawan()->result();
            $this->load->view('v_tampil_karyawan', $data);
        }

        function data_produk() {
            $data['data'] = $this->m_data->tampil_data_produk()->result();
            $this->load->view('v_tampil_produk', $data);
        }

        function data_order() {
            $data['data'] = $this->m_data->tampil_data_order()->result();
            $this->load->view('v_tampil_order', $data);
        }

        function tambah_cust(){
            $this->load->view('v_input_cust');
        }

        function tambah_karyawan(){
            $this->load->view('v_input_karyawan');
        }

        function tambah_produk(){
            $this->load->view('v_input_produk');
        }

        function tambah_order(){
            $this->load->view('v_input_order');
        }

        function edit_cust($id){
            $where = array('id_customer' => $id);
            $data['customer']  = $this->m_data->edit_data($where, 'customer')->result();
            $this->load->view('v_edit_cust', $data);
        }

        function edit_karyawan($id){
            $where = array('id_karyawan' => $id);
            $data['karyawan']  = $this->m_data->edit_data($where, 'karyawan')->result();
            $this->load->view('v_edit_karyawan', $data);
        }

        function edit_produk($id){
            $where = array('id_produk' => $id);
            $data['produk']  = $this->m_data->edit_data($where, 'produk')->result();
            $this->load->view('v_edit_produk', $data);
        }

        function edit_order($id){
            $where = array('id_order' => $id);
            $data['oder']  = $this->m_data->edit_data($where, 'order')->result();
            $this->load->view('v_edit_order', $data);
        }

        function update_customer(){
            $id_customer = $this->input->post('id_customer');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $no_telp = $this->input->post('no_telp');
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $data = array(
                'nama'=>$nama,
                'email'=>$email,
                'no_telp'=>$no_telp,
                'username'=>$username,
                'password'=>$password,
            );

            $where = array(
                'id_customer'=>$id_customer
            );

            $this->m_data->update_data($where, $data, 'customer');
            redirect('crud/data_cust');
        }

        function update_karyawan(){
            $id_karyawan = $this->input->post('id_karyawan');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $no_telp = $this->input->post('no_telp');
            $alamat = $this->input->post('alamat');
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $data = array(
                'nama'=>$nama,
                'email'=>$email,
                'no_telp'=>$no_telp,
                'alamat'=>$alamat,
                'username'=>$username,
                'password'=>$password,
            );

            $where = array(
                'id_karyawan'=>$id_karyawan
            );

            $this->m_data->update_data($where, $data, 'karyawan');
            redirect('');
        }

        function update_order(){
            $id_order = $this->input->post('id_order');
            $id_produk = $this->input->post('id_produk');
            $id_customer = $this->input->post('id_customer');
            $kuantitas = $this->input->post('kuantitas');
            $alamat = $this->input->post('alamat');
            $total = $this->input->post('total');
            $tanggal_pesan = $this->input->post('tanggal_pesan');
            $status = $this->input->post('status');

            $data = array(
                'id_produk'=>$id_produk,
                'id_customer'=>$id_customer,
                'kuantitas'=>$kuantitas,
                'alamat'=>$alamat,
                'total'=>$total,
                'tanggal_pesan'=>$tanggal_pesan,
                'status'=>$status,
            );

            $where = array(
                'id_order'=>$id_order
            );

            $this->m_data->update_data($where, $data, 'order');
            redirect('');
        }

        function update_produk(){
            $id_produk = $this->input->post('id_produk');
            $nama_produk = $this->input->post('nama_produk');
            $jenis = $this->input->post('jenis');
            $stok = $this->input->post('stok');
            $harga = $this->input->post('harga');

            $data = array(
                'id_produk'=>$id_produk,
                'nama_produk'=>$nama_produk,
                'jenis'=>$jenis,
                'stok'=>$stok,
                'harga'=>$harga,
            );

            $where = array(
                'id_produk'=>$id_produk
            );

            $this->m_data->update_data($where, $data, 'produk');
            redirect('');
        }

        function tambah_cust_aksi(){
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $no_telp = $this->input->post('notelp');
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $data = array(
                'nama'=>$nama,
                'email'=>$email,
                'no_telp'=>$no_telp,
                'username'=>$username,
                'password'=>$password,
            );

            $this->m_data->input_data($data, 'customer');
            redirect('crud/data_cust');
        }

        function tambah_karyawan_aksi(){
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $no_telp = $this->input->post('no_telp');
            $alamat = $this->input->post('alamat');
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $data = array(
                'nama'=>$nama,
                'email'=>$email,
                'no_telp'=>$no_telp,
                'alamat'=>$alamat,
                'username'=>$username,
                'password'=>$password,
            );

            $this->m_data->tambah_data($data, 'karyawan');
            redirect('crud/data_karyawan');
        }

        function tambah_order_aksi(){
            $id_produk = $this->input->post('id_produk');
            $id_customer = $this->input->post('id_customer');
            $kuantitas = $this->input->post('kuantitas');
            $alamat = $this->input->post('alamat');
            $total = $this->input->post('total');
            $tanggal_pesan = $this->input->post('tanggal_pesan');
            $status = $this->input->post('status');

            $data = array(
                'id_produk'=>$id_produk,
                'id_customer'=>$id_customer,
                'kuantitas'=>$kuantitas,
                'alamat'=>$alamat,
                'total'=>$total,
                'tanggal_pesan'=>$tanggal_pesan,
                'status'=>$status,
            );


            $this->m_data->tambah_data($data, 'order');
            redirect('crud/data_karyawan');
        }

        function tambah_produk_aksi(){
            $nama_produk = $this->input->post('nama_produk');
            $jenis = $this->input->post('jenis');
            $stok = $this->input->post('stok');
            $harga = $this->input->post('harga');

            $data = array(
                'id_produk'=>$id_produk,
                'nama_produk'=>$nama_produk,
                'jenis'=>$jenis,
                'stok'=>$stok,
                'harga'=>$harga,
            );

            $this->m_data->tambah_data($data, 'produk');
            redirect('crud/data_produk');
        }

        function hapus_cust($id){
            $where=array('id_customer' => $id);
            $this->m_data->hapus_data($where, 'customer');
            redirect('crud/data_cust');
        }

        function hapus_karyawan($id){
            $where=array('id_karyawan' => $id);
            $this->m_data->hapus_data($where, 'karyawan');
            redirect('crud/data_karyawan');
        }

        function hapus_produk($id){
            $where=array('id_produk' => $id);
            $this->m_data->hapus_data($where, 'produk');
            redirect('crud/data_produk');
        }

        function hapus_order($id){
            $where=array('id_order' => $id);
            $this->m_data->hapus_data($where, 'order');
            redirect('crud/data_order');
        }

        public function export(){
            // Load plugin PHPExcel nya
            include APPPATH.'third_party/PHPExcel/PHPExcel.php';
            
            // Panggil class PHPExcel nya
            $excel = new PHPExcel();

            // Settingan awal fil excel
            $excel->getProperties()->setCreator('Winarsih')
                        ->setLastModifiedBy('Winarsih')
                        ->setTitle("Data Mahasiswa")
                        ->setSubject("Mahasiswa")
                        ->setDescription("Laporan Data Mahasiswa")
                        ->setKeywords("Data Mahasiswa");

            // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
            $style_col = array(
            'font' => array('bold' => true), // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
            );

            // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
            $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
            );

            $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA CUSTOMER"); // Set kolom A1 dengan tulisan "DATA SISWA"
            $excel->getActiveSheet()->mergeCells('A1:D1'); // Set Merge Cell pada kolom A1 sampai E1
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
            $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

            // Buat header tabel nya pada baris ke 3
            $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
            $excel->setActiveSheetIndex(0)->setCellValue('B3', "NIM"); // Set kolom B3 dengan tulisan "NIS"
            $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
            $excel->setActiveSheetIndex(0)->setCellValue('D3', "ALAMAT"); // Set kolom E3 dengan tulisan "ALAMAT"

            // Apply style header yang telah kita buat tadi ke masing-masing kolom header
            $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
            

            // Panggil function view yang ada di M_data untuk menampilkan semua data siswanya
            $data = $this->m_data->tampil_data_customer()->result();

            $no = 1; // Untuk penomoran tabel, di awal set dengan 1
            $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
            foreach($data as $data){ // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nim);
            $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
            $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->alamat);
            
            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
                
            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
            }

            // Set width kolom
            $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
            $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
            $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
            $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
            
            // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
            $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

            // Set orientasi kertas jadi LANDSCAPE
            $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

            // Set judul file excel nya
            $excel->getActiveSheet(0)->setTitle("Laporan Data Mahasiswa");
            $excel->setActiveSheetIndex(0);

            // Proses file excel
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Data Mahasiswa.xlsx"'); // Set nama file excel nya
            header('Cache-Control: max-age=0');

            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
            $write->save('php://output');
        }

    }

?>
