<h3>Otsi</h3>
<div class="panel mt2em panel-default">
    <div class="panel-body">
        <div class="row">


            <form action="{{ url($url_data) }}" method="GET" class="form-horizontal search-users">
                {{ csrf_field() }}

                <div class="col-lg-4 col-md-4">

                    <div class="input-group-btn search-panel">
                        <ul class="nav navbar-nav menu01" role="menu">
                            <li class="active"><a href="#name">Nime</a></li>
                            <li><a href="#email">E-posti</a></li>
                        </ul>
                    </div>
                </div>


                <div class="col-lg-8 col-md-8">
                    <div class="col-lg-9 col-md-8">
                        <div class="form-group nomargin search-input">

                            <input type="hidden" name="search_param" value="name" id="search_param">
                            <input type="text" class="form-control" name="search" placeholder="Otsingusõna">
                        </div>
                    </div>

                    <div class="form-group search">
                        <div class="col-lg-3 col-md-4">
                            <button class="btn btn-primary" type="submit">Otsi!</button>
                        </div>
                    </div>
                </div>

            </form>


        </div>
    </div>
</div>