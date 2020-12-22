@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">


                <h2>Data Mahasiswa</h2>
            </div>
            <div class="float-right">
              
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">ID</th>
              <th width="280px"class="text-center">Nim</th>
            <th width="280px"class="text-center">Nama Lengkap</th>
            <th width="280px"class="text-center">Program Studi</th>
            <th width="280px"class="text-center">Aksi</th>
            
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->nim }}</td>
            <td>{{ $post->nama }}</td>
            <td>{{ $post->programStudi }}</td>
            <td class="text-center">
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
 
                <a class="btn btn-primary btn-sm" href="{{ route('posts.show',$post->id) }}">Detail</a>
 
                <a class="btn btn-warning btn-sm" href="{{ route('posts.edit',$post->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="">Hapus</button>

                </form>
            </td>
        </tr>

        @endforeach
        </table>
          <a class="btn btn-primary btn-sm" href="{{ route('posts.create') }}">+Tambah</a>
 
    {!! $posts->links() !!}
 
@endsection