<x-frontend.app-layout>

@section('title')
    {{ localize('Quize List') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection
 
 
    <div class="container mt-3">
        <form class="row g-3 needs-validation" id="quize_form" action="{{route('storeQuize')}}" method="post" novalidate>
            @csrf

            <div class="col-md-6">
                <label for="question_type" class="form-label">Question Type</label>
                <select class="form-select  border border-2" name="question_type" id="question_type" required>
                  <option selected value="multiple_choice">Multiple Choice</option>
                  <option selected value="true_false">True False</option> 
                  <option selected value="short_answer">Short Answer</option>
                </select>
            </div>

            <div class="col-md-6">
              <label for="question_text	" class="form-label">Question<sup class="text-danger">*</sup></label>
              <input type="text" class="form-control border border-2" id="question_text	" name="question_text" value="{{old('question_text')}}" required>
              <div class="invalid-feedback">
                Please enter question
              </div>
            </div>

            {{-- <div class="col-md-6">
                <div class="text-end mt-3">
                    <button type="button" id="add" class="btn btn-primary">+ Add Options</button>
                </div>
            </div> --}}

            <div class="row mcq_option_area">

                <div class="col-md-12 my-1 ">
                    <div class="row option">
                        <div class="col-md-6">
                            <label for="" class="form-label">Option<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control border border-2" name="options[0][option_text]" id=""  required>
                            <div class="invalid-feedback">
                                Please enter option value
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="form-check mt-2 ">
                                <input class="form-check-input" name="options[0][is_correct]" value="1" type="checkbox"  id="" >
                                <label class="form-check-label" for="">Mark as Correct</label>
                                {{-- <p class="text-danger fw-bold remove_option">X</p> --}}
                            </div>
                        </div> 
                        <div class="col-md-2">
                            <div class="text-end mt-3">
                                <button type="button" id="add" class="btn btn-primary">+ Add Options</button>
                            </div>
                        </div>
                    </div>
                     
                </div>
               

                {{-- <div class="col-md-6 my-1 option">
                    <div class="row">
                        <div class="col-md-8">
                            <label for="" class="form-label">Option<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control border border-2" name="option_text[]" id=""  required>
                            <div class="invalid-feedback">
                                Please enter option value
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="form-check mt-2">
                                <input class="form-check-input" name="answer"  type="radio" value="2" id="" required>
                                <label class="form-check-label" for="">Mark as answer</label>
                                <p class="text-danger fw-bold remove_option">X</p>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>

            <div class="col-12">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
          </form>
    </div>

    @push('scripts')

    <script type="text/javascript">

        var i = 0;  

        $("#add").click(function(){

            ++i;

            $html=` <div class="col-md-12 my-1 option">
                    <div class="row">
                        <div class="col-md-6">
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
//<p class="text-danger fw-bold remove_option">X</p>

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

    @endpush

</x-frontend.app-layout>
