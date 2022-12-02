    @if(Session::has('success'))
      <div class="success"><i class="fa fa-check"></i> {{Session::get('success')}}</div>
      @endif
	  @if(Session::has('error'))
      <div class="error"><i class="fa fa-solid fa-trash"></i>{{Session::get('error')}}</div>
      @endif