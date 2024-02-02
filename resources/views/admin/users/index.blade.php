@extends('admin.layout')
@section('css')
@endsection

@section('content')

    <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
              <section class="card">
                <header class="card-header">All Users List</header>
                 <div class="card-body">

                <div class="adv-table">

                <table  class="display table table-bordered table-striped" id="dynamic-table">
                <thead>
                    <tr>
                        <th class="hidden-phone">Action</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach ($users as $item)
                        <tr class="gradeA">

                            <td class="center hidden-phone">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                    
                                        <a class="dropdown-item" href="{{URL::to('admin/users/edit/'.Crypt::encryptString($item->id))}}">Edit</a>
                                        <a class="dropdown-item" href="{{URL::to('admin/users/delete/'.Crypt::encryptString($item->id))}}">Delete</a>
                                    </div>
                                </div>
                            </td>
                            <td>{{$item->name}}</td>
                            <td> {{$item->email}}</td>
                            <td>{{$item->created_at}}</td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
              </div>
           </div>
          </section>
         </div>
       </div>
  @endsection

 @section('js')

    <script type="text/javascript" language="javascript" src="{{asset('admin/assets/advanced-datatable/media/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/assets/data-tables/DT_bootstrap.js')}}"></script>
    <script src="{{asset('/admin/js/dynamic_table_init.js')}}"></script>
    
@endsection