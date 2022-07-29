<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPostCategory;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function BlogCategory()
    {
        $blogcategory = BlogPostCategory::with('category')->latest()->get();
        return view('backend.blog.category.category_view', compact('blogcategory'));
    }


    public function BlogCategoryStore(Request $request)
    {
        $request->validate(
            [
                'blog_category_name_en' => 'required',
                'blog_category_name_my' => 'required',

            ],
            [
                'blog_category_name_en.required' => 'Input BlogCategory English Name',

                'blog_category_name_my.required' => 'Input Category Myanmar Name',
            ]
        );


        BlogPostCategory::insert([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_my' => $request->blog_category_name_my,
            'blog_category_slug_en' => strtolower(str_replace(' ', '-', $request->blog_category_name_en)),
            'blog_category_slug_my' => strtolower(str_replace(' ', '-', $request->blog_category_name_my)),
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'BlogCategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function BlogCategoryEdit($id)
    {
        $blogcategory = BlogPostCategory::findOrFail($id);
        return view('backend.blog.category.category_edit', compact('blogcategory'));
    }

    public function BlogCategoryUpdate(Request $request)
    {
        $blogcategory_id = $request->id;

        BlogPostCategory::findOrFail($blogcategory_id)->update([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_my' => $request->blog_category_name_my,

        ]);
        $notification = array(
            'message' => 'BlogCategory updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('blog.category')->with($notification);
    }

    public function BlogCategoryDelete($id)
    {
        BlogPostCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Category deleted Successfully',
            'alert-type' => 'danger'
        );
        return redirect()->route('blog.category')->with($notification);
    }

    ////////////// Blog Post All Methods ///////////
    public function ListBlogPost()
    {
        $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.post_list', compact('blogpost'));
    }

    public function AddBlogPost()
    {
        $blogpost = BlogPost::latest()->get();
        $blogcategory = BlogPostCategory::latest()->get();
        return view('backend.blog.post.post_view', compact('blogpost', 'blogcategory'));
    }

    public function BlogPostStore(Request $request)
    {
        $request->validate(
            [
                'post_title_en' => 'required',
                'post_title_my' => 'required',
                'post_image' => 'required',

            ],
            [
                'post_title_en.required' => 'Input Brand English Name',
                'post_title_my.required' => 'Input Brand Myanmar Name',
            ]
        );
        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(780, 433)->save('upload/post/' . $name_gen);
        $save_url = 'upload/post/' . $name_gen;

        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title_en' => $request->post_title_en,
            'post_title_my' => $request->post_title_my,
            'post_slug_en' => strtolower(str_replace(' ', '-', $request->post_title_en)),
            'post_slug_my' => strtolower(str_replace(' ', '-', $request->post_title_my)),
            'post_image' => $save_url,
            'post_details_en' => $request->post_details_en,
            'post_details_my' => $request->post_details_my,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Post Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('list.post')->with($notification);
    }

    public function BlogPostEdit($id)
    {
        $blogpost = BlogPost::findOrFail($id);
        $blogcategory = BlogPostCategory::latest()->get();
        return view('backend.blog.post.post_edit', compact('blogpost', 'blogcategory'));
    }

    public function BlogPostUpdate(Request $request, $id)
    {
        $old_img = $request->old_image;


        if ($request->file('post_image')) {
            unlink($old_img);
            $image = $request->file('post_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(780, 433)->save('upload/post/' . $name_gen);
            $save_url = 'upload/post/' . $name_gen;

            BlogPost::findOrFail($id)->update([
                'category_id' => $request->category_id,
                'post_title_en' => $request->post_title_en,
                'post_title_my' => $request->post_title_my,
                'post_slug_en' => strtolower(str_replace(' ', '-', $request->post_title_en)),
                'post_slug_my' => strtolower(str_replace(' ', '-', $request->post_title_my)),
                'post_image' => $save_url,
                'post_details_en' => $request->post_details_en,
                'post_details_my' => $request->post_details_my,
                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'BlogPost updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('list.post')->with($notification);
        } else {
            BlogPost::findOrFail($id)->update([
                'category_id' => $request->category_id,
                'post_title_en' => $request->post_title_en,
                'post_title_my' => $request->post_title_my,
                'post_slug_en' => strtolower(str_replace(' ', '-', $request->post_title_en)),
                'post_slug_my' => strtolower(str_replace(' ', '-', $request->post_title_my)),

                'post_details_en' => $request->post_details_en,
                'post_details_my' => $request->post_details_my,
                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'BlogPost updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('list.post')->with($notification);
        }
    }

    public function BlogPostDelete($id)
    {
        $post = BlogPost::findOrFail($id);
        $img = $post->post_image;
        unlink($img);

        BlogPost::findOrFail($id)->delete();

        $notification = array(
            'message' => 'BlogPost deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('list.post')->with($notification);
    }
}
