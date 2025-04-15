<div>
    <div class="container mt-4">

        @if ($successMessage)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $successMessage }}
                <button type="button" class="btn-close" wire:click="$set('successMessage', null)"></button>
            </div>
        @endif

        <button class="btn btn-primary mb-2" wire:click="resetForm" data-bs-toggle="modal" data-bs-target="#creditCardModal">Yeni Kredi Kartı</button>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Banka Hesabı</th>
                    <th>Kart Numarası</th>
                    <th>Son Kullanma Tarihi</th>
                    <th>Hesap Kesim Tarihi</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach($creditCards as $creditCard)
                    <tr>
                        <td>{{ $creditCard->bankAccount->name }}</td>
                        <td>{{ $creditCard->card_number }}</td>
                        <td>{{ $creditCard->expiry_date }}</td>
                        <td>{{ $creditCard->cut_off_date }}</td>
                        <td>
                            <button class="btn btn-sm btn-info" wire:click="edit({{ $creditCard->id }})">Düzenle</button>
                            <button class="btn btn-sm btn-danger" wire:click="confirmDelete({{ $creditCard->id }})">Sil</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $creditCards->links() }}

        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="creditCardModal" tabindex="-1">
            <div class="modal-dialog">
                <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $isEditMode ? 'Kredi Kartı Düzenle' : 'Yeni Kredi Kartı' }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Banka Hesabı</label>
                                <select class="form-control" wire:model.defer="bank_account_id">
                                    <option value="">Banka Hesabı Seçin</option>
                                    @foreach($bankAccounts as $bankAccount)
                                        <option value="{{ $bankAccount->id }}">{{ $bankAccount->name }}</option>
                                    @endforeach
                                </select>
                                @error('bank_account_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Kart Numarası</label>
                                <input type="text" class="form-control" wire:model.defer="card_number">
                                @error('card_number') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Son Kullanma Tarihi</label>
                                <input type="date" class="form-control" wire:model.defer="expiry_date">
                                @error('expiry_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Hesap Kesim Tarihi</label>
                                <input type="date" class="form-control" wire:model.defer="cut_off_date">
                                @error('cut_off_date') <span class="text-danger">{{ $message }}</span> @enderror
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
                            <p>Bu kredi kartını silmek istediğinizden emin misiniz?</p>
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
            let modal = bootstrap.Modal.getInstance(document.getElementById('creditCardModal'));
            modal.hide();
        });

        window.addEventListener('modal-open', () => {
            let modal = new bootstrap.Modal(document.getElementById('creditCardModal'));
            modal.show();
        });
    </script>


</div>
