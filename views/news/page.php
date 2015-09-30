<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Blog</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="/template/css/style.css" />
</head>

<body>
	<div id="site">
		<div id="header">
			<a href="#" class="logo"><img src="/template/images/logo.jpg" alt="setalpm" width="202" height="55" /></a>				                                                                                                                                                                                                                 <div class="inner_copy"><a href="http://www.webbuildersguide.com/website-builder-categories/website-builders-for-mac/">http://www.webbuildersguide.com/website-builder-categories/website-builders-for-mac/</a></div>																																
			<div id="menu">
				<ul>
					<li><a href="#" class="but1 active"><img src="template/images/spacer.gif" alt="" width="106" height="42" /></a></li>
					<li><a href="#" class="but2"><img src="/template/images/spacer.gif" alt="" width="118" height="42" /></a></li>
					<li><a href="#" class="but3"><img src="/template/images/spacer.gif" alt="" width="106" height="42" /></a></li>
					<li><a href="#" class="but4"><img src="/template/images/spacer.gif" alt="" width="99" height="42" /></a></li>
					<li><a href="#" class="but5"><img src="/template/images/spacer.gif" alt="" width="154" height="42" /></a></li>
					<li><a href="#" class="but6"><img src="/template/images/spacer.gif" alt="" width="129" height="42" /></a></li>
				</ul>
				<form action="#">
					<input type="text" value="Search" />
				</form>
			</div>
			<ul id="meta">
				<li><a href="#" class="meta1"><img src="/template/images/spacer.gif" alt="" width="37" height="39" /></a></li>
				<li><a href="#" class="meta2"><img src="/template/images/spacer.gif" alt="" width="37" height="39" /></a></li>
				<li><a href="#" class="meta3"><img src="/template/images/spacer.gif" alt="" width="37" height="39" /></a></li>
			</ul>
		</div>
		<div id="content">																																																																																																														
			<div id="main">
				<span><?=$newsItem['date']?></span><br/>
				<h5><?=$newsItem['title']?></h5>
				<img src="<?=$newsItem['img']?>"
				<p><?=$newsItem['text']?></p>
				<a href="/news/"> BAck to all news</a>
			</div>
			<div id="sidebar">
				<div class="block">
					<div class="news">
						<div>
							<?php foreach($latestNewsItem as $newsItem):?>
								<p><?=$newsItem['text_previe']?></p>
								<a href="/news/<?=$newsItem['id']?>" class="more"><img src="/template/images/more.gif" alt="" width="102" height="21" /></a>
							<?php endforeach;?>
						</div>
					</div>
				</div>
				<div class="sponsors">
					<img src="/template/images/title1.gif" alt="" width="274" height="37" />
				</div>
				<div>
					<img src="/template/images/title2.gif" alt="" width="274" height="37" />
					<ul class="popular">
						<li><a href="#">Tellus eros sodales enim</a></li>
						<li><a href="#">Sectetu adip scing varius interdum</a></li>
						<li><a href="#">Nulla pulvinar, nisl</a></li>
						<li><a href="#">Tellus eros sodales enim</a></li>
						<li><a href="#">Sectetu adip scing varius interdum</a></li>
						<li><a href="#">Nulla pulvinar, nisl</a></li>
						<li><a href="#">Tellus eros sodales enim</a></li>
						<li><a href="#">Nulla pulvinar, nisl</a></li>
						<li><a href="#">Sectetu adip scing varius interdum</a></li>
						<li><a href="#">Tellus eros sodales enim</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="footer">																																																																																																	
		<div>
			<ul id="navigation">
				<li><a href="#">Home</a>|</li>
				<li><a href="#">About us</a>|</li>
				<li><a href="#">Gallery</a>|</li>
				<li><a href="#">News</a>|</li>
				<li><a href="#">Popular posts</a>|</li>
				<li><a href="#">Contact us</a>|</li>
				<li><a href="#" class="rss">RSS</a></li>
			</ul>
		</div>
	</div>
</body>
</html>
