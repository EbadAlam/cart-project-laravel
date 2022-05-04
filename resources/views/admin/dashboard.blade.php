@extends('admin.layout.app')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin Panel
                        </h1>
                    </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                   <div class="panel-heading">
                      <div class="row">
                         <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                         </div>
                         <div class="col-xs-9 text-right">
                            <div class='huge'>{{ $user_count }}</div>
                            <div> Users</div>
                         </div>
                      </div>
                   </div>
                   <a href="{{ route('user') }}">
                      <div class="panel-footer">
                         <span class="pull-left">View Details</span>
                         <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                         <div class="clearfix"></div>
                      </div>
                   </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                   <div class="panel-heading">
                      <div class="row">
                         <div class="col-xs-3">
                            <i class="fa fa-table fa-5x"></i>
                         </div>
                         <div class="col-xs-9 text-right">
                            <div class='huge'>{{ $item_count }}</div>
                            <div> Items</div>
                         </div>
                      </div>
                   </div>
                   <a href="{{ route('item') }}">
                      <div class="panel-footer">
                         <span class="pull-left">View Details</span>
                         <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                         <div class="clearfix"></div>
                      </div>
                   </a>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection