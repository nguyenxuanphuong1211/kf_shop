@extends('admin.master')
@section('content')
	<div class="container-fluid">
	    <!-- Breadcrumbs-->
	    <ol class="breadcrumb">
	        <li class="breadcrumb-item">
	            <a href="#">Dashboard</a>
	        </li>
	        <li class="breadcrumb-item active">User</li>
	    </ol>
	    <!-- Example DataTables Card-->
	    <div class="card mb-3">
	        <div class="card-header">
	            <i class="fa fa-table"></i> List of user </div>
	        <div class="card-body">
	            <div class="table-responsive">
	                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                    <thead>
	                        <tr>
	                            <th>#</th>
	                            <th>Name</th>
	                            <th>Email</th>
	                            <th>Roles</th>
	                            <th>Change Roles</th>
	                        </tr>
	                    </thead>
	                    <tfoot>
	                        <tr>
	                            <th>#</th>
	                            <th>Name</th>
	                            <th>Email</th>
	                            <th>Roles</th>
	                            <th>Change Roles</th>
	                        </tr>
	                    </tfoot>
	                    <tbody>
	                        @foreach($users as $index=> $user)
	                        <tr>
	                            <td>{{ $index+1 }}</td>
	                            <td>{{ $user->name }}</td>
	                            <td>{{ $user->email }}</td>
	                            <td>
	                            	@if(($user->roles)==1) Admin @endif
                               		@if(($user->roles)==0) User @endif
                               	</td>                
	                            <td>
	                                <a href="{{url('admin-shop/user/change_roles/'.$user->id)}}"><i class="fa fa-edit"></i> Edit</a>
	                                
	                            </td>
	                        </tr>
	                        @endforeach
	                    </tbody>
	                </table>
	            </div>
	        </div>
	    </div>
	</div>
@stop