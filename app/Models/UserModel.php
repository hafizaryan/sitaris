<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['nama', 'username', 'foto', 'no_identitas', 'email', 'password_hash', 'role_user'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedFiled = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [];
    protected $skipValidation = false;

    protected $dynamicRules = [
        'insertData' => [
            'username' => 'required|alpha_space|is_unique[user.username, id_user, {id_user}]',
            'nama' => 'required|alpha_space',
            'password' => 'required|min_length[8]',

        ],
    ];
    protected $validationMessages = [
        'username' => [
            'is_unique' => 'Username sudah digunakan'
        ],
    ];


    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    public function getRule(string $rule)
    {
        return $this->dynamicRules[$rule];
    }

    protected function hashPassword(array $data)
    {
        if (!isset($data['data']['password'])) return $data;

        $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        unset($data['data']['password']);

        return $data;
    }

    public function getUsersByRole($role)
    {
        return $this->where('role_user', $role)->findAll();
    }
    public function getUsersByNo($no)
    {
        return $this->where('no_identitas', $no)->findAll();
    }
}
