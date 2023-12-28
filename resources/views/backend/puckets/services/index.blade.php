@extends('layouts.admin')
@section('title', __('cp.services'))
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
                   <table class="datatables-pucketServices table">
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

           </div>
       </div>
    </div>
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
    <script src="{{asset('backend/datatables/js/pucketService-management.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        var csrf = "{{csrf_token()}}";
        var DATA_URL = "{{ route('admin.pucketServices.api') }}";
        var baseUrl = '{{URL::to('')}}';
    </script>

    <script>

    </script>
@endpush
