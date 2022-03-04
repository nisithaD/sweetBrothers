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
                      <span style="display: inline-block; width: 100%">We emailed you to let you know that you had commission payable for a new customer with an order number of “@if(isset($cmp_fname)){{$cmp_fname}}@endif”. As they had ordered using your promo code.</span>
                    </p>
                    <p style="width: 100%; display: inline-block; margin-bottom: 10px; margin-top: 0;">
                      <span style="display: inline-block; width: 100%">Unfortunately they have cancelled their order within the cooling off period, this unfortunately means on this occasion there is no commission payable.</span>
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
