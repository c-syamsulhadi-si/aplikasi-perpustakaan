<div>
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="form-group">
                        <h4 class="card-title">Kategori Buku</h4>
                        <span class="text-subtitle text-muted d-block">Kategori buku diibaratkan sebuah ruang-ruang yang menampung banyak buku.</span>
                        <span class="text-subtitle text-muted d-block">Jika ingin menambahkan kategori buku klik tombol <strong>tambah</strong>  dibawah.</span>
                        <span class="text-subtitle text-muted d-block">Jika ingin melakukan perubahan atau penghapusan kategori buku klik <strong>icon</strong> pada daftar kategori buku.</span>
                        <button wire:click.prevent="create" class="btn btn-outline-success mt-3">
                            Tambah
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            @foreach ($kategori_ as $kategori)
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-start align-items-center">
                                <div wire:click.prevent="updateWithDelete('{{ $kategori->id }}')" role="button" style="height: 50px; width: 50px; margin-right: 10px; background: #d63384;" class="rounded">
                                    <i style="font-size: 30px" class="bi bi-stack bi-middle text-white"></i>
                                </div>
                                <div>
                                    <strong class="d-block" style="color: #6f42c1"> <i class="bi bi-grid-1x2-fill"></i> {{ $kategori->rak->nama ?? 'Tidak terdaftar' }}</strong>
                                    <strong>{{ $kategori->nama }}</strong>
                                    <span class="d-block">{{ $kategori->buku_->count() }} Buku</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>


    <div wire:ignore.self class="modal fade text-left" id="formModal" role="dialog" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Form Kategori</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $kategoriItem ? 'update' : 'store' }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <select class="form-select @error('state.rak_id') is-invalid @enderror" wire:model.defer="state.rak_id">
                                <option value="">Pilih Rak</option>
                                @foreach ($rak_ as $rak)
                                    <option value="{{ $rak->id }}">{{ $rak->nama }}</option>
                                @endforeach
                            </select>
                            <x-pesan.error-message error="state.rak_id" />
                        </div>
                        <label>Nama kategori buku</label>
                        <div class="form-group">
                            <input type="text" wire:model.defer="state.nama" placeholder="Nama kategori buku" class="form-control @error('state.nama') is-invalid @enderror">
                            <x-pesan.error-message error="state.nama" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button data-bs-dismiss="modal"  class="btn btn-light-secondary">
                            <i class="bi bi-arrow-left-square d-block d-sm-none" style="margin-bottom: 5px"></i>
                            <span class="d-none d-sm-block">Tidak Jadi</span>
                        </button>
                        @if ($kategoriItem)
                            <a wire:click.prevent="distroy" class="btn btn-danger">
                                <i class="bi bi-x-square d-block d-sm-none" style="margin-bottom: 5px"></i>
                                <span class="d-none d-sm-block">Hapus</span>
                            </a>
                        @endif
                        <button  class="btn btn-primary ml-1">
                            <i class="bi bi-save2 d-block d-sm-none" style="margin-bottom: 5px"></i>
                            <span class="d-none d-sm-block">
                                @if ($kategoriItem)
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
