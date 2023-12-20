@extends('layouts.admin')
@section('title', __('cp.settings'))
@section('admin')

    <div class="container-xxl flex-grow-1 container-p-y">
       <div class="row">
           <div class="row g-4 mb-4">

           </div>
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">{{ __('cp.form') }} /</span> {{ __('cp.settings') }}</h4>
                <form class="add-new-question pt-0" id="editSettingsForm" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <div class="card mb-4">
                      <h5 class="card-header">{{ __('cp.section1_title') }}</h5>
                      <div class="card-body">
                        <div class="form-floating">
                          <input
                          @if($settings)
                            value="{{ $settings->getTranslation('section1_title','en') ?? " " }}"
                          @endif
                            type="text"
                            class="form-control"
                            id="section1_title_en"
                            name="section1_title_en"
                            aria-describedby="defaultFormControlHelp" />
                          <div id="defaultFormControlHelp" class="form-text">
                            {{ __('cp.section1_title_description_en') }}
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="form-floating">
                          <input
                          @if($settings)
                            value="{{ $settings->getTranslation('section1_title','ar') ?? " "}}"
                          @endif
                            type="text"
                            class="form-control"
                            id="section1_title_ar"
                            name="section1_title_ar"
                            aria-describedby="defaultFormControlHelp" />
                          <div id="defaultFormControlHelp" class="form-text">
                            {{ __('cp.section1_title_description_ar') }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card mb-4">
                      <h5 class="card-header">{{ __('cp.section1_description') }}</h5>
                      <div class="card-body">
                        <div class="form-floating">
                          <input
                          @if($settings)
                          value="{{ $settings->getTranslation('section1_description','en') ?? " "}}"
                          @endif
                            type="text"
                            class="form-control"
                            id="section1_description_en"
                            name="section1_description_en"
                            aria-describedby="floatingInputHelp" />
                          <div id="floatingInputHelp" class="form-text">
                            {{ __('cp.section1_description_description_en') }}
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="form-floating">
                          <input
                          @if($settings)
                          value="{{ $settings->getTranslation('section1_description','ar') ?? " "}}"
                          @endif
                            type="text"
                            class="form-control"
                            id="section1_description_ar"
                            name="section1_description_ar"
                            aria-describedby="floatingInputHelp" />
                          <div id="floatingInputHelp" class="form-text">
                            {{ __('cp.section1_description_description_ar') }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-6">
                  </div>
                </div>
                <div class="row">
                  {{-- <div class="col-md-6">
                    <div class="card mb-4">
                      <h5 class="card-header">{{ __('cp.footer_text') }}</h5>
                      <div class="card-body">
                        <div  class="form-floating">
                          <textarea
                          @if($settings)
                          value="{{ $settings->getTranslation('footer_text','en') ?? " "}}"
                          @endif
                            class="form-control"
                            id="footer_text_en"
                            name="footer_text_en"
                            aria-describedby="defaultFormControlHelp" >{{ $settings->getTranslation('footer_text','en') ?? " "}}</textarea>
                          <div id="defaultFormControlHelp" class="form-text">
                            {{ __('cp.footer_text_description_en') }}
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <div  class="form-floating">
                          <textarea
                          @if($settings)
                          value="{{ $settings->getTranslation('footer_text','ar') ?? " "}}"
                          @endif
                            class="form-control"
                            id="footer_text_ar"
                            name="footer_text_ar"
                            aria-describedby="defaultFormControlHelp" > {{$settings->getTranslation('footer_text','ar') ?? " "}}</textarea>
                          <div id="defaultFormControlHelp" class="form-text">
                            {{ __('cp.footer_text_description_ar') }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> --}}
                  <div class="col-md-6">
                  <!-- File input -->
                  <div class="card">
                    <h5 class="card-header">{{ __('cp.file_input') }}</h5>
                    <div class="card-body">
                      @php
                      if($settings)
                      {
                      $section1Image = $settings->media->where('collection_name', 'section1_image')->first();
                      $section3File1 = $settings->media->where('collection_name', 'section3_file1')->first();
                      $section3File2 = $settings->media->where('collection_name', 'section3_file2')->first();
                      }
                      @endphp
                      <div class="mb-3">
                        <label for="section1_image" class="form-label">{{ __('cp.section1_image') }}</label>
                        <input class="form-control" type="file" id="section1_image" name="section1_image" onchange="previewFile('section1_image', 'filePreview1')"/>
                        <img id="filePreview1"  @if($settings)
                        src="{{ optional($section1Image)->original_url }}" @endif alt="Image Preview" height="200px" style="max-width: 100%; ">
                    </div>
                      <div class="mb-3">
                        <label for="section3_file1" class="form-label">{{ __('cp.section3_file1') }}</label>
                        <input class="form-control" type="file" id="section3_file1" name="section3_file1" onchange="previewFile('section3_file1', 'filePreview2')"/>
                        <a id="filePreview2" @if($settings)
                        href="{{ optional($section3File1)->original_url }}" @endif target="_blank" style="">Preview PDF</a>
                      </div>
                      <div>
                        <label for="section3_file2" class="form-label">{{ __('cp.section3_file2') }}</label>
                        <input class="form-control" type="file" id="section3_file2" name="section3_file2" onchange="previewFile('section3_file2', 'filePreview3')"/>
                        <a id="filePreview3"   @if($settings)
                        href="{{ optional($section3File2)->original_url }}" @endif target="_blank" style="">Preview PDF</a>
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
                var formData = new FormData(document.getElementById("editSettingsForm"));
                $.ajax({
            // data: $('#addNewCategoryForm').serialize(),
            url: `${baseUrl}/${lang}/admin/settings`,
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
