@if ($bukusaya_ !== null)
<div class="col-12">
    <div class="card">
        <div class="card-header pb-2 pt-3">
            <h4 class="card-title">Daftar Buku Saya</h4>
        </div>
        <div class="card-content ">
            <div class="card-body pt-0 mt-0">
                <div class="table-responsive">
                    <table class="table table-md ">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Judul</th>
                                <th>Jumlah</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($bukusaya_->peminjaman_ as $bukusaya)
                                <tr>
                                    <td><div style="width: 7em">{{ $bukusaya->kode }}</div></td>
                                    <td><div style="width: 10em">{{ $bukusaya->buku->judul }}</div></td>
                                    <td>{{ $bukusaya->jumlah_pinjam }}</td>
                                    <td><div style="width: 8em">{{ $bukusaya->tanggal_pinjam->isoFormat('DD-MM-YYYY') }}</div></td>
                                    <td><div style="width: 8em">{{ $bukusaya->tanggal_kembali->isoFormat('DD-MM-YYYY') }}</div></td>
                                    <td>
                                        @if ($bukusaya->status)
                                            <span><i style="font-size: 25px" class="bi bi-check-all"></i></span>
                                        @else
                                            <span><i style="font-size: 25px" class="bi bi-check"></i></span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="text-center">
    <img width="400px" class="img-thumbnail" src="{{ asset('assets/images/not-found/undraw_taken_re_yn20.svg') }}">
</div>
@endif
