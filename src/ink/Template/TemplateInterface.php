<?php
namespace apzentral\ink\Template;

interface TemplateInterface {
    public function getMailContent();
    public function setBodyContent($body);
    public function appendBodyContent($body);
    public function prependBodyContent($body);
}
