var MainFunctions = function(){
  if($(".sortable").length > 0) {
      
      $(".sortable").sortable({
          change: function(event, ui) {
            ui.placeholder.css({visibility: 'visible', border : '1px solid yellow'});
          }
      });
  }
  $("#export-calendar").click(function() {
      var emp_no = $("#calendar").data('empNo');
      var monthyear = $("#calendar > .fc-toolbar > .fc-left > h2").html();
      console.log("Month & Year:"+ monthyear);
      console.log("Emp No:"+ emp_no);
      $.ajax({
          url:base_url+'employee/attendance/exportCalendarToExcel',
          method: 'post',
          data:{monthyear:monthyear,emp_no:emp_no},
          success:function(result){
              window.location.href = result;
             console.log(result)
          }
      });
  });
  $("#input-username").keyup(function(event) {
      if (event.keyCode === 13) {
          $("#submit-login").click();
      }
  });
  $("#input-password").keyup(function(event) {
      if (event.keyCode === 13) {
          $("#submit-login").click();
      }
  });
  $(".printButton").each(function(){
      var $this = $(this);
      $(this).click(function(){
          var mode = 'iframe'; //popup
          var close = mode == "popup";
          var options = { mode : mode, popClose : close};
          $(this).parents(".div-print").find("div.printableArea").printArea( options );
      });
  });
  $("#printButton").click(function(){
      var mode = 'iframe'; //popup
      var close = mode == "popup";
      var options = { mode : mode, popClose : close};
      $("div.printableArea").printArea( options );
  });
  var handleNotifications = function () {
      jQuery(document).ready(function($){
          var $type = $('#toastr-notification').data('notificationType');
          var $heading = $('#toastr-notification').data('notificationHeading');
          var $content = $('#toastr-notification').data('notificationContent');
          if($type && $heading && $content) 
          {   
              Command: toastr[$type]($content, $heading)

              toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-full-width",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "3000",
                "hideDuration": "3000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
              }
          }
          if($(".notification-close").length>0){
              $('.notification-close').each(function(){
                  var $this = $(this);
                  var $parent = $(this).parents(".notice");
                  $this.click(function(){
                     var keyword = $this.data('keyword');
                     var role = $this.data('role');
                     var id = $this.data('notificationId');
                     $.ajax({
                          url: MyDropdown.ajaxurl,
                          dataType:'json',
                          type: 'post',
                          data: {action: 'notification_close', keyword: keyword, role:role, id:id},
                          success:function($result){
                              
                          }
                      });
                      $parent.remove();
                  });
              });
          }
          $('.alert-notification-close').each(function(){
              $(this).click(function(){
                  var id = $(this).data('notificationId');
                  $.ajax({
                      url:base_url+'notification/close',
                      method: 'post',
                      data:{id:id},
                      success:function(result){
                         console.log(result)
                      }
                  });
                  $(this).closest('.alert').remove();
              });
          });
          
      });
  }
  var handleDatePicker = function() {
      if($('.datepicker-month').length > 0) {
          $('.datepicker-month').datepicker({
             minViewMode: 1,
             format: 'yyyy-mm'
          });
      }
      if($('.year-only').length > 0) {
          $('.year-only').datepicker({
             minViewMode: 2,
             format: 'yyyy'
          });
      }
      if($('.date-picker.start-date').length > 0) {
      $(".date-picker.start-date").datepicker({
              todayBtn: 1,
              autoclose: true,
           }).on('changeDate', function(selected) {
              var minDate = new Date(selected.date.valueOf());
              var maxDate = new Date(selected.date.valueOf());
              maxDate.setDate(maxDate.getDate() + 1);
              $(".date-picker.end-date").datepicker('setStartDate',minDate);
              $(".date-picker.end-date-tomorrow").datepicker('setStartDate',minDate);
              $(".date-picker.end-date-tomorrow").datepicker('setEndDate',maxDate);
           });
       }
       if($('.date-picker.end-date').length > 0) {
          $(".date-picker.end-date").datepicker()
              .on('changeDate', function(selected) {
                 var minDate = new Date(selected.date.valueOf());
                 $(".date-picker.start-date").datepicker("setEndDate", minDate);
              });
      }
       if($('.date-picker.end-date-tomorrow').length > 0) {
          $(".date-picker.end-date-tomorrow").datepicker()
              .on('changeDate', function(selected) {
                 var minDate = new Date(selected.date.valueOf());
                 minDate.setDate(minDate.getDate() - 1);
                 var maxDate = new Date(selected.date.valueOf());
                 $(".date-picker.start-date").datepicker("setStartDate", minDate);
                 $(".date-picker.start-date").datepicker("setEndDate", maxDate);
              });
      }
//         if($('.date-picker.end-date-tomorrow').length > 0) {
//            $(".date-picker.end-date-tomorrow").datepicker()
//                .on('changeDate', function(selected) {
//                   var minDate = new Date(selected.date.valueOf());
//                   $(".date-picker.start-date").datepicker("setEndDate", minDate);
//                });
//        }
      
  }
  
  return{
      init: function(){
          handleNotifications();
          // handleDatePicker();
      }
  }
}();
$(document).ready(function(){
  MainFunctions.init();
});


function showNotification(type, heading, content){
    if(type && heading && content) 
    {   
        Command: toastr[type](content, heading)

        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
        //   "positionClass": "toast-top-full-width",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "3000",
          "hideDuration": "3000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
    }
}
