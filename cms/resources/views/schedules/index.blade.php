@extends('theme.main')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Manajemen Jadwal Tugas Kuliah</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('schedules.create') }}"> Create New Schedule</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Desc</th>
            <th>Date</th>
            <th>Time</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($schedules as $schedule)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $schedule->title }}</td>
            <td>{{ $schedule->desc }}</td>
            <td>{{ $schedule->date }}</td>
            <td>{{ $schedule->time }}</td>
            <td>
                <form action="{{ route('schedules.destroy',$schedule->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('schedules.show',$schedule->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('schedules.edit',$schedule->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
    {!! $schedules->links() !!}

@endsection
