
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
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stripe ID</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stripe price</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">quantity</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ends at</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">trial ends at</th>
                      </tr>
                    </thead>
                    <tbody>



                    @foreach($subscribers as $user)
                      <tr>
                        <td>

                          <div class="d-flex px-2 py-1">

                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{$user->name}}</h6>

                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{$user->stripe_status }}</p>

                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{$user->stripe_id}}</p>

                          </td>
                          <td>
                            <p class="text-xs font-weight-bold mb-0">{{$user->stripe_price}}</p>

                          </td>
                          <td>
                            <p class="text-xs font-weight-bold mb-0">{{$user->quantity}}</p>

                          </td>
                          <td>
                            <p class="text-xs font-weight-bold mb-0">{{$user->ends_at}}</p>

                          </td>
                          <td>
                            <p class="text-xs font-weight-bold mb-0">{{$user->trial_ends_at}}</p>

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
