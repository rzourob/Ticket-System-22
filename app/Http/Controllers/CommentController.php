<?php

namespace App\Http\Controllers;

use App\Models\Comment\Comment;
use App\Models\Maintenance\MaintenanceRequest;
use App\Models\User;
use App\Notifications\NewCommentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $maintenancerequests = MaintenanceRequest::first();

        // $comments = Comment::get();
        $users = User::get();

        // $departments = Department::where('active', true)->get();
        // $devices = Device::where('active', true)->get();
        return response()->view('users.request_maintenances_It.cmment',['maintenancerequests'=>$maintenancerequests, 'users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        // dd($request->all());

        $validator = Validator($request->all(), [

            // 'title' => 'required| string|min:3| max:35',
            'body' => 'required| string|min:3| max:100',
            // 'newLocation' => 'required'

        ], [


               'body.required' => 'الرجاء أضافة تعليق على طلب الصيانة ',
            //    'body.required' => 'الرجاء ادخال اسم القسم باللغة الانجيلزية',
            //    'newLocation.required' => 'الرجاء تحديد حالة التذكرة',

        ]);


        if (!$validator->fails()) {

           $comments = new Comment();
           $comments->maintenancerequest_id = $request->get('maintenancerequest_id');
        //    $comments->user_id = $request->get('user_id');
           $comments->body = $request->get('body');
           $comments->new_status = $request->get('new_status');   
           $comments->Created_by  = Auth::user()->name;
           $isSaved = $comments->save();

            //  $user = $comments->user;

            //  dd($isSaved);

            if($isSaved){

                auth()->user()->notify(new NewCommentNotification($comments));

                // $sss =$comments->maintenancerequest->author_email->get();

                // $sss->notify(new NewCommentNotification($comments));
            }
            

            return response()->json(['message' => $isSaved ? "تم أضافة الرد بنجاح" : "فشل أضافة الرد"], $isSaved ? 201 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        //    return response()->json(['message' => "Failed to save"], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        // $isDeleted = Comment::destroy($id);

        // $isDeleted = $comment

        $comments =Comment::findOrFail($id);

        $isDeleted = $comments->delete();

        // $isDeleted = comment::where('id', $id)->first()->delete();
        // return response()->json(['message' => $isDeleted ? "تم حذف التعليق " : "فشل حذف التعليق"], $isDeleted ? 200 : 400);
           return response()->json(['message' => $isDeleted ? "تم حذف التعليق " : "فشل حذف التعليق"], 400);


    }
}



