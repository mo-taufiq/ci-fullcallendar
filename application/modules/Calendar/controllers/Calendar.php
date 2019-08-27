<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Calendar_model');
	}

	public function index()
	{
		$data['title'] = 'Calendar';
		$data['task'] = $this->Calendar_model->getAllData('tugas');
		$data['worker'] = $this->Calendar_model->getAllData('petugas');
		$this->load->view('templates/header', $data);
		$this->load->view('index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function add_new_task()
	{
		$data = [
			'nama' => $this->input->post('tugas')
		];
		$data = $this->Calendar_model->add('tugas', $data);
		if(!$data){
			var_dump($data);
			return false;
		}
		redirect('calendar');
	}

	public function add_new_assignment()
	{
		$data = [
			'id_petugas' => $this->input->post('id_petugas'),
			'id_tugas' => $this->input->post('id_tugas'),
			'waktu_mulai' => $this->input->post('waktu_mulai'),
			'waktu_berakhir' => $this->input->post('waktu_berakhir')
		];
		$data = $this->Calendar_model->add('pembagian_tugas', $data);
		if(!$data){
			var_dump($data);
			return false;
		}
		redirect('calendar');
	}

	public function get_pembagian_tugas()
	{
		$data = $this->Calendar_model->query('SELECT pembagian_tugas.id, pembagian_tugas.id_petugas, pembagian_tugas.id_tugas, petugas.nama AS nama_petugas, tugas.nama AS title, pembagian_tugas.waktu_mulai AS start, pembagian_tugas.waktu_berakhir AS end FROM pembagian_tugas
		INNER JOIN `petugas` ON petugas.id = pembagian_tugas.id_petugas
		INNER JOIN `tugas` ON tugas.id = pembagian_tugas.id_tugas');
		echo json_encode($data);
	}

	public function delete_pembagian_tugas($id)
	{
		$data = $this->Calendar_model->delete('pembagian_tugas', ['id' => $id]);
		if(!$data){
			var_dump($data);
			return false;
		}
		redirect('calendar');
	}

	public function update_pembagian_tugas()
	{
		$id = $this->input->post('id');
		$data = [
			'id_petugas' => $this->input->post('id_petugas'),
			'id_tugas' => $this->input->post('id_tugas'),
			'waktu_mulai' => $this->input->post('waktu_mulai'),
			'waktu_berakhir' => $this->input->post('waktu_berakhir')
		];
		$data = $this->Calendar_model->update('pembagian_tugas', $data, $id);
		if(!$data){
			var_dump($data);
			return false;
		}
		redirect('calendar');
	}
	
	public function delete_task($id)
	{
		$data = $this->Calendar_model->delete('tugas', ['id' => $id]);
		if(!$data){
			var_dump($data);
			return false;
		}
		redirect('calendar');
	}

	public function get_tugas()
	{
		$data = $this->Calendar_model->getAllData('tugas');
		echo json_encode($data);
	}
}
