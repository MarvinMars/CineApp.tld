<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Comment\IndexComment;
use App\Http\Requests\Admin\Comment\StoreComment;
use App\Http\Requests\Admin\Comment\UpdateComment;
use App\Http\Requests\Admin\Comment\DestroyComment;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Comment;

class CommentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexComment $request
     * @return Response|array
     */
    public function index(IndexComment $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Comment::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'likes', 'user_id', 'film_id', 'parent_id'],

            // set columns to searchIn
            ['id', 'content']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.comment.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.comment.create');

        return view('admin.comment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreComment $request
     * @return Response|array
     */
    public function store(StoreComment $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Comment
        $comment = Comment::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/comments'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/comments');
    }

    /**
     * Display the specified resource.
     *
     * @param  Comment $comment
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Comment $comment)
    {
        $this->authorize('admin.comment.show', $comment);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Comment $comment
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Comment $comment)
    {
        $this->authorize('admin.comment.edit', $comment);

        return view('admin.comment.edit', [
            'comment' => $comment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateComment $request
     * @param  Comment $comment
     * @return Response|array
     */
    public function update(UpdateComment $request, Comment $comment)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Comment
        $comment->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/comments'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/comments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyComment $request
     * @param  Comment $comment
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyComment $request, Comment $comment)
    {
        $comment->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
