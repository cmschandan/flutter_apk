/*************************************************************************************
 * File Name: sp_globals.js
 * --------------------------------
 * This file contains all JS content to be used globally in the application
 * 
 * The js content of this file is moved to /public/js folder based on
 * the rule written in webpack.mix file
 * 
 * Command used for moving:
 * npm run dev
 * or
 * npm run prod
 * 
 *-------------------------------------------------------------------------------------
 * NOTE: You need to run any of the above command after making any changes to this file
 *-------------------------------------------------------------------------------------
 *
 **************************************************************************************/

// This will hide all elements with the class specified in data-hide, 
// i.e: data-hide="alert" will hide all elements with the alert class.
$(function(){
  $("[data-hide]").on("click", function(){
      $("." + $(this).attr("data-hide")).slideUp(500);
      $.sp_globals.toggleDialogOverlay(false);
  })
});

// Extending JQuery functionalities
$.extend(
{
    sp_globals: {
      /**
       * Jquery extended function for redirecting to a url with POST method
       *
       * How to make a call to this function: 
       * $.redirectPost('/redirect-url', {parm1: 'paramVal1', param2: 'paramVal2'});
       */
      redirectPost: function(redirectUrl, args)
      {
          var form = '';
          $.each( args, function( key, value ) {
            if (key && value) {
              if (!isNaN(value)) {
                form += '<input type="hidden" name="'+key+'" value="'+value+'">';
              } else {
                value = value.split('"').join('\"');
                form += '<input type="hidden" name="'+key+'" value="'+value+'">';
              }
            }
          });
          $('<form action="' + redirectUrl + '" method="POST">' + form + '</form>')
          .appendTo($(document.body)).submit();
      },

      /**
       * Global function to show or hide loading spinner
       *
       * @param {boolean} on - to be used to show or hide the spinner
       */
      toggleDialogOverlay : function(on) {
        let wholePageOverlay = $('#dialogueOverlay');
        if (on) {
            // Show the loading spinner
            wholePageOverlay.css('display', 'block');
        } else {
            // Hide the loading spinner
            wholePageOverlay.css('display', 'none');
        }
      },

      /**
       * Global function to show or hide loading spinner
       *
       * @param {boolean} on - to be used to show or hide the spinner
       */
      toggleSPWholePageOverlay : function(on) {
        let wholePageOverlay = $('#whole_page_loader');
        if (on) {
            // Show the loading spinner
            wholePageOverlay.css('display', 'block');
        } else {
            // Hide the loading spinner
            wholePageOverlay.css('display', 'none');
        }
      },

      toggleSPLoadingSpinner: function (on) {
        let spinnerImg = $('#spinner-img');
        if (on) {
            // Show the loading spinner
            spinnerImg.css('display', 'block');
            this.toggleSPWholePageOverlay(true);
        } else {
            // Hide the loading spinner
            spinnerImg.css('display', 'none');
            this.toggleSPWholePageOverlay(false);
        }
      },
      /**
       * Global function to show error dialogue
       *
       * @param {string} heading - heading text
       * @param {string} errorsHtml - error html
       */
      showSPErrorDialogue: function (heading, errorsHtml) {
        let errDialog = $('#sp_error_dialog');
        let header = errDialog.find(".alert-heading");
        let error = errDialog.find("#errorMessage");
        if (heading) {
          header.text(heading);
        } else {
          header.text('Error!');
        }

        if (errorsHtml) {
          error.html(errorsHtml);
        } else {
          error.html('Error!');
        }
        this.toggleDialogOverlay(true);
        errDialog.slideDown(500);
      },

      /**
       * Global function to hide error dialogue
       */
      hideSPErrorDialogue: function () {
          let errDialog = $('#sp_error_dialog');
          let header = errDialog.find(".alert-heading");
          let error = errDialog.find("#errorMessage");
          header.text('');
          error.text('');
          this.toggleSPWholePageOverlay(false);
          errDialog.slideUp(500);
          this.toggleDialogOverlay(false);
      },

    /**
     * Global function to show success dialogue
     *
     * @param {string} heading - heading text
     * @param {string} text - success text
     */
      showSPSuccessDialogue: function (heading, text) {
        let successDialog = $('#sp_success_dialog');
        let header = successDialog.find(".alert-heading");
        let success = successDialog.find("#successMessage");
        if (heading) {
          header.text(heading);
        } else {
          header.text('Success!');
        }

        if (text) {
          success.html(text);
        } else {
          success.html('Error!');
        }
        this.toggleDialogOverlay(true);
        successDialog.slideDown(500);
      },

      /**
       * Global function to hide success dialogue
       */
      hideSPSuccessDialogue: function () {
        let successDialog = $('#sp_success_dialog');
        let header = successDialog.find(".alert-heading");
        let success = successDialog.find("#successMessage");
        header.text('');
        success.text('');
        successDialog.slideUp(500);
        this.toggleDialogOverlay(false);
      },
      getBrowserWidth: function(){
        if(window.innerWidth < 768){
            // Extra Small Device
            return "xs";
        } else if(window.innerWidth < 991){
            // Small Device
            return "sm"
        } else if(window.innerWidth < 1199){
            // Medium Device
            return "md"
        } else {
            // Large Device
            return "lg"
        }
      }
    }
});

/*window.sp_globals = {
};*/
