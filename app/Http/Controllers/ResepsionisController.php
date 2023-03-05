<?php
    
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use App\Models\Booking;
class ResepsionisController extends Controller
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
         $this->middleware('role:Admin|Resepsionis', ['only' => ['index','store']]);
         
    }

    public function index()
    {
        $users = DB::table('users')
        ->join('booking', 'users.id', '=', 'booking.id_user')
        ->select('users.*', 'booking.*')
        ->paginate(10);

        foreach ($users as $p) {
            echo $p->tanggal_checkin;
            if($p->tanggal_checkin == date("Y-m-d")) {
                DB::table('booking')->where('id',$p->id)->update([
                    'status' => 1
                ]);
            }
        }
        
        return view('resepsionis/index',compact('users'));
       
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		

        $users = DB::table('users')
        ->join('booking', 'users.id', '=', 'booking.id_user')
        ->select('users.*', 'booking.*')
        ->where('name','like',"%".$cari."%")
        ->paginate();
        return view('resepsionis/index',compact('users'));
 
	}
    public function cari2(Request $request)
	{
		// menangkap data pencarian
		$date = $request->date;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		

        $users = DB::table('users')
        ->join('booking', 'users.id', '=', 'booking.id_user')
        ->select('users.*', 'booking.*')
        ->where('tanggal_checkin','=', $date)
        ->orWhere('tanggal_checkout', '=', $date)
        ->paginate();
        return view('resepsionis/index',compact('users'));
 
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
}