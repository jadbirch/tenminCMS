tenminCMS
=========

The simplest CMS in the world? Upload markdown files to the posts directory, configure options and go.

###Getting started

Upload or copy the tenminCMS files into the web root of your server. This is probably called www, htdocs or public_html.

To get started, open up the config.php file and set the options as you please. There are a variety of options for a range of things: the title of your blog, the directory for your posts and so on. If you really want to get started quickly, just change $config['title'] and then stick to the defaults. If you change the directory structure etc, you probably need to make the corresponding change in the config file. 

####Styles

You are obviously not going to want to put your site online with the bare HTML. At the present time, I provide no default styles for full customisability and ease, but if you would like me to package some starter styles, or a more comprehensive solution - such as Twitter Bootstrap or Zerb Foundation's framework - then please create an issue and I will look into it. 

Styling on TMCMS works as it would with any other website. Your index.php must load the stylesheets in the head with the use of a '<link href="assets/stylesheetname.css" rel="stylesheet">' and you are off the ground straight away. 

You can also change the HTML in index.php, the file that serves all posts. As long as the PHP code is left somewhere between the body tags, it will be displayed. You may want to add a sidebar, footer, header etc, but consider placing the PHP code in your content/main/article/section.
