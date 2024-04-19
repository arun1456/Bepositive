<label>Select City</label>
    <select class="form-control" name="city_id">
        <option selected></option>
        @foreach ($cities as $city)
        <option value="{{ $city->id }}">{{ $city->city_name }}</option>
        @endforeach
    </select>