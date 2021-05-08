<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html" charset="UTF-8">
    <title>Title</title>
    <style>
        body{
            margin: 0px;
            padding: 0px;
            width: 100%;
            height: 100%;
            background: #d0d0d0;
        }
        #header {
            width: 100%;
            height: 50px;
            position: fixed;
            background: #9758b1;
        }
        #pageBlock {
            width: 1024px;
            background: aqua;
            margin: 54px auto;
        }
        #leftMenu {
            padding: 4px;
            background: #3c71cb;
            width: 300px;
            float: left;
        }
        #leftMenuContent {
            padding: 4px;
            width: 700px;
            background: coral;
            float: right;
        }
        a {
            color: #5f0404;
        }

    </style>
</head>
<body>
<div id="header">kmlkmsd</div>
<div id="pageBlock">
    <div id="leftMenu">
        <?php foreach ($categories as $category) {?>
        <a href="<?php echo $category['link']; ?>"><?php echo $category['name'];?></a><br />
        <?php } ?>
    </div>
    <div id="leftMenuContent">
asdasmd
    </div>
</div>
</body>
</html>