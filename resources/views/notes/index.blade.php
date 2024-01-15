@extends('layouts/main')

@section('content')

    <div class="space-y-12 p-4">

        <h1 class="text-2xl text-center p-4">
            {{__('Notes')}}
        </h1>

        <div class="w-full pr-2">
            <form action="{{route('notes.create')}}" method="POST">
                @csrf
                <button type="submit" class="block text-white bg-blue-800 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                    {{__('Create a note')}}
                </button>
            </form>
        </div>

        <div class="mt-6">

            @if(!empty($notes))

                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50">
                                {{__('Target Type (ID)')}}
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50">
                                {{__('Body')}}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($notes as $note)
                            <tr class="border-b border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                                    {{$note['id']}} -
                                    {{ $note['target_type'] }}({{ $note['target_id'] }})

                                    <form action="{{route('notes.destroy', ['id' => $note['id']])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="block text-gray-900 bg-white text-center border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-2">
                                            {{__('x')}}
                                        </button>
                                    </form>

                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                                    <a href="{{route('notes.show', ['id' => $note['id']])}}" class="text-blue-800 ">
                                        {{ $note['body'] }}
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>

    </div>

@endsection
