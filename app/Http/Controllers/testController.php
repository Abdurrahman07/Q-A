<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use DB;
use App\Answer;

use Illuminate\Support\Facades\Auth;
class testController extends Controller
{
    //

    public function useranswers ($id) {

    	$user = User::find($id);
    	$answers = $user->answers()->get();

    	Answer::find();
    }

    public function test () {

    	$user = User::first();
    	$answers = $user->answers()->get();

    	foreach ($answers as $answer) {
    		

    		echo "<p>" . $answer->questions->question . "</p> <br>";
    		echo "<p>" . $answer->users->name . "</p> <br>";
    		echo "<p>" . $answer->answer . "</p> <br>";

    	}

    	

    }


    public function questions () {

        $user_id = Auth::user()->id;
        //user already logged in 
    	$questions =DB::select("SELECT questions.* FROM questions LEFT JOIN (select * from answers where user_id = '$user_id' ) as hatem ON questions.id = hatem.question_id where hatem.question_id is NULL ");

        return $questions;
		
    }
}
