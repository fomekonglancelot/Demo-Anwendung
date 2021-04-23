@extends('layouts.master')

@section('content')
    <div class="flex justify-content-between pb-5">
        <h1 class="text-2xl mt-8 ml-8"> Create User</h1>
    </div>

    <div class="bg-white shadow-md  rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <form class="mt-8"  action="{{route('users.store')}}" method="POST">
            @csrf
            <input-component
                type="text"
                name="email"
                error="@error('email')  {{ $message }} @enderror"
                placeholder="Email Adresse eingeben"
                validations="required|email"
                disabled="false">
            </input-component>

            <input-component
                type="password"
                name="password"
                error="@error('password') {{ $message }} @enderror"
                placeholder="Password eingeben"
                disabled="false">
            </input-component>
            <input-height-component
                type="number"
                name="height"
                error="@error('height') {{ $message }} @enderror"
                placeholder="Größe eingeben"
                validations="required|numeric"
                disabled="false">
            </input-height-component>

            <input-pay-component
                type="number"
                name="pay"
                error="@error('pay') {{ $message }} @enderror"
                placeholder="Gehalt eingeben"
                validations="required|numeric"
                disabled="false">
            </input-pay-component>

            <div class="mt-8 rounded-md sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                <button type="submit" class="px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    create
                </button>
            </div>
        </form>

    </div>

@endsection
