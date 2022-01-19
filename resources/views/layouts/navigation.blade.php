<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Dashboard</a></li>

           
            <li><a href="">Task</a></li>
            <li><a href=" {{ url('/categories') }}">Category</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li>
                <form action="{{route('logout')}}" method="POST">
                    <!-- csrf uses for laravel build in security, if don't use it security may doesn't work  -->
                    @csrf

                    <button type="submit" class="btn btn-link" style="padding-top: 15px;"><span
                            class="glyphicon glyphicon-log-out"></span> Logout </button>
                </form>
            </li>
        </ul>

    </div>
</nav>
