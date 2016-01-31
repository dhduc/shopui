@extends('layouts.admin.master')
@section('css')
    <link href="<?php echo url("/"); ?>/../theme/assets/global/plugins/icheck/skins/all.css" rel="stylesheet">
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ URL::action('Admin\PermissionController@index') }}" method="Post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-check-square fa-lg"></i>Management Permission
                        </div>
                        <div class="actions btn-set">
                            <button class="btn green" type="submit"><i class="fa fa-check"></i> Update</button>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>
                                    Routes
                                </th>
                                <?php
                                    echo $allRoles;
                                ?>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                        echo $tableRoute;
                                ?>
                            </tbody>
                        </table>
            </form>


        </div>
    </div>
@stop
