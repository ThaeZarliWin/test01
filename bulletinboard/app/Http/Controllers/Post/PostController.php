<?php

namespace App\Http\Controllers\Post;

use App\Models\User;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Contracts\Services\Post\PostServiceInterface;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\CSVFileRequest;
use Auth;
use App\Imports\CSVFiles;
use App\Exports\DownloadPost;

class PostController extends Controller
{
    private $postService;

    /**
     * Create a new controller instance.
     *
     * @param PostServiceInterface $postService
     */
    public function __construct(PostServiceInterface $postService)
    {
        // $this->middleware('auth');
        $this->postService = $postService;
    }

    /**
     * Create a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('posts.create_post');
    }

    /**
     * Confirm a new post instance after a valid registration.
     *
     * @param PostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function createConfirm(PostRequest $request)
    {
        $validator = $request->validated();
        $post = $this->postService->createConfirm($request);
        return view('posts.create_post_confirm', compact('post'));
    }

     /**
     * Store Post Detail
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posts = $this->postService->store($request);
        return redirect()->intended('post_list')
            ->withSuccess('Post create successfully.');
    }

    /**
     * Show and Search Post List Function
     *
     * @param Request $request
     * @return void
     */

    public function show(Request $request) {
        $posts = $this->postService->show($request);
        return view('posts.post_list', compact('posts'));
    }

     /**
     * Show the form for update post
     *
     * @param $post_id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id)
    {
        $post_detail = $this->postService->edit($post_id);
        return view('posts.update_post', compact('post_detail'));
    }
    /**
     * Update post after validation
     *
     * @param  PostRequest $request
     * @param  $post_id
     * @return \Illuminate\Http\Response
     */
    public function editConfirm(PostRequest $request, $post_id)
    {
        $validator = $request->validated($post_id);
        $post = $this->postService->editConfirm($request);
        return view('posts.update_post_confirm', compact('post','post_id'));
    }
    /**
     * Update Post in database.
     *
     * @param  Request $request
     * @param  $post_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post_id)
    {
        $posts = $this->postService->update($request, $post_id);
        return redirect()->intended('post_list')
            ->withSuccess('Post update successfully.');
    }
    /**
     * Delete Post
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $post_id) 
    {
        $posts = $this->postService->destroy( $request, $post_id = $request->post_id);
        return redirect()->intended('post_list')
            ->withSuccess('Post delete successfully.');
    }
    /**
    * upload post
    * @return void
    */
    public function uploadView()
    {
       return view('posts.upload_csv');
    }
    /**
     * Upload File Function
     *
     * @param CSVFileRequest $request
     * @return void
     */
    public function uploadFile(CSVFileRequest $request)
    {
        $validator = $request->validated();
        Excel::import(new CSVFiles , request() -> file ('import_file'));
        return redirect('post_list');
    }
    /**
     * Download Post Function
     *
     * @param Request $request
     * @return void
     */
    public function download(Request $request) 
    {
        return Excel::download(new DownloadPost , 'post.xlsx');
    }
}
