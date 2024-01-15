@extends('./layouts/main')

@section('content')

    <div class="space-y-12 p-4">

        <h1 class="text-2xl text-center p-4">
            {{__('Note')}} {{$note['id']}}
        </h1>

        <div class="mt-6">

            <a href="{{route('notes.index')}}" class="text-blue-800">
                Back to notes
            </a>

            <div class="mt-6">
                <p><strong>Target (ID)</strong></p>
                <p>{{ $note['target_type'] }}({{ $note['target_id'] }})</p>
                <hr/>
                <p><strong>Body</strong></p>
                <p>{{$note['body']}}</p>
            </div>

        </div>

    </div>

@endsection
