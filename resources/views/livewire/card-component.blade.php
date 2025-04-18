<div>
    <div class="container-fluid">

        @if ($successMessage)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $successMessage }}
                <button type="button" class="btn-close" wire:click="$set('successMessage', null)"></button>
            </div>
        @endif

        <button class="btn btn-primary mb-2" wire:click="resetForm" data-bs-toggle="modal" data-bs-target="#cardModal">Yeni Cari Hesap</button>

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Form Advanced</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Form Advanced</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Single Button Dropdown</h4>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <label for="dropdown-base-example" class="form-label text-muted">Show Code</label>
                                <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example">
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <table class="table table-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">Kod</th>
                                            <th scope="col">Ad</th>
                                            <th scope="col">İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cards as $card)
                                            <tr>
                                                <td>{{ $card->code }}</td>
                                                <td>{{ $card->name }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-info" wire:click="edit({{ $card->id }})">Düzenle</button>
                                                    <button class="btn btn-sm btn-danger" wire:click="confirmDelete({{ $card->id }})">Sil</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{ $cards->links() }}
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="cardModal" tabindex="-1">
        <div class="modal-dialog">
            <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $isEditMode ? 'Cari Hesap Düzenle' : 'Yeni Cari Hesap' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Kod</label>
                            <input type="text" class="form-control" wire:model.defer="code">
                            @error('code') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Ad</label>
                            <input type="text" class="form-control" wire:model.defer="name">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                        <button type="submit" class="btn btn-primary">{{ $isEditMode ? 'Güncelle' : 'Kaydet' }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation -->
    @if($confirmingDelete)
        <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Silme Onayı</h5>
                    </div>
                    <div class="modal-body">
                        <p>Bu cari hesabı silmek istediğinizden emin misiniz?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" wire:click="$set('confirmingDelete', false)">Vazgeç</button>
                        <button class="btn btn-danger" wire:click="delete">Evet, Sil</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script>
        window.addEventListener('modal-close', () => {
            let modal = bootstrap.Modal.getInstance(document.getElementById('cardModal'));
            modal.hide();
        });

        window.addEventListener('modal-open', () => {
            let modal = new bootstrap.Modal(document.getElementById('cardModal'));
            modal.show();
        });
    </script>

</div>