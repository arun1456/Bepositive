<div class="card-body">
                    
                        <div class="alert alert-success success" role="alert" style="display:none;">
                            Successfully added.
                        </div>
                    
                    
                        <div class="alert alert-danger error" role="alert" style="display:none;">
                            Failed!!
                        </div>

                        <div class="alert alert-danger city-val" role="alert" style="display:none;">
                          Please enter a city name.
                        </div>

                        <div class="alert alert-danger dist-val" role="alert" style="display:none;">
                          Please select a district.
                        </div>

                        <div class="alert alert-danger both-val" role="alert" style="display:none;">
                          Please please fill the form.
                        </div>
                   
      <h4 class="card-title">Add City</h4>
      <p class="card-description">
        Only add cities where not in the table below..
      </p>
      <form class="forms-sample" action="" method="POST">
      @csrf
        <div class="form-group" data-select2-id="7">
                      <label>Select District</label>
                      <select class="js-example-basic-single w-100 select2-hidden-accessible" id="district_id" name="district_id" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option selected></option>
                        @foreach ($districts as $district) 
                        <option value="{{$district->id}}" data-select2-id="3">{{$district->district_name}}</option>
                        @endforeach
                      </select>
            </div>
          <div class="form-group">
            <label for="City">City</label>
            <input type="text" class="form-control" id="city_name" name="city_name" placeholder="Enter City Name">
          </div>
          <button type="submit" class="btn btn-primary me-2 loc-submit">Submit</button>
      </form>
    </div>
    <script>
    $('.forms-sample').on('submit',function (e){
      e.preventDefault();
      var cityName=$('#city_name').val();
      var districtId=$('#district_id').val();

    
      if (cityName.trim() === '') {
          $(".city-val").show();
          return false;
      }
      if (districtId.trim() === '') {
          $(".dist-val").show();
          return false;
      }

      

      var formData=$(this).serialize();
      $.ajax({

        type:'POST',
        url:'{{route("location.store")}}',
        data:formData,
        success:function(response){
          locationForm();
          locationTable();
          console.log(response);
        },
        error:function(xhr){
          console.log(xhr.responseText);
        }
      });
      function locationTable()
      {
        $.ajax({
              type: 'GET',
              url: "{{url('/locationtable')}}",
              success: function (response) {
                  $('.locationTable').html(response);
                  $(".success").show();
              },
              error: function (xhr, status, error) {
                  var errorMessage = xhr.responseJSON.message;
                  $(".error").show();
                  alert(errorMessage);
              }
          });
      }
        function locationForm()
        {
          $.ajax({
                type: 'GET',
                url: "{{url('/locationform')}}",
                success: function (response) {
                    $('.locationForm').html(response);
                },
                error: function (xhr, status, error) {
                    var errorMessage = xhr.responseJSON.message;
                    alert(errorMessage);
                }
            });
        }
    });
    </script>