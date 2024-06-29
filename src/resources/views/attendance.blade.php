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
                <div class="form__item">
                    {{-- @if($status == 0) --}}
                    <button class="form__item-button" type="submit" name="btn-punchin">勤務開始</button>
                    {{-- @else
                    <button class="form__item-button" type="submit" name="btn-punchin" disabled>勤務開始</button>
                    @endif --}}
                </div>
            </form>
        </li>
        <li>
            <form action="{{ route('timestamp/punchout') }}" method="POST">
                @csrf
                @method('POST')
                <div class="form__item">
                    {{-- @if($status == 1) --}}
                    <button class="form__item-button" type="submit" name="btn-punchout">勤務終了</button>
                    {{-- @else
                    <button class="form__item-button" type="submit" name="btn-punchout" disabled>勤務終了</button>
                    @endif --}}
                </div>
            </form>
        </li>

        <li>
            <form action="{{ route('breakstamp/breakin') }}" method="POST">
                @csrf
                @method('POST')
                <div class="form__item">
                    {{-- @if($status == 1) --}}
                    <button class="form__item-button" type="submit" name="btn-breakin">休憩開始</button>
                    {{-- @else
                    <button class="form__item-button" type="submit" name="btn-breakin" disabled>休憩開始</button>
                    @endif --}}
                </div>
            </form>
        </li>
        <li>
            <form action="{{ route('breakstamp/breakout') }}" method="POST">
                @csrf
                @method('POST')
                <div class="form__item">
                    {{-- @if($status == 2) --}}
                    <button class="form__item-button" type="submit" name="btn-breakout">休憩終了</button>
                    {{-- @else
                    <button class="form__item-button" type="submit" name="btn-breakout" disabled>休憩終了</button>
                    @endif --}}
                </div>
            </form>
        </li>

    </ul>
</div>

@endsection