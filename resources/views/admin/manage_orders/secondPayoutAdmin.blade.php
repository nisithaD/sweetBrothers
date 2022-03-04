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
                    <p style="width: 100%; display: inline-block; margin-bottom: 10px; margin-top: 0;">
                      <span style="display: inline-block; width: 100%">Reminder Please pay “ @if(isset($partners_name)){{$partners_name}}@endif” the amount of “@if(isset($totalcommissionpayable)){{$totalcommissionpayable}}@endif” for “@if(isset($customername)){{$customername}}@endif”</span>
                    </p>
                    <p style="width: 100%; display: inline-block; margin-bottom: 10px; margin-top: 0;">
                      <span style="display: inline-block; width: 100%">Please pay this before “@if(isset($secondpaymentdate)){{$secondpaymentdate}}@endif”</span>
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
