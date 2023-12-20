


@extends('layouts.admin')


@section('title', __('cp.articles'))

@section('admin')
 
@section('meta_tags','tags and what yoy want')


<style>
      textarea {
            width: 100%;
            height: 200px; /* Larger default height */
            resize: vertical; /* Allows vertical resizing */
        }
</style>


<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">write Article/</span> Numbered</h4>

            <!-- Validation Wizard -->
            <div class="col-12 mb-4">
                <small class="text-light fw-medium">Validation</small>
                <div id="wizard-validation" class="bs-stepper mt-2">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#account-details-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label mt-1">
                                    <span class="bs-stepper-title">Post Details</span>
                                    <span class="bs-stepper-subtitle">Setup Article Details</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i class="ti ti-chevron-right"></i>
                        </div>
                        <div class="step" data-target="#personal-info-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Personal Info</span>
                                    <span class="bs-stepper-subtitle">Add personal info</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i class="ti ti-chevron-right"></i>
                        </div>
                        <div class="step" data-target="#social-links-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle">3</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Social Links</span>
                                    <span class="bs-stepper-subtitle">Add social links</span>
                                </span>
                            </button>
                        </div>
                    </div>
{{-- 
                    <div id="map" style="height: 50vh;"></div>
                    <div class="col-md-6"></div> --}}
{{-- {{$article}} --}}
                    <div class="bs-stepper-content  multi-step-form">
                        <form  id="addNewDoctorForm"  enctype="multipart/form-data">
                            @csrf
                           
                            <input type="hidden" name="id" value="{{optional($article)->id}}">
                           
                  
                            <fieldset aria-label="Step One" id="step-1">
                                <div class="title-step">
                                    <h3>Details Article</h3>
                                </div>

                                <div class="form-h row">
                                    <!-- Col -->
                                 
                                    <!-- /Col -->

                                    <!-- Col -->
                               
                                    @if(optional($article))
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Article name :</label>
                                            <input type="text" class="form-control"
                                                placeholder="article name"
                                                name="article_name"  required value="{{optional($article)->article_name}}" />
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Article name :</label>
                                            <input type="text" class="form-control"
                                                placeholder="article name"
                                                name="article_name"  required  />
                                        </div>
                                    </div>
                                    @endif
                                    <!-- /Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">writer name :</label>
                                            <input type="text" class="form-control"
                                                placeholder="writer name"
                                                name="Nameofthewriter"  required  value="{{optional($article)->Nameofthewriter}}" />
                                        </div>
                                    </div>
                                    <!-- Col -->
                                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">reviewer name :</label>
                                            <input type="text" class="form-control"
                                                placeholder="reviewer name"
                                                name="reviewerofthearticle"  required  value="{{optional($article)->reviewerofthearticle}}" />
                                        </div>
                                    </div>
                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="published_at">Publication Date and Time:</label>
                                            <input type="datetime-local" name="published_at" id="published_at" class="form-control"
                                                   value="{{ optional($article)->published_at ? $article->published_at->format('Y-m-d\TH:i') : '' }}">
                                        </div>
                                    </div>
                                    <!--col-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Meta Tags :</label>
                                            <input type="text" class="form-control" id="test1"
                                                placeholder="meta tags" value="{{optional($article)->meta_tags}}"
                                                 name="meta_tags" required />
                                                 

                                                 
                                                 {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                                 <meta name="keywords" content="web,design,html,css,html5,development"> --}}
                                        </div>
                                    </div>
                                    <!--how can i use meta in posts page -->
                                    {{-- @section('meta_description')
                                    {{$page->meta_description}}
                                    @endsection --}}
                                    {{-- @section('meta_kewords')
                                    {{$page->meta_keywords}}
                                       @endsection --}}
                                       <!--/end-->
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="multilineInput">Meta Description:</label>
                                            <textarea id="multilineInput" name="meta_description" class="form-control" placeholder="Enter your meta description here..." style="height: 75%">
                                                {{ optional($article)->meta_description }}
                                            </textarea>
                                        </div>
                                    </div>
                                    
                                    <!-- /Col -->

                                    <!-- Col -->
                                    {{-- <script>
                                        tinymce.init({
                                          selector: 'textarea',
                                          plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
                                          toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                                          tinycomments_mode: 'embedded',
                                          tinycomments_author: 'Author name',
                                          mergetags_list: [
                                            { value: 'First.Name', title: 'First Name' },
                                            { value: 'Email', title: 'Email' },
                                          ],
                                          ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
                                        });
                                      </script> --}}
                                      <input type="hidden" name="description" id="editorContent" />
                                      <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="multilineInput">Description:</label>
                                      <div id="editor" class="form-control custom-editor"  ></div>
                                    </div>
                                </div>
                                
                                   
                                    
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="multilineInput">Description:</label>
                                        <textarea id="yourTextEditor" name="description" class="form-control" placeholder="Enter your description here..."></textarea>
                                        </div>
                                    </div> --}}
                                    <!-- /Col -->

                                  

                                    <!-- Col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-default btn-next" type="button"
                                                aria-controls="step-2">
                                                <span>المرحلة التاليه</span>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /Col -->
                                </div>
                            </fieldset>

                            <fieldset aria-label="Step Two" id="step-2">
                                <div class="title-step">
                                    <h3>details Article </h3>
                                </div>

                                <div class="form-h row">
                                    <!-- Col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' id="imageUpload"
                                                        accept=".png, .jpg, .jpeg" name="image" />
                                                    <label for="imageUpload"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview" style="background-image: url('{{ optional($article)->image->original_url ?? asset('assets/img/avatar.jpg') }}')">
                                                    </div>
                                                </div>
                                                
                                                
                                                 
                                                    
                                                    {{-- @if($item->hasMedia())
                                        <img src="{{ $item->getFirstMediaUrl() }}" alt="Image">
                                                      @else
                                                       <p>No image available</p >
                                                           @endif --}}
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col --> 
                                    @if(optional($article))
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span>select Category:</span>
                                        
                                           
                                            <select class="form-control" name="category_id" id="category_id" required>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" 
                                                        @if(($article->category_parent->id ?? null) == $category->id) selected @endif>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span>select SubCategory:</span>
                                            <select class="form-control" name="child_category_id" id="child_category_id" required>
                                                @foreach($child_categories as $category)
                                                    <option value="{{ $category->id }}" 
                                                        @if(($article->category_child->id ?? null) == $category->id) selected @endif>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            
                                            
                                            
                                            
                                        </div>
                                    </div>
                                    @else
                                    <!-- /Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span>select Category:</span>
                                            {{-- uu{{$article}} --}}
                                            {{-- <select class="form-control" name="category" id="category_id" required>
                                               
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}" 
                                                    @if(optional($article)->category_parent && $article->category_parent->contains('id', $category->id)) selected @endif>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                                  
                                              
                                            </select> --}} 
                                           
                                            <select class="form-control" name="category" id="category_id" required>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" 
                                                      >
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span>select SubCategory:</span>
                                            <select class="form-control" name="category" id="category_id" required>
                                                @foreach($child_categories as $category)
                                                    <option value="{{ $category->id }}" 
                                                       >
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            
                                            
                                            
                                            
                                        </div>
                                    </div>
                                    @endif
                                
                                        
                                   
                                    <div class="row">
                            
                                    
                                    <!-- Col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-success btn-done" type="button"  onclick="formSubmit()">
                                                <span>إرسال</span>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /Col -->
                                </div>
                            </fieldset>
                           
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Validation Wizard -->
        </div>

    </div>
        </div>
    </div>
    
<!-- Page JS -->


<script src="{{asset('js/jquery-1.11.0.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/js/wizard.js')}}"></script> 
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
</body>
@endsection

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

  
     @push('js')
    {{-- <script src={{asset('{{asset('backend/datatables/js/doctor-management.js')}}"></script> --}} 
    
    <script>
  
 
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imageUpload").change(function () {
        readURL(this);
    });

    //     document.getElementById('addNewDoctorForm').addEventListener('submit', function (event) {
    //     event.preventDefault();
    //     console.log('success');
    //     // Create a FormData object to send the form data
    //     const formData = new FormData(this);
    //     console.log('lkj',formData);
    //     // Submit the form using fetch
    //     fetch(this.action, {
    //         method: 'POST',
    //         body: formData,
            
    //     })
        
    //     .then(response => response.json())
       
    //     .then(data => {
    //     //     console.log('success');
    //         // Handle the JSON response
    //         console.log('uh',data);

    //         // You can perform actions based on the response here
    //         if (data.message === 'success') {
    //             // Do something on success, for example, show a success message
    //             window.location.href = "{{ route('admin.article.index') }}";
    //         } else {
    //             // Handle other cases if needed
    //             alert('Form submission failed');
    //         }
    //     })
    //     .catch(error => {
    //         // Handle errors if any
    //         console.error('Error:', error);
    //     });
    //  });
    function formSubmit()
{
    console.log('formData');
var formData = new FormData(document.getElementById("addNewDoctorForm"));
        var action='{{ route('admin.createArticle') }}';

       fetch(action, {
            method: 'POST',
            body: formData,
        }).then(response => response.json()).then(data => {
                if (data.message === 'success') {
                window.location.href = "{{ route('admin.article.index') }}";
                }
                else {
                alert('Form submission failed');
            }
        })

}

     var input = document.querySelector('input[name=meta_tags]');

// initialize Tagify on the above input node reference
new Tagify(input)

    //  var input = document.querySelector('input'),
    // tagify = new Tagify(input, {
    //   id: 'test1',  // must be unique (per-tagify instance)
    //   enforceWhitelist: true,
    // }),
 

// let map;

// function initMap() {
//   map = new google.maps.Map(document.getElementById("map"), {
//     center: { lat: -34.397, lng: 150.644 },
//     zoom: 8,
//   });
// }

// window.initMap = initMap;

// 
</script>
<script>
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

        // $(document).on('click', '.edit-record', function () {
        //     var doctor_id = $(this).data('id'),
        //         dtrModal = $('.dtr-bs-modal.show');

        //     // hide responsive modal in small screen
        //     if (dtrModal.length) {
        //         dtrModal.modal('hide');
        //     }
        //     var edit = "{{__('edit')}}"
        //     var select = "{{__('select')}}"
        //     // changing the title of offcanvas
        //     $('#offcanvasAddDoctorLabel').html(edit);

        //     // get 
            
        //     $.get(`${baseUrl}/admin/doctors\/${doctor_id}\/edit`, function (data) {
        //         $('#doctor_id').val(data.id);
        //         $('#add-doctor-name-ar').val(data.name.ar);
        //         $('#add-doctor-name-en').val(data.name.en);
        //         $('#category_id').val(data.category_id);
        //         $('#child_category_id').val(data.child_category_id);


        //             var getCategoryId = data.category_id;
        //             if (getCategoryId) {
        //                 $.ajax({
        //                     url: '/admin/get-sub-category-by-category/' + getCategoryId,
        //                     type: "GET",
        //                     dataType: "json",
        //                     success: function (subCategoryData) {
        //                         if (subCategoryData) {
        //                             var childCategoryDropdown = $('#child_category_id');
        //                             childCategoryDropdown.empty();
        //                             childCategoryDropdown.focus();

        //                             childCategoryDropdown.append('<option value="">+select+</option>');
        //                             $.each(subCategoryData, function (key, value) {
        //                                 childCategoryDropdown.append('<option value="' + value.id + '">' + value.name + '</option>');
        //                             });

        //                             // Set the selected value in child_category_id dropdown
        //                             childCategoryDropdown.val(data.child_category_id);
        //                         } else {
        //                             $('#child_category_id').empty();
        //                         }
        //                     }
        //                 });
        //             } else {
        //                 $('#child_category_id').empty();
        //             }
        //     });
        // });

    });




</script>
{{-- <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script> --}}
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        })
        .then(editor => {
            // Get the editor content and set it in the hidden input field
            editor.model.document.on('change:data', () => {
                document.getElementById('editorContent').value = editor.getData();
            });

            // Set the initial content of the editor if there is existing data
            const initialContent = "{!! str_replace(["\r\n", "\r", "\n"], '<p>', $article->description ?? '') !!}";
            editor.setData(initialContent);
        });
</script>

<script>
    // Initialize flatpickr for the date and time input
    flatpickr('#published_at', {
        enableTime: true,
        dateFormat: "Y-m-d H:i:S",
    });
</script>
{{-- <script>
    tinymce.init({
        selector: 'yourTextEditor', // Replace 'yourTextEditor' with the actual ID or class of your textarea
        plugins: 'autolink lists link image charmap print preview',
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image',
    });
</script> --}}

<!-- Place the first <script> tag in your HTML's <head> -->
   
    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    {{-- <script>
      tinymce.init({
        selector: 'textarea',
        plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
          { value: 'First.Name', title: 'First Name' },
          { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
      });
    </script> --}}
    {{-- <textarea>
      Welcome to TinyMCE!
    </textarea> --}}

{{-- <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmbQF5P5h2VjGRv01mgsfS7RnOAMBhIDs&callback=initMap">
</script> --}}
{{-- <script async
src="https://maps.googleapis.com/maps/api/js?key=75168e1133a999ceb6837e318fd2ad8855ee1ddb&callback=initMap"></script>  --}}
{{-- <script>
    (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",initMap+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
      key: "75168e1133a999ceb6837e318fd2ad8855ee1ddb",
      v: "weekly",
      // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
      // Add other bootstrap parameters as needed, using camel case.
    });
  </script> --}}
    @endpush




<style>
    /*
* demo.css
* File include item demo only specific css only
******************************************************************************/

.light-style .menu .app-brand.demo {
  height: 64px;
}

.dark-style .menu .app-brand.demo {
  height: 64px;
}

.app-brand-logo.demo {
  -ms-flex-align: center;
  align-items: center;
  -ms-flex-pack: center;
  justify-content: center;
  display: -ms-flexbox;
  display: flex;
  width: 34px;
  height: 24px;
}

.app-brand-logo.demo svg {
  width: 35px;
  height: 24px;
}

.app-brand-text.demo {
  font-size: 1.375rem;
}

/* ! For .layout-navbar-fixed added fix padding top tpo .layout-page */
.layout-navbar-fixed .layout-wrapper:not(.layout-without-menu) .layout-page {
  padding-top: 64px !important;
}
.layout-navbar-fixed .layout-wrapper:not(.layout-horizontal):not(.layout-without-menu) .layout-page {
  padding-top: 78px !important;
}
/* Navbar page z-index issue solution */
.content-wrapper .navbar {
  z-index: auto;
}

/*
* Content
******************************************************************************/

.demo-blocks > * {
  display: block !important;
}

.demo-inline-spacing > * {
  margin: 1rem 0.375rem 0 0 !important;
}

/* ? .demo-vertical-spacing class is used to have vertical margins between elements. To remove margin-top from the first-child, use .demo-only-element class with .demo-vertical-spacing class. For example, we have used this class in forms-input-groups.html file. */
.demo-vertical-spacing > * {
  margin-top: 1rem !important;
  margin-bottom: 0 !important;
}
.demo-vertical-spacing.demo-only-element > :first-child {
  margin-top: 0 !important;
}

.demo-vertical-spacing-lg > * {
  margin-top: 1.875rem !important;
  margin-bottom: 0 !important;
}
.demo-vertical-spacing-lg.demo-only-element > :first-child {
  margin-top: 0 !important;
}

.demo-vertical-spacing-xl > * {
  margin-top: 5rem !important;
  margin-bottom: 0 !important;
}
.demo-vertical-spacing-xl.demo-only-element > :first-child {
  margin-top: 0 !important;
}

.rtl-only {
  display: none !important;
  text-align: left !important;
  direction: ltr !important;
}

[dir='rtl'] .rtl-only {
  display: block !important;
}

/* Dropdown buttons going out of small screens */
@media (max-width: 576px) {
  #dropdown-variation-demo .btn-group .text-truncate {
    width: 254px;
    position: relative;
  }
  #dropdown-variation-demo .btn-group .text-truncate::after {
    position: absolute;
    top: 45%;
    right: 0.65rem;
  }
}

/*
* Layout demo
******************************************************************************/

.layout-demo-wrapper {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  margin-top: 1rem;
}
.layout-demo-placeholder img {
  width: 900px;
}
.layout-demo-info {
  text-align: center;
  margin-top: 1rem;
}

div#template-customizer {
  display: none !important;
}



.no-js .multi-step-form fieldset button,
.no-js .multi-step-form h2,
.multi-step-form.edit-form fieldset button,
.multi-step-form.edit-form h2 {
    display: none !important;
}

.no-js .multi-step-form fieldset,
.multi-step-form.edit-form fieldset {
    display: block !important;
}

.no-js .multi-step-form [type=submit],
.no-js .multi-step-form [type=reset],
.multi-step-form.edit-form [type=submit],
.multi-step-form.edit-form [type=reset] {
    display: inline-block !important;
}

.no-js .multi-step-form .steps,
.multi-step-form.edit-form .steps {
    display: none;
}

.multi-step-form fieldset {
    display: none;
}

.multi-step-form fieldset:first-of-type {
    display: block;
}

.multi-step-form fieldset.hidden {
    display: none;
}

.multi-step-form fieldset.visible {
    display: block;
}

.multi-step-form .steps button {
    border: 0;
}

.multi-step-form .steps [disabled] {
    background: none;
}

.multi-step-form .steps .active {
    background: #eee;
}

.steps {
    display: flex;
    justify-content: center;
    position: relative;
    flex: 0 1;
    margin: 0 0 64px;
    z-index: 2;
}

.steps button {
    width: 33.33%;
    flex: 0 0 33.33%;
    padding: 0;
    background: transparent !important;
    position: relative;
}

.steps button .icon {
    width: 68px;
    height: 68px;
    background: #fff;
    border: 2px solid #FE6521;
    display: block;
    margin: 0 auto;
    border-radius: 50%;
    font-size: 34px;
    line-height: 68px;
    color: #000000;
    /* padding: 12px; */
}

.steps button .icon img {
    max-height: 44px;
}

.steps button:nth-child(2) .icon img {
    max-width: 27px;
}

.steps button.active .icon {
    background: var(--main-color);
    color: #fff;
}

.steps button.active .icon img {
    filter: brightness(0) invert(1);
}

.steps button:nth-child(1) .icon {
    line-height: 58px;
}

.steps button h6 {
    margin: 11px 0 0;
    color: #030202;
    font-weight: bold;
    font-size: 20px;
}

.payment-inner .steps::after {
    content: "";
    position: absolute;
    width: 200%;
    right: -50%;
    left: 0;
    border-bottom: 1px dashed #707070;
    top: 36px;
    z-index: -2;
}

.payment-page.multi-step-form.body-inner {
    overflow: hidden;
}

.multi-step-form .steps button:last-child::after {
    display: none;
}

.multi-step-form .steps button::after {
    content: "";
    position: absolute;
    left: -55%;
    width: 100%;
    height: 2px;
    background: var(--main-color);
    top: 35px;
    z-index: -1;
}

.form-group {
  margin: 0 0 1rem;
}

span.error-text {
  display: inline-block;
  color: red;
  font-size: 13px;
  margin: 10px 0 0;
}



.avatar-upload {
  position: relative;
  max-width: 140px;
  margin: 0 auto 13px;
}

.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;
}

.avatar-upload .avatar-edit input {
  display: none;
}

.avatar-upload .avatar-edit input+label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
  line-height: 34px;
  padding: 0;
}

.avatar-upload .avatar-edit input+label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}

.avatar-upload .avatar-edit input+label:after {
  content: "\eb04";
  font-family: 'tabler-icons';
  color: #757575;
  position: absolute;
  /* top: 10px; */
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
  line-height: 34px;
  font-size: 22px;
}

.avatar-upload .avatar-preview {
  width: 140px;
  height: 140px;
  position: relative;
  border-radius: 100%;
  border: 4px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}

.avatar-upload .avatar-preview>div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

.form-group label input {
  width: 20px;
  height: 20px;
  margin-inline-end: 10px;
}

.form-group label {
  display: inline-flex;
  align-items: center;
  -webkit-align-items: center;
}
</style>