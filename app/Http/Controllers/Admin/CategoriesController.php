<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Category\IndexCategory;
use App\Http\Requests\Admin\Category\StoreCategory;
use App\Http\Requests\Admin\Category\UpdateCategory;
use App\Http\Requests\Admin\Category\DestroyCategory;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Category;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexCategory $request
     * @return Response|array
     */
    public function index(IndexCategory $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Category::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title'],

            // set columns to searchIn
            ['id', 'title', 'slug', 'description']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.category.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.category.create');

        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCategory $request
     * @return Response|array
     */
    public function store(StoreCategory $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Category
        $category = Category::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/categories'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  Category $category
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Category $category)
    {
        $this->authorize('admin.category.show', $category);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Category $category)
    {
        $this->authorize('admin.category.edit', $category);

        return view('admin.category.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCategory $request
     * @param  Category $category
     * @return Response|array
     */
    public function update(UpdateCategory $request, Category $category)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Category
        $category->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/categories'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyCategory $request
     * @param  Category $category
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyCategory $request, Category $category)
    {
        $category->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
