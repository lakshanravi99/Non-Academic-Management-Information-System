<table>
    <thead>
    <tr>
        <th>EmpID</th>
        <th>User Name</th>
        <th>Arrival Time</th>
        <th>Leave Time</th>
        <th>Date</th>
        <th>Status</th>
        
    </tr>
    </thead>
    <tbody>
    @foreach($attendances as $attendance)
        <tr>
            <td>{{ $attendance->emp_id }}</td>
            <td>{{ $attendance->fname }}</td>
            <td>{{ $attendance->arrival_time }}</td>
            <td>{{ $attendance->leave_time }}</td>
            <td>{{ $attendance->date }}</td>
            <td>{{ $attendance->status }}</td>
            
        </tr>
    @endforeach
    </tbody>
</table>