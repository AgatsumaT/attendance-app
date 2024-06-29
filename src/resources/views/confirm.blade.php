@extends('layouts.app')



@section('content')

<div class="header__wrap">
    @csrf
    <button class="date__change-button" name="prevDate">
        < < /button>
            <input type="hidden" name="displayDate" value="{{ $displayDate }}">
            <p class="header__text">{{ $displayDate->format('Y-m-d') }}</p>
            <button class="date__change-button" name="nextDate">
                >
            </button>
</div>

<div class="search__item">
    <input class="search__input" type="text" name="search_name" placeholder="名前検索" value="{{ $searchParams['name'] ?? '' }}" list="user_list">
        <datalist id="user_list">
            @if($userList)
                @foreach($userList as $user)
                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                @endforeach
            @endif
        </datalist>
    <button class="search__button">検索</button>
</div>

<div class="table__wrap">
    <table class="attendance__table">
        <tr class="table__row">
            <th class="table__header">名前</th>
            <th class="table__header">勤務開始</th>
            <th class="table__header">勤務終了</th>
            <th class="table__header">休憩時間</th>
            <th class="table__header">勤務時間</th>
        </tr>
        @foreach ($users as $user)
        <tr class="table__row">
            <td class="table__item">{{ $user->name }}</td>
            <td class="table__item">{{ $user->punchin }}</td>
            <td class="table__item">{{ $user->punchout }}</td>
            <td class="table__item">{{ $user->total_rest }}</td>
            <td class="table__item">{{ $user->total_work }}</td>
        </tr>
        @endforeach
    </table>
</div>

@endsection