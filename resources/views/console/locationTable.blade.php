<table class="table">
    <thead>
        <tr>
        <th>No</th>
        <th>District</th>
        <th>City</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($cities as $index => $city)
        <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $city->district->district_name }}</td>
        <td>{{ $city->city_name }}</td>
        <td>
            <a class="loc-destroy" href="javascript:void(0);" data-id="{{ $city->id }}"><i class="mdi mdi-delete"></i></a>
        </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $cities->links() }}
<script>
    $(".loc-destroy").click(function(event){
        event.preventDefault();
        var cityId=$(this).data('id');
        if(confirm('Are you sure you want to delete this city? ')){
          $.ajax({
            url: "{{ url('/cities') }}/" + cityId,
            type: 'GET',
            success: function(response){
                $(".loc-delete").show();
              locationTable();
            },
            error:function(xhr,status,error){
              console.error(xhr.responseText);
            }
          })
        }
        function locationTable()
        {
        $.ajax({
                type: 'GET',
                url: "{{url('/locationtable')}}",
                success: function (response) {
                    $('.locationTable').html(response);
                },
                error: function (xhr, status, error) {
                    var errorMessage = xhr.responseJSON.message;
                    alert(errorMessage);
                }
            });
        }
    });
</script>