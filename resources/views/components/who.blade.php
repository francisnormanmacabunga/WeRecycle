@if (Auth::guard('donor')->check())
  <p class="text-success">
    You are logged in as <strong>Donor</strong>
  </p>
@else
  <p class="text-danger">
    You are logged out as <strong>Donor</strong>
  </p>
@endif

@if (Auth::guard('activitycoordinator')->check())
  <p class="text-success">
    You are logged in as <strong>Activity Coordinator</strong>
  </p>
@else
  <p class="text-danger">
    You are logged out as <strong>Activity Coordinator</strong>
  </p>
@endif

@if (Auth::guard('programdirector')->check())
  <p class="text-success">
    You are logged in as <strong>Program Director</strong>
  </p>
@else
  <p class="text-danger">
    You are logged out as <strong>Program Director</strong>
  </p>
@endif

@if (Auth::guard('admin')->check())
  <p class="text-success">
    You are logged in as <strong>Administrator</strong>
  </p>
@else
  <p class="text-danger">
    You are logged out as <strong>Administrator</strong>
  </p>
@endif
