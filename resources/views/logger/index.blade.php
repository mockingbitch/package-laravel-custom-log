@php use phongtran\Logger\app\Services\Definitions\LoggerDef; @endphp
@extends('logger.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Log List</h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Channel</th>
                                    <th>Message</th>
                                    <th>Level</th>
                                    <th>Log date</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($logs as $item)
                                        <tr>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
