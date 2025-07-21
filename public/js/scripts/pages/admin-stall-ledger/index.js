/*=========================================================================================
    File Name: index.js
    Description: Stall Ledger Entry Management with Route Hit
==========================================================================================*/

$(function () {
    'use strict';

    (function () {
        let ledgerManage = {};

        ledgerManage.addButton = $('#add-row-btn');
        ledgerManage.ledgerEntryForm = $('.ledger-entry-form');
        ledgerManage.ledgerModal = $('#ledgerEntryModal');
        ledgerManage.ledgerBody = $('#ledger-body');
        ledgerManage.totalBdtCell = $('#total-bdt');

        $('#amount, #conversion_rate').on('input', function () {
            let amount = parseFloat($('#amount').val()) || 0;
            let rate = parseFloat($('#conversion_rate').val()) || 0;
            let bdt = amount * rate;
            $('#bdt_amount').val(bdt.toFixed(2));
        });


        $('#entry_date').val($('#ledger-date').val());

        $('#ledger-date').on('change', function () {
            $('#entry_date').val($('#ledger-date').val());
            loadLedgerTable();
        });

        ledgerManage.addButton.on('click', function () {
            ledgerManage.ledgerEntryForm.trigger('reset');
            ledgerManage.ledgerEntryForm.find('input[name=row_id]').val('');
            ledgerManage.ledgerModal.modal('show');
        });

        function loadLedgerTable() {
            let date = $('#ledger-date').val();
            $.ajax({
                url: route('admin-ledger-entry-get-all'),
                type: 'GET',
                data: {
                    entry_date: date // ✅ pass date directly
                },
                success: function (response) {
                    $('#ledger-body').html(response.html);
                    $('#total-bdt').text(`৳ ${response.total_bdt}`);
                },
                error: function () {
                    console.error('Failed to load ledger data.');
                }
            });
        }

        // Call on page load
        loadLedgerTable();

        if (ledgerManage.ledgerEntryForm.length) {
            ledgerManage.ledgerEntryForm.validate({
                errorClass: 'error',
                rules: {
                    client_name: { required: true },
                    currency: { required: true },
                    amount: { required: true, number: true },
                    rate: { required: true, number: true },
                    entry_type: { required: true }
                },
                messages: {
                    client_name: { required: "Select client name." },
                    currency: { required: "Select currency." },
                    amount: { required: "Enter amount." },
                    rate: { required: "Enter conversion rate." },
                    entry_type: { required: "Select entry type." }
                },
                errorPlacement: function (error, element) {
                    let name = $(element).attr("name");
                    $("." + name + "_err").html("")
                    error.appendTo($("." + name + "_err"));
                }
            });

            ledgerManage.ledgerEntryForm.on('submit', function (e) {
                console.log("form");
                e.preventDefault();
                let isValid = ledgerManage.ledgerEntryForm.valid();

                if (isValid) {
                    buttonLoaderShow('button-submit', 'button-loader');
                    setTimeout(() => {
                        let formData = ledgerManage.ledgerEntryForm.serialize();

                        let response = $.makeAjaxRequest('ledger-entries.store', "POST", formData);

                        console.log(response, "response");

                        if (response.status === true) {
                            ledgerManage.ledgerModal.modal('hide');
                            $('.ledger-entry-table').DataTable().ajax.reload(null, false);
                            $.showSuccessAlert(response.message);
                            loadLedgerTable();
                        } else if (response.status === 0) {
                            $.showServerSideValidation(response.error);
                        } else {
                            $.showErrorAlert(response.message);
                        }

                        buttonLoaderHide('button-submit', 'button-loader');

                    }, 1000);
                }
            });
        }

        ledgerManage.ledgerBody.on('click', '.delete-row', function () {
            $(this).closest('tr').remove();
            calculateTotalBDT();
        });

        function calculateTotalBDT() {
            let total = 0;
            ledgerManage.ledgerBody.find('.bdt-cell').each(function () {
                total += parseFloat($(this).text()) || 0;
            });
            ledgerManage.totalBdtCell.text(`৳ ${total.toFixed(2)}`);
        }

        $(document).on('click', '.delete-ledger', function () {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-secondary ml-2'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: route('admin-ledger-entry-delete'), // Define this route
                        type: 'POST',
                        data: {
                            id: id
                        },
                        success: function (res) {
                            if (res.status === 200) {
                                $.showSuccessAlert(res.message);
                                loadLedgerTable();
                            } else {
                                $.showDangerAlert('Something went wrong.');
                            }
                        },
                        error: function () {
                            $.showDangerAlert('Server error.');
                        }
                    });
                }
            });
        });


    })();
});
