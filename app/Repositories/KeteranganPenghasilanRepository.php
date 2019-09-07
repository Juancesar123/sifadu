<?php

namespace App\Repositories;

use App\Models\KeteranganPenghasilan;
use InfyOm\Generator\Common\BaseRepository;

class KeteranganPenghasilanRepository extends BaseRepository
{
	protected $fieldSearchable = [
		// 'daftar_sarana',
		// 'penanggungjawab',
		// 'lokasi',
		// 'kondisi',
		// 'sdm'
	];

	public function model()
	{
		return KeteranganPenghasilan::class;
	}
}