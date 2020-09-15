@extends('layout.index')

@section('content')
<div class="col-md-12">
    @if (session('create'))
  <div class="alert alert-primary">
  {{ session('create') }}

    </div>
    @endif
   <div class="card" style="padding:50px; height:90vh">
    <div class="judul">
        <h2>Dashboard Admin</h2>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">No Handphone</th>
                <th scope="col">Alamat</th>
                <th scope="col">Pesan</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                @forelse ($data as $item)
                {{-- {{dd($item)}} --}}
                <tr>
                    <th scope="row"><?= $i;?> </th>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->no_handphone}}</td>
                    <td>{{ $item->alamat}}</td>
                    <td>{{ $item->pesan}}</td>
                    <td>
                    <form action="{{ route('hapus', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
              
                    <button type="submit" class="btn btn-danger"  onclick="return confirm('Yakin Data Mau Dihapus??');"> <i class="fa  fa-trash"></i></button>
                    </form>
                    </td>
                  </tr>
                  <?php $i++?>
                @empty
                    <tr>
                        <td class="text-center" colspan="6">Tidak ada Laporan</td>
                    </tr>
                @endforelse
             
              
            </tbody>
          </table>
    </div>
   </div>
</div>
    
@endsection