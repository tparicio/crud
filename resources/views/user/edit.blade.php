@extends('layouts.main')

@section('content')
    @parent

    <h1>
        <i class="fa fa-sync"></i>
        {{ __('Edit user') }}
    </h1>

    <hr/>

    <form action="/user/update" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input type="hidden" name="id" value="{{ $user->id }}">

        <div class="col-md-5 col-sm-12 mb-3">
          <label for="validationTooltipUsername">{{ __('Username') }}</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="validationTooltipUsernamePrepend">
                  <i class="fa fa-user-circle"></i>
              </span>
            </div>
            <input type="text"
                   class="form-control"
                   id="validationTooltipUsername"
                   name="username"
                   placeholder="Username"
                   aria-describedby="validationTooltipUsernamePrepend"
                   value="{{ $user->username }}"
                   required>
            <div class="invalid-tooltip">
              {{ __('Please choose a unique and valid username.') }}
            </div>
          </div>
        </div>

        <div class="row mb-3 mx-0">
            <div class="col-md-5 col-sm-12 mb-3">
                <label for="validationTooltipPassword">{{ __('Password') }}</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="validationTooltipPasswordPrepend">
                        <i class="fa fa-key"></i>
                    </span>
                  </div>
                  <input type="password"
                         class="form-control"
                         id="validationTooltipPassword"
                         name="password"
                         placeholder="{{__('Password')}}"
                         aria-describedby="validationTooltipPasswordPrepend">
                  <div class="invalid-tooltip">
                    {{ __('Please choose a password.') }}
                  </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12 mb-3">
                <label for="validationTooltipRepeatPassword">{{ __('Repeat Password') }}</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="validationTooltipRepeatPasswordPrepend">
                        <i class="fa fa-key"></i>
                    </span>
                  </div>
                  <input type="password"
                         class="form-control"
                         id="validationTooltipRepeatPassword"
                         name="password_repeat"
                         placeholder="{{__('Repeat password')}}"
                         aria-describedby="validationTooltipRepeatPasswordPrepend">
                  <div class="invalid-tooltip">
                    {{ __('Please repeat password') }}
                  </div>
                </div>
            </div>
        </div>

        <div class="row mb-3 mx-0">
            <div class="col-md-5 col-sm-12">
              <label for="validationTooltipFirstName">{{ __('First Name') }}</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="validationTooltipUsernamePrepend">
                      <i class="fa fa-user"></i>
                  </span>
                </div>
                <input type="text"
                        class="form-control"
                        id="validationTooltipFirstName"
                        name="name"
                        placeholder="{{ __('First Name') }}"
                        value="{{ $user->name }}"
                        aria-describedby="validationTooltipFirstNamePrepend"
                        required>
                <div class="invalid-tooltip">
                  {{ __('Please choose a valid first name.') }}
                </div>
              </div>
            </div>

            <div class="col-md-5 col-sm-12">
              <label for="validationTooltipLastName">{{ __('Last Name') }}</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="validationTooltipLastNamePrepend">
                      <i class="far fa-user"></i>
                  </span>
                </div>
                <input type="text"
                       class="form-control"
                       id="validationTooltipLastName"
                       name="last_name"
                       placeholder="{{ __('Last Name') }}"
                       value="{{ $user->last_name }}"
                       aria-describedby="validationTooltipLastNamePrepend"
                       required>
                <div class="invalid-tooltip">
                  {{ __('Please choose valid last name.') }}
                </div>
              </div>
            </div>
        </div>

        <div class="col-md-5 col-sm-12 mb-3">
          <label for="validationTooltipEmail">{{ __('Email') }}</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="validationTooltipEmailPrepend">
                  @
              </span>
            </div>
            <input type="email"
                   class="form-control"
                   id="validationTooltipEmail"
                   name="email"
                   placeholder="{{ __('Email') }}"
                   value="{{ $user->email }}"
                   aria-describedby="validationTooltipUsernamePrepend"
                   required>
            <div class="invalid-tooltip">
              {{ __('Please enter a valid email.') }}
            </div>
          </div>
        </div>

        <div class="col-md-5 col-sm-12 mb-3">
          <label for="validationTooltipCountryPrepend">{{ __('Country') }}</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="validationTooltipCountryPrepend">
                  <i class="fa fa-globe"></i>
              </span>
            </div>
            <select class="form-control"
                    id="countrySelector"
                    name="country"
                    aria-describedby="validationTooltipCountryPrepend"
                    required>
                @foreach($countries as $country)
                    <option value="{{ $country->alpha2 }}"
                            @if ($country->alpha2 == $user->country)
                                {{ "selected" }}
                            @endif
                            >
                        {{ $country->langES }}
                    </option>
                @endforeach
            </select>
            <div class="invalid-tooltip">
              {{ __('Please enter a valid email.') }}
            </div>
          </div>
        </div>

        <div class="col-md-10 col-sm-12 mb-3">
          <label for="validationTooltipDescription">{{ __('Description') }}</label>
          <div class="input-group">
            <textarea id="description" name="description" class="tiny">
                {{ $user->description }}
            </textarea>
            <div class="invalid-tooltip">
              {{ __('Please enter a valid email.') }}
            </div>
            <p class="help-block">
                <i class="fa fa-comments"></i>
                {{ __('Tell us anything about yourself!') }}
            </p>
          </div>
        </div>

        <div class="text-center">
            <a class="btn btn-default" href="/">{{ __('Cancel') }}</a>
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </div>

    </form>
@endsection
