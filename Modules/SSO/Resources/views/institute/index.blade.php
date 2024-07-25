<x-backend.app-layout>

@section('title')
    {{ localize('Institute') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">{{ localize('Institute') }}</h2>
                            </div>
                            <div class="tt-action">
                                <a href="{{ route('admin.institute.create') }}" class="btn btn-primary"><i
                                        data-feather="plus"></i> {{ localize('Add Institute') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <div class="card mb-4" id="section-1">
                        <table class="table tt-footable border-top" data-use-parent-width="true">
                            <thead>
                                <tr>
                                    <th class="">{{ localize('S/L') }}</th>
                                    <th>{{ localize('Institute Name') }}</th>
                                    <th>{{ localize('Contact Name') }}</th>
                                    <th>{{ localize('Contact Phone') }}</th>
                                    <th>{{ localize('Status') }}</th>
                                    <th data-breakpoints="xs sm" class="">{{ localize('Action') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($collegelist))
                                    @foreach ($collegelist as $k => $college)
                                        <tr>
                                            <td>{{ $k + 1 }}</td>
                                            <td>{{ $college->name }}</td>
                                            <td>{{ $college->contact_name }}</td>
                                            <td>{{ $college->contact_phone }}</td>
                                            <td>
                                                @can('publish_institute')
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" onchange="updateStatus(this)"
                                                        class="form-check-input"
                                                        @if ($college->status) checked @endif
                                                        value="{{ $college->id }}">
                                                </div>
                                                @endcan
                                            </td>
                                            <td>

                                                <div class="dropdown tt-tb-dropdown">
                                                    <button type="button" class="btn p-0" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end shadow">

                                                        @can('edit_roles_and_permissions')
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.institute.view', ['id' => $college->id, 'lang_key' => env('DEFAULT_LANGUAGE')]) }}&localize">
                                                                <i data-feather="eye" class="me-2"></i>{{ localize('View') }}
                                                            </a>

                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.institute.edit', ['id' => $college->id, 'lang_key' => env('DEFAULT_LANGUAGE')]) }}&localize">
                                                                <i data-feather="edit-3"
                                                                    class="me-2"></i>{{ localize('Edit') }}
                                                            </a>

                                                            {{-- <a class="dropdown-item"
                                                            href="https://lab2.invoidea.in/olympiad/public/registration/institute/{{$college->institute_number}}">
                                                            <i data-feather="eye" class="me-2"></i>{{ localize('Url') }}
                                                            </a> --}}

                                                        @endcan

                                                        @can('delete_roles_and_permissions')
                                                            <a href="#" class="dropdown-item confirm-delete"
                                                                data-href="{{ route('admin.institute.delete', $college->id) }}"
                                                                title="{{ localize('Delete') }}">
                                                                <i data-feather="trash-2" class="me-2"></i>
                                                                {{ localize('Delete') }}
                                                            </a>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <!--pagination start-->
                        <div class="d-flex align-items-center justify-content-between px-4 pb-4">
                            <span>{{ localize('Showing') }}
                                {{ $collegelist->firstItem() }}-{{ $collegelist->lastItem() }} {{ localize('of') }}
                                {{ $collegelist->total() }} {{ localize('results') }}</span>
                            <nav>
                                {{ $collegelist->appends(request()->input())->links() }}
                            </nav>
                        </div>
                        <!--pagination end-->
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-backend.app-layout>
    @section('scripts')
    <script>
        "use strict";

        function updateStatus(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('admin.institute.updateStatus') }}', {
                    _token: '{{ csrf_token() }}',
                    id: el.value,
                    status: status
                },
                function(data) {
                    if (data == 1) {
                        notifyMe('success', '{{ localize('Status updated successfully') }}');
                    } else {
                        notifyMe('danger', '{{ localize('Something went wrong') }}');
                    }
                });
        }

    
        
    </script>

@endsection
