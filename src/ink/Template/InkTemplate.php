<?php
namespace apzentral\ink\Template;

class InkTemplate implements TemplateInterface
{
    private $header;
    private $style;
    private $footer;
    private $mailContent;

    function __construct()
    {
        $this->setupHeader()->setupFooter();
        $this->mailContent = '';
        $this->style = '';
    }

    public function setBodyContent($body)
    {
        $this->mailContent = $body;
        return $this;
    }

    public function appendBodyContent($body)
    {
        $this->mailContent.= $body;
        return $this;
    }

    public function prependBodyContent($body)
    {
        $this->mailContent = $body . $this->mailContent;
        return $this;
    }

    public function getMailContent($minified = false)
    {
        $header = $this->header;
        $header = preg_replace('/{{style}}/i', $this->style, $header);
        $html = <<< HTML
{$header}
{$this->mailContent}
{$this->footer}
HTML;

        if ($minified) {
            $html = preg_replace('/\s+/', ' ', $html);
        }
        return $html;
    }

    private function setupHeader()
    {
        $style = file_get_contents(__DIR__ . '/../css/ink.css');
        $this->header = <<< HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width"/>
    <style type="text/css">
    {$style}
    </style>
    <style type="text/css">
    {{style}}
    </style>
  </head>
  <body>
    <table class="body">
      <tr>
        <td class="center" align="center" valign="top">
          <center>
HTML;

        return $this;
    }

    private function setupFooter()
    {
        $this->footer = <<< HTML
          </center>
        </td>
      </tr>
    </table>
  </body>
</html>
HTML;
        return $this;
    }
}
