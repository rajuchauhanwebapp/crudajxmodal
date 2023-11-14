<!-- Start Create Modal -->
<div class="modal fade" id="update-user">
   <div class="modal-dialog modal-dialog-centered">
   <div class="modal-content">

       <!-- Modal Header -->
       <div class="modal-header">
       <h4 class="modal-title">Update User Account</h4>
       <button type="button" class="btn-close small" data-bs-dismiss="modal"></button>
       </div>

       <!-- Modal body -->
       <div class="modal-body">
          <form id="update-user-form" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="userid" id="id_update_userid">
            <div class="mb-3">
              <label for="id_update_name">Full Name:</label>
              <input type="text" class="form-control mt-1" id="id_update_name" name="name" placeholder="Enter Full Name">
              <span class="error text-danger" id="name_update_error"></span>
            </div>

            <div class="mb-3">
              <label for="id_update_email">Email:</label>
              <input type="email" class="form-control mt-1" id="id_update_email" name="email" placeholder="Enter Email">
              <span class="error text-danger" id="email_update_error"></span>
            </div>
            
            <div class="mb-3">
              <label for="id_update_dob">Date Of Birth:</label>
              <input type="date" class="form-control mt-1" id="id_update_dob" name="dob">
              <span class="error text-danger" id="dob_update_error"></span>
            </div>

            <div class="mb-3">
               <label for="id_update_role">Select Role:</label>
               <select name="role" id="id_update_role" class="form-control mt-1">
                  <option value="guest">Guest</option>
                  <option value="user">User</option>
                  <option value="admin">Admin</option>
               </select>
               <span class="error text-danger" id="role_update_error"></span>
              </div>

            <div class="mb-3">
               <label for="id_update_photo">Profile Photo:</label>
               <input type="file" class="form-control mt-1" id="id_update_photo" name="photo">
              </div>

            <div class="mt-4 text-end">
               <button type="submit" class="btn btn-primary px-3">Update Account</button>
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