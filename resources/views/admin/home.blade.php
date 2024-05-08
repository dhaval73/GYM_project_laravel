@extends('admin.layout.main')
@section('main-section')
    

    <div class="container col-md-9 mt-5 bg-light rounded-3 p-2">
        <h1 class="text-center">Messages</h1>
    </div>
    
        <div class="container col-md-9 mt-2 bg-light rounded-3 p-2 d-flex flex-wrap">
            <a name="" id="" class="btn btn-success me-2 @if ($show==null) active @endif" href="{{url('/admin/home/')}}" role="button">All</a>
            <a name="" id="" class="btn btn-success me-2 @if ($show==2) active @endif" href="{{url('/admin/home/2')}}" role="button">Unread</a>
            <a name="" id="" class="btn btn-success me-2 @if ($show==1) active @endif" href="{{url('/admin/home/1')}}" role="button">Read</a>
            <a name="" id="" class="btn btn-danger me-2 @if ($show==3) active @endif" href="{{url('/admin/home/3')}}" role="button">Trash bin</a>
            <form class="d-flex my-2 my-lg-0 ms-auto " action="" method="GET">
                <input class="form-control my-2 my-sm-0 me-2" name="search_query" type="search" placeholder="Search" value="{{$search}}" >
                <button class="btn btn-outline-success my-2 my-sm-0 me-2" type="submit">Search</button>
                <a name="" id="" class="btn btn-primary my-2 my-sm-0 me-2" href="{{url()->current()}}" role="button">Reset</a>
            </form>
        </div>
        <div class="container col-md-9 mt-2 bg-light rounded-3 p-2">
        <div class="table-responsive">
            <table
                class="table table-striped table-hover table-borderless table-primary align-middle">
                <thead class="table-light">
                    {{-- <caption>Table Name</caption> --}}
                    <tr>
                        <th>Sr. No</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @php
                        $sr_no=1;
                    @endphp
                    @foreach ($contacts as $contact)
                    <tr class="table" id="c{{$contact->id}}">
                        <td scope="row">{{$sr_no++}}</td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->subject}}</td>
                        <td><a href="tel:+91{{$contact->mobile_no}}" class="text-decoration-none">+91 {{$contact->mobile_no}}</a></td>
                        <td>
                            @if ($show==3) 
                            <a name="" id="" class="btn btn-primary" href="{{url('/admin/messagedelete/0')}}/{{$contact->id}}" role="button">Restore</a>
                            <a name="" id="" class="btn btn-danger" href="{{url('admin/messagedelete/1')}}/{{$contact->id}}" role="button">Delete</a>
                            @else
                            @if ($contact->mark_as_read)
                            <a name="" id="" class="btn btn-success" href="{{url('admin/messagemarkasread/0')}}/{{$contact->id}}" role="button">Mark Unread</a>
                            @else
                            <a name="" id="" class="btn btn-success" href="{{url('admin/messagemarkasread/1')}}/{{$contact->id}}" role="button">Mark as read</a>
                            @endif
                            <a name="" id="" class="btn btn-primary" href="{{url('/admin/message')}}/{{$contact->id}}" role="button">More</a>
                            <a name="" id="" class="btn btn-danger" href="{{url('admin/messagetrash/')}}/{{$contact->id}}" role="button">Trash</a>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
                <tfoot>

                </tfoot>
            </table>
            <div class="row d-flex ">
                {{-- {{ $contacts->links() }} --}}
                {{ $contacts->appends(request()->input())->links()}}
        </div>
        </div>

    </div>
 
    @endsection