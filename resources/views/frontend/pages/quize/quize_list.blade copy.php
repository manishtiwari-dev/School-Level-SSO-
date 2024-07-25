@extends('frontend.default.layouts.master')

@section('title')
    {{ localize('Register Your College') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('breadcrumb-contents')
    <div class="breadcrumb-content">
        <h2 class="mb-2 text-center">{{ localize('Register Your College') }}</h2>
        <nav>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item fw-bold" aria-current="page"><a
                        href="{{ route('home') }}">{{ localize('Home') }}</a></li>
                <li class="breadcrumb-item fw-bold" aria-current="page">{{ localize('Register Your College') }}</li>
            </ol>
        </nav>
    </div>
@endsection




@section('contents')
    <!--breadcrumb-->
    @include('frontend.default.inc.breadcrumb')
    <!--breadcrumb-->

    <div class="container">
        <form class="row g-3 needs-validation" id="college_registration_form" action="{{route('storeCollegeData')}}" method="post" novalidate>
            @csrf

            <div class="col-md-12">
                <label for="validationCustom04" class="form-label">Question Type</label>
                <select class="form-select  border border-2" name="question_type" id="validationCustom04" required>
                  <option selected value="multiple_choice">Multiple Choice</option>
                  <option value="short_answer">Sort Answer</option>
                </select>
            </div>

            <div class="col-md-12">
              <label for="name" class="form-label">Question<sup class="text-danger">*</sup></label>
              <input type="text" class="form-control border border-2" id="name" name="name" value="{{old('name')}}" required>
              <div class="invalid-feedback">
                Please enter college name
              </div>
            </div>

            <div class="col-md-12">
                <div class="text-end mt-3">
                    <button type="button" id="add" class="btn btn-primary">+ Add Options</button>
                </div>
            </div>

            <div class="row mcq_option_area">

                <div class="col-md-6 my-1 option_1">
                    <div class="row">
                        <div class="col-md-8">
                            <label for="email" class="form-label">Option 1<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control border border-2 @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required>
                            <div class="invalid-feedback">
                                Please enter college email
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">Mark as answer</label>
                                <p class="text-danger fw-bold remove_option" value="1">X</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 my-1 option_2">
                    <div class="row">
                        <div class="col-md-8">
                            <label for="email" class="form-label">Option 2<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control border border-2 @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required>
                            <div class="invalid-feedback">
                                Please enter college email
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">Mark as answer</label>
                                <p class="text-danger fw-bold remove_option" value="2">X</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-12">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
          </form>
    </div>

    @section('scripts')

    <script type="text/javascript">

        var i = 3;

        $("#add").click(function(){

            ++i;

            $html=` <div class="col-md-6 my-1 option_${i}">
                    <div class="row">
                        <div class="col-md-8">
                            <label for="email" class="form-label">Option<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control border border-2 @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required>
                            <div class="invalid-feedback">
                                Please enter college email
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">Mark as answer</label>
                                <p class="text-danger fw-bold remove_option" value="${i}">X</p>
                            </div>
                        </div>
                    </div>
                </div>`;

            $(".mcq_option_area").append($html);

        });


        $(document).on('click', '.remove_option', function(){
            $thisVal=$(this).attr('value');
            $('.option_'+$thisVal).remove();
        });

    </script>

    @endsection

@endsection
