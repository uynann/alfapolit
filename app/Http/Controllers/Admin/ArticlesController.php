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
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(20);

        return view('admin.articles.index', ['articles' => $articles]);
    }


    public function create()
    {
        return view('admin.articles.create', ['categories' => Category::all()]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:articles',
            'image' => 'mimes:jpeg,jpg,png,bmp|max:10000',
        ]);

        $article = new Article([
            'title' => $request->title,
            'category_id' => $request->category,
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


            Image::make($image->getRealPath())->resize(500, 330)->save('img/featured-image/thumbs/' . $filename, 50);
            $image->move('img/featured-image/', $filename);

            $article->image = $filename;
        }

        $message = '';

        if (isset($request->publish)) {
            $article->status = 'published';
            $massage = "Article published.";

        } elseif (isset($request->save)) {
            $article->status = 'saved';
            $message = "Article saved.";
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
        ]);

        Article::findOrFail($id)->update([
            'title' => $request->title,
            'category_id' => $request->category,
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


            Image::make($image->getRealPath())->resize(500, 330)->save('img/featured-image/thumbs/' . $filename, 50);
            $image->move('img/featured-image/', $filename);

            Article::findOrFail($id)->update(['image' => $filename]);
        }

        return redirect('/admin/articles/' . $id. '/edit')->with('message', 'Article updated.');
    }


    public function destroy(Articles $articles)
    {
        //
    }
}
