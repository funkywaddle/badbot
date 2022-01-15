<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class ConfigService {

    private $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function getList() {
        return $this->model->all();
    }

    public function getSingleById($id) {
        return $this->model->where('id', $id)->first();
    }

    public function updateSingle($id, $data) {
        $config = $this->getSingleById($id);
        $config->value = $data[$config->key];
        $config->save();
    }
}
