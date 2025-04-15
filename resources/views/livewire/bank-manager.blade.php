<div>
    <div class="d-flex justify-content-between mb-3">
        <h4>Banka Listesi</h4>
        <button class="btn btn-primary" wire:click="openModal('create')">Yeni Banka</button>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kod</th>
                <th>Ad</th>
                <th>Aktif</th>
                <th>İşlem</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banks as $bank)
                <tr>
                    <td>{{ $bank->code }}</td>
                    <td>{{ $bank->name }}</td>
                    <td>{{ $bank->active ? 'Evet' : 'Hayır' }}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" wire:click="openModal('edit', {{ $bank->id }})">Düzenle</button>
                        <button class="btn btn-sm btn-danger" wire:click="$emit('confirmDelete', {{ $bank->id }})">Sil</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $banks->links() }}

    <!-- Modal -->
    <div class="modal fade" id="bankModal" tabindex="-1" role="dialog" aria-labelledby="bankModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="save">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bankModalLabel">{{ $modalMode === 'create' ? 'Yeni Banka' : 'Bankayı Düzenle' }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Kapat">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kod</label>
                            <input type="text" class="form-control" wire:model.defer="code">
                            @error('code') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group">
                            <label>Ad</label>
                            <input type="text" class="form-control" wire:model.defer="name">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" wire:model="active" id="activeCheck">
                            <label class="form-check-label" for="activeCheck">Aktif</label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Silme Onayı</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Kapat">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bu bankayı silmek istediğinize emin misiniz?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
                    <button type="button" wire:click="delete" class="btn btn-danger">Evet, Sil</button>
                </div>
            </div>
        </div>
    </div>

</div>


@push('scripts')
<script>
    window.addEventListener('show-bank-modal', () => {
        $('#bankModal').modal('show');
    });

    window.addEventListener('hide-bank-modal', () => {
        $('#bankModal').modal('hide');
    });

    window.addEventListener('show-delete-modal', () => {
        $('#deleteModal').modal('show');
    });

    window.addEventListener('hide-delete-modal', () => {
        $('#deleteModal').modal('hide');
    });

    window.addEventListener('toast', event => {
        const { type, message } = event.detail;
        const toast = document.createElement('div');
        toast.className = `toast align-items-center text-bg-${type} border-0 show`;
        toast.role = 'alert';
        toast.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">${message}</div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        `;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 4000);
    });
</script>
@endpush