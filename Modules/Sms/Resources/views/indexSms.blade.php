@extends('master')
@section('title','Send Message')
@section('content')
    <form action="{{route('sms::post.sms')}}" method="post" class="mt-5">
        @csrf
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form6Example1">mobile_number</label>
                    <input type="text" id="form6Example1" class="form-control" name="mobile_number"
                           placeholder="Valid Mobile Number" value="{{old('mobile_number')}}"/>
                </div>
                @if($errors->has('mobile_number'))
                    <div class="text-danger">{{ $errors->first('mobile_number') }}</div>
                @endif
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form6Example2">message</label>

                    <input type="text" id="form6Example2" class="form-control"
                           placeholder="Default Message is : {{setting()['default']}}" name="message"
                           value="{{old('message')}}"/>

                    @if($errors->has('message'))
                        <div class="text-danger">{{ $errors->first('message') }}</div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Send Message</button>
    </form>
@endsection
