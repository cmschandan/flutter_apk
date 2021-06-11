$('#create-doctor-submit').on('click', function(e) {
    e.preventDefault();
    if ($(this.form).valid()) {
      // Show the loading spinner
      $.sp_globals.toggleSPLoadingSpinner(true);
      ajaxCall($(this.form));
    }    
});