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
            $this->load->view('v_input_cust');
        }

        function tambah_produk(){
            $this->load->view('v_input_cust');
        }

        function tambah_order(){
            $this->load->view('v_input_cust');
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
            redirect('');
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

            $this->m_data->tambah_data($where, $data, 'customer');
            redirect('');
        }

        function hapus($id){
            $where=array('id_pasien' => $id);
            $this->m_data->hapus_data($where, 'pasien');
            redirect('');
        }

        function tambah_karyawan_aksi(){
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

            $this->m_data->tambah_data($where, $data, 'karyawan');
            redirect('');
        }

        function tambah_order_aksi(){
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

            $this->m_data->tambah_data($where, $data, 'order');
            redirect('');
        }

        function tambah_produk_aksi(){
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

            $this->m_data->tambah_data($where, $data, 'produk');
            redirect('');
        }

        function hapus_cust($id){
            $where=array('id_customer' => $id);
            $this->m_data->hapus_data($where, 'customer');
            redirect('');
        }

    }

?>
