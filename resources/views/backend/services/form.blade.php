@extends('layouts.admin')
@section('title', __('cp.services'))
@section('admin')

    <div class="container-xxl flex-grow-1 container-p-y">
       <div class="row">
           <div class="row g-4 mb-4">
           </div>
            <!-- Content -->
            {{-- @dump($services->getMedia('service_image')) --}}
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">{{ __('cp.form') }} /</span> {{ __('cp.Services') }}</h4>
                <form class="add-new-question pt-0" id="editServicesForm" enctype="multipart/form-data">
              <input type="hidden" name="service_id" @if($services) value="{{optional($services)->id}}" @endif>
                  <div class="row">
                  <div class="col-md-6">
                    <div class="card mb-4">
                      <h5 class="card-header">{{ __('cp.title') }}</h5>
                      <div class="card-body">
                        <div class="form-floating">
                          {{-- @if($services) --}}
                          
                      <input value="{{ optional($services)->getTranslation('title', 'en') ?? ' ' }}" type="text"   id="title_en"
                      name="title_en"class="form-control">
                            {{-- @else 
                            <input
                           
                            type="text"
                            class="form-control"
                            id="title_en"
                            name="title_en"
                            aria-describedby="defaultFormControlHelp" /> --}}
                             {{-- @endif --}}
                          {{-- <input
                            value="{{ $services->getTranslation('section1_title','en') ?? " " }}"
                            type="text"
                            class="form-control"
                            id="section1_title_en"
                            name="section1_title_en"
                            aria-describedby="defaultFormControlHelp" /> --}}
                          <div id="defaultFormControlHelp" class="form-text">
                            {{ __('cp.title_en') }}
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="form-floating">
                          @if($services)

                          <input
                            value="{{ optional($services)->getTranslation('title','ar') ?? " "}}"
                            type="text"
                            class="form-control"
                            id="title_ar"
                            name="title_ar"
                            aria-describedby="defaultFormControlHelp" />
                            @else
                            <input
                           
                            type="text"
                            class="form-control"
                            id="title_ar"
                            name="title_ar"
                            aria-describedby="defaultFormControlHelp" />
                            @endif
                          <div id="defaultFormControlHelp" class="form-text">
                            {{ __('cp.title_ar') }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card mb-4">
                      <h5 class="card-header">{{ __('cp.description') }}</h5>
                      <div class="card-body">
                        <div class="form-floating">
                          @if($services)
                          <textarea
                          value="{{ $services->getTranslation('description','en') ?? " "}}"
                            class="form-control"
                            id="description_en"
                            name="description_en"
                            aria-describedby="defaultFormControlHelp" >{{ optional($services)->getTranslation('description','en') ?? " "}}</textarea>
                        
                            @else
                            <textarea
                          value=""
                            class="form-control"
                            id="description_en"
                            name="description_en"
                            aria-describedby="defaultFormControlHelp" ></textarea>
                            @endif
                          <div id="floatingInputHelp" class="form-text">
                            {{ __('cp.description_en') }}
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="form-floating">
                          @if($services)
                          <textarea
                          value="{{ optional($services)->getTranslation('description','ar') ?? " "}}"
                            class="form-control"
                            id="description_ar"
                            name="description_ar"
                            aria-describedby="defaultFormControlHelp" >{{ optional($services)->getTranslation('description','ar') ?? " "}}</textarea>
                      
                            @else
                            <textarea
                          
                            type="text"
                            class="form-control"
                            id="description_ar"
                            name="description_ar"
                            aria-describedby="defaultFormControlHelp" ></textarea>
                            @endif
                          <div id="floatingInputHelp" class="form-text">
                            {{ __('cp.description_ar') }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-6">
                  </div>
                </div>
                <div class="row">
             
                  <!-- File input -->
                  <div class="card">
                    <h5 class="card-header">{{ __('cp.file_input') }}</h5>
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="service_image" class="form-label">{{ __('cp.service_image') }}</label>
                        {{-- <input class="form-control" type="file" id="service_image" name="service_image"/> --}}
                        @php
                        if($services)
                        {
                        $serviceImage = $services->media->where('collection_name', 'service_image')->first();
                        }
                        @endphp
                        {{-- @if (optional($services)->getMedia('service_image')->isNotEmpty()) --}}
                            <!-- Display existing image information -->
                            {{-- @foreach (optional($services)->getMedia('service_image') as $media) --}}
                        <input class="form-control" type="file" id="service_image" name="service_image" onchange="previewFile('service_image', 'filePreview1')"/>
                        <img id="filePreview1"  @if($services)
                            src="{{ optional($serviceImage)->original_url }}" @endif alt="Image Preview" height="200px" style="max-width: 100%; ">
                        {{-- <p>{{__('cp.existing_file')}}: <a href="{{ $media->original_url }}" target="_blank">{{ $media->file_name }}</a></p> --}}
                                
                                <!-- Set the correct src attribute for the existing image -->
                                {{-- <img src="{{ $media->getUrl() }}" alt="Existing Image" style="max-width: 100%;"> --}}
                            {{-- @endforeach
                        @else
                            <p>No existing image found.</p>
                        @endif --}}
                    </div>
                    
                    
                      {{-- <div class="mb-3">
                        <label for="section3_file1" class="form-label">{{ __('cp.section3_file1') }}</label>
                        <input class="form-control" type="file" id="section3_file1" name="section3_file1"/>
                        <a id="filePreview2" href="#" target="_blank" style="display: none;">Preview PDF</a>
                      </div> --}}
                      {{-- <div>
                        <label for="section3_file2" class="form-label">{{ __('cp.section3_file2') }}</label>
                        <input class="form-control" type="file" id="section3_file2" name="section3_file2"/>
                        <a id="filePreview3" href="#" target="_blank" style="display: none;">Preview PDF</a>
                      </div> --}}
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
              function previewFile(inputId, previewId) {
          console.log('aa');
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
        const validationMessages = $('#validation-messages');
        const lang = validationMessages.data('lang');
        function formSubmit()
            {
                console.log('formData');
                var formData = new FormData(document.getElementById("editServicesForm"));
                $.ajax({
            // data: $('#addNewCategoryForm').serialize(),
            url: `${baseUrl}/${lang}/admin/services`,
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
                $.get(`${baseUrl}/admin/services\/${case_id}\/edit`, function (data) {
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
