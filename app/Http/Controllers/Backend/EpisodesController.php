<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\EpisodesRequest;
use App\Models\Episode;
use App\Models\EpisodeServer;
use App\Models\Movie;
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
    public function create()
    {
        // $url = 'admin-pages.episodes.add_edit_episodes';
        // $listServerLink = ServerLink::orderBy('display_order', 'asc')->get();
        // $data = '';
        // return view($url)
        // ->with('movie_seo_name', $movie_seo_name)
        // ->with('listServerLink', $listServerLink)
        // ->with('data', $data);
    }

    public function add(string $movie_seo_name)
    {
        $url = 'admin-pages.episodes.add_edit_episodes';
        $listServerLink = ServerLink::orderBy('display_order', 'asc')->get();
        $data = '';
        return view($url)
        ->with('movie_seo_name', $movie_seo_name)
        ->with('listServerLink', $listServerLink)
        ->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //dd($data);
        $item = new Episode();
        $item->name = $data['name'];
        $item->desc = $data['desc'] ? $data['desc'] : '';
        $item->content = $data['content'] ? $data['content'] : '';
        $item->seo_name = $data['seo_name'];

        
        $item->tags = $data['tags'] ? $data['tags'] : '';
        $item->meta_title = $data['meta_title'] ? $data['meta_title'] : '';
        $item->meta_desc = $data['meta_desc'] ? $data['meta_desc'] : '';
        $item->meta_keyword = $data['meta_keyword'] ? $data['meta_keyword'] : '';

        $item->episode = $data['episode'];
        $get_id = Movie::where('seo_name', $request->movie_seo_name)->get('id')->first();
        $item->movie_id = $get_id->id;
        $item->admin_id = 123;
        $item->status = $data['status'];
        $item->options = isset($data['options']) ? implode(',', $data['options']) : '';
        $item->count_view = 0;
        $item->date_created = date("Y-m-d H:i:s");
        $item->date_updated = date("Y-m-d H:i:s");
        $item->save();

        // save vào bảng phụ
        // subtitles
        $subtitle_file_vi = $request->file('subtitle_file_vi');
        if ($subtitle_file_vi) {
            $vi = new Subtitle();
            $vi->episode_id = $item->id;
            $vi->name = 'Tiếng Việt'; 
            $file_name_vi = $subtitle_file_vi->getClientOriginalName();
            $sub_name_vi = current(explode('.', $file_name_vi));
            $new_sub_name_vi = $sub_name_vi . rand(0, 99) . '.' . $subtitle_file_vi->getClientOriginalExtension();
            $subtitle_file_vi->move('public/backend/uploads/subtitles', $new_sub_name_vi);
            $vi->file = $new_sub_name_vi;
            $vi->save();
        }

        $subtitle_file_en = $request->file('subtitle_file_en');
        if ($subtitle_file_en) {
            $en = new Subtitle();
            $en->episode_id = $item->id;
            $en->name = 'Tiếng Anh'; 
            $file_name_en = $subtitle_file_en->getClientOriginalName();
            $sub_name_en = current(explode('.', $file_name_en));
            $new_sub_name_en = $sub_name_en . rand(0, 99) . '.' . $subtitle_file_en->getClientOriginalExtension();
            $subtitle_file_en->move('public/backend/uploads/subtitles', $new_sub_name_en);
            $en->file = $new_sub_name_en;
            $en->save();
        }
        
        // episode_servers
        $array_server = array();
        $array_server = array_merge($array_server, $request->server_id);
        $i = 1;
        foreach($array_server as $key => $value) {
            $link = 'link'.$i;
            if ($data[$link]) {
                $ep = new EpisodeServer();
                $ep->episode_id = $item->id;
                $ep->server_id = $value;
                $ep->link = $data[$link];
                $ep->save();
            }
            $i++;
        }
        

        Toastr::success('Thêm thành công', 'Thành công');
        return Redirect::to('admin/episodes/'.$request->movie_seo_name);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $seo_name)
    {
        $get_id = Movie::where('seo_name', $seo_name)->get('id')->first();
        $url = 'admin-pages.episodes.list_episodes';
        $list = Episode::where('movie_id', $get_id->id)->orderBy('episode', 'desc')->paginate($this->pagination);
        $view = view($url)
        ->with('movie_seo_name', $seo_name)
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
        $get_seo_name = Movie::where('id', $data->movie_id)->get('seo_name')->first();
        $listServerLink = ServerLink::orderBy('display_order', 'asc')->get();
        $listLink = EpisodeServer::where('episode_id', $id)->orderBy('server_id', 'asc')->get();
        $listSub = Subtitle::where('episode_id', $id)->orderBy('id', 'asc')->get();
        $view = view($url)
        ->with('movie_seo_name', $get_seo_name->seo_name)
        ->with('listServerLink', $listServerLink)
        ->with('listLink', $listLink)
        ->with('listSub', $listSub)
        ->with('data', $data);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataRequest = $request->all() ;
        $data = array();

        $data['name'] = $dataRequest['name'];
        $data['desc'] = isset($dataRequest['desc']) ? $dataRequest['desc'] : '';
        $data['content'] = isset($dataRequest['content']) ? $dataRequest['content'] : '';
        $data['seo_name'] = isset($dataRequest['seo_name']) ? $dataRequest['seo_name'] : '';

        $data['tags'] = isset($dataRequest['tags']) ? $dataRequest['tags'] : '';
        $data['meta_title'] = isset($dataRequest['meta_title']) ? $dataRequest['meta_title'] : '';
        $data['meta_desc'] = isset($dataRequest['meta_desc']) ? $dataRequest['meta_desc'] : '';
        $data['meta_keyword'] = isset($dataRequest['meta_keyword']) ? $dataRequest['meta_keyword'] : '';

        $data['admin_id'] = 123;
        $data['episode'] = $dataRequest['episode'];
        $data['options'] = isset($dataRequest['options']) ? implode(',', $dataRequest['options']) : '';
        $data['status'] = $dataRequest['status'];
        $data['date_updated'] = date("Y-m-d H:i:s");

        Episode::where('id', $id)->update($data);

        //update bảng phụ
        //subtitles
        $subtitle_file_vi = $request->file('subtitle_file_vi');
        if ($subtitle_file_vi) {
            $old_file = Subtitle::where('episode_id', $id)->where('name', 'Tiếng Việt')->get('file')->first();
            if ($old_file) {
                unlink('public/backend/uploads/subtitles/'.$old_file->file);
            }
            Subtitle::where('episode_id', $id)->where('name', 'Tiếng Việt')->delete();
            $vi = new Subtitle();
            $vi->episode_id = $id;
            $vi->name = 'Tiếng Việt'; 
            $file_name_vi = $subtitle_file_vi->getClientOriginalName();
            $sub_name_vi = current(explode('.', $file_name_vi));
            $new_sub_name_vi = $sub_name_vi . rand(0, 99) . '.' . $subtitle_file_vi->getClientOriginalExtension();
            $subtitle_file_vi->move('public/backend/uploads/subtitles', $new_sub_name_vi);
            $vi->file = $new_sub_name_vi;
            $vi->save();
        }

        $subtitle_file_en = $request->file('subtitle_file_en');
        if ($subtitle_file_en) {
            $old_file = Subtitle::where('episode_id', $id)->where('name', 'Tiếng Anh')->get('file')->first();
            if ($old_file) {
                unlink('public/backend/uploads/subtitles/'.$old_file->file);
            }
            Subtitle::where('episode_id', $id)->where('name', 'Tiếng Anh')->delete();
            $en = new Subtitle();
            $en->episode_id = $id;
            $en->name = 'Tiếng Anh'; 
            $file_name_en = $subtitle_file_en->getClientOriginalName();
            $sub_name_en = current(explode('.', $file_name_en));
            $new_sub_name_en = $sub_name_en . rand(0, 99) . '.' . $subtitle_file_en->getClientOriginalExtension();
            $subtitle_file_en->move('public/backend/uploads/subtitles', $new_sub_name_en);
            $en->file = $new_sub_name_en;
            $en->save();
        }

        // episode_servers
        $array_server = array();
        $array_server = array_merge($array_server, $request->server_id);
        $i = 1;
        foreach($array_server as $key => $value) {
            $link = 'link'.$i;
            $checked_link = EpisodeServer::where('episode_id', $id)->where('server_id', $value)->get('link')->first();
            if ($dataRequest[$link]) {
                if ($checked_link) {
                    EpisodeServer::where('episode_id', $id)->where('server_id', $value)->update(['link' => $dataRequest[$link]]);
                }
                else {
                    $ep = new EpisodeServer();
                    $ep->episode_id = $id;
                    $ep->server_id = $value;
                    $ep->link = $dataRequest[$link];
                    $ep->save();
                }
            }
            else {
                if ($checked_link) {
                    EpisodeServer::where('episode_id', $id)->where('server_id', $value)->delete();
                }
            }
            $i++;
        }

        Toastr::success('Cập nhật thành công', 'Thành công');
        return Redirect::to('admin/episodes/'.$request->movie_seo_name);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $get_sub = Subtitle::where('episode_id', $id)->get('file');
        $path = base_path('public/backend/uploads/subtitles');
        foreach($get_sub as $key => $value) {
            $exists = file_exists($path.'/'.$value->file);
            if ($exists) {
                unlink('public/backend/uploads/subtitles/'.$value->file);
            }
        }
        Episode::where('id', $id)->delete();
        EpisodeServer::where('episode_id', $id)->delete();
        Subtitle::where('episode_id', $id)->delete();
        Toastr::success('Xóa thành công', 'Thành công');
        
        return redirect()->back();
    }

    //bật tắt trạng thái
    public function unactivate_episodes_status($id)
    {
        Episode::where('id', $id)->update(['status' => 0]);
        Toastr::success('Tắt hoạt động thành công', 'Thành công');
        return redirect()->back();
    }

    public function activate_episodes_status($id)
    {
        Episode::where('id', $id)->update(['status' => 1]);
        Toastr::success('Mở hoạt động thành công', 'Thành công');
        return redirect()->back();
    }
}
