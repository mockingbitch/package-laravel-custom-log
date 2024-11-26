@php use phongtran\Logger\app\Services\Definitions\LoggerDef; @endphp
@extends('logger.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Log List</h4>
                        <div class="col-md-3">
                            <div class="dropdown">
                                <button class="btn btn-light" type="button" id="dropdownMenuButton8" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> Select type </button>
                                <div class="dropdown-menu" aria-labelledby="">
                                    <h6 class="dropdown-header">Type of Log</h6>
                                    <a class="dropdown-item" href="#">Activity</a>
                                    <a class="dropdown-item" href="#">Information</a>
                                    <a class="dropdown-item" href="#">Warning</a>
                                    <a class="dropdown-item" href="#">Fatal</a>
                                    <a class="dropdown-item" href="#">Exception</a>
                                    <a class="dropdown-item" href="#">Debug</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Channel</th>
                                    <th>Content</th>
                                    <th>Level</th>
                                    <th>Log date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($logs as $item)
                                    <tr onclick="window.location.href='{{ route('log.detail', ['id' => $item->id]) }}'" style="cursor: pointer;">
                                        <td>{{$item->channel}}</td>
                                        <td>{{$item->message}}</td>
                                        <td>
                                            <label class="badge badge-{{LoggerDef::getLogBadgeLevel($item->level)}}">
                                                {{$item->level}}
                                            </label>
                                        </td>
                                        <td>{{$item->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <br />
                            {{ $logs->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
