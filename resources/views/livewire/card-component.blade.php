<div>
    <div class="container mt-4">

        @if ($successMessage)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $successMessage }}
                <button type="button" class="btn-close" wire:click="$set('successMessage', null)"></button>
            </div>
        @endif

        <button class="btn btn-primary mb-2" wire:click="resetForm" data-bs-toggle="modal" data-bs-target="#cardModal">Yeni Cari Hesap</button>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kod</th>
                    <th>Ad</th>
                    <th>İşlemler</th>
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
    </div>


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
