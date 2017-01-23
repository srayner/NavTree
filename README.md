NavTree
=======

A php class for rendering flat data as tree navigation HTML.

Usage
-----

1. Pass it some flat data in the constructor
2. Call the render function.

~~~~
include ('NavTree.php');
$navigation = new NavTree($data);
$navigation->render();
~~~~

See example.php for a full example.