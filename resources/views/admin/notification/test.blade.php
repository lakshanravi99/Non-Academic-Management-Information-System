
@php
    $tot_count;
    
@endphp
@foreach(sendAdminActiveNotifications() as $item)
    @foreach($item as $admin_activated_notification)
        $tot_count++;
    @endforeach	
@endforeach