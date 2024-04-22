<form class="forms-sample dnrFrm" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Donor Name</label>
        <input type="text" class="form-control" id="Donor_name" name="donor_name" value="{{ session()->get('donor_name') }}" required>
    </div>
    <div class="form-group">
        <label for="contact">Contact</label>
        <input type="text" class="form-control" id="donor_contact" name="donor_contact" value="{{ session()->get('donor_contact') }}" required>
    </div>
    <div class="form-group">
        <label>Select Blood Group</label>
        <select class="form-control" name="bgroup_id" required>
            <option selected></option>
            @foreach ($bgroups as $bgroup)
            <option value="{{$bgroup->id}}">{{ $bgroup-> bgroup}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Select District</label>
        <select class="form-control" id="dist-id" required>
            <option selected></option>
            @foreach ($districts as $district)
            <option value="{{ $district->id }}">{{ $district-> district_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group selectDist">
        <label>Select City</label>
        <select class="form-control" name="city_id" required>
            <option selected>Please select district</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary me-2">Submit</button>
</form>

          <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).ready(function (){
                $('#dist-id').change(function (){
                    var id=$(this).val();
                    $.ajax({
                        url: "{{url('/selectdist')}}/" +id,
                        method:'get',
                        success: function (response){
                            $('.selectDist').html(response);

                        },
                        error: function (xhr,status,error){
                            var errorMessage = xhr.responseJSON.message;
                            alert(errorMessage);
                        }
                    });
                });
                $('.dnrFrm').on('submit', function  (event){
                    event.preventDefault();
                    var donorData = $(this).serialize();
                    $.ajax({
                        type: 'POST',
                        url:'{{route("donor.store")}}',
                        data: donorData,
                        success: function (response){
                            donorForm();
                            donorTable();
                            if(response==='exists'){
                                $('.exists').hide();
                            }
                            else{
                                $('.exists').show();
                            }
                        },
                        error: function (xhr,status,error){
                            var errorMessage = xhr.responseJSON.message;
                            alert(errorMessage);
                        }
                    });
                });
            });
            function donorForm()
            {
            $.ajax({
                type: 'GET',
                url: "{{url('/donorform')}}",
                success: function (response){
                $('.donor-form').html(response);
                },
                error: function (xhr, status, error){
                var errorMessage = xhr.reponseJSON.message;
                alert(errorMessage)
                }
            });
            }
            function donorTable()
            {
            $.ajax({
                type: 'GET',
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