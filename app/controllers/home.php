<?php

class home extends Controller
{
    public function index()
    {
        $data['sett'] = $this->model('_sett')->getSetting();
        $data['page'] = 1;
        $limit = $data['sett']['page']; 
        $num_rows = $this->model('_post')->numberPost();
        $limit_start = ($data['page'] - 1) * $limit;
        $data['jumlah_page'] = ceil($num_rows / $limit); 
        $data['jumlah_number'] = 3;
        $data['start_number'] = ($data['page'] > $data['jumlah_number'])? $data['page'] - $data['jumlah_number'] : 1; // Untuk awal link number
        $data['end_number'] = ($data['page'] < ($data['jumlah_page'] - $data['jumlah_number']))? $data['page'] + $data['jumlah_number'] : $data['jumlah_page'];
        $data['post'] = $this->model('_post')->getAllPostHome($limit_start,$limit);
        $this->view('home/_layout/header', $data);
        $this->view('home/index', $data);
        $this->view('home/_layout/footer');
    }
}
