@extends('layout.index')

@section('content')
<div class="col-md-12 p-5">
   <div class="jam text-left mb-4">
    <?php
    header('Access-Control-Allow-Origin: *');
    date_default_timezone_set("Asia/Jakarta");  // untuk mengubah zona waktu
    $arrDay = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    $day = date("w"); //0-6 of day

    echo date("H:i:s"). "&nbsp"; // untuk menampilkan jam
    echo   $arrDay[$day]. "&nbsp";
    echo  date("d-F-Y");
 
    ?>
   </div>
    <form method="POST" action="{{ route('insert')}}">
        @csrf
        <div class="row">
          <div class="col">
            <label for="berita">Berita</label> <br>
            <textarea required name="berita" id="berita" cols="50" rows="10" placeholder="Masukan Berita"></textarea>
          </div>
          <div class="col">
            <label for="inspirasi">inspirasi</label> <br>
            <textarea required name="inspirasi" id="inspirasi" cols="50" rows="10" placeholder="Masukan Inspirasi"></textarea>
        
          </div>
        </div>
        <div class="buton">
            <button type="submit" class="btn btn-primary"> Simpan</button>
        </div>
      </form>
    {{-- <form>
        <div class="row">
            <div class="col-md">
                <label for="exampleInputEmail1">inspirasi</label> <br>
                  <textarea name="inpirasi" id="" cols="30" rows="10" placeholder="Masukan Inspirasi"></textarea>
              </div>
        </div>

       <div class="row">
        <div class="col-md">
            <label for="berita">Berita</label> <br>
              <textarea name="berita" id="berita" cols="30" rows="10" placeholder="Masukan Berita"></textarea>
          </div>
       </div>
        
       
        <button type="submit" class="btn btn-primary">Submit</button>
      </form> --}}
</div>
    
@endsection