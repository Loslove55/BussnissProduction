@extends('backend.layout.master')
@section('backend-head')
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend') }}/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend') }}/assets/libs/admin-resources/rwd-table/rwd-table.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('backend-main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('dashboard.sellers') }}</h4>
                    <div style="display: flex;justify-content: space-between;">
                        <a href="{{ route('sellerss.create') }}" class="btn btn-success mb-2">
                            <i class="mdi mdi-plus mr-2"></i>
                            {{ __('dashboard.add_new') }}</a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt nowrap"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th data-priority="1">{{ __('dashboard.image') }}</th>
                                <th data-priority="1">{{ __('dashboard.name') }}</th>
                                <th data-priority="1">{{ __('dashboard.email') }}</th>
                                <th data-priority="1">{{ __('dashboard.mobile') }}</th>

                                <th data-priority="0">{{ __('dashboard.wa') }}</th>
                                <th data-priority="0">{{ __('dashboard.products') }}</th>
                                <th data-priority="0">{{ __('dashboard.requests') }}</th>
                                <th data-priority="0">{{ __('dashboard.jobs') }}</th>
                                <th data-priority="0">{{ __('dashboard.brans') }}</th>
                                <th data-priority="0">{{ __('dashboard.country') }}</th>
                                <th data-priority="0">{{ __('dashboard.state') }}</th>
                                <th data-priority="0">{{ __('dashboard.city') }}</th>

                                <th data-priority="1">{{ __('dashboard.options') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td width="100" height="100">
                                        @if(isset($user->avatar))
                                            <img style="width: 100%;border-radius: 10px" src="{{ url('storage/' . $user->avatar) }}"/>
                                        @else
                                            no image ....
                                        @endif
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobile }}</td>

                                    <td>{{ $user->whatsapp_mobile }}</td>
                                    <td>{{ $user->products->count() }}</td>
                                    <td>{{ $user->requests->count() }}</td>
                                    <td>{{ $user->jobs->count() }}</td>
                                    <td>{{ $user->branches->count() }}</td>
                                    <td>{{ $user->country->getTranslatedAttribute('name',\App::getLocale()) }}</td>
                                    <td>{{ $user->state->getTranslatedAttribute('name',\App::getLocale()) }}</td>
                                    <td>{{ $user->city->getTranslatedAttribute('name',\App::getLocale()) }}</td>

                                    <td>
                                        <a href="{{ route('sellerss.edit' , $user->id) }}"
                                           class="mr-3 text-primary"><i class="mdi mdi-pencil font-size-18"></i></a>
                                        <a href="{{ route('sellerss.show' , $user->id) }}"
                                           class="mr-3 text-success"><i class="mdi mdi-eye font-size-18"></i></a>
                                        <a title="" onclick="return false;" object_id="{{ $user->id }}"
                                           delete_url="/sellerss/" class="text-danger remove-alert" href="#"><i
                                                    class="mdi mdi-trash-can font-size-18"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('backend-footer')
    <script src="{{ asset('backend') }}/assets/libs/admin-resources/rwd-table/rwd-table.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/table-responsive.init.js"></script>

    <script src="{{ asset('backend') }}/assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/sweet-alerts.init.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/jszip/jszip.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/datatables.init.js"></script>
    <script src="{{ asset('backend') }}/custom-sweetalert.js"></script>
    <script src="{{ asset('backend') }}/mine.js"></script>
@endsection