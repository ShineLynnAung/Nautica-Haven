
    function Logout() {
      Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, logout!',
        cancelButtonText: 'No, stay logged in',
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Logged Out!',
            'You have been successfully logged out.',
            'success'
          ).then(() => {
            window.location.href = '../function/logout.php'; 
          });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire(
            'Cancelled',
            'You are still logged in.',
            'info'
          );
        }
      });
    }

    
    function deletepost(id) {
      Swal.fire({
          title: 'Are you sure?',
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Delete!',
          cancelButtonText: 'Cancel',
      }).then((result) => {
          if (result.isConfirmed) {
              Swal.fire(
                  'Post Deleted!',
                  'You have successfully deleted the post.',
                  'success'
              ).then(() => {
                  // Redirect with the id parameter
                  window.location.href = `../function/delete.php?id=${id}`;
              });
          } else if (result.dismiss === Swal.DismissReason.cancel) {
              Swal.fire(
                  'Cancelled',
                  'The post is not deleted.',
                  'info'
              );
          }
      });
  }
  
function upload(){
  swal({
    title: "Create Post",
    text: "Your post has been successfully created!",
    icon: "success"
  }).then((willRedirect) => {
    if (willRedirect) {
      window.location.href = '../function/create.php';
    }
  });
}
  