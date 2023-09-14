<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\StoreRequest;
use App\Http\Requests\Admin\News\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $news = DB::table('news')
            ->join('users', 'users.id', '=', 'news.user_id')
            ->select('news.*', 'users.email as email')->get();
        return view('modules.admin.news.index', ['news' => $news]);
    }
    public function create()
    {
        $users = DB::table('users')->get();
        return view('modules.admin.news.create', ['users' => $users]);
    }
    public function store(StoreRequest $request)
    {
        $news = $request->except('_token');
        $news['created_at'] = new \Datetime;

        DB::table('news')->insert($news);
        return redirect()->route('admin.news.index')->with('success', 'Create news successfully');
    }
    public function edit($id)
    {
        $news = DB::table('news')
            ->join('users', 'users.id', '=', 'news.user_id')
            ->select('news.*', 'users.email as email', 'users.id as uid')->where('news.id', $id)->first();
        return view('modules.admin.news.edit', ['news' => $news]);
    }
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = new \Datetime;
        DB::table('news')->where('id', $id)->update($data);
        return redirect()->route('admin.news.index')->with('success', 'Edit news successfully');
    }
    public function remove($id)
    {   
        DB::table('news')->where('id', $id)->delete();
        return redirect()->route('admin.news.remove')->with('success', 'Edit news successfully');
    }
}
