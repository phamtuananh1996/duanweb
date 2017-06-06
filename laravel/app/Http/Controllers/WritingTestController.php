<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\WritingTest;
use Auth;
class WritingTestController extends Controller
{
	public function store(Request $req)
    {
        
       $write_test=new WritingTest;
       $write_test->test_id=$req->test_id;
       if(!$req->hasFile('document_answer'))
        {
          $write_test->explan=$req->answer;
        }
      else
        { 
            $nameDoc=time().".".$req->document_answer->getClientOriginalExtension();

            $req->document_answer->move('document/test/', $nameDoc);

            $write_test->explan=$nameDoc;
            $write_test->is_document_answer=1;
        }

        if(!$req->hasFile('document'))
        {
            $write_test->content=$req->question;
        }
        else
        {
            $nameDoc=time().".".$req->document->getClientOriginalExtension();

            $req->document->move('document/test/', $nameDoc);

            $write_test->content=$nameDoc;
            $write_test->is_document=1;
        }
       
       $write_test->save();
       //nham: edit on 31/05/2017 -- update test state to enable show on index page
       $test = Test::find($req->test_id);
       $test->state = 1;
       $test->save();
       return redirect('tests');
    }

  	public function update(Request $rq)
  	{
  		
  		$write_test= WritingTest::find($rq->wtest_id);
  		$write_test->content = $rq->content;
  		$write_test->save();
      return response()->json($write_test);
  		// return redirect('tests/user/created/show/'.$write_test->test_id);
  	}

  	public function updateExplan(Request $rq)
  	{
  		$write_test= WritingTest::find($rq->wtest_id);
  		$write_test->explan = $rq->explan;
  		$write_test->save();
      return response()->json($write_test);
  		// return redirect('tests/user/created/show/'.$write_test->test_id);
  	}
}
