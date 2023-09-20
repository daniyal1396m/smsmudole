@extends('master')
@section('title','Settings')
@section('content')
    <form action="{{route('sms::post.setting')}}" method="post" class="mt-5">
        @csrf
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form6Example1">sender</label>

                    <input type="text" id="form6Example1" class="form-control" name="sender"
                           value="{{setting()['sender']}}"/>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form6Example2">username</label>

                    <input type="text" id="form6Example2" class="form-control" name="username"
                           value="{{setting()['username']}}"/>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form6Example3">password</label>
                    <input type="text" id="form6Example3" class="form-control" name="password"
                           value="{{setting()['password']}}"/>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form6Example4">default message</label>
                    <input type="text" id="form6Example4" class="form-control" name="default"
                           value="{{setting()['default']}}"/>
                </div>
            </div>

        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Save Settings</button>
    </form>
@endsection
