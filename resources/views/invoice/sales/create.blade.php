<div>
    <div class="container-fluid">
<form wire:submit.prevent="store">
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Fatura Detayı</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="form-group mb-2">
                                    {{ html()->select('', $cards)->attributes([ 'wire:model' => 'card_id', 'class' => 'form-control']) }}
                                </div>
                                <div class="form-group mb-2">
                                    <input type="text" wire:model="invoice_no" placeholder="Invoice No" class="form-control">
                                </div>
                                <div class="form-group mb-2">
                                    <input type="date" wire:model="date_" class="form-control">
                                </div>
                                <div class="form-group mb-2">
                                    <textarea wire:model="description" placeholder="Description" class="form-control"></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    {{ html()->select('', salesTypes())->attributes([ 'wire:model' => 'type', 'class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Fatura Detayları</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-lg-12">

                                    @foreach($details as $index => $detail)
                                        <div class="row mb-2">
                                            <div class="col">
                                                <select wire:model.change="details.{{ $index }}.stock_id" class="form-control">
                                                    @foreach (\App\Models\Lunaris\Item::all() as $state)
                                                        <option value="{{ $state->id }}" @if($loop->first) selected @endif >{{ $state->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col">
                                                <select wire:model="details.{{$index}}.unit_id" class="form-control">
                                                    @foreach (\App\Models\Lunaris\Unit::where('unit_set_id', \App\Models\Lunaris\Item::find($details[$index]['stock_id'])->unit_set_id)->get() as $unit)
                                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col">
                                                <input type="number" wire:model="details.{{$index}}.quantity" class="form-control" placeholder="Miktar" step="0.001">
                                            </div>
                                            <div class="col">
                                                <input type="text" wire:model="details.{{$index}}.description" class="form-control" placeholder="Açıklama">
                                            </div>
                                            <div class="col">
                                                <input type="number" wire:model="details.{{$index}}.price" class="form-control" placeholder="Fiyat" step="0.01">
                                            </div>
                                            <div class="col">
                                                <input type="number" wire:model="details.{{$index}}.total" class="form-control" placeholder="Toplam" readonly>
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" wire:click="removeDetail({{ $index }})" class="btn btn-danger btn-sm">X</button>
                                            </div>
                                        </div>
                                    @endforeach

                                    <button type="button" wire:click="addDetail" class="btn btn-secondary mb-3">+ Satır Ekle</button>

                                    <div class="form-group">
                                        <label>Genel Toplam: {{ number_format($total, 2) }} ₺</label>
                                    </div>

                                    <button class="btn btn-primary">Kaydet</button>
                                </form>

                                @if (session()->has('message'))
                                    <div class="alert alert-success mt-2">{{ session('message') }}</div>
                                @endif
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

</div>