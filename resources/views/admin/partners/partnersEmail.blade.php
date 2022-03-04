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
                      <strong>Hi @if(isset($cmp_fname)){{$cmp_fname}}@endif,
                     </p>
                    <p style="width: 100%; display: inline-block; margin-bottom: 10px; margin-top: 0;">
                      <span style="display: inline-block; width: 100%">Thanks for signing up to our referral program.</span>
                    </p>
                    <p style="width: 100%; display: inline-block; margin-bottom: 10px; margin-top: 0;">
                      <span style="display: inline-block; width: 100%">Your promocode is “@if(isset($promo_code)){{$promo_code}}@endif” this will give people £350 discount on orders over £1,350. </span>
                    </p>
                    @if(isset($noPayot) && $noPayot == '1')
                          <p style="width: 100%; display: inline-block; margin-bottom: 10px; margin-top: 0;">
                          <span style="display: inline-block; width: 100%">This code can be used on all/ any of your emails that you send out to both new enquiries and customers that book directly with you.</span>
                          </p>
                          <p style="width: 100%; display: inline-block; margin-bottom: 10px; margin-top: 0;">
                            <span style="display: inline-block; width: 100%">We will also be posting you out our discount cards that you can give to your customers when you see them in person.</span>
                          </p>
                    @else
                        <p style="width: 100%; display: inline-block; margin-bottom: 10px; margin-top: 0;">
                          <span style="display: inline-block; width: 100%">You can use this promocode on the back of all/ any of your emails,we will also be posting you out discount cards that you can give to your customers. </span>
                        </p>
                        <p style="width: 100%; display: inline-block; margin-bottom: 10px; margin-top: 0;">
                          <span style="display: inline-block; width: 100%">Payouts are in two parts, we pay 50% of the commission when customers are outside of their cooling off  period. The other 50% is paid once the event has been completed. </span>
                        </p>
                    @endif
                    <p style="width: 100%; display: inline-block; margin-bottom: 10px; margin-top: 0;">
                      <span style="display: inline-block; width: 100%">If you have any questions please call 0333 3703 267 or email sales@sweetbrothers.events</span>
                    </p>
                    <p style="width: 100%; display: inline-block; margin-bottom: 15px; margin-top: 0;">
                       <span style="display: inline-block; width: 100%">Thanks</span>
                     </p>
                     <p style="width: 100%; display: inline-block; margin-bottom: 15px; margin-top: 0;">
                       <span style="display: inline-block; width: 100%">Sweet Brothers Events</span>
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
