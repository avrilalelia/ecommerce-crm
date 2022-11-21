<?php
    class M_data extends CI_Model{
        function tampil_data_customer(){
            return $this->db->get('customer');
        }

        function tampil_data_karyawan(){
            return $this->db->get('karyawan');
        }

        function tampil_data_order(){
            return $this->db->get('order');
        }

        function tampil_data_produk(){
            return $this->db->get('produk');
        }

        function input_data($data, $table){
            $this->db->insert($table, $data);
        }

        function hapus_data($where, $table){
            $this->db->where($where);
            $this->db->delete($table);
        }

        function edit_data($where, $table){
            return $this->db->get_where($table, $where);
        }

        function update_data($where, $data, $table){
            $this->db->where($where);
            $this->db->update($table, $data);
        }

    }
?>