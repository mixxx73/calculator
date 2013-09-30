<?php

/* TestCalcBundle:Default:index.html.twig */
class __TwigTemplate_d13cd4bb0c0c1dd932a6d312fe358d7c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
 <head>
  <title> new document </title>
  <meta name=\"author\" content=\"Michal Macierzynski\" />
 </head>

 <body>
<style>
#calculator {
  width: 250px;
  height: 150px;
  padding: 5px;
  background-color: #b1dafb;
}

#display {
  background-color: white;
  border: solid 1px black;
  margin: 5px;

  text-align: right;
  padding: 2px;
}
#numbers {
\twidth: 120px;
\tfloat: left;
}
</style>

<script type=\"text/javascript\">

</script>
<div id=\"calculator\">
\t<div id=\"display\">0</div>
\t<div id=\"pad\">
\t\t<div id=\"numbers\">
\t\t\t<button class=\"digit\" value=\"7\">7</button>
\t\t\t<button class=\"digit\" value=\"7\">8</button>
\t\t\t<button class=\"digit\" value=\"7\">9</button>
\t\t\t<br/>
\t\t\t<button class=\"digit\" value=\"4\">4</button>
\t\t\t<button class=\"digit\" value=\"5\">5</button>
\t\t\t<button class=\"digit\" value=\"6\">6</button>
\t\t\t<br/>
\t\t\t<button class=\"digit\" value=\"1\">1</button>
\t\t\t<button class=\"digit\" value=\"2\">2</button>
\t\t\t<button class=\"digit\" value=\"3\">3</button>
\t\t\t<br/>
\t\t\t<button class=\"digit\" value=\"0\">0</button>
\t\t\t<button class=\"digit\" value=\",\">,</button>
\t\t\t<br/>
\t\t</div>
\t\t<div id=\"operations\">
\t\t\t<button class=\"operation\" value=\"add\">+</button>
\t\t\t<button class=\"operation\" value=\"substract\">-</button>
\t\t\t<button class=\"operation\" value=\"mutliply\">*</button>
\t\t\t<button class=\"operation\" value=\"divide\">/</button>
\t\t\t<button class=\"operation\" value=\"execute\">=</button>
\t\t</div>
\t</div>
</div>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "TestCalcBundle:Default:index.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
