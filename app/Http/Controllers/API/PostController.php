<?php
namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Post as PostResource;



class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function index()
    {
        return $this->sendResponse(Post::paginate(10), []);
    }

//    public function search(Request $request){
//        $search = '';
//        if ($request->has('search')){
//            $search = $request->get('search');
//        }
//        return User::with('posts')->where('name', 'LIKE', "%$search%")
//            ->whereHas('posts', function ($query) use ($search){
//                $query->where('title', 'LIKE', "%$search%");
//                $query->orWhere('text', 'LIKE', "%$search%");
//            })->paginate(10);
//       // $user = User::with(['posts', 'image', 'position'])->get();
////        $user->image->path
////        $user->tasks()->exists()
////        return view('',[]);
//        //return $users;
//    }

    public function searchByName($parameter){
        $post = Post::where('title', 'LIKE', "%$parameter%")->get();
        return $post;
    }

    public function ownPosts():JsonResponse
    {
        return $this->sendResponse(Post::where('user_id', Auth::user()->id)->paginate(10), []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'user_id' => 'required',
            'text' => 'required'
        ]);



        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $post = Post::create($input);

        return $this->sendResponse(new PostResource($post), 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function show($id)
    {
        $post = Post::find($id);

        if (is_null($post)) {
            return $this->sendError('Post not found.');
        }

        return $this->sendResponse(new PostResource($post), 'Post retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function update(Request $request, Post $post)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'text' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $post->title = $input['title'];
        $post->text = $input['text'];
        $post->user_id = $input['user_id'];
        $post->save();

        return $this->sendResponse(new PostResource($post), 'Post updated successfully.');
    }

//    public function update(Request $request, $id)
//    {
//        $post = auth()->user()->posts()->find($id);
//
//        if (!$post) {
//            return response()->json([
//                'success' => false,
//                'message' => 'Post not found'
//            ], 400);
//        }
//
//        $updated = $post->fill($request->all())->save();
//
//        if ($updated)
//            return response()->json([
//                'success' => true
//            ]);
//        else
//            return response()->json([
//                'success' => false,
//                'message' => 'Post can not be updated'
//            ], 500);
//    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function delete(Post $post)
    {
        $post->delete();
        return $this->sendResponse([], 'Post deleted successfully.');
    }

}

