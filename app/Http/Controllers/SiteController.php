<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use App\Answer;
use Auth;
use Validator;
use DB;

class SiteController extends Controller
{
    //

    public function __construct () {

    	return $this->middleware('auth')->except('index');
    }

    public function index () {

    	return view('web.index');
    }

    public function questions () {

    	$user_id = Auth::user()->id;


    	/*
    	$questions = Question::whereDoesntHave('answers')
					->orWhereHas('answers',function($query) use ($user_id){
					$query->where('user_id','!=', $user_id);
					})->with('answers')->get(); */


		$questions =DB::select("SELECT questions.* FROM questions LEFT JOIN (select * from answers where user_id = '$user_id' ) as hatem ON questions.id = hatem.question_id where hatem.question_id is NULL ");



		return view('web.questions', compact('questions'));

    }

    public function meanswers () {

    	$userid = Auth::user()->id;
    	$user = User::where('id', $userid)->first();
    	$answers = $user->answers()->get();


    }

    public function answerform ($question) {

    	$question = Question::where('question', str_slug($question, ' '))->first();
    	return view('web.answer', compact('question'));

    }

    public function answer (Request $request, $question) {


    	$userid = Auth::user()->id;

    	$question_id = Question::where('question', str_slug($question, ' '))->first()->id;

    	$question = Question::where('question', str_slug($question, ' '))->first();

    	/** check if the use already answerd this before **/

    	$check = Answer::where('user_id', $userid)->where('question_id' , $question_id)->first();

    	//return dump($check->user_id);

    	if(isset($check)) {

    		// means the user already answer it before and he want answer again this aussume to me cheating 
    		return 'you already answerd this before 404, just go back :D ';

    	} else {


    		$validate = Validator::make($request->all() , [

    		'answer' => 'required',

    		]);

	    	$answer = (string) $request->answer;

	    	

	    	/** now we have a filterd data to insert into db **/
	    	Answer::create([

	    		'answer' => $answer,
	    		'question_id' => $question_id,
	    		'user_id' => $userid,

	    		]);

	    	/** check if this is a right answer and add 10 points to user **/

	    	if($question->correct_answer == $answer ) {

	    		$user = User::find($userid)->first();
	    		$user->points = $user->points + 10;
	    		$user->save();
	    	}

	    	return redirect('web.questions')->with;
    	}

    }

    
}
