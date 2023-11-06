<?php

namespace App\Models;

use CodeIgniter\Model;

class ReferensiModel extends Model
{
    protected $table = 'referensi';
    protected $primaryKey = 'id_referensi';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['biaya'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedFiled = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
