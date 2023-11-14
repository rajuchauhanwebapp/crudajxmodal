@extends('layout.main')

@section('title')
    <title>Home</title>
@endsection

@section('main-body')
<div class="container" style="margin-top: 80px;">
    <h4 class="text-uppercase text-center border-2 border-warning text-primary border-bottom pb-3">Crude Operation using ajax</h4>           
    <table class="table table-striped">
      <thead>
        <tr class="table-info text-uppercase">
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date Of Birth</th>
            <th>Role</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
      </thead>
      <tbody id="user-list">
        
      </tbody>
    </table>

    {{-- Modal Include --}}
    @include('modal.user.create')
    @include('modal.user.update')
    @include('modal.user.successmessage')
    @include('modal.user.danger_modal')
  </div>
@endsection