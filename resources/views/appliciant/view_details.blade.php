<h2>Application</h2>

@foreach($data as $field)
							

    Appliciant_id = {{$field->appliciant_id}}<br>
    fname= {{$field->fname}}<br>
    mname= {{$field->mname}}<br>
    lname= {{$field->lname}}<br>
    gender= {{$field->gender}}<br>
    civil_status= {{$field->civil_status}}<br>
    
  
    current_mobile= {{$field->current_mobile}}<br>
    permenant_mobile= {{$field->permenant_mobile}}<br>
    police_division= {{$field->police_division}}<br>
    email= {{$field->email}}<br>
    dob= {{$field->dob}}<br>
    age_as_at_closing_date= {{$field->age_as_at_closing_date}}<br>
    citizenship= {{$field->citizenship}}<br>
    nic= {{$field->nic}}<br>
    driving_licen_no= {{$field->driving_licen_no}}<br>
    driving_licen_issuing_date= {{$field->driving_licen_issuing_date}}<br><br>
                            
@endforeach	

<a href="{{route('temp_user_dashbord')}}">Edit details</a>


