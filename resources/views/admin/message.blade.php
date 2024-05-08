@extends('admin.layout.main')
@section('main-section')


<div class="container col-md-8 mt-5 p-3  bg-light rounded-3 ">
    <div class="container p-1 mb-3  bg-white rounded-3 ">
        <h1 class="text-center p-1">Message Info</h1>  
    </div>
    <div class="container p-1 pt-0 pb-0 mt-2 bg-white rounded-3 ">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr class="">
                        <td class="fw-bold border-end" scope="row">Name</td>
                        <td>{{$contact->name}}</td>
                    </tr>
                    <tr class="">
                        <td class="fw-bold border-end" scope="row">Mobile Number</td>
                        <td><a class="text-decoration-none " href="tel:+91{{$contact->mobile_no}}">+91 {{$contact->mobile_no}} </a></td>
                    </tr>
                    <tr class="">
                        <td class="fw-bold border-end" scope="row">Email</td>
                        <td><a class="text-decoration-none" href="mailto:{{$contact->email}}">{{$contact->email}}</a></td>
                    </tr>
                    <tr class="">
                        <td class="fw-bold border-end" scope="row">Subject</td>
                        <td>{{$contact->subject}}</td>
                    </tr>
                    <tr class="">
                        <td class="fw-bold border-end" scope="row">Message</td>
                        <td>{{$contact->message}}</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
    <div class="container p-1 mt-3  bg-white rounded-3 ">
        <h1 class="text-center p-1">Reply to message</h1>  
    </div>
    <div class="container p-1 mt-3  bg-white rounded-3 ">
        <form action="{{url('/admin/message')}}/{{$contact->id}}" method="post">
            @csrf
            <div class="mb-3">
              <label for="message" class="form-label">Write Message</label>
              <textarea class="form-control" name="message" id="message" rows="3"></textarea>
            </div>
            @error('message')
            <p class="form-text text-danger">
                {{$message}}                
            </p>
            @enderror
                <input type="hidden" class="form-control" name="previousUrl" value="{{$previousUrl}}">
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary me-auto d-inline-block">Send Replay</button>
                <a name="" id="" class="btn btn-success d-inline-block" href="{{$previousUrl}}" role="button">Back to previous page</a>
              </div>
              
        </form>
    </div>
</div>

@endsection