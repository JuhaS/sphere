<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2010, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */
?>
<!doctype html>
<html>
<head>
	<?php echo $this->html->charset();?>
	<title>▴❍ <?php echo $this->title?></title>
	<?php echo $this->html->style(array('http://localhost/lithify_me/css/reset.css', 'http://localhost/lithify_me/css/base.css', 'http://localhost/lithify_me/css/forms.css', 'http://localhost/lithify_me/css/polish.css', 'sphere'));?>
	<?php echo $this->scripts();?>
	<?php echo $this->html->link('Icon', null, array('type' => 'icon'));?>
</head>
<body class="app">
	<div id="header">
		<h1><?=$this->html->link('Lithium Sphere', '/');?></h1>
		<h2><?=$this->html->link('power of community', '/');?></h2>
		<div class="nav account">
			<?php
				if ($user = $this->user->session()) {
					echo $this->html->image(
						'http://gravatar.com/avatar/' . md5($user['email']) . '?s=16',
						array('title' => $user['username'])
					);
					echo $this->html->link('logout', array(
						'controller' => 'users', 'action' => 'logout'
					));
				} else {
					echo $this->html->link('login', array(
						'controller' => 'users', 'action' => 'login'
					));
					echo ' | ';
					echo $this->html->link('register', array(
						'controller' => 'users', 'action' => 'register'
					));
				}
			?>
			| <?php echo $this->html->link('new post', array('controller' => 'posts', 'action' => 'add')); ?>
		</div>
	</div>
	<div class="width-constraint">
		<?php
		$params = array('tag' => null, 'date' => null);
		extract(array_intersect_key($this->_request->params, $params));
		?>
		<div class="nav timespan">
			<nav>
				<span id="timespan-icon" class="icon">Timespan</span>
				<ul>
					<li><?php echo $this->sphere->link('today', array('date' => 'today') + compact('tag'));?></li>
					<li><?php echo $this->sphere->link('yesterday', array('date' => 'yesterday') + compact('tag'));?></li>
					<li><?php echo $this->sphere->link('1wk', array('date' => '1wk') + compact('tag'));?></li>
					<li><?php echo $this->sphere->link('2wk', array('date' => '2wk') + compact('tag'));?></li>
					<li><?php echo $this->sphere->link('1mo', array('date' => '1mo') + compact('tag'));?></li>
					<li><?php echo $this->sphere->link('1yr', array('date' => '1yr') + compact('tag'));?></li>
					<li><?php echo $this->sphere->link('all', array('date' => 'all') + compact('tag'));?></li>
				</ul>
			</nav>
		</div>
		<div class="nav search">
			<nav>
				<?php
				echo $this->form->create(null, array('url' => array('controller' => 'search', 'action' => 'index', 'q' => null), 'method' => 'GET', 'class' => 'mini-search-form'));
				echo $this->form->text('q', array('class' => 'search-query', 'value' => (isset($q) ? $q : null)));
				echo $this->form->submit('Search', array('class' => 'search-submit'));
				echo $this->form->end();
				?>
			</nav>
		</div>
		<div class="nav sources closed">
			<nav>
				<span id="sources-icon" class="icon" title="Click me to toggle the Sources drawer.">Sources</span>
				<ul>
					<li><?php echo $this->sphere->link('<span>All</span>', array(), array('escape' => false, 'class' => 'all', 'source' => null, 'title' => 'All posts from all sources'));?></li>
					<li><?php echo $this->sphere->link('<span>Apps</span>', array('tag' => 'apps'), array('escape' => false, 'class' => 'apps', 'title' => 'Lithium powered applications'));?></li>
					<li><?php echo $this->sphere->link('<span>Questions</span>', array('tag' => 'questions'), array('escape' => false, 'class' => 'questions', 'title' => 'Questions'));?></li>
					<li><?php echo $this->sphere->link('<span>Press</span>', array('tag' => 'press'), array('escape' => false, 'class' => 'press', 'title' => 'Press'));?></li>
					<li><?php echo $this->sphere->link('<span>Tutorials</span>', array('tag' => 'tutorials'), array('escape' => false, 'class' => 'tutorials', 'title' => 'Tutorials'));?></li>
					<li><?php echo $this->sphere->link('<span>Code</span>', array('tag' => 'code'), array('escape' => false, 'class' => 'code', 'title' => 'Code'));?></li>
					<li><?php echo $this->sphere->link('<span>Videos</span>', array('tag' => 'videos'), array('escape' => false, 'class' => 'videos', 'title' => 'Videos'));?></li>
					<li><?php echo $this->sphere->link('<span>Podcasts</span>', array('tag' => 'podcasts'), array('escape' => false, 'class' => 'podcasts', 'title' => 'Podcasts'));?></li>
					<li><?php echo $this->sphere->link('<span>Slides</span>', array('tag' => 'slides'), array('escape' => false, 'class' => 'slides', 'title' => 'Slides'));?></li>
					<li><?php echo $this->sphere->link('<span>Events</span>', array('tag' => 'events'), array('escape' => false, 'class' => 'events', 'title' => 'Events'));?></li>
					<li><?php echo $this->sphere->link('<span>Documentation</span>', array('tag' => 'docs'), array('escape' => false, 'class' => 'docs', 'title' => 'Documentation'));?></li>
					<li><?php echo $this->sphere->link('<span>Jobs</span>', array('tag' => 'jobs'), array('escape' => false, 'class' => 'jobs', 'title' => 'Jobs'));?></li>
					<li><?php echo $this->sphere->link('<span>Misc.</span>', array('tag' => 'misc'), array('escape' => false, 'class' => 'misc', 'title' => 'Misc.'));?></li>
				</ul>
			</nav>
		</div>
		<div id="content">
			<div class="article">
				<article>
					<?php echo $this->content;?>
				</article>
			</div>
		</div>
	</div>
	<div class="footer">
		<p class="copyright">this badapp &copy; 2010 and beyond, <?php echo $this->html->link('the Union of Rad', 'http://union-of-rad.org/'); ?> &nbsp; ▴ &nbsp; hosting by <a href="http://www.rackspacecloud.com/519.html" title="Learn more about cloud computing from The Rackspace Cloud at rackspacecloud.com"><img src="http://cdn.cloudfiles.rackspacecloud.com/c110782/the-rackspace-cloud-125-wide.png" border="0" alt="The Rackspace Cloud" width="125" height="35" /></a></p>
	</div>
	<?php echo $this->html->script(array(
		"jquery-1.4.1.min",
		"jquery.xdomainajax",
		"sphere",
		"jquery.oembed",
		"pretty.date",
		"showdown/showdown",
		"http://lithify.me/js/rad.cli.js",
	)); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			li3Sphere.setup();
			$('.post-content a, .post-comment-content a').oembed(null, {
				embedMethod: 'annotate',
				maxWidth: 425,
				maxHeight: 425
			});
			RadCli.setup();
		});
	</script>
	<?php if (isset($this->viewJs)) echo $this->viewJs; ?>
</body>
</html>
