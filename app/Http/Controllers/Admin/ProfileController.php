<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\HistoryProfile;
use Carbon\Carbon;
class ProfileController extends Controller
{
    //
     public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    { 
      // 以下を追記
      // Varidationを行う
      $this->validate($request, Profile::$rules);
      
      $profile = new Profile;
      $form = $request->all();
      
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      
      // データベースに保存する
      $profile->fill($form);
      $profile->save();
      
      return redirect('admin/profile/create');
    }

    public function edit(Request $request)
    {
        // Profile Modelからデータを取得する
      $profile = Profile::find($request->id);
      
      return view('admin.profile.edit', ['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
        unset($news_form['_token']);
        $profile->fill($news_form)->save();

        // 以下を追記
        $history_profile = new HistoryProfile();
        $history_profile->profile_id = $profile->id;
        $history_profile->edited_at = Carbon::now();
        $history_profile->save();

        return redirect('admin/profile/');
    }
}