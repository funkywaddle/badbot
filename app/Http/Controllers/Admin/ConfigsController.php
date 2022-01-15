<?php
namespace App\Http\Controllers\Admin;

use App\Services\ConfigService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigsController extends Controller {

    use AuthenticatesUsers;
    private $service;

    public function __construct(ConfigService $service) {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function index(Request $request) {
        $configs = $this->service->getList();
        return view('config.list', ['configs'=>$configs]);
    }

    public function edit(Request $request, $id) {
        $config = $this->service->getSingleById($id);
        return view('config.editForm', ['config'=>$config]);
    }

    public function update(Request $request, $id) {
        $this->service->updateSingle($id, $request->toArray());
        return redirect(route('configs.index'));
    }
}
