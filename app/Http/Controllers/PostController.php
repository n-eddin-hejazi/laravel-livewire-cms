<?php
namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
class PostController extends Controller
{
    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
        $this->middleware('verified')->only('create');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->post::with('user:id,name,profile_photo_path')->approved()->paginate(10);
        $title = "All posts";
        return view('index', compact('posts', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "add new post";
        return view('posts.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $slug = str_replace(" ", "-", strtolower(trim($request->title)));

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . $file->getClientOriginalName();
            $file->storeAs('public/images/', $filename);
        }

        $request->user()->posts()->create($request->all() + ['image_path' => $filename ?? 'default.jpg'] + ['slug' => $slug]);

        return back()->with('success', 'post added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $post = $this->post::where('slug', $slug)->first();
        $comments = $post->comments->sortByDesc('created_at');

        return view('posts.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = $this->post::find($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        
        $data['category_id'] = $request->category_id;

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . $file->getClientOriginalName();
            $file->storeAs('public/images/', $filename);
        }

        $request->user()->posts()->where('slug', $slug)->update($data + ['image_path'=> $filename ?? 'default.jpg']);

        return redirect(route('post.show', $data['slug']))->with('success', 'successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request)
    {
        $posts = $this->post->where('body', 'LIKE', '%' . $request->keyword . '%')->with('user')->approved()->paginate(10);
        $title = "Search results for: " . $request->keyword;
        return view('index', compact('posts', 'title'));
    }

    public function getByCategory($id)
    {
        $posts = $this->post::with('user')->whereCategory_id($id)->approved()->paginate(10);
        $title = "Posts belong to: " . Category::find($id)->title;
        return view('index', compact('posts', 'title'));
    }


}
