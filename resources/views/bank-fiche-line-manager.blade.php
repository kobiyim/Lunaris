<div>
<div>
    {{-- Satır Ekleme/Düzenleme Formu --}}
    <div class="mb-3">
        <div class="row g-2">
            <div class="col-md-2">
                <input wire:model.defer="line_number" type="number" class="form-control" placeholder="Satır No">
            </div>
            <div class="col-md-3">
                <select wire:model.defer="bank_account_id" class="form-select">
                    <option value="">Banka Hesabı</option>
                    @foreach($bankAccounts as $account)
                        <option value="{{ $account->id }}">{{ $account->code }} - {{ $account->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select wire:model.defer="card_id" class="form-select">
                    <option value="">Cari</option>
                    @foreach($cards as $card)
                        <option value="{{ $card->id }}">{{ $card->code }} - {{ $card->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input wire:model.defer="description" type="text" class="form-control" placeholder="Açıklama">
            </div>
            <div class="col-md-1">
                <input wire:model.defer="amount" type="number" step="0.01" class="form-control" placeholder="Tutar">
            </div>
        </div>

        <div class="mt-2 text-end">
            <button wire:click="resetForm" type="button" class="btn btn-secondary btn-sm">Temizle</button>
            <button wire:click="save" type="button" class="btn btn-primary btn-sm">{{ $lineId ? 'Güncelle' : 'Ekle' }}</button>
        </div>
    </div>

    {{-- Satır Listesi --}}
    <table class="table table-bordered table-sm align-middle">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Banka Hesabı</th>
                <th>Cari</th>
                <th>Açıklama</th>
                <th>Tutar</th>
                <th class="text-end">İşlem</th>
            </tr>
        </thead>
        <tbody>
            @forelse($lines as $line)
                <tr>
                    <td>{{ $line->line_number }}</td>
                    <td>{{ $line->bankAccount?->name }} {{ $line->bankAccount->bank->name }}</td>
                    <td>{{ $line->card?->name }}</td>
                    <td>{{ $line->description }}</td>
                    <td>{{ number_format($line->amount, 2) }}</td>
                    <td class="text-end">
                        <button wire:click="edit({{ $line->id }})" class="btn btn-sm btn-warning">Düzenle</button>
                        <button wire:click="confirmDelete({{ $line->id }})" class="btn btn-sm btn-danger">Sil</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Henüz bir satır eklenmedi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Silme Onayı --}}
    @if ($confirmingDelete)
        <div class="alert alert-danger d-flex justify-content-between align-items-center">
            <span>Bu satırı silmek istediğinize emin misiniz?</span>
            <div>
                <button wire:click="delete" class="btn btn-danger btn-sm">Evet, Sil</button>
                <button wire:click="$set('confirmingDelete', false)" class="btn btn-secondary btn-sm">Vazgeç</button>
            </div>
        </div>
    @endif
</div>
</div>
