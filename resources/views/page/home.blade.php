<!DOCTYPE html>
<html lang="en">

<head>
<!-- Facebook Meta Tags -->
<meta property="og:url" content="https://nothing.com">
<meta property="og:type" content="website">
<meta property="og:title" content="website Covid-19">
<meta property="og:description" content="Sistem Informasi Penyebaran Covid-19">
<meta property="og:image" content="https://www.covid19.go.id/wp-content/uploads/2020/03/logo-gugas-default.png">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="website">
  <meta name="author" content="">
  
  <link rel="shortcut icon" href="https://www.covid19.go.id/wp-content/uploads/2020/03/favicon-32x32-1.png" type="image/x-icon">
  <title>Sistem Informasi Penyebaran Covid-19</title>

  <!-- Custom fonts for this template-->
<link href="{{url('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />

  <!-- Custom styles for this template-->
<link href="{{url('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
 <link rel="stylesheet" href="{{url('assets/scss/index.css')}}">

</head>

<style>
   #jamupdate{
     color: aliceblue;
   }
    
  #data, #allData {
  }
</style>

<body id="page-top">
  <div id="wrapper">
    <div class="container-fluid">
        <div class="container">
            <!-- Header -->
          <div class="text-center d-flex">
              <button style="border-radius:7px;" class="sidebar-brand d-flex align-items-center justify-content-center" href="#" data-toggle="modal" data-target="#exampleModal">
                <div class="sidebar-brand-text" style="font-weight:700;">Lapor Covid-19 </div>
              </button>
                <h4 style="margin-left:auto;" id="info">Sistem Informasi Penyebaran Covid-19</h4>
                <div class="btn-group btn-group-toggle" style="margin-left:auto;" data-toggle="buttons">
                  <label class="btn active" id="gelap" name="gelap">
                    <input type="radio" name="options" id="option1" > Gelap
                  </label>
                  <label class="btn " id="terang" name="terang">
                    <input type="radio" name="options" id="option2" checked> Terang
                  </label>
                </div>                 
          </div>
            @if (session('create'))
          <div class="container justify-content-center">
              <div class="row text-center">
                <div class="col-md-4">
                  
                </div>
                <div class="col-md-4">
                  <div class="alert alert-success text-center">
                    {{ session('create') }}
                </div>
                </div>
                <div class="col-md-4">
                  
                </div>
              </div>
            </div>
            
            @endif
            <div class="row text-center">
                <div class="col-md col-sm-3 my-2" id="hover1">
                    <div class="odp">
                      <h6>ODP</h6>
                      <img src="{{url('assets/gambar/logoodp-01.png')}}" style="width:50px; rounded:circle;" alt="" >
                        <h5> <span > Dummy</span></h5>
                    </div>
                </div>
                <div class="col-md col-sm-3 my-2" id="hover2">
                    <div class="pdp">
                      <h6>PDP</h6>
                      <img src="{{url('assets/gambar/logopdp-01.png')}}" style="width:50px;" alt="" >
                        <h5>  <span>Dummy</span> </h5> 
                    </div>
                </div>
                <div class="col-md col-sm-2 my-2" id="hover3">  
                    <div class="positive">
                      <h6>Positif</h6>
                      <img src="{{url('assets/gambar/logopositif-01.png')}}" style="width:50px;" alt="" >
                        <h5 id="positif-total">0</h5>
                     </div>
                </div>
                <div class="col-md col-sm-2 my-2" id="hover4">
                    <div class="sembuh">
                      <h6>Sembuh</h6>
                    <img src="{{url('assets/gambar/logosembuh-01.png')}}" style="width:50px;" alt="" >
                        <h5 id="sembuh-total">0</h5>
                        
                    </div>
                </div>
                <div class="col-md col-sm-2 my-2" id="hover5">
                    <div class="meninggal">
                      <h6>Meninggal</h6>
                      <img src="{{url('assets/gambar/logomati-01.png')}}" style="width:50px;" alt="" >
                        <h5 id="meninggal-total">0</h5>
                       
                    </div>
                </div>
            </div>
            <!-- Tutup Header -->
            <!-- Body -->
            <div class="row header-body">
                <div class="col-lg-12 col-md-12">
                    <div class="body">
                      <div class="zona d-flex">
                        <h4 style="color:#000">Peta Penyebaran </h4>
                          <div id="" class="d-flex"  style="margin-left:auto; color:#000">
                            <h6 class="mt-1">Real Time Update &nbsp; </h6>
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
                      </div>
                       
                    </div>
                </div>
                    <!-- column -->
                    <div class="col-lg-8">    
                      <div class="wrapper">
                        <div id="render-map">
                        </div>
                      </div>
                      <div class="note">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto quos maxime dolorem. Doloremque placeat dolore deserunt, vel molestiae fugit atque nulla corrupti, soluta quisquam velit, consectetur possimus optio tenetur quidem?
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem nesciunt porro necessitatibus obcaecati earum vitae quam iusto nisi distinctio? Vitae maiores at quam fugit voluptates similique. Dolorem dolores beatae molestiae?
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat tempora impedit nihil illum aperiam ipsum est, voluptatibus doloribus officiis porro quia minima cupiditate necessitatibus totam fuga asperiores earum! Inventore, in.
                        </p>
                      </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="row" id="overflow"  >
                            <table class="table-bordered responsive table-dark"   id="overflow" >
                              <thead>
                                <tr>
                                  <th class="text-center"> Daerah</th>
                                  <th class="text-center"> Kasus</th>
                                </tr>
                              </thead>
                                <tbody id="show-data">
                                  
                                </tbody>
                              </table>
                            </div>
                      </div>
                    <!-- column -->
            <!-- Tutup Body -->
          </div>
        </div>
    <!-- End of Content Wrapper --> 
    {{-- Berita --}}
    <div class="container mt-5">
        <div class="row">
          <div class="col-md-6">
            <div class=" text-center">Inspirasi</div>
            <div class="card inspirasi " style="color: black; padding: 20px"> 
              
               
                {{-- @foreach ($asli as $item) --}}
                    {{ $asli[0]->berita }}
                {{-- @endforeach --}}
              
            
                  
              
            </div>
          </div>
          <div class="col-md-6 ">
            <div class="berita">
              <div class="text-center"> Refleksi</div>
              <div class="card refleksi" style="color:#000; padding:20px">   
                {{$asli[0]->inspirasi}}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row" id="footer">
          <div class="col-md-3">
            <footer>
              <div class="text-center">
                <img src="{{url('assets/gambar/suluhkerta.jpg')}}" style="width:180px; border-radius:7px" alt="" >
              </div>
            </footer>
          </div>
          <div class="col-md-4" id="location" >
            <ul class="d-flex" style="list-style:none;">
              <li class="list-item mr-2" > <i class="fab fa-facebook-f"></i> </li>
              <li class="list-item">  <a href="https://www.facebook.com/suluhkertanusantara/?__tn__=%2Cd%2CP-R&eid=ARC35XEeBX-MfQRLYFGIdVm2_VHRoWbKiIJfIAS7OVXyBkpafTg0DH4jRaZs4_sZNmj-vKxo7xfLOdkF" style="text-decoration:none; color:#fff;">  suluhkertanusantara</a></li>
            </ul>
            <ul class="d-flex" style="list-style:none;">
              <li class="list-item mr-2" > <i class="fab fa-instagram"></i> </li>
              <li class="list-item">  <a href="https://www.instagram.com/suluhnusantara/" style="text-decoration:none; color:#fff;">  @suluhkertanusantara</a></li>
            </ul>
            <ul class="d-flex" style="list-style:none;">
              <li class="list-item mr-2" > <i class="fa fa-globe"></i>  </li>
              <li class="list-item">  <a href="#" style="text-decoration:none; color:#fff;"> www.suluhkertanusantara.org</a></li>
            </ul>
          </div>
          <div class="col-md-5">
            <ul class="d-flex" style="list-style:none;" >
              <li class="list-item mr-2" > <i class="fa fa-phone"></i></li>
              <li class="list-item"> +6221 8282 6852 </li>
            </ul>
            <ul class="d-flex" style="list-style:none;">
              <li class="list-item mr-2" > <i class="fa fa-envelope"></i></li>
              <li class="list-item"> Humas@suluhkertanusantara.org </li>
            </ul>
            <ul class="d-flex" style="list-style:none;">
              <li class="list-item mr-2"> <i class="fa fa-map-marker"></i></li>
              <li class="list-item"> <span> Ruko Grand Wisata Blok AA5 No. 6 Grand Wisata, Bekasi, Jawa Barat 17510 - Indonesia</span> </li>
            </ul>
          </div>
        </div>
        <div class="text-center"  style="padding-top : 20px">
          <h6 id="develop" >Develop By Suluh Kerta Nusantara @copyright 2020</h6>
        </div>
      </div>
  </div>

  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Laporan Covid-19</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="responsive" method="POST" action="{{ route('covid')}}">
        @csrf
          <div class="form-group row">
            <div class="col-sm-12">
              <label  class="col-form-label" id="nama" >Name</label>
              <input type="text" class="form-control" required id="nama" placeholder="ketik disini" name="nama">
            </div>
          </div>
          <div class="form-group  row">
              <div class="col-sm-12">
                <label  class="col-form-label" id="name">NIK</label>
                <input type="text" class="form-control" required name="nik" id="nik" placeholder="ketik disini">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label  class="col-form-label" id="name" >No.Handphone</label>
                <input type="text" class="form-control" required name="no_handphone" id="no_handphone" placeholder="ketik disini">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label for="inputPassword" class="col-form-label" id="name">Alamat</label>
                <input type="text" class="form-control" required name="alamat" id="alamat" placeholder="ketik disini">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label class="col-form-label" id="name">Pesan</label> <textarea name="pesan" id="pesan" class="form-control" placeholder="Ketik disini" cols="30" rows="10"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>

  {{-- ADD DATA --}}
  <script>
    $(window).on('load', function() {
      $.ajax({
        url: "/api/data",
        success: function (result) {
          $("#positif-total").html(result.positif)
          $("#sembuh-total").html(result.sembuh)
          $("#meninggal-total").html(result.meninggal)
          const DEFAULT_COORD = [-6.2293867, 106.6894293]; 

          // initial Map
          const map = L.map("render-map");

          // initial file
          const url = "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";

          // attribute
          const atribute = "Leaflet with <a href='https://acacemy.byidmore.com'>id More Academy</a>";
          const omstile = new L.TileLayer(url, {
              minZoom: 2,
              maxZoom: 20,
              attribution: atribute
          })
          map.setView(new L.LatLng(DEFAULT_COORD[0], DEFAULT_COORD[1]), 5)
          map.addLayer(omstile)
          result.firebase.map(val => {
            $("#show-data").append(`
            <tr >
              <td style="width:70%; padding-left:10px;">${val.provensi}</td>
              <td class="text-center">${val.jumlahorang}</td>
            </tr> 
            `)
            
            L.marker([val.Longtitude, val.Latitude]).addTo(map)
              .bindPopup("Provinsi: "+val.provensi+"<br> Jumlah Positif: "+ val.jumlahorang)
              .openPopup();
          })
        } 
      })
    })
  </script>

  {{-- MAP --}}

  <script>
      
  </script>

{{-- Jam --}}
{{-- <script src="{{url('assets/vendor/jquery/jquery.min.js')}}"></script> --}}
<script src="{{url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
{{-- <script src="{{url('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script> --}}
 <!-- Page level plugins -->
 <script src="{{url('assets/vendor/chart.js/Chart.min.js')}}"></script>
{{-- Ganti Background --}}
<script>
  $('#terang').click(function(){
    // console.log('berhasil');
  $('#info').css("color","#000");
  $('#develop').css("color","#000");
  $('ul li').css("color","#000");
  $('ul li a').css("color","#000");
    document.body.style.backgroundColor = ('#F8F8FF');

  });
  $('#gelap').click(function(){
    // console.log('berhasil');
  $('#info').css("color","#fff");
  $('#develop').css("color","#fff");
  $('ul li ').css("color","#fff");
  $('ul li a').css("color","#fff");

    document.body.style.backgroundColor = ('#10253a');
  });

  $(document).ready(function () {
	$('#terang').on('click', 'label', function () {
    $(this).siblings().removeClass('active');
		$(this).addClass('active');
	});
});
</script>
<script>
  // var database = firebase.database();
</script>
</body>

</html>
{{-- Js nya pindah 1 file aja kli ya nanti aja udh bokernya ? belom akwwaokwa pantesan bau belom cuk --}}
{{-- bentar --}}