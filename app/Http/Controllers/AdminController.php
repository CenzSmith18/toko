<?php
    
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
    
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('role:Admin', ['only' => ['index','store']]);
         
    }

    public function tambah_type()
    {
       
        return view('admin/tambah_type');
    }
    public function index()
    {
        $type = DB::table('type')->get();
        return view('admin/index',['kamar' => $type]);
       
    }
   
    public function show($id)
    {
       
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_type(Request $request)
    {
        $this->validate($request, [
			'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
		]);

        $image = $request->file('image');
        $tujuan_upload = 'public/image_upload';
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'image_upload';
 
                // upload file
		$image->move($tujuan_upload,$image->getClientOriginalName());
        DB::table('type')->insert([
            'type_label' => $request->type_label,
            'jumlah_kamar' => $request->jumlah_kamar,
            'fasilitas' => $request->fasilitas,
            'type_gambar' => 'image_upload/'.$image->getClientOriginalName(),
            
            
        ]);
        return redirect('/admin');
        
    }
    
    public function edit_type($id)
    {
        $type = DB::table('type')->where('id_type',$id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('admin/edit_type',['type' => $type]);
    
    }

    public function update_type(Request $request)
    {
        // update data pegawai
        DB::table('type')->where('id_type',$request->id)->update([
            'type_label' => $request->type_label,
            'jumlah_kamar' => $request->jumlah_kamar
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('admin');
    }

    public function fasilitas()
    {
        $type = DB::table('type')->get();
        return view('admin/fasilitas',['kamar' => $type]);
       
    }
    public function edit_fasilitas($id)
    {
        $type = DB::table('type')->where('id_type',$id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('admin/edit_fasilitas',['type' => $type]);
    
    }
    public function update_fasilitas(Request $request)
    {
        // update data pegawai
        DB::table('type')->where('id_type',$request->id)->update([
            'type_label' => $request->type_label,
            'fasilitas' => $request->fasilitas
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/admin/fasilitas');
    }
    public function fasilitas_hotel()
    {
        $fasilitas_hotel = DB::table('fasilitas_hotel')->get();
        return view('admin/fasilitas_hotel',['fasilitas_hotel' => $fasilitas_hotel]);
       
    }
    public function store_fasilitas_hotel(Request $request)
    {
     

        DB::table('fasilitas_hotel')->insert([
            'nama_fasilitas_hotel' => $request->nama_fasilitas_hotel,
            'keterangan' => $request->keterangan,
            //'image' => $request->image,
            
        ]);
        return redirect('admin/fasilitas_hotel');
        
    }
    public function tambah_fasilitas_hotel()
    {
       
        return view('admin/tambah_fasilitas_hotel');
    }
    public function edit_fasilitas_hotel($id)
    {
        $fasilitas_hotel = DB::table('fasilitas_hotel')->where('id_fasilitas_hotel',$id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('admin/edit_fasilitas_hotel',['fasilitas_hotel' => $fasilitas_hotel]);
    
    }

    public function update_fasilitas_hotel(Request $request)
    {
        // update data pegawai
        DB::table('fasilitas_hotel')->where('id_fasilitas_hotel',$request->id)->update([
            'nama_fasilitas_hotel' => $request->nama_fasilitas_hotel,
            'keterangan' => $request->keterangan
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/admin/fasilitas_hotel');
    }
    
   
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }
    public function hapus_type($id)
    {
        DB::table("type")->where('id_type',$id)->delete();
        return redirect('admin');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }
}