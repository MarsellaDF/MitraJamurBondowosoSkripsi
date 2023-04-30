<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dashboard = Dashboard::first();
        return view('backend.dashboard.edit')->with('dashboard', $dashboard)->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        return view('backend.dashboard.edit',compact('dashboard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dashboard = Dashboard::first();
        return view('backend.dashboard.edit',compact('dashboard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_dashboard)
    {
        $request->validate([
            'nama'=>'required|min:6',
            'alamat'=>'required',
            'deskripsi'=>'required',
            'whatsapp'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ],
        [
            'required' => 'Harap isi :attribute',
            'deskripsi.required' => 'Isi Deskripsi',
            'min' => 'Panjang karakter minimal 6',
        ],
        [
            'nama' => 'Nama Produk',
            'alamat' => 'alamat Produk',
            'deskripsi' => 'Deskripsi Produk',
            'whatsapp' => 'whatsapp Produk'
        ]
        );
        try{
            $foto = Dashboard::first()->logo;
            DB::table('dashboard')->update([
            'nama' => $request->get('nama'),
            'alamat' => $request->get('alamat'),
            'deskripsi' => $request->get('deskripsi'),
            'whatsapp' => $request->get('whatsapp'),

        ]);
            if($request->file('logo') != null) {
                $folder = 'upload/dashboard/'.$request->get('logo');
                $file = $request->file('logo');
                $filename = date('YmdHis').$file->getClientOriginalName();
                $path = realpath($folder);
                if (!($path !== true AND is_dir($path))) {
                    mkdir($folder, 0755, true);
                }
                if(file_exists($foto)){
                    if(File::delete($foto)){
                        if ($file->move($folder, $filename)) {
                            DB::table('dashboard')->update([
                                'logo' => $folder.$filename
                            ]);
                        }
                    }
                } else{
                    if ($file->move($folder, $filename)) {
                            DB::table('dashboard')->update([
                                'logo' => $folder.$filename
                            ]);
                        }
                }
            }

            return redirect()->route('dashboard.index')->with('Berhasil', 'Data Dashboard berhasil Diubah');
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
    public function destroy($id)
    {
        //
    }
}