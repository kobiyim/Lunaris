<div>
    <div class="container-fluid">

        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Cari Hesaplar</h4>
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col-12">
                                <label class="visually-hidden" for="inlineFormInputGroupUsername">Cariler?</label>
                                <input type="text" class="form-control" wire:model.live.debounce.250ms="search" placeholder="Cariler?">
                            </div>
                            <!--end col-->
                            <div class="col-12">
                                <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                                <select class="form-select" aria-label=".form-select-sm example">
                                    <option selected="">Hepsi</option>
                                    <option value="1">Aktif</option>
                                    <option value="2">Pasif</option>
                                </select>
                            </div>
                            <!--end col-->
                            <div class="col-12">
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-md dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        İşlemler
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a wire:click="resetForm" data-bs-toggle="modal" data-bs-target="#cardModal" class="dropdown-item">Yeni Cari Hesap</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <form wire:submit.prevent="store">
                                    <h4>Fatura Bilgileri</h4>
                                    <div class="form-group mb-2">
                                        <input type="text" wire:model="card_id" placeholder="Card ID" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="text" wire:model="invoice_no" placeholder="Invoice No" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="date" wire:model="date" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <textarea wire:model="description" placeholder="Description" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="text" wire:model="type" placeholder="Type" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="text" wire:model="sign" placeholder="Sign (+/-)" class="form-control">
                                    </div>

                                    <h4>Fatura Detayları</h4>
                                    @foreach($details as $index => $detail)
                                        <div class="row mb-2">
                                            <div class="col">
                                                <input type="text" wire:model="details.{{$index}}.stock_id" class="form-control" placeholder="Stok ID">
                                            </div>
                                            <div class="col">
                                                <input type="text" wire:model="details.{{$index}}.unit_id" class="form-control" placeholder="Birim ID">
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