<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Validator;
use Illuminate\Support\Facades\Storage;


use App\FileManager;

class FileManagerController extends Controller
{
	public function index()
	{
		$file = FileManager::orderBy('created_at', 'desc')->get();

		return view('admin.media.index')
			->with('file', $file);
	}

	public function upload()
	{
		//$gambar = FileManager::get();
		return view('admin.media.create');
	}

	public function proses_upload(Request $request)
	{
		$validation = Validator::make($request->all(), [
			'file' => 'required',
		]);




		if ($validation->passes()) {
			// menyimpan data file yang diupload ke variabel $file
			$file = $request->file('file');
			$filemanager = new FileManager();

			$filemanager->name_file = time().'-'.$file->getClientOriginalName();
			$filemanager->description = $file->getClientOriginalName();
			$filemanager->alt_text = $file->getClientOriginalName();
			$filemanager->type_file = $file->getMimeType();
			$filemanager->directory = "/media" . "/" . $filemanager->name_file;
			$filemanager->save();

			$directory = asset("/media" . "/" . $filemanager->name_file);

			$nama_file = $filemanager->name_file;
			$tujuan_upload = 'media';


			$file->move($tujuan_upload, $nama_file);

			return response()->json([
				'message'   => 'Image Upload Successfully',
				'uploaded_image' => $directory,
				'class_name'  => 'alert-success',
				'data' => json_encode($filemanager)
			]);
		} else {
			return response()->json([
				'message'   => $validation->errors()->all(),
				'uploaded_image' => '',
				'class_name'  => 'alert-danger',
				'data' => $filemanager
			]);
		}



		return redirect()->route('admin.file.index');

		/*$this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
			'keterangan' => 'required',
		]);

		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');

		$nama_file = time()."_".$file->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);

		Gambar::create([
			'file' => $nama_file,
			'keterangan' => $request->keterangan,
		]);

		return redirect()->back();*/
	}
	public function proses_edit($id, Request $request)
	{
		
		//$file = $request->file('file');
		$filemanager = FileManager::find($id);
		$old_name = $filemanager->name_file;
		//return $filemanager;

		$filemanager->name_file = time().'-'.$request->name_file;
		$filemanager->description = $request->description;
		$filemanager->alt_text = $request->alt_text;
		//$filemanager->type_file = $file->getMimeType();
		$filemanager->directory = "/media" . "/" . $filemanager->name_file;
		$filemanager->save();
		Storage::move('/media' .'/'.$old_name, "/media" ."/".$filemanager->name_file);

		//$directory = asset("/media" . "/" . $file->getClientOriginalName());

		//$nama_file = $file->getClientOriginalName();
		//$tujuan_upload = 'media';


		//$file->move($tujuan_upload, $nama_file);


		return redirect()->route('admin.file.index');

		/*$this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
			'keterangan' => 'required',
		]);

		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');

		$nama_file = time()."_".$file->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);

		Gambar::create([
			'file' => $nama_file,
			'keterangan' => $request->keterangan,
		]);

		return redirect()->back();*/
	}
	public function uploadImage(Request $request)
	{
		//JIKA ADA DATA YANG DIKIRIMKAN
		if ($request->hasFile('upload')) {
			$file = $request->file('upload'); //SIMPAN SEMENTARA FILENYA KE VARIABLE

			$filemanager = new FileManager();

			$filemanager->name_file = $file->getClientOriginalName();
			$filemanager->description = $file->getClientOriginalName();
			$filemanager->alt_text = $file->getClientOriginalName();
			$filemanager->type_file = $file->getMimeType();
			$filemanager->directory = "/media" . "/" . $file->getClientOriginalName();
			$filemanager->save();

			$directory = asset("/media" . "/" . $file->getClientOriginalName());

			$nama_file = $file->getClientOriginalName();
			$tujuan_upload = 'media';


			$file->move($tujuan_upload, $nama_file);


			//$fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); //KITA GET ORIGINAL NAME-NYA
			//KEMUDIAN GENERATE NAMA YANG BARU KOMBINASI NAMA FILE + TIME
			//$fileName = $fileName . '_' . time() . '.' . $file->getClientOriginalExtension();

			
			//$file->move(public_path('uploads'), $fileName); //SIMPAN KE DALAM FOLDER PUBLIC/UPLOADS

			//KEMUDIAN KITA BUAT RESPONSE KE CKEDITOR
			$ckeditor = $request->input('CKEditorFuncNum');
			$url = $directory;
			$msg = 'Image uploaded successfully'; 
			//DENGNA MENGIRIMKAN INFORMASI URL FILE DAN MESSAGE
			$response = "<script>window.parent.CKEDITOR.tools.callFunction($ckeditor, '$url', '$msg')</script>";

			//SET HEADERNYA
			@header('Content-type: text/html; charset=utf-8; X-Frame-Options=ALLOW FROM http://119.8.160.93/'); 
			return $response;
		}
	}
	private function save(FileManager $file, Request $request)
	{
		//$file->id = $request->id;
		/*$file->name_file = $request->name_file;
		$file->description = $request->description;
		$file->alt_text = $request->alt_text;
		$file->type_file = $request->type_file;
		$file->directory = $request->directory;*/
		$file->name_file = $request->getClientOriginalName();
		$file->description = $request->getClientOriginalName();
		$file->alt_text = $request->getClientOriginalName();
		$file->type_file = $request->getMimeType();
		$file->directory = 'media/' . $request->getClientOriginalName();
		$file->save();
	}
}
