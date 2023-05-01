<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Food List</title>
  <link rel="stylesheet" href="../Assets/css/style1.css">
</head>
<body>
  <table id="main" cellspacing="0">
    <tr>
      <td id="header">
        <h1>Food List</h1>

        <div id="search-bar">
          <label>Search Food :</label>
          <input type="text" id="search" autocomplete="off">
        </div>
      </td>
    </tr>
    <tr>
      <td id="table-form">
        <form id="addForm">
          Food Name : <input type="text" id="food_name" style="margin-top:10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Food Description : <textarea rows='3' type="text" id="description" style="margin-top:10px;"></textarea>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
          Food Price : <input type="text" id="price" style="margin-top:10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Food Quantity : <input type="text" id="qty" style="margin-top:10px;">
          <input type="submit" id="save-button" value="Save" style="margin-top:10px;">
        </form>
      </td>
    </tr>
    <tr>
      <td id="table-data">
      </td>
    </tr>
  </table>
  <div id="error-message"></div>
  <div id="success-message"></div>
  <div id="modal">
    <div id="modal-form">
      <h2>Edit Food</h2>
      <table cellpadding="10px" width="100%">
      </table>
      <div id="close-btn">X</div>
    </div>
  </div>

<script type="text/javascript" src="../Assets/js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    // Load Table Records
    function loadTable(){
      $.ajax({
        url : "../controller/foodTable.php?page=",
        type : "POST",
        success : function(data){
          $("#table-data").html(data);
        }
      });
    }
    loadTable(); // Load Table Records on Page Load

    // Insert New Records
    $("#save-button").on("click",function(e){
      e.preventDefault();
      var food_name = $("#food_name").val();
      var description = $("#description").val();
      var price = $("#price").val();
      var qty = $("#qty").val();
      if(food_name == "" || description == "" || price == "" || qty == ""){
        $("#error-message").html("All fields are required.").slideDown();
        $("#success-message").slideUp();
      }else{
        $.ajax({
          url: "../controller/foodInsert.php",
          type : "POST",
          data : {food_name: food_name, description: description, price: price, qty: qty},
          success : function(data){
            if(data == 1){
              loadTable();
              $("#addForm").trigger("reset");
              $("#success-message").html("Data Inserted Successfully.").slideDown();
              $("#error-message").slideUp();
            }else{
              $("#error-message").html("Can't Save Record.").slideDown();
              $("#success-message").slideUp();
            }

          }
        });
      }

    });

    //Delete Records
    $(document).on("click",".delete-btn", function(){
      if(confirm("Do you really want to delete this record ?")){
        var studentId = $(this).data("id");
        var element = this;

        $.ajax({
          url: "../controller/foodDelete.php",
          type : "POST",
          data : {id : studentId},
          success : function(data){
              if(data == 1){
                $(element).closest("tr").fadeOut();
              }else{
                $("#error-message").html("Can't Delete Record.").slideDown();
                $("#success-message").slideUp();
              }
          }
        });
      }
    });

    //Show Modal Box
    $(document).on("click",".edit-btn", function(){
      $("#modal").show();
      var foodId = $(this).data("eid");

      $.ajax({
        url: "../controller/foodEditShow.php",
        type: "POST",
        data: {id: foodId },
        success: function(data) {
          $("#modal-form table").html(data);
        }
      })
    });

    //Hide Modal Box
    $("#close-btn").on("click",function(){
      $("#modal").hide();
    });

    //Save Update Form
      $(document).on("click","#edit-submit", function(){
        var foodId = $("#edit-id").val();
        var food_name = $("#edit-food_name").val();
        var description = $("#edit-description").val();
        var price = $("#edit-price").val();
        var qty = $("#edit-qty").val();

        $.ajax({
          url: "../controller/foodEdit.php",
          type : "POST",
          data : {id: foodId, food_name: food_name, description: description, price: price, qty: qty},
          success: function(data) {
            if(data == 1){
              $("#modal").hide();
              loadTable();
            }
          }
        })
      });

    // Live Search
     $("#search").on("keyup",function(){
       var search_term = $(this).val();

       $.ajax({
         url: "../controller/foodSearch.php",
         type: "POST",
         data : {search:search_term },
         success: function(data) {
           $("#table-data").html(data);
         }
       });
     });
  });
</script>
</body>

</html>
