
  
  <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

          <div class="sidebar-brand-text mx-3"> {{config('app.name')}} </div>
      </a>

      @foreach($links as $l)
      @if(!count($l['sub_links']))
      <li class="nav-item active">
          <a class="nav-link" href="{{route($l['url'])}}">
              <i class="{{$l['icon']}}"></i>
              <span>{{$l['label']}}</span></a>
      </li>
      @else
          @php
          $active=0;
            foreach($l['sub_links'] as $s){
                if(url()->current() == route($s['url'])){
                    $active=1;
                }
             }
          @endphp
      <li class="nav-item active" >
          <a  class="nav-link {{$active?'':'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapsePages{{$loop->index}}"
              aria-expanded="{{$active?'true':'false'}}" aria-controls="collapsePages{{$loop->index}}">
              <i class="{{$l['icon']}}"></i>
              <span>{{$l['label']}}</span>
          </a>

      
        
          <div id="collapsePages{{$loop->index}}" class="collapse {{$active?'show':''}}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
              @foreach($l['sub_links'] as $s)
                   <a class="collapse-item active" href="{{route($s['url'])}}">{{$s['label']}}</a>
              @endforeach
               

              </div>
          </div>
      </li>
      @endif


      @endforeach




  </ul>
