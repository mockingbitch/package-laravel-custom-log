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
                                <button
                                    class="btn btn-light"
                                    type="button"
                                    id="dropdownMenuButton8"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="true"
                                >
{{--                                    @if($currentChannel)--}}
{{--                                        {{LoggerDef::getLevel($currentChannel)}}--}}
{{--                                    @else--}}
{{--                                        Select Channel--}}
{{--                                    @endif--}}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="">
                                    <h6 class="dropdown-header">Log channel</h6>
{{--                                    <a class="dropdown-item" href="{{route('log.index')}}">--}}
{{--                                        *ALL--}}
{{--                                    </a>--}}
{{--                                    @foreach(LoggerDef::$type as $key => $value)--}}
{{--                                        <a--}}
{{--                                            class="dropdown-item"--}}
{{--                                            href="{{route('log.index')}}?channel={{$key}}"--}}
{{--                                        >--}}
{{--                                            {{LoggerDef::getLevel($key)}}--}}
{{--                                        </a>--}}
{{--                                    @endforeach--}}
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Channel</th>
                                    <th>Content</th>
                                    <th>Level</th>
                                    <th>Log date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($logs as $item)
                                    <tr onclick="window.location.href='{{ route('log.detail', ['id' => $item->id]) }}'" style="cursor: pointer;">
                                        <td>{{$item->id}}</td>
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
{{--                            {{ $logs->onEachSide(2)->links('pagination::bootstrap-5') }}--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
