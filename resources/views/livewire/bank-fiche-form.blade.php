<div>
    <div class="space-y-4">
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-xl font-bold">
    {{ $bankFiche ? 'Banka Fişi Düzenle' : 'Yeni Banka Fişi Oluştur' }}
</h2>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label>Tarih</label>
                    <input type="date" wire:model="date_" class="form-input w-full">
                </div>
                <div>
                    <label>Fiş No</label>
                    <input type="text" wire:model="ficheno" class="form-input w-full">
                </div>
                <div>
                    <label>İşlem Türü</label>
                    <select wire:model="trcode" class="form-select w-full">
                        <option value="1">Gelen</option>
                        <option value="2">Gönderilen</option>
                    </select>
                </div>
                <div>
                    <label>Bakiye Yönü</label>
                    <select wire:model="sign" class="form-select w-full">
                        <option value="1">Giriş</option>
                        <option value="-1">Çıkış</option>
                    </select>
                </div>
                <div class="col-span-2">
                    <label>Açıklama</label>
                    <textarea wire:model="description" class="form-textarea w-full"></textarea>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-xl font-semibold mb-3">Fiş Satırları</h2>

            @foreach ($lines as $index => $line)
                <div class="grid grid-cols-7 gap-2 items-center mb-2">
                    <select wire:model="lines.{{ $index }}.bank_id" class="form-select">
                        <option value="">Banka Seç</option>
                        @foreach ($banks as $bank)
                            <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                        @endforeach
                    </select>

                    <select wire:model="lines.{{ $index }}.card_id" class="form-select">
                        <option value="">Cari Seç</option>
                        @foreach ($cards as $card)
                            <option value="{{ $card->id }}">{{ $card->name }}</option>
                        @endforeach
                    </select>

                    <input type="text" wire:model="lines.{{ $index }}.description" class="form-input" placeholder="Açıklama">
                    <input type="number" step="0.01" wire:model="lines.{{ $index }}.amount" class="form-input" placeholder="Tutar">

                    <div class="flex flex-col space-y-1">
                        <button type="button" wire:click="addLineAbove({{ $index }})" class="text-green-500 text-xs">↑ Üstüne</button>
                        <button type="button" wire:click="addLineBelow({{ $index }})" class="text-blue-500 text-xs">↓ Altına</button>
                        <button type="button" wire:click="removeLine({{ $index }})" class="text-red-500 text-xs">× Sil</button>
                    </div>
                </div>
            @endforeach

            <button type="button" wire:click="addLine" class="text-blue-600 hover:underline mt-2">+ Satır Ekle</button>
        </div>

        <div>
            <button wire:click="save" class="bg-blue-600 text-white px-4 py-2 rounded">Kaydet</button>
        </div>
    </div>
</div>
