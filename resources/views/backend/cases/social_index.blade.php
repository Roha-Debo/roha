@extends('layouts.admin')
@section('title', __('cp.social_links'))
@section('admin')

    <div class="container-xxl flex-grow-1 container-p-y">
       <div class="row">
           <div class="row g-4 mb-4">

           </div>
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">{{ __('cp.form') }} /</span> {{ __('cp.social_links') }}</h4>
                <form class="add-new-question pt-0" id="editSocialForm" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <div class="card mb-4">
                      {{-- <i class="menu-icon tf-icons ti ti-brand-instagram"></i> --}}
                      <h5 class="card-header ti ti-brand-facebook"></h5>
                      <div class="card-body">
                        <div class="form-floating">
                          <input
                            value="{{ $settings->facebook_link ?? " " }}"
                            type="url"
                            placeholder="https://facebook.com/abc"
                            class="form-control"
                            id="facebook_link"
                            name="facebook_link"
                            aria-describedby="defaultFormControlHelp" />
                          <div id="defaultFormControlHelp" class="form-text">
                            {{ __('cp.facebook_link') }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card mb-4">
                      <h5 class="card-header ti ti-brand-instagram"></h5>
                      <div class="card-body">
                        <div class="form-floating">
                          <input
                          value="{{ $settings->instagram_link ?? " "}}"
                            type="url"
                            placeholder="https://instagram.com/abc"
                            class="form-control"
                            id="instagram_link"
                            name="instagram_link"
                            aria-describedby="floatingInputHelp" />
                          <div id="floatingInputHelp" class="form-text">
                            {{ __('cp.instagram_link') }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-6">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="card mb-4">
                      <h5 class="card-header ti ti-brand-twitter"></h5>
                      <div class="card-body">
                        <div class="form-floating">
                          <input
                            value="{{ $settings->twitter_link ?? " " }}"
                            type="url"
                            placeholder="https://twitter.com/abc"
                            class="form-control"
                            id="twitter_link"
                            name="twitter_link"
                            aria-describedby="defaultFormControlHelp" />
                          <div id="defaultFormControlHelp" class="form-text">
                            {{ __('cp.twitter_link') }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card mb-4">
                      <h5 class="card-header ti ti-brand-youtube"></h5>
                      <div class="card-body">
                        <div class="form-floating">
                          <input
                          value="{{ $settings->youtube_link ?? " "}}"
                            type="url"
                            class="form-control"
                            id="youtube_link"
                            name="youtube_link"
                            aria-describedby="floatingInputHelp" />
                          <div id="floatingInputHelp" class="form-text">
                            {{ __('cp.youtube_link') }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-6">
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-success btn-done" type="button" onclick="formSubmit()">
                            <span>{{__('cp.submit')}}</span>
                        </button>
                    </div>
                </div>
                </form>
              </div>
              <!--/ Content -->

    <div id="validation-messages" style="display: none;"
         data-add-new="{{ trans('cp.add_cases') }}"
         data-edit="{{ trans('cp.edit') }}"
         data-name-en-required="{{ trans('cp.name_en_required') }}"
         data-name-ar-required="{{ trans('cp.name_ar_required') }}"
         data-country-id-required="{{ trans('cp.country_id_required') }}"
         data-category-id-required="{{ trans('cp.category_id_required') }}"
         data-child-category-id-required="{{ trans('cp.child_category_id_required') }}"
         data-export="{{ trans('cp.export') }}"
         data-select="{{ trans('cp.select') }}"
         data-confirm="{{ trans('cp.confirm') }}"
         data-delete="{{ trans('cp.delete') }}"
         data-cancel="{{ trans('cp.cancel') }}"
         data-search="{{ trans('cp.search') }}"
         data-next="{{ trans('cp.next') }}"
         data-previous="{{ trans('cp.previous') }}"
         data-showing="{{ trans('cp.showing') }}"
         data-to="{{ trans('cp.to') }}"
         data-of="{{ trans('cp.of') }}"
         data-entries="{{ trans('cp.entries') }}"
         data-actions="{{ trans('cp.action') }}"
         data-lang="{{ app()->getLocale() }}"
         data-oky="{{ trans('cp.oky') }}"
         data-delete_done="{{ trans('cp.delete_done') }}">
    </div>
@endsection

@push('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        var csrf = "{{csrf_token()}}";
        var baseUrl = '{{URL::to('')}}';
    </script>

    <script>
        const validationMessages = $('#validation-messages');
        const lang = validationMessages.data('lang');
        function formSubmit()
        {
                console.log('formData');
                var formData = new FormData(document.getElementById("editSocialForm"));
                $.ajax({
            // data: $('#addNewCategoryForm').serialize(),
            url: `${baseUrl}/${lang}/admin/social/store`,
            type: 'POST',
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
                // Clear form inputs

                // sweetalert
                Swal.fire({
                    icon: 'success',
                    title: `${response.message}!`,
                //    text: `Treatment ${status} Successfully.`,
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
        }
        function previewFile(inputId, previewId) {
            var input = document.getElementById(inputId);
            var preview = document.getElementById(previewId);

            if (input.files && input.files[0]) {
                var file = input.files[0];
                var reader = new FileReader();

                reader.onload = function (e) {
                    if (file.type.includes('image')) {
                        // Image file
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    } else if (file.type.includes('pdf')) {
                        // PDF file
                        preview.href = e.target.result;
                        preview.innerText = 'Preview PDF';
                        preview.style.display = 'block';
                    }
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                if (input.accept.includes('image')) {
                    preview.src = "#";
                    preview.style.display = 'none';
                } else if (input.accept.includes('pdf')) {
                    preview.href = "#";
                    preview.style.display = 'none';
                }
            }
        }
        $(document).ready(function () {

            $('#category_id').on('change', function () {
                var getCategoryId = $(this).val();
                if (getCategoryId) {
                    $.ajax({
                        url: '/admin/get-sub-category-by-category/' + getCategoryId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            if (data) {

                                $('#child_category_id').empty();
                                $('#child_category_id').focus;

                                $('#child_category_id').append('<option value="">Select</option>');
                                $.each(data, function (key, value) {
                                    $('#child_category_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                                });
                            } else {
                                $('#child_category_id').empty();
                            }
                        }
                    });
                } else {
                    $('#child_category_id').empty();
                }
            });

            $(document).on('click', '.edit-record', function () {
                var case_id = $(this).data('id'),
                    dtrModal = $('.dtr-bs-modal.show');

                // hide responsive modal in small screen
                if (dtrModal.length) {
                    dtrModal.modal('hide');
                }
                var edit = "{{__('edit')}}"
                var select = "{{__('select')}}"
                // changing the title of offcanvas
                $('#offcanvasAddCasesLabel').html(edit);

                // get data
                $.get(`${baseUrl}/admin/settings\/${case_id}\/edit`, function (data) {
                    $('#case_id').val(data.id);
                    $('#add-case-name-ar').val(data.name.ar);
                    $('#add-case-name-en').val(data.name.en);
                    $('#category_id').val(data.category_id);
                    $('#child_category_id').val(data.child_category_id);


                        var getCategoryId = data.category_id;
                        if (getCategoryId) {
                            $.ajax({
                                url: '/admin/get-sub-category-by-category/' + getCategoryId,
                                type: "GET",
                                dataType: "json",
                                success: function (subCategoryData) {
                                    if (subCategoryData) {
                                        var childCategoryDropdown = $('#child_category_id');
                                        childCategoryDropdown.empty();
                                        childCategoryDropdown.focus();

                                        childCategoryDropdown.append('<option value="">+select+</option>');
                                        $.each(subCategoryData, function (key, value) {
                                            childCategoryDropdown.append('<option value="' + value.id + '">' + value.name + '</option>');
                                        });

                                        // Set the selected value in child_category_id dropdown
                                        childCategoryDropdown.val(data.child_category_id);
                                    } else {
                                        $('#child_category_id').empty();
                                    }
                                }
                            });
                        } else {
                            $('#child_category_id').empty();
                        }
                });
            });

        });




    </script>
@endpush
