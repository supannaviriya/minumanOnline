@extends('layouts.main_admin')

@section('content')

<div class="row justify-content-center">

  <div class="col-md-5">

    <main class="form-tambah">

      <h1 class="h3 mb-3 fw-normal text-center mt-3">Tambah Minuman Disini!</h1>
    <form action="/admin_page.edit_minum" method="post" enctype="multipart/form-data">
      @csrf

      <input type="hidden" name="id" value="{{$data['id']}}">
      <div class="form-floating">
        <input type="text" name="namaMinum" class="form-control rounded-top" value="{{$data['namaMinum']}}" id="namaMinum" placeholder="Nama Minum" required>
        <label for="namaMinum">Nama Minuman</label>
        @error('namaMinum')
        <div class="invalid-feedback">{{$message}}
        </div>
        @enderror
      </div>

      <div class="form-floating">
        <input type="number" name="stok" class="form-control rounded-top" value="{{$data['stok']}}" id="stok" placeholder="Stok Minuman" required>
        <label for="stok">Stok Minuman</label>
        @error('stok')
        <div class="invalid-feedback">{{$message}}
        </div>
        @enderror
      </div>

      <div class="form-floating">
        <input type="number" name="harga" class="form-control rounded-top" value="{{$data['harga']}}" id="harga" placeholder="Harga Minuman" required>
        <label for="harga">Harga Minuman</label>
        @error('harga')
        <div class="invalid-feedback">{{$message}}
        </div>
        @enderror
      </div>

      <div class="mt-3">
        <label for="image" class="form-label">Upload Image</label>
        <input class="form-control" type="file" value="{{$data['image']}}" name="image" id="image">
        @error('image')
        <div class="invalid-feedback">{{$message}}
        </div>
        @enderror
    </div>

      <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Tambah Minum</button>

    </form>
    </main>

  </div>
</div>

@endsection

