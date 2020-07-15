<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Software;
use App\User;
use App\SoftwareVersions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SoftwareController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $software = Software::all();
        return view('admin.software.index')->with('softwares', $software);
    }

    public function create(){
        if (Gate::allows('create_software')) {
            return view('admin.software.create');
        }
        return redirect()->route('home');
    }

    public function edit(Software $software){
        if (Gate::allows('update_version_software') || Gate::allows('update_software') ||
            Gate::allows('create_version_software') || Gate::allows('list_version_software')) {
            return view('admin.software.edit')->with('software', $software);
        }
        return redirect()->route('home');
    }

    public function update(Request $request, Software $software){
        if(count($request->last_version_add) != count($request->url_download_add))
            return redirect()->route('home');

        if(count($request->software_id) != count($request->version) ||
            count($request->software_id) != count($request->url_download))
            return redirect()->route('home');

        if (Gate::allows('update_version_software')) {
            for ($x = 0; $x < count($request->software_id); $x++) {
                foreach ($software->versions as $version) {
                    if ($version->id == $request->software_id[$x]) {
                        $version->version = $request->version[$x];
                        $version->url_download = $request->url_download[$x];
                        $version->save();
                    }
                }
            }
        }
        if (Gate::allows('update_software')) {
            $software->software_name = $request->software_name;
            $software->softhouse_name = $request->softhouse_name;
            $software->save();
        }
        if (Gate::allows('create_version_software')) {
            for ($x = 0; $x < count($request->last_version_add); $x++) {
                $version = new Versions;
                $version->software_id = $software->id;
                $version->version = $request->last_version_add[$x];
                $version->url_download = $request->url_download_add[$x];
                $version->save();
            }
        }
        if (Gate::allows('list_software'))
            return redirect()->route('admin.software.index');
        return redirect()->route('home');
    }

    public function store(Request $request){
        if (Gate::allows('create_software')) {
            $software = new Software;
            $software->software_name = $request->software_name;
            $software->softhouse_name = $request->softhouse_name;
            $software->save();
        }

        if (Gate::allows('create_version_software')) {
            $version = new Versions;
            $version->software_id = $software->id;
            $version->version = $request->last_version;
            $version->url_download = $request->url_download;
            $version->save();
        }

        if (Gate::allows('list_software'))
            return redirect()->route('admin.software.index');
        return redirect()->route('home');
    }

}
