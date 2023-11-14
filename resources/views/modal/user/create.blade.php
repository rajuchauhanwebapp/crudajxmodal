<!-- Start Create Modal -->
<div class="modal fade" id="create-user">
   <div class="modal-dialog modal-dialog-centered">
   <div class="modal-content">

       <!-- Modal Header -->
       <div class="modal-header">
       <h4 class="modal-title">Create User Account</h4>
       <button type="button" class="btn-close small" data-bs-dismiss="modal"></button>
       </div>

       <!-- Modal body -->
       <div class="modal-body px-4">
         <form id="create-user-form" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
              <label for="id_name">Full Name:</label>
              <input type="text" class="form-control mt-1" id="id_name" name="name" placeholder="Enter Full Name">
              <span class="error text-danger" id="name_error"></span>
            </div>

            <div class="mb-3">
              <label for="id_email">Email:</label>
              <input type="email" class="form-control mt-1" id="id_email" name="email" placeholder="Enter Email">
              <span class="error text-danger" id="email_error"></span>
            </div>
            
            <div class="mb-3">
              <label for="id_dob">Date Of Birth:</label>
              <input type="date" class="form-control mt-1" id="id_dob" name="dob">
              <span class="error text-danger" id="dob_error"></span>
            </div>

            <div class="mb-3">
              <label for="id_role">Profile Photo:</label>
              <select name="role" id="id_role" class="form-control mt-1">
                <option value="guest">Guest</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
              </select>
              <span class="error text-danger" id="role_error"></span>
              </div>

            <div class="mb-3">
               <label for="id_photo">Profile Photo:</label>
               <input type="file" class="form-control mt-1" id="id_photo" name="photo">
              <span class="error text-danger" id="photo_error"></span>
              </div>

            <div class="mt-4 text-end">
               <button type="submit" class="btn btn-primary px-3">Create Account</button>
            </div>
          </form>
       </div>

       <!-- Modal footer -->
       {{-- <div class="modal-footer">
       <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
       </div> --}}
   </div>
   </div>
</div>
{{-- End Create Modal --}}