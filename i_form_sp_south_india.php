    <form action="i_form_2.php" onsubmit="return validateForm();" method="post" >
    <input type="hidden" name="txtAmount"   id="txtAmount" value="" />
    <input type="hidden" name="txtQuantity" id="txtQuantity" value="" />
    

        <div class="form-group">
        <label for="txtName">Full Name:</label>
        <input type="text"  class="form-control" minlength="5" placeholder="Enter Your Name"  required name="txtName" id="txtName">
        </div>

        <div class="form-group">
        <label for="txtEmail">Email address:</label>
        <input type="email" class="form-control" placeholder="Enter email"  required name="txtEmail" id="txtEmail">
        </div>

        <div class="form-group">
        <label for="txtPhone">Phone:</label>
        <input type="number" class="form-control" minlength="10" placeholder="Enter phone" required name="txtPhone" id="txtPhone">
        </div>

        <div class="form-group">
        <label for="booktype">Type:</label>
        <select id='booktype'> 
            <option value='abridged'> Abridged version  </option>
            <option value='unabridged'> Unabridged version </option>
             
        </select>

        <div id="abridged" class="form-group">
            <span class="price">₹300 </span> <br />
            M.R.P.: ₹<span class="strike"> 400 </span> <br />
            You save: ₹100.00 (25%)
        </div>

        <div id="unabridged" class="form-group">
        <span class="price">₹900 </span> <br />
            M.R.P.: ₹<span class="strike">1000 </span> <br />
            You save: ₹100.00 (10%)
        </div>
         
        </div>

        <div class="form-group">
        <label for="bookcount`">Select:</label>
        <select id='bookcount'> 
            <option value='1'> 1 Books </option>
            <option value='10'> 10 Books </option>
            <option value='20'> 20 Books </option>
            <option value='100'> 100 Books </option>
        </select>
        <label id="bookprice"></label>
        </div>

        <div class="form-group">
        <label for="txtAddress">Postal Address :</label>
        <textarea  class="form-control"   placeholder="Enter postal address with Pin code" required name="txtAddress" id="txtAddress">
        </textarea>
        </div>

        <!--div class="form-group">
        <label for="txtComments">Comments :</label>
        <textarea  class="form-control"   placeholder="Enter postal address with Pin code" required name="txtComments" id="txtComments">
        </textarea>
        </div-->

        <button type="submit" class="btn btn-default section-btn btn btn-success"  onclick="validateForm();" >Place order</button>
    </form> 


    <script>

    let type = 'abridged'; 
    let perbook = 300;
    $("#unabridged").hide();
    calculateTotal( 1 );

    $('#booktype').on('change', function() {

        console.log( this.value );
        if(this.value == 'abridged') {
            perbook = 300;
            $("#abridged").show();
            $("#unabridged").hide();
            
        } else {
            perbook = 900;
            $("#abridged").hide();
            $("#unabridged").show();
        }

        $("#bookcount").val($("#bookcount option:first").val());
        calculateTotal(  1 );
    
    });

    $('#bookcount').on('change', function() {

        calculateTotal( this.value );

    });

 function calculateTotal(count){
    
    
    let totalcost = perbook * count;
    $('#bookprice').html( '( ₹ ' + totalcost + '/-)');
    $('#txtAmount').val(totalcost);
    $('#txtQuantity').val(count);
}

function validateForm()
{   
    console.log("validateForm");
    $('#txtName').val( $.trim($('#txtName').val()));
    $('#txtEmail').val( $.trim($('#txtEmail').val()));
    $('#txtPhone').val( $.trim($('#txtPhone').val()));
    $('#txtAddress').val( $.trim($('#txtAddress').val()));

    if( $('#name').val().length < 5 ||  $('#txtEmail').val().length < 5 ||  $('#txtAddress').val().length < 5 ){
      return false;
    }


}







function donatePop(){
  window.open("https://www.instamojo.com/@SrilaPrabhupadaLila/");
}
</script>

<style>
.strike { text-decoration: line-through; }
.price {
    color: maroon !important;
    font-size: 22px !important;
    font-weight: 800 !important;
}
</style>