@extends('admin.adminPage')





@section('admin')
    
    <h2 style="color: aliceblue">Gunluk plan</h2>
    <div class="daily-plan-table">
        @php
            use App\Models\Appointment;
            use App\Models\AppointmentStatus;
        @endphp
        <table>
            <tr>
                <th>Start Time</th>
                <th>End Time</th>
                @foreach ($employees as $employee)
                    <th>{{$employee->name}}</th>
                @endforeach
            </tr>
            
            @foreach ($worktimes as $worktime)
                <tr>
                    <td>{{$worktime->start_time}}</td>
                    <td>{{$worktime->end_time}}</td>
                    
                        @foreach ($appointments as $appointment)
                            @if ($appointment->worktime_id == $worktime->id)
                                <td>
                                    {{$appointment->id}}
                                    
                                </td>
                            @endif
                        @endforeach
                    
                </tr>
            @endforeach
            
        </table>
    </div>
@endsection



