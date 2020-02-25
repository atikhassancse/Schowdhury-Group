@extends('admin.layout.master_layout')

@section('title','Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="dashboard_item visitors">
                <div class="icon "><i class="fa fa-line-chart"></i></div>
                <div class="text"><strong>{{$page_views->total_page_views}}</strong><br><small>Total Pages View</small></div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6 sliders">
            <div class="dashboard_item">
                <div class="icon "><i class="fa fa-sliders"></i></div>
                <div class="text"><strong>{{$sliders}}</strong><br><small>Total Sliders</small></div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="dashboard_item products">
                <div class="icon "><i class="fa fa-product-hunt"></i></div>
                <div class="text"><strong>{{$products}}</strong><br><small>Total Products</small></div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="dashboard_item unread-message">
                <div class="icon"><i class="fa fa-eye-slash"></i></div>
                <div class="text"><strong>{{$newContacts->count()}}</strong><br><small>Total Unread Contact</small></div>
            </div>
        </div>
    </div>





    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>All New Contacts</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="slider-dataTables">
                            <thead>
                            <tr>

                                <th width="5%">Serial</th>
                                <th width="25%">Name</th>
                                <th width="25%">Email</th>
                                <th width="20%">Send At</th>
                                <th width="5%">Status</th>
                                <th width="15%" style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($newContacts as $key => $contact)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->created_at}}</td>
                                    <td>
                                        @if($contact->status == false)

                                            <span class="btn btn-danger"><i class="fa fa-eye-slash"></i></span>
                                        @else
                                            <span class="btn btn-primary"><i class="fa fa-eye"></i></span>
                                        @endif

                                    </td>
                                    <td style="text-align: center">
                                        <a href="{{route('contact.show',$contact->id)}}" class="btn  btn-primary"><i class="fa fa-eye"></i></a>
                                        <a href="" class="btn  btn-danger" onclick="confirmDelete()"><i class="fa fa-trash-o"></i></a>

                                        <form style="display: none" action="{{route('contact.destroy',$contact->id)}}" id="{{'delete-form-'.$contact->id}}" method="post">
                                            @csrf
                                            @method('DELETE')

                                        </form>

                                        <script>
                                            function confirmDelete(){
                                                if (confirm("Do you Want TO Delete?")){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{$contact->id}}').submit();
                                                }
                                            }

                                        </script>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>
    <!-- /. ROW  -->

@endsection
