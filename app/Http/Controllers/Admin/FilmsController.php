<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Film\IndexFilm;
use App\Http\Requests\Admin\Film\StoreFilm;
use App\Http\Requests\Admin\Film\UpdateFilm;
use App\Http\Requests\Admin\Film\DestroyFilm;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Film;

class FilmsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexFilm $request
     * @return Response|array
     */
    public function index(IndexFilm $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Film::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'rating', 'likes', 'enabled'],

            // set columns to searchIn
            ['id', 'title', 'slug', 'description', 'seo_keywords', 'seo_description']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.film.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.film.create');

        return view('admin.film.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFilm $request
     * @return Response|array
     */
    public function store(StoreFilm $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Film
        $film = Film::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/films'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/films');
    }

    /**
     * Display the specified resource.
     *
     * @param  Film $film
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Film $film)
    {
        $this->authorize('admin.film.show', $film);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Film $film
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Film $film)
    {
        $this->authorize('admin.film.edit', $film);

        return view('admin.film.edit', [
            'film' => $film,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateFilm $request
     * @param  Film $film
     * @return Response|array
     */
    public function update(UpdateFilm $request, Film $film)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Film
        $film->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/films'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/films');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyFilm $request
     * @param  Film $film
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyFilm $request, Film $film)
    {
        $film->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
