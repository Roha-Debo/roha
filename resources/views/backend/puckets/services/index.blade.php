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
                   <table class="datatables-pucket-sevicess table">
                       <thead class="border-top">
                       <tr>
                           <th></th>
                           <th>id</th>
                           <th>{{ __('cp.title') }}</th>
                           <th>{{ __('cp.description') }}</th>
                           <th>{{ __('cp.price') }}</th>
                           <th>{{ __('cp.discount') }}</th>
                           <th>{{ __('cp.pucket') }}</th>
                           <th>{{ __('cp.created') }}</th>
                           <th>{{ __('cp.action') }}</th>
                       </tr>
                       </thead>
                   </table>
               </div>
               <!-- Offcanvas to add new user -->
               <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddPucketService" aria-labelledby="offcanvasAddPucketServiceLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasAddPucketServiceLabel" class="offcanvas-title">Add Service</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body mx-0 flex-grow-0">
                    <form class="add-new-pucket-service pt-0" id="addNewPucketServiceForm" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="pucket_service_id">
                        <div class="mb-3">
                            <label class="form-label" for="pucket_id">{{__('cp.pucket')}}</label>
                            <select id="pucket_id" name="pucket_id" class="select2 form-select">
                                <option value="">Select</option>
                                @foreach($puckets as $pucket)
                                    <option value="{{$pucket->id}}">{{$pucket->title}}</option>
                                @endforeach
                            </select>
                        </div> 
                        <div class="mb-3">
                            <label class="form-label" for="add-pucket-service-title">{{__('cp.title_ar')}}</label>
                            <input type="text" class="form-control" id="add-pucket-service-title-ar" placeholder="{{__('cp.title_ar')}}" name="title_ar" aria-label="{{__('cp.title_ar')}}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-pucket-service-title">{{__('cp.title_en')}}</label>
                            <input type="text" class="form-control" id="add-pucket-service-title-en" placeholder="{{__('cp.title_en')}}" name="title_en" aria-label="{{__('cp.title_en')}}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-pucket-service-description">{{__('cp.description_ar')}}</label>
                            <input type="text" class="form-control" id="add-pucket-service-description-ar" placeholder="{{__('cp.description_ar')}}" name="description_ar" aria-label="{{__('cp.description_ar')}}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-pucket-service-description">{{__('cp.description_en')}}</label>
                            <input type="text" class="form-control" id="add-pucket-service-description-en" placeholder="{{__('cp.description_en')}}" name="description_en" aria-label="{{__('cp.description_en')}}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-pucket-service-price">{{__('cp.price')}}</label>
                            <input type="number" min="0" class="form-control" id="add-pucket-service-price" placeholder="{{__('cp.price')}}" name="price" aria-label="{{__('cp.price')}}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-pucket-service-discount">{{__('cp.discount')}}</label>
                            <input type="number" min="0" default="0" class="form-control" id="add-pucket-service-discount" placeholder="{{__('cp.discount')}}" name="discount" aria-label="{{__('cp.discount')}}" />
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
    data-add-new="{{ trans('cp.add_services') }}"
    data-edit="{{ trans('cp.edit') }}"
    data-title-en-required="{{ trans('cp.title_en_required') }}"
    data-title-ar-required="{{ trans('cp.title_ar_required') }}"
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
    <script src="{{asset('backend/datatables/js/pucket-service-management.js')}}"></script>
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
