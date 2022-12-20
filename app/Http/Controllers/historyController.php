<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\history;
use App\Models\Task;

class historyController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $tasks = Task::where('status', true)->get();

    return view('history.index', compact('tasks'));
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store($id)
  {
    //
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {

    //「編集する」ボタンをおしたとき
    if ($request->status === null) {
      $rules = [
        'task_name' => 'required|max:100',
      ];

      $messages = ['required' => '必須項目です', 'max' => '100文字以下にしてください。'];

      Validator::make($request->all(), $rules, $messages)->validate();


      //該当のタスクを検索
      $task = Task::find($id);

      //モデル->カラム名 = 値 で、データを割り当てる
      $task->name = $request->input('task_name');

      //データベースに保存
      $task->save();
    } else {
      //「完了」ボタンを押したとき

      //該当のタスクを検索
      $task = Task::find($id);

      //モデル->カラム名 = 値 で、データを割り当てる
      $task->status = false; //true:完了、false:未完了

      //データベースに保存
      $task->save();
    }


    //リダイレクト
    return redirect('/tasks');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
