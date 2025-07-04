@extends('components.layouts.app')

@section('title', 'Banka Yönetimi')

@section('content')
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Fuar Mobilya</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Gösterge Paneli</a></li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xxl-9 ">
                            <div class="row justify-content-between d-flex align-items-center mt-3 mb-4">
                                <div class="col-xl-4">
                                    <div class="card card-animate">
                                        <div class="card-header border-0 align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Aylık Satış</h4>
                                            <div>
                                                    <div class="input-group input-group-sm">
                                                        <button class="btn btn-outline-secondary" type="button"><</button>
                                                        <input type="date" class="form-control form-control-sm" aria-label="Text input with 2 dropdown buttons">
                                                        <button class="btn btn-outline-secondary" type="button">></button>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden ms-3">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <h4 class="fs-4 flex-grow-1 mb-0"> {{ moneyFormat(\App\Models\Lunaris\Invoice::where('type', 1)->whereRaw('month(date_) = ' . now()->month)->sum('total')) }}₺</h4>
                                                        <span class="badge bg-danger-subtle text-danger fs-12"><i class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>5.02
                                                            %</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div>
                                </div><!-- end col -->

                                <div class="col-xl-4">
                                    <div class="card card-animate">
                                        <div class="card-header border-0 align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Aylık Tahsilat</h4>
                                            <div>
                                                    <div class="input-group input-group-sm">
                                                        <button class="btn btn-outline-secondary" type="button"><</button>
                                                        <input type="date" class="form-control form-control-sm" aria-label="Text input with 2 dropdown buttons">
                                                        <button class="btn btn-outline-secondary" type="button">></button>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden ms-3">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="{{ rand(10000, 4999999) }}">0</span>₺</h4>
                                                        <span class="badge bg-danger-subtle text-danger fs-12"><i class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>5.02
                                                            %</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div>
                                </div><!-- end col -->

                                <div class="col-xl-4">
                                    <div class="card card-animate">
                                        <div class="card-header border-0 align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Aylık Ödeme</h4>
                                            <div>
                                                    <div class="input-group input-group-sm">
                                                        <button class="btn btn-outline-secondary" type="button"><</button>
                                                        <input type="week" class="form-control form-control-sm" aria-label="Text input with 2 dropdown buttons">
                                                        <button class="btn btn-outline-secondary" type="button">></button>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden ms-3">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="{{ rand(10000, 4999999) }}">0</span>₺</h4>
                                                        <span class="badge bg-danger-subtle text-danger fs-12"><i class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>5.02
                                                            %</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div>
                                </div><!-- end col -->

                                <div class="col-xl-4">
                                    <div class="card card-animate">
                                        <div class="card-header border-0 align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Borçlu Müşteriler</h4>
                                            <div>
                                                    <div class="input-group input-group-sm">
                                                        <button class="btn btn-outline-secondary" type="button"><</button>
                                                        <input type="week" class="form-control form-control-sm" aria-label="Text input with 2 dropdown buttons">
                                                        <button class="btn btn-outline-secondary" type="button">></button>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden ms-3">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="{{ rand(10000, 4999999) }}">0</span>₺</h4>
                                                        <span class="badge bg-danger-subtle text-danger fs-12"><i class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>5.02
                                                            %</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div>
                                </div><!-- end col -->

                                <div class="col-xl-4">
                                    <div class="card card-animate">
                                        <div class="card-header border-0 align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Alacaklı Müşteriler</h4>
                                            <div>
                                                    <div class="input-group input-group-sm">
                                                        <button class="btn btn-outline-secondary" type="button"><</button>
                                                        <input type="week" class="form-control form-control-sm" aria-label="Text input with 2 dropdown buttons">
                                                        <button class="btn btn-outline-secondary" type="button">></button>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden ms-3">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="{{ rand(10000, 4999999) }}">0</span>₺</h4>
                                                        <span class="badge bg-danger-subtle text-danger fs-12"><i class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>5.02
                                                            %</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div>
                                </div><!-- end col -->

                                <div class="col-xl-4">
                                    <div class="card card-animate">
                                        <div class="card-header border-0 align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Alacaklı Tedarikçiler</h4>
                                            <div>
                                                    <div class="input-group input-group-sm">
                                                        <button class="btn btn-outline-secondary" type="button"><</button>
                                                        <input type="week" class="form-control form-control-sm" aria-label="Text input with 2 dropdown buttons">
                                                        <button class="btn btn-outline-secondary" type="button">></button>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden ms-3">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="{{ rand(10000, 4999999) }}">0</span>₺</h4>
                                                        <span class="badge bg-danger-subtle text-danger fs-12"><i class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>5.02
                                                            %</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->


                            <div class="row">


                                <div class="col-xl-4">
                                    <div class="card card-animate">
                                        <div class="card-header border-0 align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Aylık Ödeme</h4>
                                            <div>
                                                    <div class="input-group input-group-sm">
                                                        <button class="btn btn-outline-secondary" type="button"><</button>
                                                        <input type="date" class="form-control form-control-sm" aria-label="Text input with 2 dropdown buttons">
                                                        <button class="btn btn-outline-secondary" type="button">></button>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden ms-3">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="{{ rand(10000, 4999999) }}">0</span>₺</h4>
                                                        <span class="badge bg-danger-subtle text-danger fs-12"><i class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>5.02
                                                            %</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div>
                                </div><!-- end col -->

                                <div class="col-xl-4">
                                    <div class="card card-animate">
                                        <div class="card-header border-0 align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Borçlu Cariler</h4>
                                        </div>

                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden ms-3">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="{{ rand(10000, 4999999) }}">0</span>₺</h4>
                                                        <span class="badge bg-danger-subtle text-danger fs-12"><i class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>5.02
                                                            %</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div>
                                </div><!-- end col -->

                                <div class="col-xl-4">
                                    <div class="card card-animate">
                                        <div class="card-header border-0 align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Alacaklı Cariler</h4>
                                        </div>

                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden ms-3">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="{{ rand(10000, 4999999) }}">0</span>₺</h4>
                                                        <span class="badge bg-danger-subtle text-danger fs-12"><i class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>5.02
                                                            %</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->


                        </div><!-- end col -->

                        <div class="col-xxl-3">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h4 class="card-title mb-0">Yaklaşan Etkinlikler</h4>
                                </div><!-- end cardheader -->
                                <div class="card-body pt-0">
                                    <div class="mini-stats-wid d-flex align-items-center mt-3">
                                        <div class="flex-shrink-0 avatar-sm">
                                            <span class="mini-stat-icon avatar-title rounded-circle text-success bg-success-subtle fs-4">
                                                25
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">Kart Ödemesi</h6>
                                            <p class="text-muted mb-0">KuveytTürk (Büyük)</p>
                                        </div>
                                    </div><!-- end -->
                                    <div class="mini-stats-wid d-flex align-items-center mt-3">
                                        <div class="flex-shrink-0 avatar-sm">
                                            <span class="mini-stat-icon avatar-title rounded-circle text-success bg-success-subtle fs-4">
                                                12
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">Fatura Kontrolü</h6>
                                            <p class="text-muted mb-0">Muhasebe</p>
                                        </div>
                                    </div><!-- end -->
                                    <div class="mini-stats-wid d-flex align-items-center mt-3">
                                        <div class="flex-shrink-0 avatar-sm">
                                            <span class="mini-stat-icon avatar-title rounded-circle text-success bg-success-subtle fs-4">
                                                25
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">Planlı Ödeme </h6>
                                            <p class="text-muted mb-0">Leasing</p>
                                        </div>
                                    </div><!-- end -->
                                    <div class="mini-stats-wid d-flex align-items-center mt-3">
                                        <div class="flex-shrink-0 avatar-sm">
                                            <span class="mini-stat-icon avatar-title rounded-circle text-success bg-success-subtle fs-4">
                                                27
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">Emlak Vergisi</h6>
                                            <p class="text-muted mb-0">Vergi</p>
                                        </div>
                                    </div><!-- end -->

                                    <div class="mt-3 text-center">
                                        <a href="javascript:void(0);" class="text-muted text-decoration-underline">Tüm Etkinlikleri Gör</a>
                                    </div>

                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row -->

                    <div class="row">
                        <div class="col-xl-7">
                            <div class="card card-height-100">
                                <div class="card-header d-flex align-items-center">
                                    <h4 class="card-title flex-grow-1 mb-0">Active Projects</h4>
                                    <div class="flex-shrink-0">
                                        <a href="javascript:void(0);" class="btn btn-soft-info btn-sm">Export Report</a>
                                    </div>
                                </div><!-- end cardheader -->
                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table table-nowrap table-centered align-middle">
                                            <thead class="bg-light text-muted">
                                                <tr>
                                                    <th scope="col">Project Name</th>
                                                    <th scope="col">Project Lead</th>
                                                    <th scope="col">Progress</th>
                                                    <th scope="col">Assignee</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col" style="width: 10%;">Due Date</th>
                                                </tr><!-- end tr -->
                                            </thead><!-- thead -->

                                            <tbody>
                                                <tr>
                                                    <td class="fw-medium">Brand Logo Design</td>
                                                    <td>
                                                        <img src="assets/images/users/avatar-1.jpg" class="avatar-xxs rounded-circle me-1" alt="">
                                                        <a href="javascript: void(0);" class="text-reset">Donald
                                                            Risher</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-1 text-muted fs-13">53%</div>
                                                            <div class="progress progress-sm  flex-grow-1" style="width: 68%;">
                                                                <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 53%" aria-valuenow="53" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-group flex-nowrap">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xxs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xxs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xxs">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge bg-warning-subtle text-warning">Inprogress</span></td>
                                                    <td class="text-muted">06 Sep 2021</td>
                                                </tr><!-- end tr -->
                                                <tr>
                                                    <td class="fw-medium">Redesign - Landing Page</td>
                                                    <td>
                                                        <img src="assets/images/users/avatar-2.jpg" class="avatar-xxs rounded-circle me-1" alt="">
                                                        <a href="javascript: void(0);" class="text-reset">Prezy
                                                            William</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 text-muted me-1">0%</div>
                                                            <div class="progress progress-sm flex-grow-1" style="width: 68%;">
                                                                <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xxs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xxs">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge bg-danger-subtle text-danger">Pending</span></td>
                                                    <td class="text-muted">13 Nov 2021</td>
                                                </tr><!-- end tr -->
                                                <tr>
                                                    <td class="fw-medium">Multipurpose Landing Template</td>
                                                    <td>
                                                        <img src="assets/images/users/avatar-3.jpg" class="avatar-xxs rounded-circle me-1" alt="">
                                                        <a href="javascript: void(0);" class="text-reset">Boonie
                                                            Hoynas</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 text-muted me-1">100%</div>
                                                            <div class="progress progress-sm flex-grow-1" style="width: 68%;">
                                                                <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-xxs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xxs">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge bg-success-subtle text-success">Completed</span></td>
                                                    <td class="text-muted">26 Nov 2021</td>
                                                </tr><!-- end tr -->
                                                <tr>
                                                    <td class="fw-medium">Chat Application</td>
                                                    <td>
                                                        <img src="assets/images/users/avatar-5.jpg" class="avatar-xxs rounded-circle me-1" alt="">
                                                        <a href="javascript: void(0);" class="text-reset">Pauline
                                                            Moll</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 text-muted me-1">64%</div>
                                                            <div class="progress flex-grow-1 progress-sm" style="width: 68%;">
                                                                <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 64%" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xxs">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge bg-warning-subtle text-warning">Progress</span></td>
                                                    <td class="text-muted">15 Dec 2021</td>
                                                </tr><!-- end tr -->
                                                <tr>
                                                    <td class="fw-medium">Create Wireframe</td>
                                                    <td>
                                                        <img src="assets/images/users/avatar-6.jpg" class="avatar-xxs rounded-circle me-1" alt="">
                                                        <a href="javascript: void(0);" class="text-reset">James
                                                            Bangs</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 text-muted me-1">77%</div>
                                                            <div class="progress flex-grow-1 progress-sm" style="width: 68%;">
                                                                <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 77%" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xxs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xxs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xxs">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge bg-warning-subtle text-warning">Progress</span></td>
                                                    <td class="text-muted">21 Dec 2021</td>
                                                </tr><!-- end tr -->
                                            </tbody><!-- end tbody -->
                                        </table><!-- end table -->
                                    </div>

                                    <div class="align-items-center mt-xl-3 mt-4 justify-content-between d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="text-muted">Showing <span class="fw-semibold">5</span> of <span class="fw-semibold">25</span> Results
                                            </div>
                                        </div>
                                        <ul class="pagination pagination-separated pagination-sm mb-0">
                                            <li class="page-item disabled">
                                                <a href="#" class="page-link">←</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">1</a>
                                            </li>
                                            <li class="page-item active">
                                                <a href="#" class="page-link">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">→</a>
                                            </li>
                                        </ul>
                                    </div>

                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-5">
                            <div class="card card-height-100">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1 py-1">My Tasks</h4>
                                    <div class="flex-shrink-0">
                                        <div class="dropdown card-header-dropdown">
                                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted">All Tasks <i class="mdi mdi-chevron-down ms-1"></i></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">All Tasks</a>
                                                <a class="dropdown-item" href="#">Completed </a>
                                                <a class="dropdown-item" href="#">Inprogress</a>
                                                <a class="dropdown-item" href="#">Pending</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table table-borderless table-nowrap table-centered align-middle mb-0">
                                            <thead class="table-light text-muted">
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Dedline</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Assignee</th>
                                                </tr>
                                            </thead><!-- end thead -->
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input fs-15" type="checkbox" value="" id="checkTask1">
                                                            <label class="form-check-label ms-1" for="checkTask1">
                                                                Create new Admin Template
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="text-muted">03 Nov 2021</td>
                                                    <td><span class="badge bg-success-subtle text-success">Completed</span></td>
                                                    <td>
                                                        <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Mary Stoner">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    </td>
                                                </tr><!-- end -->
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input fs-15" type="checkbox" value="" id="checkTask2">
                                                            <label class="form-check-label ms-1" for="checkTask2">
                                                                Marketing Coordinator
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="text-muted">17 Nov 2021</td>
                                                    <td><span class="badge bg-warning-subtle text-warning">Progress</span></td>
                                                    <td>
                                                        <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Den Davis">
                                                            <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    </td>
                                                </tr><!-- end -->
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input fs-15" type="checkbox" value="" id="checkTask3">
                                                            <label class="form-check-label ms-1" for="checkTask3">
                                                                Administrative Analyst
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="text-muted">26 Nov 2021</td>
                                                    <td><span class="badge bg-success-subtle text-success">Completed</span></td>
                                                    <td>
                                                        <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Alex Brown">
                                                            <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    </td>
                                                </tr><!-- end -->
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input fs-15" type="checkbox" value="" id="checkTask4">
                                                            <label class="form-check-label ms-1" for="checkTask4">
                                                                E-commerce Landing Page
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="text-muted">10 Dec 2021</td>
                                                    <td><span class="badge bg-danger-subtle text-danger">Pending</span></td>
                                                    <td>
                                                        <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Prezy Morin">
                                                            <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    </td>
                                                </tr><!-- end -->
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input fs-15" type="checkbox" value="" id="checkTask5">
                                                            <label class="form-check-label ms-1" for="checkTask5">
                                                                UI/UX Design
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="text-muted">22 Dec 2021</td>
                                                    <td><span class="badge bg-warning-subtle text-warning">Progress</span></td>
                                                    <td>
                                                        <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Stine Nielsen">
                                                            <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    </td>
                                                </tr><!-- end -->
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input fs-15" type="checkbox" value="" id="checkTask6">
                                                            <label class="form-check-label ms-1" for="checkTask6">
                                                                Projects Design
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="text-muted">31 Dec 2021</td>
                                                    <td><span class="badge bg-danger-subtle text-danger">Pending</span></td>
                                                    <td>
                                                        <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Jansh William">
                                                            <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    </td>
                                                </tr><!-- end -->
                                            </tbody><!-- end tbody -->
                                        </table><!-- end table -->
                                    </div>
                                    <div class="mt-3 text-center">
                                        <a href="javascript:void(0);" class="text-muted text-decoration-underline">Load
                                            More</a>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row -->

                    <div class="row">
                        <div class="col-xxl-4">
                            <div class="card card-height-100">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Team Members</h4>
                                    <div class="flex-shrink-0">
                                        <div class="dropdown card-header-dropdown">
                                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span class="text-muted">Last 30 Days<i class="mdi mdi-chevron-down ms-1"></i></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Today</a>
                                                <a class="dropdown-item" href="#">Yesterday</a>
                                                <a class="dropdown-item" href="#">Last 7 Days</a>
                                                <a class="dropdown-item" href="#">Last 30 Days</a>
                                                <a class="dropdown-item" href="#">This Month</a>
                                                <a class="dropdown-item" href="#">Last Month</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body">

                                    <div class="table-responsive table-card">
                                        <table class="table table-borderless table-nowrap align-middle mb-0">
                                            <thead class="table-light text-muted">
                                                <tr>
                                                    <th scope="col">Member</th>
                                                    <th scope="col">Hours</th>
                                                    <th scope="col">Tasks</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="d-flex">
                                                        <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-xs rounded-3 me-2">
                                                        <div>
                                                            <h5 class="fs-13 mb-0">Donald Risher</h5>
                                                            <p class="fs-12 mb-0 text-muted">Product Manager</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-0">110h : <span class="text-muted">150h</span>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        258
                                                    </td>
                                                    <td style="width:5%;">
                                                        <div id="radialBar_chart_1" data-colors='["--vz-primary"]' data-chart-series="50" class="apex-charts" dir="ltr"></div>
                                                    </td>
                                                </tr><!-- end tr -->
                                                <tr>
                                                    <td class="d-flex">
                                                        <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-xs rounded-3 me-2">
                                                        <div>
                                                            <h5 class="fs-13 mb-0">Jansh Brown</h5>
                                                            <p class="fs-12 mb-0 text-muted">Lead Developer</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-0">83h : <span class="text-muted">150h</span></h6>
                                                    </td>
                                                    <td>
                                                        105
                                                    </td>
                                                    <td>
                                                        <div id="radialBar_chart_2" data-colors='["--vz-primary"]' data-chart-series="45" class="apex-charts" dir="ltr"></div>
                                                    </td>
                                                </tr><!-- end tr -->
                                                <tr>
                                                    <td class="d-flex">
                                                        <img src="assets/images/users/avatar-7.jpg" alt="" class="avatar-xs rounded-3 me-2">
                                                        <div>
                                                            <h5 class="fs-13 mb-0">Carroll Adams</h5>
                                                            <p class="fs-12 mb-0 text-muted">Lead Designer</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-0">58h : <span class="text-muted">150h</span></h6>
                                                    </td>
                                                    <td>
                                                        75
                                                    </td>
                                                    <td>
                                                        <div id="radialBar_chart_3" data-colors='["--vz-primary"]' data-chart-series="75" class="apex-charts" dir="ltr"></div>
                                                    </td>
                                                </tr><!-- end tr -->
                                                <tr>
                                                    <td class="d-flex">
                                                        <img src="assets/images/users/avatar-4.jpg" alt="" class="avatar-xs rounded-3 me-2">
                                                        <div>
                                                            <h5 class="fs-13 mb-0">William Pinto</h5>
                                                            <p class="fs-12 mb-0 text-muted">UI/UX Designer</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-0">96h : <span class="text-muted">150h</span></h6>
                                                    </td>
                                                    <td>
                                                        85
                                                    </td>
                                                    <td>
                                                        <div id="radialBar_chart_4" data-colors='["--vz-warning"]' data-chart-series="25" class="apex-charts" dir="ltr"></div>
                                                    </td>
                                                </tr><!-- end tr -->
                                                <tr>
                                                    <td class="d-flex">
                                                        <img src="assets/images/users/avatar-6.jpg" alt="" class="avatar-xs rounded-3 me-2">
                                                        <div>
                                                            <h5 class="fs-13 mb-0">Garry Fournier</h5>
                                                            <p class="fs-12 mb-0 text-muted">Web Designer</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-0">76h : <span class="text-muted">150h</span></h6>
                                                    </td>
                                                    <td>
                                                        69
                                                    </td>
                                                    <td>
                                                        <div id="radialBar_chart_5" data-colors='["--vz-primary"]' data-chart-series="60" class="apex-charts" dir="ltr"></div>
                                                    </td>
                                                </tr><!-- end tr -->
                                                <tr>
                                                    <td class="d-flex">
                                                        <img src="assets/images/users/avatar-5.jpg" alt="" class="avatar-xs rounded-3 me-2">
                                                        <div>
                                                            <h5 class="fs-13 mb-0">Susan Denton</h5>
                                                            <p class="fs-12 mb-0 text-muted">Lead Designer</p>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <h6 class="mb-0">123h : <span class="text-muted">150h</span>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        658
                                                    </td>
                                                    <td>
                                                        <div id="radialBar_chart_6" data-colors='["--vz-success"]' data-chart-series="85" class="apex-charts" dir="ltr"></div>
                                                    </td>
                                                </tr><!-- end tr -->
                                                <tr>
                                                    <td class="d-flex">
                                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-xs rounded-3 me-2">
                                                        <div>
                                                            <h5 class="fs-13 mb-0">Joseph Jackson</h5>
                                                            <p class="fs-12 mb-0 text-muted">React Developer</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-0">117h : <span class="text-muted">150h</span>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        125
                                                    </td>
                                                    <td>
                                                        <div id="radialBar_chart_7" data-colors='["--vz-primary"]' data-chart-series="70" class="apex-charts" dir="ltr"></div>
                                                    </td>
                                                </tr><!-- end tr -->
                                            </tbody><!-- end tbody -->
                                        </table><!-- end table -->
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xxl-4 col-lg-6">
                            <div class="card card-height-100">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Chat</h4>
                                    <div class="flex-shrink-0">
                                        <div class="dropdown card-header-dropdown">
                                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted"><i class="ri-settings-4-line align-bottom me-1"></i>Setting <i class="mdi mdi-chevron-down ms-1"></i></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#"><i class="ri-user-2-fill align-bottom text-muted me-2"></i> View
                                                    Profile</a>
                                                <a class="dropdown-item" href="#"><i class="ri-inbox-archive-line align-bottom text-muted me-2"></i>
                                                    Archive</a>
                                                <a class="dropdown-item" href="#"><i class="ri-mic-off-line align-bottom text-muted me-2"></i>
                                                    Muted</a>
                                                <a class="dropdown-item" href="#"><i class="ri-delete-bin-5-line align-bottom text-muted me-2"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body p-0">
                                    <div id="users-chat">
                                        <div class="chat-conversation p-3" id="chat-conversation" data-simplebar style="height: 400px;">
                                            <ul class="list-unstyled chat-conversation-list chat-sm" id="users-conversation">
                                                <li class="chat-list left">
                                                    <div class="conversation-list">
                                                        <div class="chat-avatar">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="">
                                                        </div>
                                                        <div class="user-chat-content">
                                                            <div class="ctext-wrap">
                                                                <div class="ctext-wrap-content">
                                                                    <p class="mb-0 ctext-content">Good morning 😊</p>
                                                                </div>
                                                                <div class="dropdown align-self-start message-box-drop">
                                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="ri-more-2-fill"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="#"><i class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                                        <a class="dropdown-item" href="#"><i class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                                        <a class="dropdown-item" href="#"><i class="ri-file-copy-line me-2 text-muted align-bottom"></i>Copy</a>
                                                                        <a class="dropdown-item" href="#"><i class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                        <a class="dropdown-item delete-item" href="#"><i class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="conversation-name"><small class="text-muted time">09:07 am</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- chat-list -->

                                                <li class="chat-list right">
                                                    <div class="conversation-list">
                                                        <div class="user-chat-content">
                                                            <div class="ctext-wrap">
                                                                <div class="ctext-wrap-content">
                                                                    <p class="mb-0 ctext-content">Good morning, How are you?
                                                                        What about our next meeting?</p>
                                                                </div>
                                                                <div class="dropdown align-self-start message-box-drop">
                                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="ri-more-2-fill"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="#"><i class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                                        <a class="dropdown-item" href="#"><i class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                                        <a class="dropdown-item" href="#"><i class="ri-file-copy-line me-2 text-muted align-bottom"></i>Copy</a>
                                                                        <a class="dropdown-item" href="#"><i class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                        <a class="dropdown-item delete-item" href="#"><i class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="conversation-name"><small class="text-muted time">09:08 am</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- chat-list -->

                                                <li class="chat-list left">
                                                    <div class="conversation-list">
                                                        <div class="chat-avatar">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="">
                                                        </div>
                                                        <div class="user-chat-content">
                                                            <div class="ctext-wrap">
                                                                <div class="ctext-wrap-content">
                                                                    <p class="mb-0 ctext-content">Yeah everything is fine.
                                                                        Our next meeting tomorrow at 10.00 AM</p>
                                                                </div>
                                                                <div class="dropdown align-self-start message-box-drop">
                                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="ri-more-2-fill"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="#"><i class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                                        <a class="dropdown-item" href="#"><i class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                                        <a class="dropdown-item" href="#"><i class="ri-file-copy-line me-2 text-muted align-bottom"></i>Copy</a>
                                                                        <a class="dropdown-item" href="#"><i class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                        <a class="dropdown-item delete-item" href="#"><i class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ctext-wrap">
                                                                <div class="ctext-wrap-content">
                                                                    <p class="mb-0 ctext-content">Hey, I'm going to meet a
                                                                        friend of mine at the department store. I have to
                                                                        buy some presents for my parents 🎁.</p>
                                                                </div>
                                                                <div class="dropdown align-self-start message-box-drop">
                                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="ri-more-2-fill"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="#"><i class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                                        <a class="dropdown-item" href="#"><i class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                                        <a class="dropdown-item" href="#"><i class="ri-file-copy-line me-2 text-muted align-bottom"></i>Copy</a>
                                                                        <a class="dropdown-item" href="#"><i class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                        <a class="dropdown-item delete-item" href="#"><i class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="conversation-name"><small class="text-muted time">09:10 am</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- chat-list -->

                                                <li class="chat-list right">
                                                    <div class="conversation-list">
                                                        <div class="user-chat-content">
                                                            <div class="ctext-wrap">
                                                                <div class="ctext-wrap-content">
                                                                    <p class="mb-0 ctext-content">Wow that's great</p>
                                                                </div>
                                                                <div class="dropdown align-self-start message-box-drop">
                                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="ri-more-2-fill"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="#"><i class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                                        <a class="dropdown-item" href="#"><i class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                                        <a class="dropdown-item" href="#"><i class="ri-file-copy-line me-2 text-muted align-bottom"></i>Copy</a>
                                                                        <a class="dropdown-item" href="#"><i class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                        <a class="dropdown-item delete-item" href="#"><i class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="conversation-name"><small class="text-muted time">09:12 am</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- chat-list -->

                                                <li class="chat-list left">
                                                    <div class="conversation-list">
                                                        <div class="chat-avatar">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="">
                                                        </div>
                                                        <div class="user-chat-content">
                                                            <div class="ctext-wrap">
                                                                <div class="message-img mb-0">
                                                                    <div class="message-img-list">
                                                                        <div>
                                                                            <a class="popup-img d-inline-block" href="assets/images/small/img-1.jpg">
                                                                                <img src="assets/images/small/img-1.jpg" alt="" class="rounded border">
                                                                            </a>
                                                                        </div>
                                                                        <div class="message-img-link">
                                                                            <ul class="list-inline mb-0">
                                                                                <li class="list-inline-item dropdown">
                                                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        <i class="ri-more-fill"></i>
                                                                                    </a>
                                                                                    <div class="dropdown-menu">
                                                                                        <a class="dropdown-item" href="assets/images/small/img-1.jpg" download=""><i class="ri-download-2-line me-2 text-muted align-bottom"></i>Download</a>
                                                                                        <a class="dropdown-item" href="#"><i class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                                                        <a class="dropdown-item" href="#"><i class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                                                        <a class="dropdown-item" href="#"><i class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                                        <a class="dropdown-item delete-item" href="#"><i class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>

                                                                    <div class="message-img-list">
                                                                        <div>
                                                                            <a class="popup-img d-inline-block" href="assets/images/small/img-2.jpg">
                                                                                <img src="assets/images/small/img-2.jpg" alt="" class="rounded border">
                                                                            </a>
                                                                        </div>
                                                                        <div class="message-img-link">
                                                                            <ul class="list-inline mb-0">
                                                                                <li class="list-inline-item dropdown">
                                                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        <i class="ri-more-fill"></i>
                                                                                    </a>
                                                                                    <div class="dropdown-menu">
                                                                                        <a class="dropdown-item" href="assets/images/small/img-2.jpg" download=""><i class="ri-download-2-line me-2 text-muted align-bottom"></i>Download</a>
                                                                                        <a class="dropdown-item" href="#"><i class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                                                        <a class="dropdown-item" href="#"><i class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                                                        <a class="dropdown-item" href="#"><i class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                                        <a class="dropdown-item delete-item" href="#"><i class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="conversation-name"><small class="text-muted time">09:30 am</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- chat-list -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="border-top border-top-dashed">
                                        <div class="row g-2 mx-3 mt-2 mb-3">
                                            <div class="col">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control border-light bg-light" placeholder="Enter Message...">
                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-info"><span class="d-none d-sm-inline-block me-2">Send</span> <i class="mdi mdi-send float-end"></i></button>
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xxl-4 col-lg-6">
                            <div class="card card-height-100">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Projects Status</h4>
                                    <div class="flex-shrink-0">
                                        <div class="dropdown card-header-dropdown">
                                            <a class="dropdown-btn text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                All Time <i class="mdi mdi-chevron-down ms-1"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">All Time</a>
                                                <a class="dropdown-item" href="#">Last 7 Days</a>
                                                <a class="dropdown-item" href="#">Last 30 Days</a>
                                                <a class="dropdown-item" href="#">Last 90 Days</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div id="prjects-status" data-colors='["--vz-success", "--vz-primary", "--vz-warning", "--vz-danger"]' class="apex-charts" dir="ltr"></div>
                                    <div class="mt-3">
                                        <div class="d-flex justify-content-center align-items-center mb-4">
                                            <h2 class="me-3 ff-secondary mb-0">258</h2>
                                            <div>
                                                <p class="text-muted mb-0">Total Projects</p>
                                                <p class="text-success fw-medium mb-0">
                                                    <span class="badge bg-success-subtle text-success p-1 rounded-circle"><i class="ri-arrow-right-up-line"></i></span> +3 New
                                                </p>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between border-bottom border-bottom-dashed py-2">
                                            <p class="fw-medium mb-0"><i class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i>
                                                Completed</p>
                                            <div>
                                                <span class="text-muted pe-5">125 Projects</span>
                                                <span class="text-success fw-medium fs-12">15870hrs</span>
                                            </div>
                                        </div><!-- end -->
                                        <div class="d-flex justify-content-between border-bottom border-bottom-dashed py-2">
                                            <p class="fw-medium mb-0"><i class="ri-checkbox-blank-circle-fill text-primary align-middle me-2"></i>
                                                In Progress</p>
                                            <div>
                                                <span class="text-muted pe-5">42 Projects</span>
                                                <span class="text-success fw-medium fs-12">243hrs</span>
                                            </div>
                                        </div><!-- end -->
                                        <div class="d-flex justify-content-between border-bottom border-bottom-dashed py-2">
                                            <p class="fw-medium mb-0"><i class="ri-checkbox-blank-circle-fill text-warning align-middle me-2"></i>
                                                Yet to Start</p>
                                            <div>
                                                <span class="text-muted pe-5">58 Projects</span>
                                                <span class="text-success fw-medium fs-12">~2050hrs</span>
                                            </div>
                                        </div><!-- end -->
                                        <div class="d-flex justify-content-between py-2">
                                            <p class="fw-medium mb-0"><i class="ri-checkbox-blank-circle-fill text-danger align-middle me-2"></i>
                                                Cancelled</p>
                                            <div>
                                                <span class="text-muted pe-5">89 Projects</span>
                                                <span class="text-success fw-medium fs-12">~900hrs</span>
                                            </div>
                                        </div><!-- end -->
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row -->

                </div>

@endsection