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
        <label for="bookoption">Select:</label>
        <select id='bookoption'> 
            <option value='1'> 1 Book </option>
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

        <div class="form-group">
        <label for="txtComments">Comments :</label>
        <textarea  class="form-control"   placeholder="Enter postal address with Pin code" required name="txtComments" id="txtComments">
        </textarea>
        </div>

        <button type="submit" class="btn btn-default section-btn btn btn-success"  onclick="validateForm();" >Donate</button>
    </form> 


    <script>

    calculateDollar( 1 );

    $('#bookoption').on('change', function() {

    calculateDollar( this.value );
    
    });

async function calculateDollar(count){
    
    let currency = 75;

    await fetch("https://api.exchangeratesapi.io/latest?base=USD")
            .then(async function(response) {
                const res = await response.json();
                currency = res.rates.INR.toFixed(0)
            }).catch(function(error) {
                currency = 75;
            });

    currency = currency ? currency : 75;
    let booktotal = 4 * count * currency
    $('#bookprice').html( '(INR ' + booktotal + '/-)');
    $('#txtAmount').val(booktotal);
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