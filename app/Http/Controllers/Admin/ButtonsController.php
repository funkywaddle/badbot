<?php
namespace App\Http\Controllers\Admin;

use App\Services\ButtonsService;
use App\Services\CategoryService;
use App\Services\CurrencyService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ButtonsController extends Controller {

    use AuthenticatesUsers;
    private $service;

    public function __construct(ButtonsService $service) {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function index(Request $request) {
        $buttons = $this->service->getList();
        return view('button.list', ['buttons'=>$buttons]);
    }

    public function create(Request $request, CategoryService $categoryService, CurrencyService $currencyService) {
        $categories = $categoryService->getList();
        $currencies = $currencyService->getList();
        $data = [
            'categories'=>$categories,
            'currencies'=>$currencies,
            'options'=>$this->service->getEmptyOptionsArray(),
            'custom_options'=> $this->service->getCustomOptions(0)
        ];
        return view('button.addForm', $data);
    }

    public function store(Request $request) {
        $this->service->addSingle($request->toArray());
        return redirect(route('buttons.index'))->with('status', $request->command.' has been added.');
    }

    public function edit(Request $request, $id, CategoryService $categoryService, CurrencyService $currencyService) {
        $categories = $categoryService->getList();
        $currencies = $currencyService->getList();
        $button = $this->service->getSingleById($id);
        $options = (array) $button->options->toArray();
        $custom_options = $this->service->getCustomOptions($id);

        $data = [
            'button'=>$button,
            'categories'=>$categories,
            'currencies'=>$currencies,
            'options'=>$options,
            'custom_options'=>$custom_options
        ];
        return view('button.editForm', $data);
    }

    public function update(Request $request, $id) {
        $this->service->updateSingle($id, $request->toArray());
        return redirect(route('buttons.index'));
    }

    public function remove(Request $request, $id) {
        $button = $this->service->getSingleById($id);
        return view('button.deleteForm', ['button'=>$button]);
    }

    public function destroy(Request $request, $id) {
        $button = $this->service->getSingleById($id);
        if($request->delete === "DELETE"){
            $this->service->deleteSingle($id);
            return redirect(route('buttons.index'))->with('status', $button->name . ' has been deleted');
        } else {
            $flash = [
                'status'=>'You didn\'t type DELETE in all caps',
                'status-class'=>'alert-danger'
            ];

            return redirect(route('buttons.remove', ['button'=>$button->id]))->with($flash);
        }
    }
}
