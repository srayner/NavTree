<html>
<head>
</head>
<body>

<?php

    include ('NavTree.php');
	
    // example data
    $data = array(
        array('id'=>99, 'parentId'=>0,   'name'=>'root1'),
		array('id'=>100, 'parentId'=>0,   'name'=>'root2'),
        array('id'=>101, 'parentId'=>100, 'name'=>'page1'),
        array('id'=>102, 'parentId'=>101, 'name'=>'page1a'),
        array('id'=>103, 'parentId'=>101, 'name'=>'page1b'),
		array('id'=>113, 'parentId'=>103, 'name'=>'page1b-child'),
		array('id'=>201, 'parentId'=>100, 'name'=>'page2'),
        array('id'=>202, 'parentId'=>201, 'name'=>'page2a'),
        array('id'=>203, 'parentId'=>201, 'name'=>'page2b'),
    );

    $nav = new NavTree($data);
	$nav->render();
?>

</body>
</html>