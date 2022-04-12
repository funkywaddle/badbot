<?php
namespace App\Http\Controllers\Admin;

use App\Services\CategoryService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller {

    use AuthenticatesUsers;
    private $service;

    public function __construct(CategoryService $service) {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function index(Request $request) {
        $categories = $this->service->getList(false);
        return view('category.list', ['categories'=>$categories]);
    }

    public function create(Request $request) {
        return view('category.addForm');
    }

    public function store(Request $request) {
        $this->service->addSingle($request->toArray());
        return redirect(route('categories.index'))->with('status', $request->categoryName.' has been added.');
    }

    public function edit(Request $request, $id) {
        $category = $this->service->getSingleById($id);
        error_log(print_r($category->toArray(), 1));
        return view('category.editForm', ['category'=>$category]);
    }

    public function update(Request $request, $id) {
        $this->service->updateSingle($id, $request->toArray());
        return redirect(route('categories.index'));
    }

    public function remove(Request $request, $id) {
        $category = $this->service->getSingleById($id);
        return view('category.deleteForm', ['category'=>$category]);
    }

    public function destroy(Request $request, $id) {
        $category = $this->service->getSingleById($id);
        if($request->categoryDelete === "DELETE"){
            $this->service->deleteSingle($id);
            return redirect(route('categories.index'))->with('status', $category->name . ' has been deleted');
        } else {
            $flash = [
                'status'=>'You didn\'t type DELETE in all caps',
                'status-class'=>'alert-danger'
            ];

            return redirect(route('categories.remove', ['category'=>$category->id]))->with($flash);
        }
    }

    public function toggleShow(Request $request, $id) {
        $this->service->toggleShow($id);
    }
}
