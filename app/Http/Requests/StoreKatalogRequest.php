<?php 

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreKatalogRequest extends Request
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'judul' => 'required|min:3',
			'deskripsi' => 'required|min:10',
			'kategori_id' => 'required',
			'harga' => 'required',
			'email' => 'required|email',
		];
	}
}