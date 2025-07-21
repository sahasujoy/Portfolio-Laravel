@extends('admin.layouts.adminContentLayoutMaster')

@section('title', $pageConfigs['title'])

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/user-list.css')) }}">
    <style>
        .jfss-own-card tr td.sorting_1 {
            vertical-align: top !important;
            padding-top: 30px !important;
        }

        .currency-select, .entry-type-select {
            width: 100%;
        }

        .table tfoot {
            font-weight: bold;
            background-color: #f5f5f5;
        }
    </style>
@endsection

@section('content')
    <section class="app-user-list app-user-view">
        <div class="card jfss-own-card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Daily Stall Ledger</h4>
                <div>
                    <input type="date" id="ledger-date" class="form-control" value="{{ date('Y-m-d') }}" />
                </div>
            </div>

            <div class="card-datatable table-responsive pt-0">
                <table class="table table-bordered ledger-table">
                    <thead class="thead-light">
                    <tr>
                        <th>Client Name</th>
                        <th>Currency</th>
                        <th>Amount</th>
                        <th>Rate</th>
                        <th>BDT (Calculated)</th>
                        <th>Type</th>
                        <th>Category</th>
                        <th>Note</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody id="ledger-body">
                    {{-- Rows will be loaded by AJAX --}}
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="4" class="text-right">Total BDT:</td>
                        <td id="total-bdt" colspan="5">৳ 0.00</td>
                    </tr>
                    </tfoot>
                </table>
            </div>

            <div class="card-footer">
                <button class="btn btn-primary" id="add-row-btn"><i data-feather="plus"></i> Add Entry</button>
                <button class="btn btn-success" id="save-ledger-btn"><i data-feather="save"></i> Save Ledger</button>
            </div>
        </div>
    </section>

    @include('admin.task.add-edit-modal')
@endsection

@section('page-script')
    <script src="{{ asset(mix('js/scripts/pages/admin-stall-ledger/index.js')) }}"></script>
@endsection
