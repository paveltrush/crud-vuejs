@foreach(app('common.flash_message')->all() as $type => $messages)
    @foreach($messages as $message)

        @if($type === 'danger')
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                <p class="font-bold">{{$message['title']}}</p>
                <p>{{$message['value']}}</p>
            </div>
        @endif

        @if($type === 'warning')
            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                <p class="font-bold">{{$message['title']}}</p>
                <p>{{$message['value']}}</p>
            </div>
        @endif

        @if($type === 'success')
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                <p class="font-bold">{{$message['title']}}</p>
                <p>{{$message['value']}}</p>
            </div>
        @endif

    @endforeach
@endforeach

