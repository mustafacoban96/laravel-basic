@extends('admin.adminPage')


@section('admin')

    <div class="daily-plan-table">
        @if(session('success'))
            <div class="success-area">
                {{session('success')}}
            </div>
        @endif
        @php
            use App\Models\Appointment;
            use App\Models\AppointmentStatus;
        @endphp
        <table>
            <caption>Reservation Information</caption>
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
                                    @if (($current_time->diffInMinutes($worktime->start_time)) >= 45 && !($current_time->lt($worktime->start_time)))
                                        Zaman Aşımı
                                    @else
                                        @if (AppointmentStatus::where('appointment_id',$appointment->id)->exists())
                                           <form action="{{route('deleteAppointment')}}" method="POST">
                                                @csrf
                                                <button class="admin-cancel-appoint" type="submit"><input type="hidden" name="appointmentId[]" value="{{$appointment->id}}">&#x2715;</button>
                                           </form>
                                        @else
                                            <form action="{{route('adminAddAppointment')}}" method="POST">
                                                @csrf
                                                <button class="admin-add-appoint" type="submit"><input type="hidden" name="appointmentId[]" value="{{$appointment->id}}">Boş</button>
                                            </form>
                                        @endif
                                    
                                    @endif
                                </td>
                            @endif
                        @endforeach
                </tr>
            @endforeach
        </table>
        @if(session('cancel'))
        <div class="success-area">
            {{session('cancel')}}
        </div>
        @endif
    </div>
@endsection



