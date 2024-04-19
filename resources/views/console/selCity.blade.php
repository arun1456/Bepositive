<select class="form-select" aria-label="Default select example" name="cityfilter">
    <option selected value=''>City</option>
    @foreach ($cities as $city)
    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
    @endforeach
</select>