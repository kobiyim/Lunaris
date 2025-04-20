<div>
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Create Project</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                            <li class="breadcrumb-item active">Create Project</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <!-- end col -->
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="choices-categories-input" class="form-label">Fiş No</label>
                            {{ html()->text()->class('form-control') }}
                        </div>
                        <div class="mb-3">
                            <label for="choices-categories-input" class="form-label">Tarih</label>
                            {{ html()->date(null, now())->class('form-control') }}
                        </div>
                        <div class="mb-3">
                            <label for="choices-categories-input" class="form-label">İşlem</label>
                            {{ html()->date(null, now())->class('form-control') }}
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Banka Hesabı ID</th>
                                    <th>Kart ID</th>
                                    <th>Açıklama</th>
                                    <th>Tutar</th>
                                    <th class="text-center">İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lines as $index => $line)
                                    <tr>
                                        <td>
                                            <input type="number" wire:model="lines.{{ $index }}.bank_account_id" class="form-control">
                                            @error("lines.$index.bank_account_id") <small class="text-danger">{{ $message }}</small> @enderror
                                        </td>
                                        <td>
                                            <input type="number" wire:model="lines.{{ $index }}.card_id" class="form-control">
                                            @error("lines.$index.card_id") <small class="text-danger">{{ $message }}</small> @enderror
                                        </td>
                                        <td>
                                            <input type="text" wire:model="lines.{{ $index }}.description" class="form-control">
                                            @error("lines.$index.description") <small class="text-danger">{{ $message }}</small> @enderror
                                        </td>
                                        <td>
                                            <input type="number" wire:model="lines.{{ $index }}.amount" class="form-control">
                                            @error("lines.$index.amount") <small class="text-danger">{{ $message }}</small> @enderror
                                        </td>
                                        <td class="text-center">
                                            <button type="button" wire:click="removeLine({{ $index }})" class="btn btn-sm btn-danger">
                                                Sil
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mb-3">
                            <button type="button" wire:click="addLine" class="btn btn-secondary">+ Satır Ekle</button>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <!-- end card -->
                <div class="text-end mb-4">
                    <button type="submit" class="btn btn-danger w-sm">Delete</button>
                    <button type="submit" class="btn btn-secondary w-sm">Draft</button>
                    <button type="submit" class="btn btn-success w-sm">Create</button>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
</div>