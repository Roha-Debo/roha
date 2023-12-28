@extends('layouts.admin')
@section('title', __('cp.puckets'))
@section('admin')

    <div class="container-xxl flex-grow-1 container-p-y">
       <div class="row">
           <div class="row g-4 mb-4">

           </div>
           <!-- Categories List Table -->
           <div class="card">
               <div class="card-header">
                   <h5 class="card-title mb-0">Search Filter</h5>
               </div>
               <div class="card-datatable table-responsive">
                   <table class="datatables-puckets table">
                       <thead class="border-top">
                       <tr>
                           <th></th>
                           <th>id</th>
                           <th>{{ __('cp.title') }}</th>
                           <th>{{ __('cp.description') }}</th>
                           <th>{{ __('cp.created') }}</th>
                           <th>{{ __('cp.action') }}</th>
                       </tr>
                       </thead>
                   </table>
               </div>
               <!-- Offcanvas to add new user -->
               <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddPucket" aria-labelledby="offcanvasAddPucketLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasAddPucketLabel" class="offcanvas-title">Add Pucket</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body mx-0 flex-grow-0">
                    <form class="add-new-pucket pt-0" id="addNewPucketForm" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="pucket_id">
                        <div class="mb-3">
                            <label class="form-label" for="add-pucket-title">{{__('cp.title_ar')}}</label>
                            <input type="text" class="form-control" id="add-pucket-title-ar" placeholder="{{__('cp.title_ar')}}" name="title_ar" aria-label="{{__('cp.title_ar')}}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-pucket-title">{{__('cp.title_en')}}</label>
                            <input type="text" class="form-control" id="add-pucket-title-en" placeholder="{{__('cp.title_en')}}" name="title_en" aria-label="{{__('cp.title_en')}}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-pucket-description">{{__('cp.description_ar')}}</label>
                            <input type="text" class="form-control" id="add-pucket-description-ar" placeholder="{{__('cp.description_ar')}}" name="description_ar" aria-label="{{__('cp.description_ar')}}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-pucket-description">{{__('cp.description_en')}}</label>
                            <input type="text" class="form-control" id="add-pucket-description-en" placeholder="{{__('cp.description_en')}}" name="description_en" aria-label="{{__('cp.description_en')}}" />
                        </div>

                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">{{__('cp.save')}}</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">{{__('cp.cancel')}}</button>
                    </form>
                </div>
            </div>
           </div>
       </div>
    </div>
    <div id="validation-messages" style="display: none;"
    data-add-new="{{ trans('cp.add_puckets') }}"
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
    <script src="{{asset('backend/datatables/js/pucket-management.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        var csrf = "{{csrf_token()}}";
        var DATA_URL = "{{ route('admin.puckets.api') }}";
        var baseUrl = '{{URL::to('')}}';
    </script>

    <script>

    </script>
@endpush
