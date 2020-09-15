@extends('layout.index')

@section('content')
<div class="col-md-12" style="padding: 50px 20px">
<div class="head text-center mb-4">
  <h3>Laporan Berita dan Inspirasi</h3>
  @if (session('create'))
  <div class="alert alert-primary">
  {{ session('create') }}

</div>
@endif
  </div>  
  <table class="table table-striped">
    <thead>
      <tr >
        <th scope="col">#</th>
        <th scope="col">Berita</th>
        <th scope="col">Inspirasi</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; ?>
      @foreach ($data as $item)
      <tr >
            
      <th scope="row"><?= $i; ?></th>
      <td >{{$item->berita}}</td>
      <td>{{$item->inspirasi}}</td>
      <td>{{$item->created_at}}</td>
      <td>
        <form action="{{ route('delete', $item->id) }}" method="POST" class="d-inline">
          @csrf
          @method('delete')

      <button type="submit" class="btn btn-danger"  onclick="return confirm('Yakin Data Mau Dihapus??');"> <i class="fa  fa-trash"></i></button>
      </form>
      </td>
      </tr>
      <?php $i++?>
      @endforeach
    </tbody>
  </table>
</div>
    
@endsection