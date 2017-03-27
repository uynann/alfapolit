<?php

namespace Alfapolit\Http\Controllers\Admin;

use Alfapolit\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Alfapolit\Article;
use Alfapolit\Category;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
       $search = $request->search;
        $aritcle_all = Article::all();
        $article_published = Article::where('status', '=', 'published')->get();
        $article_draft = Article::where('status', '=', 'saved')->get();

       if (!empty($search))
       {
           $articles = Article::SearchByKeyword($search)->orderBy('id', 'desc')->paginate(20);
           $param = 'search';
           $param_val = $search;
       } else {
           $articles = Article::orderBy('id', 'desc')->paginate(20);
           $param = null;
           $param_val = null;
       }


        return view('admin.articles.index', [
            'articles' => $articles,
            'param' => $param,
            'param_val' => $param_val,
            'article_all' => $aritcle_all,
            'article_published' => $article_published,
            'article_draft' => $article_draft,
        ]);
    }


    public function create()
    {
        return view('admin.articles.create', [
            'categories' => Category::all(),
        ]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:articles',
            'image' => 'mimes:jpeg,jpg,png,bmp|max:10000',
            'category' => 'required',
        ]);

        $article = new Article([
            'title' => $request->title,
            'category_id' => $request->category,
            'sub_category_id' => $request->subcategory,
            'content' => $request->content,
            'slug' => $request->title,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '-' . $image->getClientOriginalName();

            if (!file_exists('img/featured-image')) {
                mkdir('imge/featured-image', 0777, true);
            }

            if (!file_exists('img/featured-image/thumbs')) {
                mkdir('img/featured-image/thumbs', 0777, true);
            }


            Image::make($image->getRealPath())->fit(500, 330)->save('img/featured-image/thumbs/' . $filename, 50);
            $image->move('img/featured-image/', $filename);

            $article->image = $filename;
        }

        $message = '';

        if (isset($request->save)) {
            $article->status = 'saved';
            $message = "Article saved.";
        } else {
            $article->status = 'published';
            $message = "Article published.";
        }

        $article->save();

        return redirect('/admin/articles/' . $article->id. '/edit')->with('message', $message);
    }


    public function edit($id)
    {
        return view('admin.articles.edit', [
            'categories' => Category::all(),
            'article' => Article::findOrFail($id),
        ]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:articles,title,' . $id,
            'image' => 'mimes:jpeg,jpg,png,bmp|max:10000',
            'category' => 'required',
        ]);

        Article::findOrFail($id)->update([
            'title' => $request->title,
            'category_id' => $request->category,
            'sub_category_id' => $request->subcategory,
            'content' => $request->content,
            'slug' => $request->title,
            'status' => $request->status,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '-' . $image->getClientOriginalName();

            if (!file_exists('img/featured-image')) {
                mkdir('images/featured-image', 0777, true);
            }

            if (!file_exists('img/featured-image/thumbs')) {
                mkdir('img/featured-image/thumbs', 0777, true);
            }


            Image::make($image->getRealPath())->fit(600, 360)->save('img/featured-image/thumbs/' . $filename, 50);
            $image->move('img/featured-image/', $filename);

            Article::findOrFail($id)->update(['image' => $filename]);
        }

        return redirect()->back()->with('message', 'Article updated.');
    }


    public function destroy($id)
    {
        Article::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Article trashed.');
    }
}
