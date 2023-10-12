<?php
namespace App\Models\web;
use CodeIgniter\Model;

class UsuariosWebModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'usuarios';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["nombre","id_perfil","id_concesionario","cargo","identificacion","telefono","celular","email","login","password","ciudad","cod_anterior","imagen","mmdd_imagen_filename","mmdd_imagen_filetype","mmdd_imagen_filesize","estado","fecha_solicitud"];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function listatardatos($id = 0)
	{
		$array = ["nombre","id_perfil","id_concesionario","cargo","identificacion","telefono","celular","email","login","password","ciudad","cod_anterior","imagen","mmdd_imagen_filename","mmdd_imagen_filetype","mmdd_imagen_filesize","estado","fecha_solicitud"];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}
}
/* fecha de creacion: 01-26-2023 11:23:45 am */