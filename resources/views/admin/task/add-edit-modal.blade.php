<!-- Add/Edit Ledger Entry Modal -->
<div class="modal fade text-left ledger-entry-modal"
     id="ledgerEntryModal"
     tabindex="-1"
     role="dialog"
     aria-labelledby="ledgerEntryModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="ledgerEntryModalLabel">Add Ledger Entry</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card mb-0">
                <div class="card-body">
                    <form class="ledger-entry-form form form-vertical">
                        @csrf
                        <input type="hidden" name="row_id" id="row_id" />
                        <input type="hidden" id="entry_date" name="entry_date" class="form-control" value="" />


                        <div class="row">

                            <!-- Client Name (Select2 AJAX) -->
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="client_name">Client Name</label>
                                    <div class="input-group input-group-merge">
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text"><i data-feather="user"></i></span>--}}
{{--                                        </div>--}}
                                        <select class="form-control" id="client_id" name="client_id">
                                            <option value="">Select Client</option>
                                            @foreach ($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger error-text client_name_err"></span>
                                </div>
                            </div>

                            <!-- Currency -->
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="currency">Currency</label>
                                    <select class="form-control" name="currency" id="currency">
                                        <option value="">Select Currency</option>
                                        <option value="AED">AED</option>
                                        <option value="INR">INR</option>
                                        <option value="BDT">BDT</option>
                                    </select>
                                    <span class="text-danger error-text currency_err"></span>
                                </div>
                            </div>

                            <!-- Amount -->
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="number" step="0.01" class="form-control" name="amount" id="amount" placeholder="Original Amount" />
                                    <span class="text-danger error-text amount_err"></span>
                                </div>
                            </div>

                            <!-- Rate -->
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="conversion_rate">Conversion Rate</label>
                                    <input type="number" step="0.0001" class="form-control" name="conversion_rate" id="conversion_rate" placeholder="Rate to BDT" />
                                    <span class="text-danger error-text rate_err"></span>
                                </div>
                            </div>

                            <!-- Calculated BDT -->
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="bdt_amount">BDT (Calculated)</label>
                                    <input type="number" class="form-control" id="bdt_amount" name="bdt_amount" readonly placeholder="Auto Calculated" />
                                </div>
                            </div>

                            <!-- Entry Type -->
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="entry_type">Entry Type</label>
                                    <select class="form-control" name="entry_type" id="entry_type">
                                        <option value="">Select Type</option>
                                        <option value="deposit">Deposit</option>
                                        <option value="expense">Expense</option>
                                    </select>
                                    <span class="text-danger error-text entry_type_err"></span>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="category">Entry Category</label>
                                    <select class="form-control" name="category" id="category">
                                        <option value="">Select Type</option>
                                        <option value="bank">Bank</option>
                                        <option value="cash">Cash</option>
                                        <option value="general_expense">General Expense</option>
                                    </select>
                                    <span class="text-danger error-text entry_type_err"></span>
                                </div>
                            </div>

                            <!-- Note -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="note">Note</label>
                                    <textarea class="form-control" name="note" id="note" rows="2" placeholder="Additional notes..."></textarea>
                                    <span class="text-danger error-text note_err"></span>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mr-1 button-submit">
                                    <div style="display: none;" class="spinner-border spinner-border-sm button-loader" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
