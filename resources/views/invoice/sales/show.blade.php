<div>
    <div class="container-fluid">
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
                                    {{ $invoice->date_->format('d.m.Y') }}
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
                                    <thead class="table-light">
                                        <tr>
                                            <th>Stok</th>
                                            <th>Birim</th>
                                            <th>Miktar</th>
                                            <th>Açıklama</th>
                                            <th>Fiyatı</th>
                                            <th>Toplam</th>
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
                                                <td class="text-end">
                                                    {{ $detail->quantity }}
                                                </td>
                                                <td>
                                                    {{ $detail->description }}
                                                </td>
                                                <td class="text-end">
                                                    {{ moneyFormat($detail->price) }}
                                                </td>
                                                <td class="text-end">
                                                    {{ moneyFormat($detail->total) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="table-light">
                                        <tr>
                                            <td colspan="5" class="text-end">
                                                Genel Toplam:
                                            </td>
                                            <td class="text-end">
                                                {{ moneyFormat($invoice->total) }} ₺
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

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

@section('title', 'Fatura İncele')