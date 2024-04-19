<table class="table">
    <thead>
    <tr>
        <th>Blood Group</th>
        <th>Donor's name</th>
        <th>Contact</th>
        <th>District</th>
        <th>City</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($donors as $donor)
    <tr>
        <td>{{ $donor->bgroup->bgroup }}</td>
        <td>{{  $donor->donor_name }}</td>
        <td>{{ $donor->contact }}</td>
        <td>{{ $donor->city->district->district_name }}</td>
        <td>{{ $donor->city->city_name }}</td>
        <td>
        <a class="donor-destroy" href="javascript:void(0);" data-id="{{ $donor->id }}"><i class="mdi mdi-delete"></i></a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<script>
    $('.donor-destroy').click(function(event){
        event.preventDefault();
        var donorId=$(this).data('id');
        if(confirm('Are you sure you want to delete this city')){
            $.ajax({
                url:"{{url('/donordelete')}}/" + donorId,
                type:'GET',
                success:function(response){
                    $('donor-delete').delay(3000).slideUp(300).show();
                    donorTable();
                },
                error:function(xhr,status,error){
                    console.error(xhr.responseText);
                }
            })
        }
        
    })
    function donorTable()
        {
        $.ajax({
            type: 'POST',
            url: "{{url('/donortable')}}",
            
            success: function (response){
            $('.donor-table').html(response);
            },
            error: function (xhr, status, error){
            var errorMessage = xhr.responseJSON.message;
            alert(errorMessage);
            }
        });
        }
</script>