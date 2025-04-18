<div>
    @if (session()->has('success'))
        <div class="alert alert-success py-1 px-2">{{ session('success') }}</div>
    @endif

    <h5>Birimler</h5>
    <table class="table table-sm table-striped align-middle">
        <thead>
            <tr>
                <th>Kod</th>
                <th>Ad</th>
                <th>Aktif</th>
                <th>İşlem</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($units as $index => $unit)
                <tr>
                    @if ($editRowId === $unit['id'])
                        <td><input type="text" class="form-control form-control-sm" wire:model.defer="units.{{ $index }}.code"></td>
                        <td><input type="text" class="form-control form-control-sm" wire:model.defer="units.{{ $index }}.name"></td>
                        <td>
                            <button class="btn btn-sm btn-success" wire:click="save({{ $unit['id'] }})">Kaydet</button>
                        </td>
                    @else
                        <td>{{ $unit['code'] }}</td>
                        <td>{{ $unit['name'] }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning me-1" wire:click="edit({{ $unit['id'] }})">Düzenle</button>
                            <button class="btn btn-sm btn-danger" wire:click="delete({{ $unit['id'] }})"
                                onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</button>
                        </td>
                    @endif
                </tr>
            @endforeach

            {{-- Yeni birim ekleme satırı --}}
            <tr class="table-success">
                <td>
                    <input type="text" class="form-control form-control-sm" wire:model.defer="newCode" placeholder="Yeni kod">
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" wire:model.defer="newName" placeholder="Yeni ad">
                </td>
                <td>
                    <button class="btn btn-sm btn-primary" wire:click="addNew">Ekle</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
