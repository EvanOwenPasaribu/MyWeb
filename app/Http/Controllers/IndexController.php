<?php
namespace App\Http\Controllers;

use App\Location;
use App\User;
use App\Measurement;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class IndexController extends Controller
{
    public function index() {
        $locations = $this->getLocations();
        $home = "active";
        $sum_user = $this->getSumUser();
        $sum_pengukuran = $this->getSumPengukuran();
        return view('index', compact('locations', 'home', "sum_user", "sum_pengukuran"));
    }

    public function addGardu() {
        $locations = $this->getLocations();
        $add_gardu  = "active";
        return view('addGardu', compact('locations', 'add_gardu'));
    }

    public function saveGardu(Request $request) {
        $kode = $request['kode'];
        $alamat = $request['alamat'];
        $daya = $request['daya'];
        $penyulang = $request['penyulang'];
        $lat = $request['lat'];
        $long = $request['long'];

        $location = new Location();

        $location ->kode = $kode;
        $location ->alamat = $alamat;
        $location ->daya = $daya;
        $location ->penyulang = $penyulang;
        $location ->lat = $lat;
        $location ->long = $long;

        $location->save();
        return response()->json(['success'=>'Submitted successfully']);
    }

    public function addUser(){
        $add_user  = "active";
        return view ("addUser", compact('add_user'));
    }

    public function saveUser(Request $request){
        $user = new User();
        $nama = $request['nama'];
        $email = $request['email'];
        $nomorHp = $request['nomorHp'];
        $jenisKelamin = $request['jenisKelamin'];
        $alamat = $request['alamat'];
        $password = $request['password'];

        $user -> nama = $nama;
        $user -> email = $email;
        $user -> nomorHp = $nomorHp;
        $user -> jenisKelamin = $jenisKelamin;
        $user -> alamat = $alamat;
        $user -> password = $password;

        $user->save();
        return response()->json(['success'=>'Submitted successfully']);
    }

    public function addPengukuran(){
        $add_pengukuran  = "active";
        return view ("addPengukuran", compact('add_pengukuran'));
    }

    public function savePengukuran(Request $request){
        $measurement = new Measurement();
        $kode = $request['kode'];
        $tanggal = $request['tanggal'];
        $waktu = $request['waktu'];
        $tim = $request['tim'];
        $daya = $request['daya'];
        $alamat = $request['alamat'];
        $indukN = $request['indukN'];
        $jurusanA = $request['jurusanA'];
        $jurusanAR = $request['jurusanAR'];
        $jurusanAS = $request['jurusanAS'];
        $jurusanAT = $request['jurusanAT'];
        $jurusanAN = $request['jurusanAN'];
        $jurusanB = $request['jurusanB'];
        $jurusanBR = $request['jurusanBR'];
        $jurusanBS = $request['jurusanBS'];
        $jurusanBT = $request['jurusanBT'];
        $jurusanBN = $request['jurusanBN'];
        $jurusanC = $request['jurusanC'];
        $jurusanCR = $request['jurusanCR'];
        $jurusanCS = $request['jurusanCS'];
        $jurusanCT = $request['jurusanCT'];
        $jurusanCN = $request['jurusanCN'];
        $teganganRS = $request['teganganRS'];
        $teganganRT = $request['teganganRT'];
        $teganganST = $request['teganganST'];
        $teganganRN = $request['teganganRN'];
        $teganganSN = $request['teganganSN'];
        $teganganTN = $request['teganganTN'];
        
        $measurement -> kode = $kode;
        $measurement-> tanggal = $tanggal;
        $measurement-> waktu = $waktu;
        $measurement-> tim = $tim;
        $measurement-> dayaGardu = $daya;
        $measurement-> alamat = $alamat;
        $measurement-> indukN = $indukN;
        $measurement-> jurusanA = $jurusanA;
        $measurement-> jurusanAR = $jurusanAR;
        $measurement-> jurusanAS = $jurusanAS;
        $measurement-> jurusanAT = $jurusanAT;
        $measurement-> jurusanAN = $jurusanAN;
        $measurement-> jurusanB = $jurusanB;
        $measurement-> jurusanBR = $jurusanBR;
        $measurement-> jurusanBS = $jurusanBS;
        $measurement-> jurusanBT = $jurusanBT;
        $measurement-> jurusanBN = $jurusanBN;
        $measurement-> jurusanC = $jurusanC;
        $measurement-> jurusanCR = $jurusanCR;
        $measurement-> jurusanCS = $jurusanCS;
        $measurement-> jurusanCT = $jurusanCT;
        $measurement-> jurusanCN = $jurusanCN;
        $measurement-> teganganRS = $teganganRS;
        $measurement-> teganganRT = $teganganRT;
        $measurement-> teganganST = $teganganST;
        $measurement-> teganganRN = $teganganRN;
        $measurement-> teganganSN = $teganganSN;
        $measurement-> teganganTN = $teganganTN;
        $measurement->save();
        return response()->json(['success'=>'Submitted successfully']);
    }

    public function listGardu(){
        $list_gardu = "active";
        return view("listGardu", compact("list_gardu"));
    }

    public function getListGardu(){
        $locations = $this->getLocations();
        return response($locations);     
    }

    public function listPengukuran(){
        $list_pengukuran = "active";
        return view("listPengukuran", compact("list_pengukuran"));
    }

    public function getListPengukuran(){
        $pengukuran = $this->getPengukuran();
        return response($pengukuran);     
    }

    public function listUser(){
        $list_user = "active";
        return view("listUser", compact("list_user"));
    }

    public function getListUser(){
        $users = $this->getUser();
        return response($users);     
    }

    public function getLocations(){
        $data_location = Location::all();
        $locations = [];
        foreach ($data_location as $location) {
            $locations[] = $location;
        }
        return $locations;
    }

    public function getPengukuran(){
        $data_pengukuran = Measurement::all();
        $list_pengukuran = [];
        foreach ($data_pengukuran as $pengukuran) {
            $list_pengukuran[] = $pengukuran;
        }
        return $list_pengukuran;
    }

    public function getUser(){
        $data_user = User::all();
        $list_user = [];
        foreach ($data_user as $user) {
            $list_user[] = $user;
        }
        return $list_user;
    }

    public function getSumUser(){
        $users = User::all();
        return count($users);
    }

    public function getSumPengukuran(){
        $measurements = Measurement::all();
        return count($measurements);
    }

}
