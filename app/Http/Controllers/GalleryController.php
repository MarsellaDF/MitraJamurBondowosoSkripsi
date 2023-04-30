<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::all();
        return view('backend.gallery.index')->with('gallery', $gallery)->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['subtitle'] = 'Tambah Gallery';
        $this->param['top_button'] = route('gallery.index');

        return view('backend.gallery.create', $this->param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required|min:6',
            'gambar'=>'required',
        ],
        [
            'required' => 'Harap isi :attribute',
            'deskripsi.required' => 'Isi Deskripsi',
            'min' => 'Panjang karakter minimal 6',
        ],
        [
            'nama' => 'Nama Gambar',
            'gambar' => 'Gambar'
        ]
        );
        try{
            $data = array(
                'nama' => $request->get('nama'),
            );
            $lastId = DB::table('gallery')->insertGetId($data, 'id_gambar');

            if($request->file('gambar') != null) {
                $folder = 'upload/gallery/'.$request->get('gambar');
                $file = $request->file('gambar');
                $filename = date('YmdHis').$file->getClientOriginalName();
                $path = realpath($folder);
                if (!($path !== true AND is_dir($path))) {
                    mkdir($folder, 0755, true);
                }
                if ($file->move($folder, $filename)) {
                    DB::table('gallery')->where('id_gambar', '=', $lastId)->update([
                        'gambar' => $folder.$filename
                    ]);
                }
            }

            return redirect('administrator/gallery')->withStatus('Berhasil menambah data');
        }
        catch(\Exception $e){
            return $e->getMessage();
            return redirect()->back()->withError($e->getMessage());
        }
        catch(\Illuminate\Database\QueryException $e){
            return $e->getMessage();
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        return view('backend.gallery.index',compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($gallery)
    {
        $gallery = Gallery::where('id_gambar', $gallery)->first();
        return view('backend.gallery.edit',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_gambar)
    {
        $request->validate([

        ]);
        try{
            $foto = Gallery::where('id_gambar', $id_gambar)->first()->gambar;
            DB::table('gallery')->where('id_gambar', $id_gambar)->update([
            'nama' => $request->get('nama')
        ]);
            if($request->file('gambar') != null) {
                $folder = 'upload/gallery/'.$request->get('gambar');
                $file = $request->file('gambar');
                $filename = date('YmdHis').$file->getClientOriginalName();
                $path = realpath($folder);
                if (!($path !== true AND is_dir($path))) {
                    mkdir($folder, 0755, true);
                }
                if(file_exists($foto)){
                    if(File::delete($foto)){
                        if ($file->move($folder, $filename)) {
                            DB::table('gallery')->where('id_gambar', '=', $id_gambar)->update([
                                'gambar' => $folder.$filename
                            ]);
                        }
                    }
                }

            }
            return redirect()->route('gallery.index')->with('Berhasil', 'Data gallery berhasil Diubah');
        }
        catch(\Exception $e){
            return $e->getMessage();
            return redirect()->back()->withError($e->getMessage());
        }
        catch(\Illuminate\Database\QueryException $e){
            return $e->getMessage();
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_gambar)
    {
        try{
            $foto = Gallery::where('id_gambar', $id_gambar)->first()->gambar;
            if($foto != null){
                if(file_exists($foto)){
                    if(File::delete($foto)){
                        DB::table('gallery')->where('id_gambar', $id_gambar)->delete();
                    }
                }
            }
            return redirect()->route('gallery.index')->with('Berhasil', 'Data Gallery berhasil Dihapus');

        }
        catch(\Exception $e){
            return $e->getMessage();
            //return redirect()->back()->withError($e->getMessage());
        }
        catch(\Illuminate\Database\QueryException $e){
            return $e->getMessage();
            //return redirect()->back()->withError($e->getMessage());
        }
    }
}
