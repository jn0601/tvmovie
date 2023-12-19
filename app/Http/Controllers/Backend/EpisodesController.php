<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\EpisodesRequest;
use App\Models\Episode;
use App\Models\EpisodeServer;
use App\Models\ServerLink;
use App\Models\Subtitle;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;

class EpisodesController extends Controller
{
    // phân trang
    private $pagination = 10;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $url = 'admin-pages.episodes.add_edit_episodes';
        $listServerLink = ServerLink::orderBy('display_order', 'desc')->get();
        $data = '';
        return view($url)
        ->with('movie_id', $id)
        ->with('listServerLink', $listServerLink)
        ->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EpisodesRequest $request)
    {
        $data = $request->all();
        $item = new Episode();
        $item->name = $data['name'];
        $item->desc = $data['desc'] ? $data['desc'] : '';
        $item->content = $data['content'] ? $data['content'] : '';
        $item->seo_name = $data['seo_name'];

        
        $item->tags = $data['tags'] ? $data['tags'] : '';
        $item->meta_title = $data['meta_title'] ? $data['meta_title'] : '';
        $item->meta_desc = $data['meta_desc'] ? $data['meta_desc'] : '';
        $item->meta_keyword = $data['meta_keyword'] ? $data['meta_keyword'] : '';

        $item->episode = $data['episode'] ? $data['episode'] : '';
        $item->movie_id = $data['movie_id'];
        $item->admin_id = 123;
        $item->status = $data['status'];
        $item->options = isset($data['options']) ? implode(',', $data['options']) : '';
        $item->count_view = 0;
        $item->date_created = date("Y-m-d H:i:s");
        $item->date_updated = date("Y-m-d H:i:s");
        $item->display_order = Episode::max('display_order') + 1;
        $item->save();

        // save vào bảng phụ
        // subtitles
        $subtitle_file_vi = $request->file('subtitle_file_vi');
        if ($subtitle_file_vi) {
            $vi = new Subtitle();
            $vi->episode_id = $item->id;
            $vi->name = 'Tiếng Việt'; 
            $file_name_vi = $subtitle_file_vi->getClientOriginalName();
            $subtitle_file_vi->move('public/backend/uploads/subtitles', $file_name_vi);
            $vi->file = $file_name_vi;
            $vi->save();
        }

        $subtitle_file_en = $request->file('subtitle_file_en');
        if ($subtitle_file_en) {
            $en = new Subtitle();
            $en->episode_id = $item->id;
            $en->name = 'Tiếng Anh'; 
            $file_name_en = $subtitle_file_en->getClientOriginalName();
            $subtitle_file_en->move('public/backend/uploads/subtitles', $file_name_en);
            $en->file = $file_name_en;
            $en->save();
        }
        
        // //episode_servers
        // $link = $request->input('link');
        // // $server = $request->input('server');
        // if ($link != '') {
        //     foreach ($link as $key => $value) {
        //         $episode_server = new EpisodeServer();
        //         $episode_server->episode_id = $item->id;
        //         $episode_server->link = $value;
                
        //         $episode_server->save();
        //     }
        // }
        

        Toastr::success('Thêm thành công', 'Thành công');
        return Redirect::to('admin/episodes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $url = 'admin-pages.episodes.list_episodes';
        $list = Episode::where('movie_id', $id)->orderBy('display_order', 'desc')->paginate($this->pagination);
        $view = view($url)
        ->with('data', $list);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $url = 'admin-pages.episodes.add_edit_episodes';
        $data = Episode::where('id', $id)->first();
        $view = view($url)
        ->with('data', $data);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EpisodesRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
