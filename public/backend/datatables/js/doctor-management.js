/**
 * Page Category List
 */

'use strict';
var list_nationalities = $("#list_nationalities").data('nationalities');
var list_countries = $("#list_countries").data('countries');
const validationMessages = $('#validation-messages');
const addNewTranslation = validationMessages.data('add-new');
const first_nameEnRequiredTranslation = validationMessages.data('first_name-en-required');
const first_nameArRequiredTranslation = validationMessages.data('first_name-ar-required');
const categoryIdRequiredTranslation = validationMessages.data('category-id-required');
const childCategoryIdRequiredTranslation = validationMessages.data('child-category-id-required');
const exportFile = validationMessages.data('export');
const selectOption = validationMessages.data('select');
const edit = validationMessages.data('edit');
const confirm = validationMessages.data('confirm');
const deleteItem = validationMessages.data('delete');
const cancel = validationMessages.data('cancel');
const search = validationMessages.data('search');
const next = validationMessages.data('next');
const previous = validationMessages.data('previous');
const showing = validationMessages.data('showing');
const to = validationMessages.data('to');
const of = validationMessages.data('of');
const entries = validationMessages.data('entries');
const actions = validationMessages.data('Actions');
const lang = validationMessages.data('lang');
const oky = validationMessages.data('oky');
const delete_done = validationMessages.data('delete_done');
// Datatable (jquery)
$(function () {
    // Variable declaration for table
    var dt_doctor_table = $('.datatables-doctors'),
        select2 = $('.select2'),
        sub_select2 = $('.select2_sub'),
        categoryView = baseUrl + '/admin/api-doctors',
        offCanvasForm = $('#offcanvasAssignArticle');

    if (select2.length) {
        var $this = select2;
        $this.wrap('<div class="position-relative"></div>').select2({
            placeholder: selectOption,
            dropdownParent: $this.parent()
        });
    }
    if (sub_select2.length) {
        var $this_sub = sub_select2;
        $this_sub.wrap('<div class="position-relative"></div>').select2({
            placeholder: selectOption,
            dropdownParent: $this_sub.parent()
        });
    }

    // ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Categories datatable
    if (dt_doctor_table.length) {
        var dt_doctor = dt_doctor_table.DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + '/admin/api-doctors?hospital_id='+hospital_id
            },
            columns: [
               
                // columns according to JSON
                { data: '' },
                // { data: 'fake_id' },
                { data: 'id' },
                { data: 'first_name'},
                { data: 'last_name'},
                { data: 'email'},
                { data: 'city_id'},
               
                { data: 'Phone'},
                { data: 'gender'},
                
                { data: 'title'},
                { data: 'area_id'},
                { data: 'description'},
              
                { data: 'is_trainer'},
                { data: 'lat'},
                { data: 'lang'},
                // { data: 'created_at'},
                { data: 'action' },
               
            ],
            columnDefs: [
                {
                    // For Responsive
                    className: 'control',
                    searchable: false,
                    orderable: false,
                    responsivePriority: 2,
                    targets: 0,
                    render: function (data, type, full, meta) {
                        return '';
                    }
                },
                {
                    searchable: false,
                    orderable: false,
                    targets: 1,
                    render: function (data, type, full, meta) {
                        return `<span>${full.fake_id}</span>`;
                    }
                },
                {
                    // Category name
                    targets: 2,
                    // render: function (data, type, full, meta) {
                    //     var $name = full['name'];
                    //
                    //     return '<span class="category-name">' + $name + '</span>';
                    // }
                    render: function (data, type, full, meta) {
                        var $first_name = full['first_name'],
                        
                            $id = full['id'],
                            $image = full['image'];
                        // if ($image) {
                        //     // For Product image
                        //
                        //     var $output = '<img src="' + $image + '" alt="Category-' + $id + '" class="rounded-2">';
                        // }
                        // Creates full output for Product name and product_brand
                        var $row_output =
                            '<div class="d-flex justify-content-start align-items-center product-name">' +
                            '<div class="avatar-wrapper">' +
                            // '<div class="avatar avatar me-2 rounded-2 bg-label-secondary">' +
                            // $output +
                            // '</div>' +
                            '</div>' +
                            '<div class="d-flex flex-column">' +
                            '<h6 class="text-body text-nowrap mb-0">' +
                            $first_name +
                            // $last_name +
                            '</h6>' +
                            '</div>' +
                            '</div>';
                        return $row_output;
                    }
                },
                {
                    // Slug
                    targets: 3,
                    // render: function (data, type, full, meta) {
                    //     $last_name = full['last_name']
                    //     $id = full['id'],
                    //     $image = full['image'];
                    //     var $row_output =
                    //     '<div class="d-flex justify-content-start align-items-center product-name">' +
                    //     '<div class="avatar-wrapper">' +
                    //     // '<div class="avatar avatar me-2 rounded-2 bg-label-secondary">' +
                    //     // $output +
                    //     // '</div>' +
                    //     '</div>' +
                    //     '<div class="d-flex flex-column">' +
                    //     '<h6 class="text-body text-nowrap mb-0">' +
                    //     $last_name +
                    //     // $last_name +
                    //     '</h6>' +
                    //     '</div>' +
                    //     '</div>';
                    // return $row_output;
                    // }
                },
                {
                    // Slug
                    targets: 5,
                    render: function (data, type, full, meta) {
                        var $city = full['city_id'];

                        return '<span class="category-slug">' + $city + '</span>';
                    }
                    // render: function (data, type, full, meta) {
                    //     var $sub_category = full['sub_category'];

                    //     return '<span class="category-slug">' + $sub_category + '</span>';
                    // }
                },

             
                {
                    // Created at
                    targets: 7,
                    render: function (data, type, full, meta) {
                        var $gender = full['gender'];
                        if($gender == 0){
                            return '<span class="category-slug">' + 'male' + '</span>'; 
                        }
                        else($gender == 1)
                        

                        return '<span class="category-slug">' + 'famle' + '</span>';
                    
                    },
                }, 
                {
                    targets: 11,
                    render: function (data, type, full, meta) {
                        var $is_trainer = full['is_trainer'];
                        // var stateNum = Math.floor(Math.random() * 6);
                         var states = ['success', 'danger'];
                        // var $state = states[stateNum],
                        //     $name = full['username'],
                        //     $initials = $name.match(/\b\w/g) || [],
                        //     $output;
                        // $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                        if($is_trainer == 0 ){
                            states='danger'
                       return  '<span class="avatar-initial rounded-circle bg-label-'+states+'">' +  'NO'  + '</span>';

                        }else{
                            states='success'
                            return  '<span class="avatar-initial rounded-circle bg-label-'+states+'">' +  'yes'  + '</span>';
     
                        }

                        // return '<span class="category-slug">' + 'yes' + '</span>';
                    
                    }
                    // render: function (data, type, full, meta) {
                    //     var $created_at = full['created_at'];

                    //     return '<span class="category-created_at">' + $created_at + '</span>';
                    // }
                },
                {
                    // Actions
                    targets: -1,
                    title: actions,
                    
                    searchable: false,
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return (
                            '<div class="d-inline-block text-nowrap">' +
                            `<button id="editButton" class="btn btn-sm btn-icon edit-record" data-id="${full['id']}" ><i class="ti ti-edit"></i></button>` +
                            `<button class="btn btn-sm btn-icon delete-record" data-id="${full['id']}"><i class="ti ti-trash"></i></button>` +
                          
                            // '<div class="dropdown-menu dropdown-menu-end m-0">' +
                            // '<a href="' +
                            // userView +
                            // '" class="dropdown-item">View</a>' +
                            // '<a href="javascript:;" class="dropdown-item">Suspend</a>' +
                            // '</div>' +
                            '</div>'
                        );
                    },
                 
                }
            ],
            order: [[2, 'desc']],
            dom:
                '<"row mx-2"' +
                '<"col-md-2"<"me-3"l>>' +
                '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +
                '>t' +
                '<"row mx-2"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: '_MENU_',
                search: '',
                searchPlaceholder: search,
                paginate: {
                    next: next,
                    previous: previous
                },
                // info: 'Showing _START_ to _END_ of _TOTAL_ entries'
                info: showing +' _START_ ' + to + ' _END_ ' + of + ' _TOTAL_ ' + entries
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-label-primary dropdown-toggle mx-3',
                    text: '<i class="ti ti-logout rotate-n90 me-2"></i>' + exportFile,
                    buttons: [
                        {
                            extend: 'print',
                            title: 'Doctors',
                            text: '<i class="ti ti-printer me-2" ></i>Print',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5],
                                // prevent avatar to be print
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function (index, item) {
                                            // if (item.classList !== undefined && item.classList.contains('user-name')) {
                                            //     result = result + item.lastChild.textContent;
                                            // } else result = result + item.innerText;
                                            if (item && item.classList && item.classList.contains('category-name')) {
                                                result = result + item.lastChild.textContent;
                                            } else result = result + item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            },
                            customize: function (win) {
                                //customize print view for dark
                                $(win.document.body)
                                    .css('color', config.colors.headingColor)
                                    .css('border-color', config.colors.borderColor)
                                    .css('background-color', config.colors.body);
                                $(win.document.body)
                                    .find('table')
                                    .addClass('compact')
                                    .css('color', 'inherit')
                                    .css('border-color', 'inherit')
                                    .css('background-color', 'inherit');
                            }
                        },
                        {
                            extend: 'csv',
                             title: 'Doctors',
                            text: '<i class="ti ti-file-text me-2" ></i>Csv',
                            className: 'dropdown-item',
                            exportOptions: {
                                 columns: [1, 2, 3, 4, 5],
                                // prevent avatar to be print
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function (index, item) {
                                            // if (item.classList.contains('user-name')) {
                                            //     result = result + item.lastChild.textContent;
                                            // } else result = result + item.innerText;
                                            if (item && item.classList && item.classList.contains('category-name')) {
                                                result = result + item.lastChild.textContent;
                                            } else result = result + item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            }
                        },
                        {
                            extend: 'excel',
                            title: 'Doctors',
                            text: '<i class="ti ti-file-spreadsheet me-2"></i>Excel',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5],
                                // prevent avatar to be display
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function (index, item) {
                                            // if (item.classList.contains('user-name')) {
                                            //     result = result + item.lastChild.textContent;
                                            // } else result = result + item.innerText;
                                            if (item && item.classList && item.classList.contains('category-name')) {
                                                result = result + item.lastChild.textContent;
                                            } else result = result + item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            }
                        },
                        {
                            extend: 'pdf',
                            title: 'Doctors',
                            text: '<i class="ti ti-file-text me-2"></i>Pdf',
                            className: 'dropdown-item',
                            exportOptions: {
                                 columns: [1, 2, 3, 4, 5],
                                // prevent avatar to be display
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function (index, item) {
                                            // if (item.classList.contains('user-name')) {
                                            //     result = result + item.lastChild.textContent;
                                            // } else result = result + item.innerText;
                                            if (item && item.classList && item.classList.contains('category-name')) {
                                                result = result + item.lastChild.textContent;
                                            } else result = result + item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            }
                        },
                        {
                            extend: 'copy',
                             title: 'Doctors',
                            text: '<i class="ti ti-copy me-1" ></i>Copy',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5],
                                // prevent avatar to be copy
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function (index, item) {
                                            // if (item.classList.contains('user-name')) {
                                            //     result = result + item.lastChild.textContent;
                                            // } else result = result + item.innerText;
                                            if (item && item.classList && item.classList.contains('category-name')) {
                                                result = result + item.lastChild.textContent;
                                            } else result = result + item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            }
                        }
                    ]
                },
                {
                    text: '<i class="ti ti-plus me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">' + addNewTranslation + '</span>',
                    className: 'add-new btn btn-primary',
                    attr: {
                        // 'onClick': 'add()',
                        'id':'add-new-doctor'
                    }
                }
            ],
            // For responsive popup
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return 'Details of ' + data['name'];
                        }
                    }),
                    type: 'column',
                    renderer: function (api, rowIdx, columns) {
                        var data = $.map(columns, function (col, i) {
                            return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                                ? '<tr data-dt-row="' +
                                col.rowIndex +
                                '" data-dt-column="' +
                                col.columnIndex +
                                '">' +
                                '<td>' +
                                col.title +
                                ':' +
                                '</td> ' +
                                '<td>' +
                                col.data +
                                '</td>' +
                                '</tr>'
                                : '';
                        }).join('');

                        return data ? $('<table class="table"/><tbody />').append(data) : false;
                    }
                }
            },
            drawCallback: function (settings) {

                // hide pager and info if the table has NO results
                const api = new $.fn.dataTable.Api(settings);
                const pageCount = api.page.info().pages;

                const wrapper = $('#' + settings.sTableId).closest('.dataTables_wrapper');
                const pagination = wrapper.find('.dataTables_paginate');
                const info = wrapper.find('.dataTables_info');

                pagination.toggle(pageCount > 0);
                info.toggle(pageCount > 0);
            }
        });
    }

    // Delete Record
    $(document).on('click', '.delete-record', function () {
        var doctor_id = $(this).data('id'),
            dtrModal = $('.dtr-bs-modal.show');

        // hide responsive modal in small screen
        if (dtrModal.length) {
            dtrModal.modal('hide');
        }

        // sweetalert for confirmation of delete
        Swal.fire({
            title: confirm,
            // title: 'Are you sure?',
            // text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: deleteItem,
            customClass: {
                confirmButton: 'btn btn-primary me-3',
                cancelButton: 'btn btn-label-secondary'
            },
            buttonsStyling: false,
            cancelButtonText: cancel,
        }).then(function (result) {
            if (result.value) {
                // delete the data
                $.ajax({
                    type: 'DELETE',
                    url: `${baseUrl}/admin/doctors/${doctor_id}`,
                    success: function () {
                        dt_doctor.draw();
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });

                // success sweetalert
                Swal.fire({
                    icon: 'success',
                    text: delete_done,
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: cancel,
                    text: 'The doctor is not deleted!',
                    icon: 'error',
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            }
        });
    });

    // edit record
    // var doctor= $key1;
    // if($doctor)
    // {
        // console.log(doctor)
    // }

    // changing the title
    $('.add-new').on('click', function () {
        $('#doctor_id').val(''); //reseting input field
        $('#offcanvasAddDoctorLabel').html(addNewTranslation);
    });
    $('#add-new-doctor').on('click', function () {
        // $('#doctor_id').val(''); //reseting input field
        // $('#offcanvasAddDoctorLabel').html(addNewTranslation);
        console.log('aaa')
        // document.location.href ='http://localhost:8000//modal-example'
//         window.locale = '{{ app()->getLocale() }}';

//         const locale = window.locale;

// // Now you can use the 'locale' variable in your JavaScript code
const route = `/en/admin/modal-example`;
        document.location.href =route;

    });
  // Using event delegation to handle click event for dynamically generated elements
$(document).on('click', '#editButton', function () {
    var doctorId = $(this).data('id');

  const route='/en/admin/modal-example?id='+doctorId;
  document.location.href=route;
  console.log(doctorId);
});
          

    // Filter form control to default size
    // ? setTimeout used for multilingual table initialization
    setTimeout(() => {
        $('.dataTables_filter .form-control').removeClass('form-control-sm');
        $('.dataTables_length .form-select').removeClass('form-select-sm');
    }, 300);

    // validating form and updating categories data
    const assignArticleForm = document.getElementById('assignArticleForm');

    // category form validation
    const fv = FormValidation.formValidation(assignArticleForm, {
        fields: {
            category_id: {
                validators: {
                    notEmpty: {
                        message: validationMessages.data('category-id-required')
                    }
                }
            },
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap5: new FormValidation.plugins.Bootstrap5({
                // Use this for enabling/changing valid/invalid class
                eleValidClass: '',
                rowSelector: function (field, ele) {
                    // field is the field name & ele is the field element
                    return '.mb-3';
                }
            }),
            submitButton: new FormValidation.plugins.SubmitButton(),
            // Submit the form when all fields are valid
            // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
            autoFocus: new FormValidation.plugins.AutoFocus()
        }
    }).on('core.form.valid', function () {
        var formData = new FormData(assignArticleForm);
        // adding or updating category when form successfully validate
        $.ajax({
            // data: $('#addNewCategoryForm').serialize(),
            url: `${baseUrl}/${lang}/admin/doctors/assignArticle`,
            type: 'POST',
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (status) {
              // Replace with the actual base URL
          
              dt_doctor.draw();
               
                // Clear form inputs
                $('#assignArticleForm').trigger('reset');

                // sweetalert
                Swal.fire({
                    icon: 'success',
                    title: `${status}!`,
                   // text: `Doctor ${status} Successfully.`,
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            },
            error: function (xhr) {

                if (xhr.status === 422) {
                    // Validation error
                    const errors = xhr.responseJSON.errors;

                    // Display error messages for each field
                    for (const fieldName in errors) {
                        if (errors.hasOwnProperty(fieldName)) {
                            const fieldError = errors[fieldName][0];
                            // You can display the error message next to the field or handle it as needed
                            // For example, you can use jQuery to select the field and display the message
                            $(`[name="${fieldName}"]`).addClass('is-invalid');
                            $(`[name="${fieldName}"]`).siblings('.invalid-feedback').html(fieldError);
                        }
                    }

                } else {
                    // Handle other errors (not validation-related)
                    offCanvasForm.offcanvas('hide');
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while processing your request.',
                        icon: 'error',
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    });
                }
            }
        });
    });

    // clearing form data when offcanvas hidden
    offCanvasForm.on('hidden.bs.offcanvas', function () {
        fv.resetForm(true);
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').html('');
    });

    const phoneMaskList = document.querySelectorAll('.phone-mask');

    // Phone Number
    if (phoneMaskList) {
        phoneMaskList.forEach(function (phoneMask) {
            new Cleave(phoneMask, {
                phone: true,
                phoneRegionCode: 'US'
            });
        });
    }
});
