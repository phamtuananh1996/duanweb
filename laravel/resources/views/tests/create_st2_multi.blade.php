@extends('tests.layout')

@section('test_content')
	<div class="col-md-8 col-md-offset-2 main-content">
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
		<div class="col-md-10 col-md-offset-1" style="margin-top: 20px; margin-bottom: 30px;">
			
		</div>
		@if($test->multiChoiceTests->count())
			@foreach($test->multiChoiceTests as $multiChoiceTest)
				<h3>{{$multiChoiceTest->title}}</h3>
			@endforeach
		@endif
		<div class="col-md-8" style="margin-bottom: 20px; margin-top: 20px; background: white; padding:20px;">
			<form id="addQuestionForm" class="form-group" method="POST" action="{{url('/tests/multi/savetest')}}" style="margin-top: 30px;">
				{{csrf_field()}}
				<input type="hidden" name="test_id" value="{{$test->id}}"> 
				
			</form>
		</div>
		<div class="col-md-12" style="margin-top: 30px; margin-bottom: 100px;">
			<button id="addButton" onclick="addQuestion()" class="btn pmd-btn-raised pmd-ripple-effect btn-primary" type="button">Thêm câu hỏi</button>
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