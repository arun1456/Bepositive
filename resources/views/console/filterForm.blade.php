<form action="" class="row g-3 filterfrm" method="post">
    <div class="col-lg-3">
        <select class="form-select lg-12" aria-label="Default select example" name="dsfilter" id="dsfilter">
            <option selected value=''>District</option>
            @foreach ($districts as $district)
            <option value="{{ $district->id }}">{{ $district->district_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-3 selCity">
        

    </div>
    <div class="col-lg-3">
        <select class="form-select" aria-label="Default select example" name="bgfilter">
            <option selected value=''>Blood Group</option>
            @foreach ($bgroups as $bgroup)
            <option value="{{ $bgroup->id }}">{{ $bgroup->bgroup }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-3">
        <button type="submit" class="btn btn-primary ">FILTER</button>
    </div>
</form>
<script>
    selDiv();
    $('.filterfrm').on('submit',function (event){
        event.preventDefault();
        var filterData=$(this).serialize();
        $.ajax({
            url: "{{ url('/bgfilter') }}",
            type: 'POST',
            data: filterData,
            success: function(response){
                $('.donor-table').html(response);
            },
            error: function(xhr,status,error){
                var errorMessage=xhr.responseJSON.message;
                alert(errorMessage);
            }
        });
    });
    $('#dsfilter').change(function (event){
        event.preventDefault();
        var disId= $(this).val();
        if(disId ===null || disId===""){
            selDiv();
        }
        else
        {
            $.ajax({
                type:'get',
                url: "{{url('/selectcity')}}/" + disId,
                success: function (response){
                    $('.selCity').html(response);
                },
                error: function (xhr, error, status){
                    var errorMessage = xhr.responseJSON.message;
                    alert(errorMessage);
                }
            })
        }
    })

    function selDiv()
    {
        $.ajax({
            type:'GET',
            url:"{{url('/selectdiv')}}",
            success: function (response){
                $('.selCity').html(response);
            },
            error: function (xhr,status,error){
                var errorMessage=xhr.responseJSON.message;
                alert(errorMessage);
            }
        });
    }
</script>