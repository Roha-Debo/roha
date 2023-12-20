
@extends('layouts.admin')


@section('title', __('cp.doctors'))

@section('admin')
 
  <body>
   
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->


          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              {{-- <h4 class="py-3 mb-4"><span class="text-muted fw-light">DataTables /</span> Basic</h4> --}}

              <!-- DataTable with Buttons -->
              {{-- <div class="card">
                <div class="card-datatable table-responsive pt-0">
                  <table class="datatables-basic table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Salary</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
              <!-- Modal to add new record -->
              <div class="offcanvas offcanvas-end" id="add-new-record">
                <div class="offcanvas-header border-bottom">
                  <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
                  <button
                    type="button"
                    class="btn-close text-reset"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
                </div>
                <div class="offcanvas-body flex-grow-1">
                  <form class="add-new-record pt-0 row g-2" id="form-add-new-record" onsubmit="return false">
                    <div class="col-sm-12">
                      <label class="form-label" for="basicFullname">Full Name</label>
                      <div class="input-group input-group-merge">
                        <span id="basicFullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                        <input
                          type="text"
                          id="basicFullname"
                          class="form-control dt-full-name"
                          name="basicFullname"
                          placeholder="John Doe"
                          aria-label="John Doe"
                          aria-describedby="basicFullname2" />
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <label class="form-label" for="basicPost">Post</label>
                      <div class="input-group input-group-merge">
                        <span id="basicPost2" class="input-group-text"><i class="ti ti-briefcase"></i></span>
                        <input
                          type="text"
                          id="basicPost"
                          name="basicPost"
                          class="form-control dt-post"
                          placeholder="Web Developer"
                          aria-label="Web Developer"
                          aria-describedby="basicPost2" />
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <label class="form-label" for="basicEmail">Email</label>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ti ti-mail"></i></span>
                        <input
                          type="text"
                          id="basicEmail"
                          name="basicEmail"
                          class="form-control dt-email"
                          placeholder="john.doe@example.com"
                          aria-label="john.doe@example.com" />
                      </div>
                      <div class="form-text">You can use letters, numbers & periods</div>
                    </div>
                    <div class="col-sm-12">
                      <label class="form-label" for="basicDate">Joining Date</label>
                      <div class="input-group input-group-merge">
                        <span id="basicDate2" class="input-group-text"><i class="ti ti-calendar"></i></span>
                        <input
                          type="text"
                          class="form-control dt-date"
                          id="basicDate"
                          name="basicDate"
                          aria-describedby="basicDate2"
                          placeholder="MM/DD/YYYY"
                          aria-label="MM/DD/YYYY" />
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <label class="form-label" for="basicSalary">Salary</label>
                      <div class="input-group input-group-merge">
                        <span id="basicSalary2" class="input-group-text"><i class="ti ti-currency-dollar"></i></span>
                        <input
                          type="number"
                          id="basicSalary"
                          name="basicSalary"
                          class="form-control dt-salary"
                          placeholder="12000"
                          aria-label="12000"
                          aria-describedby="basicSalary2" />
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Submit</button>
                      <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                  </form>
                </div>
              </div> --}}
              <!--/ DataTable with Buttons -->

              {{-- <hr class="my-5" /> --}}

              <!-- Complex Headers -->
              {{-- <div class="card">
                <h5 class="card-header">Complex Headers</h5>
                <div class="card-datatable text-nowrap">
                  <table class="dt-complex-header table table-bordered">
                    <thead>
                      <tr>
                        <th rowspan="2">Name</th>
                        <th colspan="2">Contact</th>
                        <th colspan="3">HR Information</th>
                        <th rowspan="2">Action</th>
                      </tr>
                      <tr>
                        <th>E-mail</th>
                        <th>City</th>
                        <th>Position</th>
                        <th>Salary</th>
                        <th class="border-1">Status</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div> --}}
              <!--/ Complex Headers -->

              {{-- <hr class="my-5" /> --}}
               <!-- Modal to add new record -->
              {{-- <div class="offcanvas offcanvas-end" id="add-new-record">
                <div class="offcanvas-header border-bottom">
                  <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
                  <button
                    type="button"
                    class="btn-close text-reset"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
                </div>
                <div class="offcanvas-body flex-grow-1">
                  <form class="add-new-record pt-0 row g-2" id="form-add-new-record" onsubmit="return false">
                    <div class="col-sm-12">
                      <label class="form-label" for="basicFullname">Full Name</label>
                      <div class="input-group input-group-merge">
                        <span id="basicFullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                        <input
                          type="text"
                          id="basicFullname"
                          class="form-control dt-full-name"
                          name="basicFullname"
                          placeholder="John Doe"
                          aria-label="John Doe"
                          aria-describedby="basicFullname2" />
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <label class="form-label" for="basicPost">Post</label>
                      <div class="input-group input-group-merge">
                        <span id="basicPost2" class="input-group-text"><i class="ti ti-briefcase"></i></span>
                        <input
                          type="text"
                          id="basicPost"
                          name="basicPost"
                          class="form-control dt-post"
                          placeholder="Web Developer"
                          aria-label="Web Developer"
                          aria-describedby="basicPost2" />
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <label class="form-label" for="basicEmail">Email</label>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ti ti-mail"></i></span>
                        <input
                          type="text"
                          id="basicEmail"
                          name="basicEmail"
                          class="form-control dt-email"
                          placeholder="john.doe@example.com"
                          aria-label="john.doe@example.com" />
                      </div>
                      <div class="form-text">You can use letters, numbers & periods</div>
                    </div>
                    <div class="col-sm-12">
                      <label class="form-label" for="basicDate">Joining Date</label>
                      <div class="input-group input-group-merge">
                        <span id="basicDate2" class="input-group-text"><i class="ti ti-calendar"></i></span>
                        <input
                          type="text"
                          class="form-control dt-date"
                          id="basicDate"
                          name="basicDate"
                          aria-describedby="basicDate2"
                          placeholder="MM/DD/YYYY"
                          aria-label="MM/DD/YYYY" />
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <label class="form-label" for="basicSalary">Salary</label>
                      <div class="input-group input-group-merge">
                        <span id="basicSalary2" class="input-group-text"><i class="ti ti-currency-dollar"></i></span>
                        <input
                          type="number"
                          id="basicSalary"
                          name="basicSalary"
                          class="form-control dt-salary"
                          placeholder="12000"
                          aria-label="12000"
                          aria-describedby="basicSalary2" />
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Submit</button>
                      <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>
               --}}

               <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddDoctor" aria-labelledby="offcanvasAddDoctorLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasAddDoctorLabel" class="offcanvas-title">Add Doctor</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                   
                  </div>
                <div class="offcanvas-body mx-0 flex-grow-0">
                    <form class="add-new-doctor pt-0" id="addNewDoctorForm" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="doctor_id">
                        <div class="mb-3">
                            <label class="form-label" for="add-doctor-name">{{__('cp.first_name_ar')}}</label>
                            <input type="text" class="form-control" id="add-doctor-name-ar" placeholder="{{__('cp.first_name_ar')}}" name="name_ar" aria-label="{{__('cp.name_ar')}}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-doctor-name">{{__('cp.first_name_en')}}</label>
                            <input type="text" class="form-control" id="add-doctor-name-en" placeholder="{{__('cp.first_name_en')}}" name="name_en" aria-label="{{__('cp.name_en')}}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="category_id">{{__('cp.maincategory')}}</label>
                            <select id="category_id" name="category_id" class="select2 form-select">
                                <option value="">Select</option>
                                @foreach($parent_categories as $category)
                                
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="child_category_id">{{__('cp.subcategory')}}</label>
                            <select id="child_category_id" name="child_category_id" class="select2_sub form-select">
                                <option value="">{{__('cp.select')}}</option>
{{--                                   @foreach($child_categories as $sub)--}}
{{--                                       <option value="{{$sub->id}}">{{$sub->name}}</option>--}}
{{--                                   @endforeach--}}
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">{{__('cp.save')}}</button>
                        <button type="button" class="btn btn-primary me-sm-3 me-1" id="addDoctorButton">kkk</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">{{__('cp.cancel')}}</button>
                    </form>
                </div>
            </div>

              <!-- Row grouping -->
              <div class="card">
                <h5 class="card-header">{{__('cp.articles')}}</h5>
                <div class="card-datatable table-responsive">
                  <table class="datatables-articles table">
                    <thead>
                      <tr>
                        <th></th>
                        {{-- <th>{{'fake_id'}}</th> --}}
                        <th>{{__('cp.id')}}</th>
                        <th>{{__('cp.article_name')}}</th>
                        <th>{{__('cp.writer_name')}}</th>
                        <th>{{__('cp.reviewer_name')}}</th>
                        <th>{{__('cp.publish_at')}}</th>
                        <th>{{__('cp.meta tags')}}</th>
                        <th>{{__('cp.description')}}</th>
                        <th>{{__('cp.meta_descrption')}}</th>
                        <th>{{__('cp.category')}}</th>
                        <th>{{__('cp.child Categor')}}</th>
                        {{-- <th>{{__('cp.gender')}}</th>
                        <th>{{__('cp.title')}}</th>
                        <th>{{__('cp.region')}}</th>
                        <th>{{__('cp.description')}}</th>
                        <th>{{__('cp.is_trainer')}}</th>
                        <th>{{__('cp.lat')}}</th>
                        <th>{{__('cp.lang')}}</th> --}}
                        <th data-priority="1">{{__('cp.action')}}</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th></th>
                        {{-- <th>{{'fake_id'}}</th> --}}
                        <th>{{__('cp.id')}}</th>
                        <th>{{__('cp.article_name')}}</th>
                        <th>{{__('cp.writer_name')}}</th>
                        <th>{{__('cp.reviewer_name')}}</th>
                        <th>{{__('cp.publish_at')}}</th>
                        <th>{{__('cp.meta tags')}}</th>
                        <th>{{__('cp.description')}}</th>
                        <th>{{__('cp.meta_descrption')}}</th>
                        <th>{{__('cp.category')}}</th>
                        <th>{{__('cp.child Categor')}}</th>
                        {{-- <th>{{__('cp.last_name')}}</th>
                        <th>{{__('cp.email')}}</th>
                        <th>{{__('cp.city')}}</th>
                        <th>{{__('cp.phone')}}</th>
                        <th>{{__('cp.gender')}}</th>
                        <th>{{__('cp.title')}}</th>
                        <th>{{__('cp.region')}}</th>
                        <th>{{__('cp.description')}}</th>
                        <th>{{__('cp.is_trainer')}}</th>
                        <th>{{__('cp.lat')}}</th>
                        <th>{{__('cp.lang')}}</th> --}}
                        <th data-priority="1">{{__('cp.action')}}</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>


                
              </div>
              <!--/ Row grouping -->
              

              <hr class="my-5" />

              <!-- Multilingual -->
              {{-- <div class="card">
                <h5 class="card-header">Multilingual</h5>
                <div class="card-datatable table-responsive">
                  <table class="dt-multilingual table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Salary</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div> --}}
              <!--/ Multilingual -->
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                  {{-- <div>
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by <a href="https://pixinvent.com" target="_blank" class="fw-medium">Pixinvent</a>
                  </div> --}}
                  <div class="d-none d-lg-inline-block">
                    <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank"
                      >License</a
                    >
                    <a href="https://1.envato.market/pixinvent_portfolio" target="_blank" class="footer-link me-4"
                      >More Themes</a
                    >

                    <a
                      href="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/"
                      target="_blank"
                      class="footer-link me-4"
                      >Documentation</a
                    >

                    <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block"
                      >Support</a
                    >
                  </div>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        {{-- </div> --}}
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js 'assets/vendor/js/core.js -->

 
    <div id="validation-messages" style="display: none;"
         data-add-new="{{ trans('cp.add_articles') }}"
         data-edit="{{ trans('cp.edit') }}"
         {{-- data-first_name-en-required="{{ trans('cp.first_name_en_required') }}"
         data-first_name-ar-required="{{ trans('cp.first__name_ar_required') }}" --}}
         {{-- data-country-id-required="{{ trans('cp.country_id_required') }}"
         data-category-id-required="{{ trans('cp.category_id_required') }}"
         data-child-category-id-required="{{ trans('cp.child_category_id_required') }}" --}}
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
  </body>
  @endsection


  @push('js')
  <script src="{{asset('backend/datatables/js/article-management.js')}}"></script>
  <script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': '{{csrf_token()}}'
          }
      });
      var csrf = "{{csrf_token()}}";
      var DATA_URL = "{{ route('admin.articles.api') }}";
      var baseUrl = '{{URL::to('')}}';
  </script>

{{-- <script>
  document.addEventListener('DOMContentLoaded', function () {
      // Add event listener to the "Add" button
      document.getElementById('addDoctorButton').addEventListener('click', function () {
          // Specify the URL you want to redirect to
          var addDoctorUrl = 'http://localhost:8000/modal-example';

          // Redirect to the new URL
          window.location.href = addDoctorUrl;
      });
  });
</script> --}}
 
  
@endpush