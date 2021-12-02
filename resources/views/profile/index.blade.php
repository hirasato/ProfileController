@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <h4>(氏名)</h4>
                                <div class="name">
                                    {{ str_limit($post->name, 20) }}
                                </div>
                                <h4>(性別)</h4>
                                <div class="gender">
                                    {{ str_limit($post->gender,20) }}
                                </div>
                                <h4>(趣味)</h4>
                                <div class="hobby">
                                    {{ str_limit($post->hobby, 20) }}
                                </div>
                                <h4>(自己紹介)</h4>
                                <div class="introduction">
                                    {{ str_limit($post->introduction, 200) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection