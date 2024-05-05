@extends('dashboard.layout.main')
@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none h4 text-body-tertiary">Daftar
                    Produk</a>
            </li>
            <li class="breadcrumb-item h4" aria-current="page">Edit Produk</li>
        </ol>
    </nav>
    <form action="/dashboard/{{ $barang->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="" class="mb-3">Kategori</label>
                    <select class="form-select @error('kategori_produk') is-invalid @enderror" name="kategori_produk">
                        <option selected disabled>Pilih Kategori</option>
                        @foreach ($kategori as $rk)
                            @if (old('kategori_produk', $barang->kategori_produk) == $rk->kategori_produk)
                                <option value="{{ $rk->kategori_produk }}" selected>{{ $rk->kategori_produk }}</option>
                            @else
                                <option value="{{ $rk->kategori_produk }}">{{ $rk->kategori_produk }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('kategori_produk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="" class="mb-3">Nama Barang</label>
                    <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror"
                        id="" placeholder="Masukkan nama produk"
                        value="{{ old('nama_produk', $barang->nama_produk) }}">
                    @error('nama_produk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="" class="mb-3">Harga Beli</label>
                    <input type="number" name="harga_barang"
                        class="form-control @error('harga_barang') is-invalid @enderror" id="harga_barang"
                        placeholder="Masukkan harga barang" value="{{ old('harga_barang', $barang->harga_barang) }}">
                    @error('harga_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="" class="mb-3">Harga Jual</label>
                    <input type="number" name="harga_jual" class="form-control @error('harga_jual') is-invalid @enderror"
                        id="harga_jual" placeholder="Masukkan harga jual"
                        value="{{ old('harga_jual', $barang->harga_jual) }}">
                    @error('harga_jual')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="" class="mb-3">Stok Barang</label>
                    <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror"
                        id="" placeholder="Masukkan jumlah stok barang" value="{{ old('stok', $barang->stok) }}">
                    @error('stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3 upload-image">
                    <label for="">Upload Image</label>
                    <input class="form-control upload-image-input @error('image') is-invalid @enderror" type="file"
                        id="image" name="image" onchange="previewImage()">
                    @if ($barang->image)
                        <img src="{{ asset('storage/' . $barang->image) }}" alt=""
                            class="img-preview img-fluid mb-3 col-sm-5 d-block" style="width: 100px">
                    @else
                        <img src="/img/Image.png" alt="" class="img-preview img-fluid mb-3 col-sm-5"
                            style="width: 100px">
                    @endif
                    <p class="file-name">Upload gambar disini</p>
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <a href="/dashboard" class="btn btn-outline-primary px-5">Batalkan</a>
            <input type="submit" value="Simpan" class="btn btn-primary px-5">
        </div>

    </form>
    <style>
        label {
            font-weight: bold
        }
    </style>
@endsection
