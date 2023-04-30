<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
        return view('backend.produk.index')->with('produk', $produk)->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['subtitle'] = 'Tambah Produk';
        $this->param['top_button'] = route('produk.index');

        return view('backend.produk.create', $this->param);
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
            'harga'=>'required|numeric',
            'gambar'=>'required',
            'deskripsi'=>'required',
            'kategori'=>'required|not_in:0',
            'status'=>'required|not_in:0',
        ],
        [
            'required' => 'Harap isi :attribute',
            'deskripsi.required' => 'Isi Deskripsi',
            'min' => 'Panjang karakter minimal 6',
        ],
        [
            'nama' => 'Nama Produk',
            'harga' => 'Harga Produk',
            'gambar' => 'Gambar Produk',
            'deskripsi' => 'Deskripsi Produk',
            'kategori' => 'Kategori Produk',
            'status' => 'Status Produk'
        ]
        );
        try{
            $data = array(
                'nama' => $request->get('nama'),
                'harga' => $request->get('harga'),
                'deskripsi' => $request->get('deskripsi'),
                'kategori' => $request->get('kategori'),
                'status' => $request->get('status'),
                'slug' => Str::slug($request->get('nama'))
            );
            $lastId = DB::table('produk')->insertGetId($data, 'id_produk');

            if($request->file('gambar') != null) {
                $folder = 'upload/produk/'.$request->get('gambar');
                $file = $request->file('gambar');
                $filename = date('YmdHis').$file->getClientOriginalName();
                $path = realpath($folder);
                if (!($path !== true AND is_dir($path))) {
                    mkdir($folder, 0755, true);
                }
                if ($file->move($folder, $filename)) {
                    DB::table('produk')->where('id_produk', '=', $lastId)->update([
                        'gambar' => $folder.$filename
                    ]);
                }
            }

            return redirect('administrator/produk')->withStatus('Berhasil menambah data');
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
    public function show(Produk $produk)
    {
        return view('backend.produk.index',compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($produk)
    {
        $produk = Produk::where('id_produk', $produk)->first();
        return view('backend.produk.edit',compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_produk)
    {
        $request->validate([

        ]);
        try{
            $foto = Produk::where('id_produk', $id_produk)->first()->gambar;
            DB::table('produk')->where('id_produk', $id_produk)->update([
            'nama' => $request->get('nama'),
            'harga' => $request->get('harga'),
            'deskripsi' => $request->get('deskripsi'),
            'kategori' => $request->get('kategori'),
            'status' => $request->get('status'),
            'slug' => Str::slug($request->get('nama'))
        ]);
            if($request->file('gambar') != null) {
                $folder = 'upload/produk/'.$request->get('gambar');
                $file = $request->file('gambar');
                $filename = date('YmdHis').$file->getClientOriginalName();
                $path = realpath($folder);
                if (!($path !== true AND is_dir($path))) {
                    mkdir($folder, 0755, true);
                }
                if(file_exists($foto)){
                    if(File::delete($foto)){
                        if ($file->move($folder, $filename)) {
                            DB::table('produk')->where('id_produk', '=', $id_produk)->update([
                                'gambar' => $folder.$filename
                            ]);
                        }
                    }
                }

            }
            return redirect()->route('produk.index')->with('Berhasil', 'Data Produk berhasil Diubah');
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
    public function destroy($id_produk)
    {
        try{
            $foto = Produk::where('id_produk', $id_produk)->first()->gambar;
            if($foto != null){
                if(file_exists($foto)){
                    if(File::delete($foto)){
                        DB::table('produk')->where('id_produk', $id_produk)->delete();
                    }
                }
            }
            return redirect()->route('produk.index')->with('Berhasil', 'Data Produk berhasil Dihapus');

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
