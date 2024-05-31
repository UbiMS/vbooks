<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\FinalModel;
use App\Models\GeneralModel;
use App\Models\PinjamModel;

class Page extends BaseController

{
	protected $GeneralModel;
	protected $FinalModel;
	protected $AuthModel;
	protected $PinjamModel;

	public function __construct()
	{
		$this->GeneralModel = new GeneralModel();
		$this->FinalModel = new FinalModel();
		$this->AuthModel = new AuthModel();
		$this->PinjamModel = new PinjamModel();
	}
	public function login()
	{
		echo view("login");
	}

	public function register()
	{
		echo view("register");
	}

	public function home_page()
	{
		echo view("home_page");
	}

	public function general_catalog()
	{
		$keyword = $this->request->getVar('keyword');

		if ($keyword) {
			$datageneral = $this->GeneralModel->search($keyword);
		} else {
			$datageneral = $this->GeneralModel->findAll();
		}

		$data = [
			'title' => 'General',
			'book' => $datageneral
		];

		echo view("general_catalog", $data);
	}
	public function detail_general($id = false)
	{
		$id_user = session()->get('id');
		$datageneral = $this->GeneralModel->where('id_buku', $id)->first();
		$user = $this->AuthModel->where('id_user', $id_user)->first();

		$data = [
			'title' => 'General',
			'book' => $datageneral,
			'user' => $user,
		];
		echo view("detail-book", $data);
	}

	public function pinjam_buku()
	{
		$id_user = session()->get('id');
		$id_buku = $this->request->getVar('id_buku');
		$title = $this->request->getVar('title');

		$existingLoan = $this->PinjamModel->where('id_user', $id_user)
			->where('title', $title)
			->first();

		if ($existingLoan) {
			session()->setFlashdata('error', 'Anda sudah pernah meminjam buku dengan judul ini.');
			return redirect()->to(base_url('detail_general/' . $id_buku));
		}
		$this->PinjamModel->save([
			'id_user' => $id_user,
			'title' => $title,
			'category' => $this->request->getVar('category'),
			'nama_lengkap' => $this->request->getVar('nama_lengkap'),
			'nim' => $this->request->getVar('nim'),
			'program_studi' => $this->request->getVar('program_studi'),
			'tanggal_pinjam' => $this->request->getVar('tanggal_pinjam'),
			'tanggal_kembali' => $this->request->getVar('tanggal_kembali'),
			'status' => 'On Loan',
		]);

		// Set flashdata untuk pesan sukses
		session()->setFlashdata('pesan', 'Formulir telah berhasil disubmit');
		return redirect()->to(base_url('detail_general/' . $id_buku));
	}

	public function finalTask_catalog()
	{
		$keyword = $this->request->getVar('keyword');

		if ($keyword) {
			$dataFinal = $this->FinalModel->search($keyword);
		} else {
			$dataFinal = $this->FinalModel->findAll();
		}
		$id_user = session()->get('id');
		$user = $this->AuthModel->where('id_user', $id_user)->first();
		$data = [
			'title' => 'Final',
			'book' => $dataFinal,
			'user' => $user,
		];
		echo view("finalTask_catalog", $data);
	}
	public function pinjam_buku_final()
	{
		$id_user = session()->get('id');
		$id_buku = $this->request->getVar('id_buku');
		$title = $this->request->getVar('title');

		$existingLoan = $this->PinjamModel->where('id_user', $id_user)
			->where('title', $title)
			->first();

		if ($existingLoan) {
			session()->setFlashdata('error', 'Anda sudah pernah meminjam buku dengan judul ini.');
			return redirect()->to(base_url('finalTask_catalog'));
		}
		$this->PinjamModel->save([
			'id_user' => $id_user,
			'title' => $title,
			'category' => $this->request->getVar('category'),
			'nama_lengkap' => $this->request->getVar('nama_lengkap'),
			'nim' => $this->request->getVar('nim'),
			'program_studi' => $this->request->getVar('program_studi'),
			'tanggal_pinjam' => $this->request->getVar('tanggal_pinjam'),
			'tanggal_kembali' => $this->request->getVar('tanggal_kembali'),
			'status' => 'On Loan',
		]);

		// Set flashdata untuk pesan sukses
		session()->setFlashdata('pesan', 'Formulir telah berhasil disubmit');
		return redirect()->to(base_url('finalTask_catalog'));
	}

	public function borrowing_history()
	{
		$id = session()->get('id');
		$pinjam = $this->PinjamModel->where('id_user', $id)->findAll();
		$data = [
			'title' => 'Borrowing History',
			'menu' => 'borrowing_history',
			'pinjam' => $pinjam,
		];
		return view('user/borrowingHistory', $data);
	}
	public function saved_book()
	{
		$id = session()->get('id');
		
		$data = [
			'title' => 'Saved Book',
			'menu' => 'saved_book',			
		];
		return view('user/user-save-book-general', $data);
	}
	public function saved_final()
	{
		$id = session()->get('id');
		
		$data = [
			'title' => 'Saved Book',
			'menu' => 'saved_book',			
		];
		return view('user/user-save-book-final', $data);
	}
}
