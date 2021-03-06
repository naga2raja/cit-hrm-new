<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use DateTime;
use Carbon\Carbon;
use App\tNews;
use App\mCustomer;
use App\mProject;
use App\tProjectAdmin;
use App\tProjectManager;
use App\tProjectEmployee;
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
        $post_by = $request->input('employee_id');
        $date = '';
        if($request->input('date') != ""){
            $date = DateTime::createFromFormat('d/m/Y', $request->input('date'));
            $date = $date->format('Y-m-d');
        }
        $status = $request->input('status');

        $news = tNews::selectRaw('t_news.*, CONCAT_WS (" ", employees.first_name, employees.middle_name, employees.last_name) as employee_name, m_projects.project_name')
                       ->join('employees', 'employees.user_id', 't_news.created_by')
                       ->leftJoin('m_projects', 'm_projects.id', 't_news.project_id');
        if ($post_by) {
            $news->where('employees.id', $post_by);
        }
        if (($date)&&($date != '1970-01-01')) {
            $news->where('t_news.date', $date);
        }
        if ($status) {
            $news->where('t_news.status', $status);
        }
        $total = $news->count();
        if($request->sort_by && $request->sort_field) {
            $news = $news->orderBy($request->sort_field, $request->sort_by);
        } else {
            $news = $news->orderBy('date', 'desc');
        }        
        $news = $news->paginate(10);
        // dd($news);
        return view('admin/news/list', compact('news', 'total'));
    }

    public function create(Request $request)
    {
        $projects = mProject::select('m_projects.id as project_id', 'm_projects.project_name')->get();
        return view('admin/news/add', compact('projects'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'title' => 'required|min:3|max:40',
            'news' => 'required|min:3|max:400',
            'category' => 'required'
        ]);

        // create
        $news = tNews::create([
            'title'  => $request->input('title'),
            'news'  => $request->input('news'),
            'category' => $request->input('category'),
            'project_id' => $request->input('project_id'),
            'date'  => date('Y-m-d'),
            'created_by'  => Auth::User()->id,
            'status'  => $request->input('status')
        ]);

        return redirect()->route('news.index')->with('success', 'News Posted Successfully');
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
        $projects = mProject::select('m_projects.id as project_id', 'm_projects.project_name')->get();
        return view('admin/news/edit', compact('news', 'projects'));
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
            'title' => 'required|min:3|max:40',
            'news' => 'required|min:3|max:400',
            'category' => 'required'
        ]);

        $news = tNews::find($id);
        $news->title = $request->input('title');
        $news->news = $request->input('news');
        $news->category = $request->input('category');
        $news->project_id = $request->input('project_id');
        $news->date = date('Y-m-d');
        $news->status = $request->input('status');
        $news->save();

        return redirect()->route('news.index')->with('success', 'News Updated successfully');
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
