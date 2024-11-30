<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Coupon;
use App\Models\Store;
use App\Models\StoreCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        
       
        return view('about');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        
       
        return view('about');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function privacy_policy()
    {
        
       
        return view('privacy_policy');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function terms_condition()
    {
        
       
        return view('terms_condition');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        
        $blogs = Blog::select([
            'blogs.*',
            'blog_categories.title as cat_title',
        ])
        ->join('blog_categories','blog_categories.id','=','blogs.category_id')
        ->where('featured1',1)
        ->orWhere('featured2',1)
        ->orWhere('featured3',1)
        ->orWhere('featured4',1)
        ->get();
       
        return view('blogs.home',compact('blogs'));
    }


     /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function blogs()
    {
    
        $blogs = Blog::select([
            'blogs.*',
            'blog_categories.title as cat_title',
        ])->join('blog_categories','blog_categories.id','=','blogs.category_id')
        ->paginate(8);

        return view('blogs.blogs',compact('blogs'));

    }


     /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function blog($id)
    {
        $categories = BlogCategory::all();
        $blog = Blog::where('slug',$id)->first();    
        return view('blogs.blog',compact('categories','blog'));
    }

  


    

     /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function blog_categories($id)
    {
        $category = BlogCategory::where('slug',$id)->first();
        if($category == false){
            return back();
        }

        $blogs = Blog::select([
            'blogs.*',
            'blog_categories.title as cat_title',
        ])->join('blog_categories','blog_categories.id','=','blogs.category_id')
        ->where('blogs.category_id',$category->id)
        ->paginate(8);
        
        return view('blogs.blog-categories',compact('category','blogs'));
    }

    

  

  
}
