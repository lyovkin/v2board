@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Users</h3>

                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span>
                        Filter
                    </button>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr class="filters">
                    <th><input type="text" class="form-control" placeholder="#" disabled></th>
                    <th><input type="text" class="form-control" placeholder="First Name" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Last Name" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Username" disabled></th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>
                        <a class='btn btn-info btn-xs' href="#"><i class="fa fa-pencil"></i> Edit</a>
                        <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Del</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>
                        <a class='btn btn-info btn-xs' href="#"><i class="fa fa-pencil"></i> Edit</a>
                        <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Del</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>
                        <a class='btn btn-info btn-xs' href="#"><i class="fa fa-pencil"></i> Edit</a>
                        <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Del</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
