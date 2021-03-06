<div class="col">
    <div class="col-12">
        <div class="card">
            <div class="card-header pb-2 pt-3 d-flex justify-content-between">
                <h4 class="card-title">Daftar Buku</h4>
                <div class="ml-auto">
                    <div class="btn-group dropdown">
                        <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split pb-0 mb-2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                            Kategori
                        </button>
                        <div class="dropdown-menu">
                            @foreach ($kategori_ as $kategori)
                                <a target="_blank" class="dropdown-item" href="{{ route('cetak.buku') . '?kategori=' . $kategori->id }}">{{ $kategori->nama }}</a>
                            @endforeach
                        </div>
                        <a target="_blank" href="{{ route('cetak.buku') }}" class="btn btn-dark pb-0 mb-2"><i class="bi bi-printer" style="font-size: 20px"></i></a>
                    </div>
                    <span wire:click.prevent="create" role="button" class="badge bg-primary p-2">
                        <i class="bi bi-plus-circle" style="font-size: 20px"></i>
                    </span>
                </div>
            </div>
            <div class="card-content ">
                <div class="card-body pt-0 mt-0">
                    <div class="table-responsive">
                        <table class="table table-md ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Sampul</th>
                                    <th>Kategori</th>
                                    <th>Judul Buku</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th class="text-center">Dibaca</th>
                                    <th class="text-center">opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buku_ as $buku)
                                    <tr>
                                        <td>{{ $buku_->firstItem() + $loop->index }}</td>
                                        <td>
                                            <img class="img-thumbnail" width="80px" src="{{ $buku->sampul_url }}" alt="rawpixel.com">
                                        </td>
                                        <td>
                                            <div style="width: 5em">{{ $buku->kategori->nama ?? 'Tidak terdaftar' }}</div>
                                        </td>
                                        <td>
                                            <div style="width: 10em">{{ $buku->judul }}
                                                <span class="badge bg-secondary">{{ $buku->jumlah }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="width: 8em">{{ $buku->penulis }}</div>
                                        </td>
                                        <td>
                                            <div style="width: 8em">{{ $buku->penerbit }}</div>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-light-secondary">{{ $buku->dibaca }}</span>
                                        </td>
                                        <td class="text-center">
                                            <div style="width: 8em">
                                                <span wire:click="distroy('{{ $buku->id }}')" role="button" class="badge bg-danger p-2">
                                                    <i class="bi bi-trash-fill" style="font-size: 20px"></i>
                                                </span>
                                                <span wire:click.prevent="edit('{{ $buku->id }}')" role="button" class="badge bg-success p-2">
                                                    <i class="bi bi-pencil-square" style="font-size: 20px"></i>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer pb-0 pt-3">
                    {{ $buku_->onEachSide(2)->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade text-left" id="formModal" role="dialog" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Form Buku</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $bukuItem ? 'update' : 'store' }}">
                    <div class="modal-body">
                        <x-form.basic.selection-group name="state.kategori_id" label="Pilih Kategori Buku" :result="$kategori_"/>
                        <x-form.basic.input-group  type="text" name="state.judul" label="Judul Buku"/>
                        <x-form.basic.input-group  type="text" name="state.penulis" label="Penulis Buku"/>
                        <x-form.basic.input-group  type="text" name="state.penerbit" label="Penebrit Buku"/>
                        <div class="row">
                            <div class="col-6">
                                <x-form.basic.input-group  type="text" name="state.jumlah" label="Jumlah Buku"/>
                            </div>
                            <div class="col-6">
                                <x-form.basic.input-group  type="text" name="state.dibaca" label="Buku Dibaca"/>
                            </div>
                        </div>
                        <div class="text-center" x-data>
                            <span class="d-block pb-1">Default sampul buku</span>
                            <input class="d-none" type="file" x-ref="sampul" wire:model='sampul'>

                            <img role="button" x-on:click="$refs.sampul.click()" width="70px" class="img-thumbnail"
                                @if ($bukuItem)
                                        @if ($sampul)
                                            src="{{ $sampul->temporaryUrl() }}"
                                        @else
                                            src="{{ $urlEditSampul }}"
                                        @endif
                                @else
                                    src="{{ $sampul ? $sampul->temporaryUrl() : asset('storage/sampul/default.jpg') }}"
                                @endif
                            >

                            <span class="d-block pt-1">Klik gambar untuk mengganti sampul buku <span class="text-danger">minimal 1024kb</span> </span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button data-bs-dismiss="modal"  class="btn btn-light-secondary">
                            <i class="bi bi-arrow-left-square d-block d-sm-none" style="margin-bottom: 5px"></i>
                            <span class="d-none d-sm-block">Tidak Jadi</span>
                        </button>
                        <button  class="btn btn-primary ml-1">
                            <i class="bi bi-save2 d-block d-sm-none" style="margin-bottom: 5px"></i>
                            <span class="d-none d-sm-block">
                                @if ($bukuItem)
                                    Simpan perubahan
                                @else
                                    Simpan
                                @endif
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

@push('script')
<script src="{{ asset('assets/js/alpinejs/alpine.min.js') }}"></script>
    <script>
        window.addEventListener('show-form-modal', event => {
            new bootstrap.Modal(document.getElementById('formModal')).show();
        });
        Livewire.on('hideModal', () => {
            var myModalEl = document.getElementById('formModal')
            var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instance
            modal.hide();
        });
    </script>
@endpush
