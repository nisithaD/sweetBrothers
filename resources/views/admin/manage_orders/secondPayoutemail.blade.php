<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title></title>
   
  </head>
  <body>
    <div style="max-width:850px; margin: 30px auto; border-top-left-radius: 8px; overflow: hidden; border-top-right-radius: 8px; border: 2px solid rgba(8, 109, 179, .5);" >
      <div style="background: #d4d4d461; padding: 20px;">
        <table role="presentation" class="main">
          <tr>
            <td class="wrapper">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                <tr>
                  <td>
                    <p style="width: 100%; display: inline-block; margin-bottom: 15px; margin-top: 0;">
                      <strong>Hi @if(isset($customername)){{$customername}}@endif,
                     </p>
                    <p style="width: 100%; display: inline-block; margin-bottom: 10px; margin-top: 0;">
                      <span style="display: inline-block; width: 100%">Congratulations we have just paid your commission payment for order number “@if(isset($cmp_fname)){{$cmp_fname}}@endif”. </span>
                    </p>
                    <p style="width: 100%; display: inline-block; margin-bottom: 10px; margin-top: 0;">
                      <span style="display: inline-block; width: 100%">We have paid the total amount of “@if(isset($secondpaymentamount)){{$secondpaymentamount}}@endif” by Bacs.</span>
                    </p>
                      <p style="width: 100%; display: inline-block; margin-bottom: 10px; margin-top: 0;">
                      <span style="display: inline-block; width: 100%">You will see this in your account within 24hrs.</span>
                      </p>
                    <p style="width: 100%; display: inline-block; margin-bottom: 10px; margin-top: 0;">
                      <span style="display: inline-block; width: 100%">The total you received for this order is @if(isset($totalcommissionpayable)){{$totalcommissionpayable}}@endif </span>
                    </p>
                    <p style="width: 100%; display: inline-block; margin-bottom: 10px; margin-top: 0;">
                      <span style="display: inline-block; width: 100%">For help email sales@sweetbrothers.events</span>
                    </p>
                    <p style="width: 100%; display: inline-block; margin-bottom: 15px; margin-top: 0;">
                       <span style="display: inline-block; width: 100%">Thanks again</span>
                     </p>
                     <p style="width: 100%; display: inline-block; margin-bottom: 15px; margin-top: 0;">
                       <span style="display: inline-block; width: 100%">Sweet Brothers Events</span>
                     </p>
                     <p style="width: 100%; display: inline-block; margin-bottom: 15px; margin-top: 0;">
                       <span style="display: inline-block; width: 100%">0333 3703267</span>
                     </p>
                      <p style="width: 100%; display: inline-block; margin-bottom: 15px; margin-top: 0;">
                       <span style="display: inline-block; width: 100%">P.s. if yours commission fails due over the weekend it will be processed on Monday</span>
                     </p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </body>
</html>
