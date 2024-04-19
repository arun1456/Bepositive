<div class="container " id="dash" style="display:none;">
    <div class="">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>


<div id="location-form">
  <div class="col-lg-12 grid-margin">
    <button id="showForm" class="btn btn-primary me-2">Add City</button>
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card locationForm" id="myForm" style="display:none;">
      


    </div>
  </div>
  <div class="col-lg-12 grid-margin" >
    <div class="card">
      <div class="card-body">
      <div class="alert alert-success loc-delete" role="alert" style="display:none;">
                            City successfully deleted.
                        </div>
        <h4 class="card-title">Location Table</h4>
        <p class="card-description">
          Cities which are registered!
        </p>
        <div class="table-responsive locationTable">
          




        </div>
      </div>
    </div>
  </div>
</div>

<div id="donor-form">
  <div class="col-lg-12 grid-margin">
    <button id="show-dnor" class="btn btn-primary me-2">Add Donor</button>
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card" id="dnor-Form" style="display:none;">
      <div class="card-body">
        <h4 class="card-title">Add Donors</h4>
        <p class="card-description">
          Add donor to view in the table.
        </p>
        <div class="donor-form">
          



        </div>
      </div>
    </div>
  </div>




  <div class="card">
    <div class="card-body">
    @if (session('status'))
                    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">

                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    </div>
                    @endif
      <h4 class="card-title">Donors Table</h4>
      <div class="filter-form">
        

      
      </div>

      <div class="table-responsive donor-table">
       


      </div>
    </div>
  </div>
</div>