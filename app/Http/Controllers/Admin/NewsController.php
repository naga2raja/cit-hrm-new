<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Carbon\Carbon;
use App\tNews;
use Session;
use DB;

class NewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $post_by = $request->input('post_by');
        $date = date('Y-m-d', strtotime($request->input('date')));
        $status = $request->input('status');

        $news = tNews::selectRaw('t_news.*, CONCAT_WS (" ", employees.first_name, employees.middle_name, employees.last_name) as employee_name')
                       ->join('employees', 'employees.id', 't_news.created_by');
        if ($post_by) {
            $news->Where('t_news.created_by', $post_by);
        }
        if (($date)&&($date != '1970-01-01')) {
            $news->Where('t_news.date', $date);
        }
        if ($status) {
            $news->Where('t_news.status', $status);
        }
        $news = $news->orderBy('created_at', 'desc')
                    ->get();
        // dd($news);
        return view('admin/news/list', compact('news'));
    }

    public function create(Request $request)
    {
        return view('admin/news/add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'news' => 'required',
            'category' => 'required'
        ]);

        // create
        $news = tNews::create([
            'title'  => $request->input('title'),
            'news'  => $request->input('news'),
            'category' => $request->input('category'),
            'date'  => date('Y-m-d'),
            'created_by'  => Auth::User()->id,
            'status'  => $request->input('status')
        ]);

        return redirect()->back()->with('success', 'News Posted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = tNews::find($id);
        return view('admin/news/edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'news' => 'required',
            'category' => 'required'
        ]);

        $news = tNews::find($id);
        $news->title = $request->input('title');
        $news->news = $request->input('news');
        $news->category = $request->input('category');
        $news->status = $request->input('status');
        $news->save();

        return redirect()->back()->with('success', 'News Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteMultiple(Request $request)
    {
        if($request->delete_ids) {
            tNews::whereIn('id', $request->delete_ids)
                    ->get()
                    ->map(function($news) {
                        $news->delete();
                    });
            return true;
        } else {
            return false;
        }       
    }
    
}
