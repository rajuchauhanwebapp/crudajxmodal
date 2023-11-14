$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});

// Create Function Ajax
$('#create-user-form').on('submit', function (event) {
   event.preventDefault();
   var create_form = new FormData($('#create-user-form')[0]);
   $.ajax({
      type: "POST",
      url: "create-account/",
      data: create_form,
      contentType: false,
      processData: false,
      success: function (response) {
         if (response.status == 400) 
         {
            $('.error').text('');
            $.each(response.errors, function (key, error) { 
               $('#'+key+'_error').text(error);
            });
         } 
         else if(response.status == 200) 
         {
            $('#message').text(response.success);
            $('#success-meassage').modal('show');
            // document.getElementById('create-user-form').reset();
            $('#create-user-form').trigger('reset');
            $('#create-user').modal('hide');
            getUserListing();
         }
      }
   });
});

// Update User Function
function openEditModalForm(userid) {
   $.ajax({
      type: "GET",
      url: "edit-user/" + userid,
      dataType: "json",
      success: function (response) 
      {
         // console.log(response.edit_user);
         $.each(response.edit_user, function (key, value) { 
            if (key !== 'photo' && key !== 'role' && key !== 'id') 
            {
              $('input[id="id_update_'+ key +'"]').val(value);
            }
            else if (key === 'id') {
               $('#id_update_userid').val(value);
            }
            else if (key === 'role') {
               $('#id_update_role').val(value);
            }
         });
         $('#update-user').modal('show');
      }
   });
}

// Update User Function
$('#update-user-form').on('submit', function (event) {
   event.preventDefault();
   var update_form = new FormData($('#update-user-form')[0]);
   $.ajax({
      type: "POST",
      url: "update-user/",
      data: update_form,
      contentType: false,
      processData: false,
      success: function (response) {
         if (response.status == 400) 
         {
            $('.error').text('');
            $.each(response.errors, function (key, error) { 
               $('#'+key+'_update_error').text(error);
            });
         } 
         else if(response.status == 200) 
         {
            $('#message').text(response.success);
            $('#success-meassage').modal('show');
            $('#update-user').modal('hide');
            getUserListing();
         }
      }
   });
});

// Delete User Account Function
function deleteUserAccount(userid) {
   var user_confirmation = confirm('Are Sure Do you Want Delete This User');
   if (user_confirmation) {
      $.ajax({
         type: "GET",
         url: "delete-user/" + userid,
         success: function (response) {
            $('#message-danger').text(response.success);
            $('#danger-modal').modal('show');
            getUserListing();
         }
      });
   }
}

// User Listing Funtion
function getUserListing() 
{
   $.ajax({
      type: "GET",
      url: "user-listing/",
      dataType: "json",
      success: function (response) 
      {
         $('#user-list').html('');
         $.each(response.user_list, function (key, user) {
            var user_content = '<tr>\
                                    <td>'+ user.id +'</td>\
                                    <td>'+ user.name +'</td>\
                                    <td>'+ user.email +'</td>\
                                    <td>'+ user.dob +'</td>\
                                    <td>'+ user.role +'</td>\
                                    <td class="imgtd"><img src="'+ user.photo +'" class="img-thumbnail" alt=""></td>\
                                    <td>\
                                    <button class="btn btn-info btn-sm px-3" value="'+ user.id +'" onclick="openEditModalForm(this.value)">Edit</button>\
                                    &nbsp;\
                                    <button class="btn btn-danger btn-sm px-3" onclick="deleteUserAccount('+ user.id +')">Delete</button>\
                                    </td>\
                                 </tr>';
            $('#user-list').append(user_content);
         });
      }
   });
}
getUserListing();
