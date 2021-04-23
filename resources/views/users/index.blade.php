@extends('layouts.master')

@section('content')

    <h1 class="mt-4 ml-8"> Benutzerliste</h1>
    <a type="button" href="{{ route('users.create') }}"
       class="ml-3 inline-flex items-center px-8 py-2 my-5 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Hinzufügen
    </a>
    @if(Session::has('message'))
        <div
            class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-100 bg-green-700 border border-green-700 ">
            <div slot="avatar">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-check-circle w-5 h-5 mx-2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            <div class="text-xl font-normal  max-w-full flex-initial">
                <div class="py-2">Sehr gut :)
                    <div class="text-sm font-base">{{Session::get('message')}}</div>
                </div>
            </div>
            <div class="flex flex-auto flex-row-reverse">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-x cursor-pointer hover:text-green-400 rounded-full w-5 h-5 ml-2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
            </div>
        </div>
    @endif
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex min-w-full flex-col my-2">
        <div class="my-2 min-w-full overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 min-w-full align-middle inline-block sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="divide-y divide-gray-200 min-w-full">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Größe
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Gehalt
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        <!-- Odd row -->

                        @if (count($users)>0)
                            @foreach ($users as $user)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{$user->email}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$user->height}} {{$user->unit}}               </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$user->pay}} {{$user->currency}}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <h2>No data</h2>
                        @endif


                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="mr-auto my-5">  {{ $users->links() }}</div>
@endsection
