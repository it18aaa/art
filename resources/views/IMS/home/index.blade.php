@extends('IMS.layout')

@section('title', 'Information Management System')

@section('content')
    @parent

    <h1>Information Management System</h1>
    <hr/>

        <div class = "row">
            <div class="col-sm-4  text-center">    
                <a href="{{ route('ims.sales.index') }}"
                    class="btn btn-success btn-block btn"><br />
                    <span class="fas fa-file-alt fa-2x"></span> <br />Sales<br />&nbsp;
                </a>
                <br />
                <a href="{{ route('ims.sales.create') }}"
                    class="btn btn-success btn-block btn"><br/>
                    <span class="fas fa-plus fa-2x"></span>&nbsp;
                    <span class="fas fa-file-alt fa-2x"></span> <br />New Sale Order<br />&nbsp;
                </a>
                <br />          

                <a href="{{ route('ims.artists.index') }}"
                    class="btn btn-danger btn-block btn"><br/>
                    <span class="fas fa-users fa-2x"></span> <br />Artists<br />&nbsp;
                </a>
                <br />          

            </div>

            <div class="col-sm-4  text-center">
            
                    <a href="{{ route('ims.customers.index') }}" 
                        class="btn btn-warning btn-block btn"><br/>
                        <span class="fas fa-users fa-2x"></span> <br />Customers<br />&nbsp;
                    </a>
                
                <br />

                    <a href="{{ route('ims.customers.create') }}"
                        class="btn btn-warning btn-block btn"><br/>
                        <span class="fas fa-plus fa-2x"></span>&nbsp;
                        <span class="fas fa-users fa-2x"></span> <br />New Customer<br />&nbsp;
                    </a>
                    <br />

                    <a href="{{ route('ims.artists.create') }}"
                    class="btn btn-danger btn-block btn"><br/>
                    <span class="fas fa-plus fa-2x"></span>&nbsp;
                    <span class="fas fa-users fa-2x"></span> <br />New Artist<br />&nbsp;
                </a>
                <br />       
            
            </div>

            <div class="col-sm-4  text-center">

                <a href="{{ route('ims.artworks.index') }}" 
                    class="btn btn-primary btn-block btn"><br/>
                    <span class="fas fa-paint-brush fa-2x"></span> <br />Artworks<br />&nbsp;
                </a> 

                <br />
                <a href="{{ route('ims.artworks.create') }}" 
                    class="btn btn-primary btn-block btn"><br/>
                    <span class="fas fa-plus fa-2x"></span>&nbsp;
                    <span class="fas fa-paint-brush fa-2x"></span> <br />New Artwork<br />&nbsp;
                </a>                     
                <br />
                <a href="{{ route('ims.users.index') }}" 
                    class="btn btn-secondary btn-block btn"><br/>
                    <span class="fas fa-user fa-2x"></span> <br />Users<br />&nbsp;
                </a>                     

            </div>


        </div>
        
        

@endsection

@section('rightcontent')
    @parent
        <div>
            Logged in as {{ Auth::user()->name }} 
        </div>
        <div>
            
        </div>
@endsection