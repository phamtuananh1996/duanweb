@extends('tests.layout')

@section('test_content')
	<div class="col-md-8 col-md-offset-2 main-content" style="border: solid 1px green; background: white;">
		<h1 class="text-center" style="color:green;">Tạo Đề Thi</h1>
		<hr style="border: solid 1px #9e9e9e;">
		<h4><strong>Tiêu đề:</strong> {{$test->title}}</h4>
		<h4><strong>Danh mục/Thể loại:</strong> {{$test->category->title}}</h4>
		<h4><strong>Dạng đề:</strong> 
		@if ($test->test_type==1)
			Tự luận
		@else
			Trắc nghiệm
		@endif
		</h4>
		<h4><strong>Thời Gian:</strong> {{$test->total_time}} phút</h4>
		<hr style="border-bottom: solid 1px #9e9e9e;">
		
		@if($test->multiChoiceTests->count())
		<div class="col-md-10" style="margin-top: 20px; margin-bottom: 30px;">
			@foreach($test->multiChoiceTests as $multiChoiceTest)
				@if($multiChoiceTest->state == 1)
					<h3 style="margin-left: 20px; color:green;">{{$multiChoiceTest->title}}</h3>
					@foreach($multiChoiceTest->answers as $answer)
						<div class="row">
							<div class="col-md-11" style="margin-left: 20px;">
								<label class="radio-inline pmd-radio pmd-radio-ripple-effect" style="margin-bottom: 5px;">
									<input type="radio"  name="test_type" id="inlineRadio1" value="0">
									<span for="inlineRadio1">{{$answer->title}}</span>
								</label>
							</div>
						</div>		
					@endforeach
				@else
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12">
										<h3 style="float:left; color:green;">{{$multiChoiceTest->title}}</h3>
									</div>
									@if($multiChoiceTest->answers)
										@foreach($multiChoiceTest->answers as $ans)
											<div class="col-md-12">
												<label class="radio-inline pmd-radio pmd-radio-ripple-effect" style="margin-bottom: 5px;">
													<input type="radio"  name="test_type" id="inlineRadio1" value="0">
													<span for="inlineRadio1">{{$ans->title}}</span>
												</label>	
											</div>
										@endforeach
									@endif	
								</div>
							</div>
							<hr style="border-bottom: solid 1px #9e9e9e;">
							<form style="margin-top:30px; " method="POST" action="{{url('tests/multi/answer/save')}}">
								<input type="hidden" name="test_id" value="{{$test->id}}">
								<input type="hidden" name="multi_choice_test_id" value="{{$multiChoiceTest->id}}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="col-md-7">
									<div class="form-group pmd-textfield">
										<label for="Small">Thêm trả lời</label>
										<input type="text" required name="title" id="Small" class="form-control" value="">
									</div>	
								</div>
								<div class="col-md-3" style="margin-top:15px;">
									<div class="checkbox pmd-default-theme">
				                        <label class="pmd-checkbox pmd-checkbox-ripple-effect">
				                            <input type="checkbox" id="is_correct" name="is_correct" value="0" />
				                            <span>Là đáp án đúng</span>
				                        </label>
				                    </div>
								</div>
								<div class="col-md-1" style="margin-top:10px;">
									<button class="btn pmd-btn-fab pmd-ripple-effect btn-default" type="submit"><i class="material-icons pmd-sm">add</i></button>
								</div>	
							</form>
						</div>
						<form method="POST" action="{{url('/tests/multi/upadteState')}}">
							<input type="hidden" name="multi_choice_test_id" value="{{$multiChoiceTest->id}}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="col-md-2">
							<button class="btn pmd-btn-raised pmd-ripple-effect btn-primary" type="submit">Lưu</button>
						</div>	
						</form>
					</div>
				@endif
			@endforeach
		</div>		
		@endif
		@if($test->allQuestionNotReady->count() == 0)
			<div class="col-md-12" style="margin-top: 20px;">
				<button id="addButton" onclick="addQuestion()" class="btn pmd-btn-raised pmd-ripple-effect btn-primary" type="button">Soạn câu hỏi</button>
			</div>
		@endif
		<div class="col-md-8" style="margin-bottom: 20px; margin-top: 20px; background: white; padding:20px;">
			<form id="addQuestionForm" class="form-group" method="POST" action="{{url('/tests/multi/savetest')}}">
				{{csrf_field()}}
				<input type="hidden" name="test_id" value="{{$test->id}}"> 
				
			</form>
		</div>
	</div>
	<script type="text/javascript">

		function addQuestion() {
			var addQuestionForm = document.getElementById("addQuestionForm");

			var title = createInputElement('text','title','Nội dung','');
		    addQuestionForm.appendChild(title);
		    
		    var maxPoint = createInputElement('number','max_point','Điểm tối đa','');
		    addQuestionForm.appendChild(maxPoint);
		    
		    var time = createInputElement('number','question_time','Thời gian làm','');
		    addQuestionForm.appendChild(time);
		    
		    var explan = createInputElement('text','explan','Đáp án/Hướng dẫn','');
		    addQuestionForm.appendChild(explan);

		    var submitBtn = createButtonElement('submit','submit_button','btn pmd-btn-raised pmd-ripple-effect btn-primary','Thêm câu trả lời');
		    addQuestionForm.appendChild(submitBtn);

		    document.getElementById('addButton').style.display="none";
		}

		function createInputElement(type, name, text, value) {

			var superDiv = document.createElement('DIV');
			superDiv.setAttribute('class','col-md-10');
			var textFieldDiv = document.createElement('DIV');
			textFieldDiv.setAttribute('class','form-group pmd-textfield');
			superDiv.appendChild(textFieldDiv);

			var label = document.createElement('LABEL');
			label.setAttribute('for','Small');
			labelText = document.createTextNode(text);
			label.appendChild(labelText);
			textFieldDiv.appendChild(label);

			var input = document.createElement('INPUT');
			input.setAttribute('type',type);
			input.setAttribute('name',name);
			input.setAttribute('id',name);
			input.setAttribute('value',value);
			input.setAttribute('class','form-control');
			textFieldDiv.appendChild(input);
			return superDiv;
		}
		function createButtonElement(type,name,btn_class,text) {
			var btnDiv = document.createElement('DIV');
			btnDiv.setAttribute('class','col-md-12');

			var button = document.createElement('BUTTON');
			button.setAttribute('type',type);
			button.setAttribute('name',name);
			button.setAttribute('class',btn_class);
			button.appendChild(document.createTextNode(text));
			btnDiv.appendChild(button);
			return btnDiv;
		}
	</script>
@endsection