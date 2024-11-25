@extends('logger.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Activity Logs</h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Channel</th>
                                        <th>Level</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Log date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Jacob</td>
                                        <td>Photoshop</td>
                                        <td class="text-danger"> 28.76% <i class="ti-arrow-down"></i></td>
                                        <td><label class="badge badge-danger">Pending</label></td>
                                        <td>2024/08/08 17:09:12</td>
                                        <td>View</td>
                                    </tr>
                                    <tr>
                                        <td>Messsy</td>
                                        <td>Flash</td>
                                        <td class="text-danger"> 21.06% <i class="ti-arrow-down"></i></td>
                                        <td><label class="badge badge-warning">In progress</label></td>
                                        <td>2024/08/08 17:09:12</td>
                                        <td>View</td>
                                    </tr>
                                    <tr>
                                        <td>John</td>
                                        <td>Premier</td>
                                        <td class="text-danger"> 35.00% <i class="ti-arrow-down"></i></td>
                                        <td><label class="badge badge-info">Fixed</label></td>
                                        <td>2024/08/08 17:09:12</td>
                                        <td>View</td>
                                    </tr>
                                    <tr>
                                        <td>Peter</td>
                                        <td>After effects</td>
                                        <td class="text-success"> 82.00% <i class="ti-arrow-up"></i></td>
                                        <td><label class="badge badge-success">Completed</label></td>
                                        <td>2024/08/08 17:09:12</td>
                                        <td>View</td>
                                    </tr>
                                    <tr>
                                        <td>Dave</td>
                                        <td>53275535</td>
                                        <td class="text-success"> 98.05% <i class="ti-arrow-up"></i></td>
                                        <td><label class="badge badge-warning">In progress</label></td>
                                        <td>2024/08/08 17:09:12</td>
                                        <td>View</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
