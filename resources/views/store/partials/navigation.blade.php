<div class="navigation-wrapper">
    <div class="container">
        <!-- Navigation -->
        <nav class="navigation closed clearfix">
            <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
            <ul class="nav sf-menu">
                <li class="active"><a href="{{route('store.home')}}">Home</a></li>
                @foreach($categories as $cat)
                    <li><a href="{{route('store.category',$cat->id)}}">{{$cat->name}}</a></li>
                @endforeach
            </ul>
        </nav>
        <!-- /Navigation -->
    </div>
</div>
