<x-backend.app-layout>

@section('title')
    {{ localize('Questions') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">{{ localize('Questions') }}</h2>
                            </div>
                            <div class="tt-action">
                                <a href="{{ route('admin.questions.create') }}" class="btn btn-primary"><i
                                        data-feather="plus"></i> {{ localize('Add Questions') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <div class="card mb-4" id="section-1">
                        <div class="card-header border-bottom-0">

                            <div class="row justify-content-between g-3">
                                <div class="col-auto flex-grow-1">
                                    <div class="tt-search-box">
                                        <div class="input-group">
                                            <span class="position-absolute top-50 start-0 translate-middle-y ms-2">
                                                <i data-feather="search"></i></span>
                                            <input class="form-control rounded-start w-100" type="text" id="search"
                                                name="search" placeholder="{{ localize('Search') }}"
                                                @isset($searchKey)
                        value="{{ $searchKey }}"
                        @endisset>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="input-group">
                                        <select class="form-select select2 quizDropdown" name="quiz" id="quizID"
                                            data-minimum-results-for-search="Infinity">
                                            <option value="">{{ localize('Select quiz') }}</option>
                                            @if (!empty($quizelist))
                                                @foreach ($quizelist as $k => $quiz)
                                                    <option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary">
                                        <i data-feather="search" width="18"></i>
                                        {{ localize('Search') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="quizQuestion">
                        <table class="table tt-footable border-top" data-use-parent-width="true" id="">
                            <thead>
                                <tr>
                                    <th class="text-center" width="7%">{{ localize('S/L') }}</th>
                                    <th>{{ localize('Quiz') }}</th>
                                    <th>{{ localize('Question Name') }}</th>
                                    <th>{{ localize('Question Type') }}</th>
                                    <th>{{ localize('Action') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($questionlist))
                                    @foreach ($questionlist as $k => $questions)
                                        <tr>
                                            <td>{{ $k + 1 }}</td>
                                            <td>{{ $questions->quizzes->title ?? '' }}</td>
                                            <td>{{ $questions->question_text }}</td>
                                            <td>
                                                @php
                                                    if ($questions->question_type == 1) {
                                                        $type = 'Multiple Choice';
                                                    } elseif ($questions->question_type == 2) {
                                                        $type = 'True & False';
                                                    }
                                                @endphp
                                                {{ $type }}
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
                                                                href="{{ route('admin.questions.edit', ['id' => $questions->id, 'lang_key' => env('DEFAULT_LANGUAGE')]) }}&localize">
                                                                <i data-feather="edit-3"
                                                                    class="me-2"></i>{{ localize('Edit') }}
                                                            </a>
                                                        @endcan

                                                        @can('delete_roles_and_permissions')
                                                            <a href="#" class="dropdown-item confirm-delete"
                                                                data-href="{{ route('admin.questions.delete', $questions->id) }}"
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
                                {{ $questionlist->firstItem() }}-{{ $questionlist->lastItem() }} {{ localize('of') }}
                                {{ $questionlist->total() }} {{ localize('results') }}</span>
                            <nav>
                                {{ $questionlist->appends(request()->input())->links() }}
                            </nav>
                        </div>
                        <!--pagination end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @section('scripts')
    <script>
        $(document).ready(function() {


            $("#search").on('keyup', function(e) {
                if ((this.value).length >= 3 || (this.value).length == 0) {
                    tableContent(this.value);
                }
            });

        });

         // This work On Change of Any Status.
         $(document).on('change', ".quizDropdown", function() {
                tableContent();
            });


        function tableContent(search = '') {

            const url = "{{ route('admin.questions.quizFilter') }}";
            console.log(url);

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': '{{ csrf_token() }}',
            //     }
            // });
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    quiz_id: $("#quizID").val(),
                    search: search,
                    _token: '{{ csrf_token() }}',

                },
                dataType: "json",
                success: function(result) {
                    console.log(result);

                    $("#quizQuestion").html(result.html);
                }
            });
        }
    </script>
@endsection
</x-backend.app-layout>

