@extends('tests.layout')
@section('test_content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1" id="test-result-content">
			<div class="row">
				<div class="col-md-12 text-center">
					<p style="color: #00695c; font-size:25px">Chúc mừng bạn đã hoàn thành bài thi...!</p>
					<p style="font-size: 18px;">Bạn đã làm đúng <span class="red-text"> {{$countIsCorrect}}/{{$test->number_of_questions}}</span>  câu, số điểm tạm tính là 
					@php
						$point = number_format($countIsCorrect/$test->number_of_questions*10,1);
						echo "<span class='red-text'>$point</span>";
					@endphp
					điểm.
					 </p>
				</div>
				<div class="col-md-4 col-md-offset-4" style="padding-bottom: 20px;">
					<button id="show-detail-btn" style="width: 100%;" type="button" class="btn pmd-ripple-effect btn-info"> Xem chi tiết kết quả </button >
				</div>
				<div class="col-md-12" id="result-detail">
					<div id="test-info">
						<p style="font-size: 20px; text-align: center;">{{$test->title}}</p>
						<p style="margin-left:10px;">Số câu hỏi:  <span class="test-detail">{{$test->number_of_questions}}</span></p>
						@if($test->level == 1)
							<p style="margin-left:10px;"> Mức độ: <span class="test-detail"> dễ</span> </p>
						@else
							@if($test->level == 2)
								<p style="margin-left:10px;"> Mức độ:<span class="test-detail"> trung bình</span> </p>
							@else
								<p style="margin-left:10px;"> Mức độ: <span class="test-detail"> khó</span></p>
							@endif
						@endif
						<p style="margin-left:10px;">Thời gian làm bài:  <span class="test-detail">{{$test->total_time}} phút</span></p>
					</div>
					<div class="pmd-card pmd-z-depth" id="result-table">
						<div class="table-responsive">
							<table class="table pmd-table">
								<thead>
					                <tr>
					                  <th>Câu hỏi</th>
					                  <th>Kết quả</th>
					                  <th></th>
					                </tr>
								</thead>
								<tbody>
									@foreach($multiChoiceTestAnswers as $answer)
					                <tr>
					                  <td data-title="Name">{{$answer->multiChoiceTest->title}}</td>
					                  @if($answer->user_test_choiced == $answer->multiChoiceTest->id_MultiChoiceTestChoice_correct)
					                  	 <td data-title=""><i class="material-icons md-dark pmd-xs" style="color:#007E33">check</i></td>
					                  @else
					                   	<td data-title=""><i class="material-icons md-dark pmd-xs" style="color:#ff4444">clear</i></td>
					                  @endif
					                  <td>
					                  	<a id="showexplan" data-answer_id={{$answer->id}} data-toggle="tooltip" data-placement="top" title="Xem đáp/hướng dẫn" href="#nothing">
					                  		<i class="material-icons md-dark pmd-xs" style="color:#FF8800">note</i>
					                  	</a>
					                  	<div class="" >
											<tr id="explan_{{$answer->id}}" class="explan-table" style="display: none">
												<td colspan="10" style="border:none;"><table class="table pmd-table table-sm">
													<thead>
														<tr>
															<th style="border:none;" colspan="5">Đáp án và hướng dẫn</th>
														</tr>
													</thead>
													<tbody >
														<tr ">
															<td style="border:none;" data-title="Firm Name">
																Đáp án đúng:
																<span class="red-text">{{$answer->multiChoiceTest->correctAnswer->title}}</span>
															</td>
														</tr>
														<tr>
															<td style="border:none;" data-title="Firm Name">Hướng dẫn:
																{{$answer->multiChoiceTest->explan}}
															</td>
														</tr>
													</tbody>
												</table>
												</td>
											</tr>
										</div>
					                  </td>
					                </tr>
					                @endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>	
		<div class="col-md-4 col-md-offset-4" style="margin-top: 20px; margin-bottom: 20px;">
			<a href="{{ url('tests/show/'.$test->id) }}"  class="btn pmd-btn-outline pmd-ripple-effect btn-danger pull-left" type="button"><span class="glyphicon glyphicon-repeat"></span> Làm lại</a>
			<a " class="btn pmd-btn-outline pmd-ripple-effect btn-primary pull-right" type="button"><span class="glyphicon glyphicon-share-alt"></span> Chia sẻ</a>
		</div>
	</div>
	
	<script type="text/javascript">
		$(document).ready(function(){
			 $('[data-toggle="tooltip"]').tooltip()
			$('#show-detail-btn').on('click',function(event){
				$('#result-detail').slideToggle('nomarl');
			})
			
			$('body').on('click', '#showexplan', function(event) {

				$(this).parent().parent().parent().find('#explan_'+$(this).data('answer_id')).slideToggle();

			});
		});
	</script>
@endsection
