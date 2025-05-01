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
                                    {{ $invoice->card->name }}
                                </div>
                                <div class="form-group mb-2">
                                    {{ $invoice->invoice_no }}
                                </div>
                                <div class="form-group mb-2">
                                    {{ $invoice->date_ }}
                                </div>
                                <div class="form-group mb-2">
                                    {{ $invoice->description }}
                                </div>
                                <div class="form-group mb-2">
                                    {{ salesTypes($invoice->type) }}
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
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Stok</th>
                                            <th>Birim</th>
                                            <th>Miktar</th>
                                            <th>Açıklama</th>
                                            <th>Fiyatı</th>
                                            <th>Toplam</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($invoice->details as $detail)
                                            <tr>
                                                <td>
                                                    {{ $detail->item->name }}
                                                </td>
                                                <td>
                                                    {{ $detail->unit->name }}
                                                </td>
                                                <td>
                                                    {{ $detail->quantity }}
                                                </td>
                                                <td>
                                                    {{ $detail->description }}
                                                </td>
                                                <td>
                                                    {{ $detail->price }}
                                                </td>
                                                <td>
                                                    {{ $detail->total }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                    <div class="form-group">
                                        <label>Genel Toplam: {{ moneyFormat($invoice->total) }} ₺</label>
                                    </div>

                                    <button class="btn btn-primary">Kaydet</button>
                                </form>

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