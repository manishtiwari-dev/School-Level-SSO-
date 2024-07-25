<x-backend.app-layout>

@section('title')
    {{ localize('Update Question') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection
 
<section class="tt-section pt-4">
    <div class="container mt-3">
        <div class="row mb-3">
            <div class="col-12">
                <div class="card tt-page-header">
                    <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                        <div class="tt-page-title">
                            <h2 class="h5 mb-lg-0">{{ localize('Edit Question') }}</h2>
                        </div>
  
                    </div>
                </div>
            </div>
        </div> 
        <div class="row mb-4 g-4">
            <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                <form action="{{ route('admin.questions.update') }}" method="POST" class="pb-650" id="product-form">
                    @csrf 
                    <input type="hidden" name="id" value="{{ $quizquestion->id }}">
                    <div class="card mb-4" id="section-1">
                        <div class="card-body">

                            <div class="mb-4">
                                <label for="quize" class="form-label">Quiz</label>
                                <select class="form-select  border border-2" name="quize" id="quize" required>
                                    <option selected value="" disabled>Select Quiz</option>
                                    @if(!empty($quizelist))
                                    @foreach ($quizelist as $quize)
                                    <option value="{{ $quize->id }}" {{ ($quizquestion->quiz_id == $quize->id) ? 'selected':'' }}>{{ $quize->title }}</option>
                                    @endforeach 
                                    @endif
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="question_type" class="form-label">Question Type</label>
                                <select class="form-select  border border-2" name="question_type" id="question_type" required>
                                    <option value="" selected disabled>Select Question Type</option>
                                    <option value="1" {{ ($quizquestion->question_type == 1) ? 'selected':'' }}>Multiple Choice</option>
                                    <option value="2" {{ ($quizquestion->question_type == 2) ? 'selected':'' }}>True False</option>  
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="question_text" class="form-label">{{ localize('Question') }}<sup class="text-danger">*</sup></label>
                                <input class="form-control" type="text" value="{{ $quizquestion->question_text }}" id="question_text"  name="question_text" required> 
                            </div>
                

                            <div class="row mcq_option_area">

                                <div class="col-md-12 my-1 ">
                                    <div class="row option"> 
                                        @if(!empty($questionoption))
                                        @foreach ($questionoption as $option) 
                                            <div class="col-md-5">
                                                <label for="" class="form-label">Option<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control border border-2" value="{{ $option->option_text }}"  name="options[0][option_text]" id=""  required> 
                                            </div>
                                            <div class="col-md-4 mt-4">
                                                <div class="form-check mt-2 ">
                                                    <input class="form-check-input" name="options[0][is_correct]" value="1" {{ ($option->is_correct == 1)?'checked':'' }} type="checkbox"  id="" >
                                                    <label class="form-check-label" for="">Mark as Correct</label> 
                                                </div>
                                            </div> 
                                            
                                        @endforeach
                                        @endif
                                        <div class="col-md-2">
                                            <div class="text-end mt-3">
                                                <button type="button" id="add" class="btn btn-primary">+ Add Options</button>
                                            </div>
                                        </div>
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
            <!--right sidebar-->
            <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                <div class="card tt-sticky-sidebar">
                    <div class="card-body">
                        <h5 class="mb-4">{{ localize('Quiz Information') }}</h5>
                        <div class="tt-vertical-step">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#section-1" class="active">{{ localize('Basic Information') }}</a>
                                </li> 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
</section>

</x-backend.app-layout>

@section('scripts')
    <script type="text/javascript">
 
        var i = 0;  
 
        $(document).on('click', '#add', function(){

            ++i;
            

            $html=` <div class="col-md-12 my-1 option">
                    <div class="row">
                        <div class="col-md-5">
                            <label for="" class="form-label">Option<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control border border-2" name="options[${i}][option_text]" id=""  required>
                            <div class="invalid-feedback">
                                Please enter option value
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="form-check mt-2">
                                <input class="form-check-input" name="options[${i}][is_correct]"  value="1" type="checkbox"  id="" >
                                <label class="form-check-label" for="">Mark as answer</label>
                                
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-end mt-3">
                                <button type="button" class="btn btn-danger remove_option">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>`;

            $(".mcq_option_area").append($html);
        });  
        $(document).on('click', '.remove_option', function(){
            $(this).parents('.option').remove();
        });


        $(document).on('submit', '#quize_form', function (e) {
            e.preventDefault();
            $('#quize_form').addClass('was-validated');
            if ($('#quize_form')[0].checkValidity() === false) {
                event.stopPropagation();
            } else {
                $('#quize_form')[0].submit();
            }
        });

    </script>

@endsection

