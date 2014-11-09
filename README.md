ink
===

PHP Mailer with responsive email templates engine.

### Examples,

1. Just Instantiate Mailer Object.

    $mailer = new apzentral\ink\Mailer;

2. Then just uses `mail` method to send out email.

    $subject = 'Hello Mailer';
    $from = 'apzentral@gmail.com';
    $to = 'apzentral@gmail.com';
    $body = '<h1>Hello Mailer</h1><p>This is test email.</p>';
    $mailer->mail($subject, $from, $to, $body);

### Templates Example,

- Basic Email Body,

    <center>
      <table class="container">
        <tbody>
          <tr>
            <td>
              <table class="row">
                <tbody>
                  <tr>
                    <td class="wrapper last">
                      <table class="twelve columns">
                        <tbody>
                          <tr>
                            <td>
                              Thank you for using Ink!!!
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                </tbody>
              <table>
              <table class="row">
                <tbody>
                  <tr>
                    <td class="wrapper last">

                      <table class="twelve columns">
                        <tbody>
                          <tr>
                            <td>
                              <h3>Hello World</h3>
                              <p>This is the first email using Ink!</p>
                            </td>
                            <td class="expander"></td>
                          </tr>
                        </tbody>
                      </table>

                    </td>
                  </tr>
                </tbody>
              </table>

            </td>
          </tr>
        </tbody>
      </table>
    </center>

### Libraries Version for Template Engine

1. [Ink](http://zurb.com/ink "Ink: A Responsive Email Framework from ZURB") from Zurb: v 1.0.5

