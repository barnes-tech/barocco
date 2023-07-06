@extends('layouts.adminlayout')

@section('content')

  <section class="admin">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="card bg-dark text-light">
              <div class="card-header">
                <h1>
                  {{ __('Dashboard') }}
                </h1>
              </div>

              <div class="card-body bg-dark p-3">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif
                  @if (session('success'))
                      <div class="alert alert-success" role="alert">
                          {{ session('success') }}
                      </div>
                  @endif
                  @if (session('error'))
                      <div class="alert alert-warning" role="alert">
                          {{ session('error') }}
                      </div>
                  @endif

                  <div class="row">
                    <!--web leads column-->
                    <div class="col-md-12 col-lg-6 bg-primary p-3 rounded">
                      <h2 class="p-2">Web leads</h2>
                      <p class="p-2">View and resolve enquries left using the website contact form.</p>
                      @if($count == 0)
                        <div class="alert">You have {{ $count }} new leads.</div>
                      @elseif($count == 1)
                        <div class="alert alert-success">You have {{ $count }} new lead.</div>
                      @else
                        <div class="alert alert-success">You have {{ $count }} new leads.</div>
                      @endif
                      @if($count > 0)
                        <table class="table table-dark text-light w-100">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Number</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($newLeads as $lead)
                            <tr>
                              <td>{{ ucfirst($lead->name) }}</td>
                              <td><a href="tel:{{ $lead->tel }}">{{ $lead->tel }}</a></td>
                              <td class="d-flex">
                                <a class="btn btn-success" href="{{ route('leads.show', $lead->id) }}">i</a>
                                @if($lead->reslolved)
                                <form action="{{ route('leads.delete',$lead->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">x</button>
                                </form>
                                @endif
                              </td>
                            </tr>
                          @endforeach
                          {!! $newLeads->links()!!}
                        </tbody>
                      </table>
                      @endif
                      
                    </div>
                    <!--end of leads column-->
                    <div class="col-md-12 col-lg-6">
                      <h2 class="text-light">Resolved Leads</h2>
                      <table class="table table-success w-100">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Number</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($resolved as $lead)
                            <tr>
                              <td>{{ ucfirst($lead->name) }}</td>
                              <td><a href="tel:{{ $lead->tel }}">{{ $lead->tel }}</a></td>
                              <td class="d-flex justify-space-around">
                                <a class="btn btn-success" href="{{ route('leads.show', $lead->id) }}">i</a>
                                @if($lead->resolved)
                                <form action="{{ route('leads.delete',$lead->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">x</button>
                                </form>
                                @endif
                              </td>
                            </tr>
                          @endforeach
                          {!! $newLeads->links()!!}
                        </tbody>
                      </table>
                    </div>
                  </div>
              </div>
              <div class="card-footer">
                  
              </div>
          </div>
        </div>
      </div> 
    </div>
  </section>
@endsection
