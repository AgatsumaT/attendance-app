@extends('layouts.app')



@section('content')
<div class="header__wrap">
    <p class="header__text">
        {{ \Auth::user()->name }}さんお疲れ様です！
    </p>
</div>

<div class="button-form">
    <ul>
        <li>
            <form action="{{ route('timestamp/punchin') }}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="btn-punchin">勤務開始</button>
            </form>
        </li>
        <li>
            <form action="{{ route('timestamp/punchout') }}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="btn-punchout">勤務終了</button>
            </form>
        </li>

        <li>
            <form action="{{ route('breakstamp/breakin') }}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="btn-breakin">休憩開始</button>
            </form>
        </li>
        <li>
            <form action="{{ route('breakstamp/breakout') }}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="btn-breakout">休憩終了</button>
            </form>
        </li>

    </ul>
</div>

@endsection