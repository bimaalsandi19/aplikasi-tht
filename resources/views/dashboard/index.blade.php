@extends('dashboard.layout.main')
@section('content')
    <h1 class="h4">Data Produk</h1>
    @if (session('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert"
            style="position: absolute; top: 20px;right: 20px;z-index: 4;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="position-relative">
        <div class="position-absolute top-50 " style="z-index: 3;margin-left: 230px;">

            <select class="form-select border border-secondary bg-transparent" id="kategoriFilter"
                onclick="filterByCategory(this.value)" style="width: 200px;margin-top: 3px;">
                <option value=""><img src="/img/Package.png" alt="">Semua</option>
                @foreach ($kategori as $rk)
                    <option value="{{ $rk->kategori_produk }}">{{ $rk->kategori_produk }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="position-relative">
        <div class="position-absolute top-0 end-0" style="z-index: 3;margin-top: 3px">
            <button class="btn  btn-success" id="exportButton" style="margin-right: 30px"> <img
                    src="/img/MicrosoftExcelLogo.png" alt=""> Export Excel</button>
            <a href="/dashboard/create" class="btn btn-danger "><img src="/img/PlusCircle.png" alt=""> Tambah
                Data</a>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-sm table-bordered" id="myTable" style="width: 100%">
            <thead class="table-secondary">
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Nama Produk</th>
                    <th>Kategori Produk</th>
                    <th>Harga Beli (Rp)</th>
                    <th>Harga Jual (Rp)</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            @foreach ($barang as $rb)
                <?php
                $harga_barang = number_format($rb['harga_barang'], 0, ',', ',');
                $harga_jual = number_format($rb['harga_jual'], 0, ',', ',');
                ?>
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center"><img src="{{ asset('storage/' . $rb->image) }}" alt="" width="30px">
                    </td>
                    <td class="text-left">{{ $rb->nama_produk }}</td>
                    <td class="text-left">{{ $rb->kategori_produk }}</td>
                    <td class="text-left">{{ $harga_barang }}</td>
                    <td class="text-left">{{ $harga_jual }}</td>
                    <td class="text-left">{{ $rb->stok }}</td>
                    <td class="text-center">
                        <a href="/dashboard/{{ $rb->id }}/edit"><img src="/img/edit.png" alt=""></a>
                        <form action="/dashboard/{{ $rb->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="bg-transparent border-0"
                                onclick="return confirm('Apakah anda yakin untuk hapus data ini?')"><img
                                    src="/img/delete.png" alt=""></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tbody>

            </tbody>
        </table>
    </div>
@endsection
