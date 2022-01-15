<?php
namespace App\Http\Controllers\Admin;

use App\Services\CurrencyService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrenciesController extends Controller {

    use AuthenticatesUsers;
    private $service;

    public function __construct(CurrencyService $service) {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function index(Request $request) {
        $currencies = $this->service->getList();
        return view('currency.list', ['currencies'=>$currencies]);
    }

    public function create(Request $request) {
        return view('currency.addForm');
    }

    public function store(Request $request) {
        $this->service->addSingle($request->toArray());
        return redirect(route('currencies.index'))->with('status', $request->currencyName.' has been added.');
    }

    public function edit(Request $request, $id) {
        $currency = $this->service->getSingleById($id);
        return view('currency.editForm', ['currency'=>$currency]);
    }

    public function update(Request $request, $id) {
        $this->service->updateSingle($id, $request->toArray());
        return redirect(route('currencies.index'));
    }

    public function remove(Request $request, $id) {
        $currency = $this->service->getSingleById($id);
        return view('currency.deleteForm', ['currency'=>$currency]);
    }

    public function destroy(Request $request, $id) {
        if($request->currencyDelete === "DELETE"){
            $currency = $this->service->getSingleById($id);
            $currencyName = $currency->currency;
            $this->service->deleteSingle($id);
            return redirect(route('currencies.index'))->with('status', $currencyName . ' has been deleted');
        } else {
            $request->session()->flash('status', 'You didn\'t type DELETE in all caps');
            $request->session()->flash('status-class', 'alert-danger');
            $currency = $this->service->getSingleById($id);
            return view('currency.deleteForm', ['currency'=>$currency]);
        }

    }

}
