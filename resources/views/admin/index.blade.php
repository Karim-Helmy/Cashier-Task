
<style>
    /* margin-left= 17.125rem;!important";
    main-content */
    @media(min-width:1200px){
        .main-content{
            margin-left:17.125rem!important;
        }

    }

</style>


@include('admin.includes.header')
@extends('admin.layouts.app')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg " >
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6>Users table</h6>
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Update</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Activate</th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>



                        @foreach($users as $user)
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">

                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{$user->name}}</h6>

                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="text-xs font-weight-bold mb-0">{{$user->email}}</p>

                          </td>
                          <td class="align-middle text-center text-sm">
                            {{-- <span class="badge badge-sm bg-gradient-secondary">Offline</span> --}}
                            <a href="{{Route('users.edit',$user->id)}}" class="badge badge-sm bg-gradient-primary" >Edit</a>
                          </td>
                          <td class="align-middle text-center">
                              <a href="{{Route('users.delete',$user->id)}}" class="badge badge-sm bg-gradient-danger" >Delete</a>
                          </td>

                          <td class="align-middle text-center">
                              @if ($user->status == 0)
                                  <a href="{{Route('users.activate',$user->id)}}" class="badge badge-sm bg-gradient-success" >Activate</a>
                              @else
                                  <a href="{{Route('users.deactivate',$user->id)}}" class="badge badge-sm bg-gradient-secondary" >Deactivate</a>
                              @endif

                          </td>
                        </tr>


                      @endforeach


                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
  </main>

  @section('content')
@endsection
