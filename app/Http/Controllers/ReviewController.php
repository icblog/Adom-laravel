<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Traits\HelperTrait;

class ReviewController extends Controller{
    use HelperTrait;
    public function index(){
        $pageIntro = "Latest reviews";
        return view('/review.index', ["pageIntro"=>$pageIntro]);
    }

    public function show(){


    }

    public function create(){


    }

    public function store(){



  //    return response()->json([
  //     'error' => [$this->returnGenericSystemErrMsg()],
  //     'action'=>$request->$action
  // ]);

    }

    public function checkUserReview(){

        $res = $this->checkIfReviewExist(Auth::user()->id);

        if($res['msg'] != "" && $res["data"] == 'error'){

            return response()->json([
              'error' => [$res['msg']],
              'action' => "",
              'data' => ''
          ]);
        }


        if($res['msg'] == "" && $res["data"] == false){

          return response()->json([
              'error' => "",
              'action' => "new-review",
              'data' => ''
          ]);
      }

      if($res['msg'] == "" && $res["data"] == true){

          return response()->json([
              'error' => "",
              'action' => "old-review",
              'data' => $res["userReview"]
          ]);
      }


  }

  public function userStore(Request $request){

      $validator = Validator::make($request->all(), [
        'star' => 'required|string',
        'comment'=>'required|string|max:6000'

    ]); 

      if ($validator->fails()) {
         return response()->json([
             'error' => $validator->errors()->all()
         ]);
         die();
      }//end if validation

      //Check action and saveor update review data in Db
try {

    if($request->action == "old-review"){
           Review::where('id', $request->reviewId)->update(['star' => $request->star,'comment' => $request->comment]);

                return response()->json([
                      "error"=>"",
                      "outcome" => true
                  ]);

           }else if($request->action == "new-review"){
              $review = new Review();
              $review->star = $request->star;
              $review->comment = $request->comment;
              $review->review_by = Auth::user()->id;
              $review->save();

                return response()->json([
                      "error"=>"",
                      "outcome" => true
                  ]);

           }else{
             return response()->json([
              'error' => [$this->returnGenericSystemErrMsg()],
              "outcome" => false
          ]);
        }//end if action

       
       } catch (\Exception $e) {

         return response()->json([
          'error' => [$this->returnGenericSystemErrMsg()],
          "outcome" => false
      ]);

     }


  }

}//End class
