<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use App\Laporan_covid;
use App\Berita;
use Illuminate\Support\Str;
use function GuzzleHttp\json_decode;
use function GuzzleHttp\json_encode;

class Covid extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        // $Provinsi = Http::get('https://api.kawalcorona.com/indonesia/provinsi');

        // $dataprov = json_decode($Provinsi);
        // dd($dataprov);
        // $data = Berita::orderBy("id", "desc")->limits(1)->get();
        $data = Berita::orderBydesc("id", "DESC LIMIT 1")->get();
        $asli = json_decode($data);
        // dd($asli);
        // $last = mysqli_insert_id($data);
        // dd($data[0]["attributes"]->berita);
        return view('page.home')->with([
            'asli' => $asli
        ]);
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
        $data = $request->all();
        Laporan_covid::create($data);
        return redirect()->route('page')->with('create', 'Data Berhasil Dilaporkan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/corona-indonesia-f0b09-firebase-adminsdk-y57fx-ceab85cbd6.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://corona-indonesia-f0b09.firebaseio.com/')
            ->create();
        $database = $firebase->getDatabase();
        $newPost = $database
            ->getReference('Maps');
        $products = $newPost->getvalue();

        $Nasional = Http::get('https://api.kawalcorona.com/indonesia')[0];


        $data = [
            "wilayah" => $Nasional['name'],
            "positif" => $Nasional['positif'],
            "sembuh" => $Nasional['sembuh'],
            "meninggal" => $Nasional['meninggal'],
            "firebase" => []
        ];

        foreach ($products as $product) {
            $data['firebase'][] = $product;
        }



        return response($data, 200, ["Content-Type" => "application/json"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
