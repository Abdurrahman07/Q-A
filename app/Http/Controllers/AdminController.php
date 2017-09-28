<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use Auth;
use Validator;
use DB;

class AdminController extends Controller
{
    //

    public function index () {

    	$users = User::all();
    	return view('admin.users.index', compact('users'));
    }

    public function edituser($name) {

    	$user = User::where('name', str_slug($name, ' '))->first();
    	return view('admin.users.edit', compact('user'));

    }

    public function updateuser (Request $request, $name ) {

    	$newpassword = $request->password;
    	$oldpassword = User::where('name', str_slug($name, ' '))->first()->password;

    	if($newpassword) {

    		$password = bcrypt($newpassword);
    	} else {

    		$password = $oldpassword;
    	}
    	
    	$rules = [

    		'name' => 'required',
    		'email' => 'required',

    	];

    	$validate = Validator::make($request->all(), $rules);

    	if($validate->passes()) {

    		// if user inserting a clean value so we will create a new record in db

    		User::create([

    			'name' => $request->name,
    			'email' => $request->email,
    			'password' => $password,


    			]);

    		return redirect('admin/users');
    	}
    }

    public function userprofile ($name) {

    	$user = User::where('name', str_slug($name, ' '))->first();
    	return view('admin.users.profile', compact('user'));
    }

    public function uquestions ($name) {

    	$user = User::where('name', str_slug($name, ' '))->first();
    	$questions = $user->answers()->get();

    	return view('admin.users.questions', compact('questions', 'user'));

    }

    public function adduser (Request $request) {

    	$rules = [

    		'name' => 'required',
    		'email' => 'required',
    		'password' => 'required',

    	];

    	$validate = Validator::make($request->all(), $rules);

    	if($validate->passes()) {

    		// if user inserting a clean value so we will create a new record in db

    		User::create([

    			'name' => $request->name,
    			'email' => $request->email,
    			'password' => bcrypt($request->password),


    			]);

    		return redirect('admin/users');
    	}
    }


    public function adduserform () {

    	return view('admin.users.add');
    }


    public function deleteuser ($name) {

    	//deleting user 
    	User::where('name', str_slug($name, ' '))->delete();

    	return redirect('admin/users');
    }



    /***************************
     *                         *
     * Questions Methods       *
     *                         *
     ***************************/

    public function questions () {

        $questions = Question::all();
        return view('admin.questions.index', compact('questions'));

    }

    public function addquestionform () {

        return view('admin.questions.add');
    }

    public function addquestion (Request $request) {

        $rules = [

            'question' => 'required',
            'answers' => 'required',
            'correct_answer' => 'required',

        ];

        $admin_id = Auth::guard('admin')->user()->id;

        $validate = Validator::make($request->all(), $rules);

        if($validate->passes()) {

            // if admin inserting a clean value so we will create a new record in db

            Question::create([

                'question' => $request->question,
                'answers' => json_encode($request->answers),
                'correct_answer' => $request->correct_answer,
                'admin_id' => $admin_id

                ]);

            return redirect('admin/questions');
        }
    }

    public function question ($name) {

        $question = Question::where('question', str_slug($name, ' '))->first();
        return view('admin.questions.profile', compact('question'));

    }

    public function editquestion ($name) {

        $question = Question::where('question', str_slug($name, ' '))->first();
        return view('admin.questions.edit', compact('question'));

    }

    public function updatequestion(Request $request , $name) {

        
        $rules = [

            'question' => 'required',
            'answers' => 'required',
            'correct_answer' => 'required',

        ];

        $validate = Validator::make($request->all(), $rules);
        $admin_id = Auth::guard('admin')->user()->id;

        if($validate->passes()) {

            // if admin inserting a clean value so we will update record in db
            $question = Question::where('question', str_slug($name, ' '))->first();
            $question->update([

                'question' => $request->question,
                'answers' => json_encode($request->answers),
                'correct_answer' => $request->correct_answer,
                'admin_id' => $admin_id


                ]);
            $question->save();

            return redirect('admin/questions');
        }

    }

    public function deletequestion ($name) {

        //deleting question 
        Question::where('question', str_slug($name, ' '))->delete();

        return redirect('admin/questions');

    }

    public function test () {

      /* SELECT * FROM users ORDER BY points DESC */
      $users = User::all()->sortByDesc('points')->take(5);
      return dump($users);

      
    }

    public function rest_points () {

        User::query()->update(['points' => 0]);

        return redirect()->back();
    }

    /**
     *
     *
     *
    */

}
