<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class CurrencyService {

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

    public function addSingle($data) {
        $currency = new $this->model;
        $currency->currency = $data['currencyName'];
        $currency->save();
    }

    public function updateSingle($id, $data) {
        $currency = $this->getSingleById($id);
        $currency->currency = $data['currencyName'];
        $currency->save();
    }

    public function deleteSingle($id) {
        $this->model->destroy($id);
    }

}
