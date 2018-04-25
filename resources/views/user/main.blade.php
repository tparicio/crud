@extends('layouts.main')

@section('content')
    @parent

    <a class="btn btn-dark float-right" href="{{ url('/user/add') }}">
        <i class="fa fa-plus"></i>
        {{ __('Add User') }}
    </a>

    <h1>
        <i class="fa fa-file-alt"></i>
        {{ __('Users') }}
    </h1>

    <hr/>

    <table class="table table-bordered table-responsive" id="users-table">
        <thead>
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Username') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Last Name') }}</th>
                <th>{{ __('Country') }}</th>
                <th>{{ __('Updated At') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>
    </table>

    <div id="confirm_delete" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">{{__('Confirm delete')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>{{__('Are you sure you want delete this user?')}}</p>
            <p>{{__('ID')}}: <span id="id_replace"></span></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
            <a id="action_delete"
                href=""
                type="button"
                class="btn btn-primary"
                data-url="{{ url('/user/delete') }}">
                {{__('Delete')}}
            </a>
          </div>
        </div>
      </div>
    </div>
@endsection
