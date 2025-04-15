<div>
    <div class="container mt-4">

        @if ($successMessage)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $successMessage }}
                <button type="button" class="btn-close" wire:click="$set('successMessage', null)"></button>
            </div>
        @endif

        <button class="btn btn-primary mb-2" wire:click="resetForm" data-bs-toggle="modal" data-bs-target="#unitModal">Yeni Birim</button>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Birim Seti</th>
                    <th>Kod</th>
                    <th>Ad</th>
                    <th>Satır Numarası</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach($units as $unit)
                    <tr>
                        <td>{{ $unit->unitSet->name }}</td>
                        <td>{{ $unit->code }}</td>
                        <td>{{ $unit->name }}</td>
                        <td>{{ $unit->line_number }}</td>
                        <td>
                            <button class="btn btn-sm btn-info" wire:click="edit({{ $unit->id }})">Düzenle</button>
                            <button class="btn btn-sm btn-danger" wire:click="confirmDelete({{ $unit->id }})">Sil</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $units->links() }}

        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="unitModal" tabindex="-1">
            <div class="modal-dialog">
                <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $isEditMode ? 'Birim Düzenle' : 'Yeni Birim' }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Birim Seti</label>
                                <select class="form-select" wire:model.defer="unit_set_id">
                                    <option value="">Seçiniz</option>
                                    @foreach($unitSets as $unitSet)
                                        <option value="{{ $unitSet->id }}">{{ $unitSet->name }}</option>
                                    @endforeach
                                </select>
                                @error('unit_set_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
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
                            <div class="mb-3">
                                <label>Satır Numarası</label>
                                <input type="text" class="form-control" wire:model.defer="line_number">
                                @error('line_number') <span class="text-danger">{{ $message }}</span> @enderror
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
                            <p>Bu birimi silmek istediğinizden emin misiniz?</p>
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
            let modal = bootstrap.Modal.getInstance(document.getElementById('unitModal'));
            modal.hide();
        });

        window.addEventListener('modal-open', () => {
            let modal = new bootstrap.Modal(document.getElementById('unitModal'));
            modal.show();
        });
    </script>
</div>
